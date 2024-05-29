<?php
// force UTF-8 Ø

/**
 * Prints a list of tags, editable by admin. SEO version with nofollow removed.
 *
 * @param string $option links by default, if anything else the
 *               tags will not link to all other images with the same tag
 * @param string $preText text to go before the printed tags
 * @param string $class css class to apply to the div surrounding the UL list
 * @param string $separator what charactor shall separate the tags
 * @since 1.1
 */
function printTags_pd($option = 'links', $preText = NULL, $class = NULL, $separator = ', ', $nofollow=FALSE) {
	global $_zp_current_search;
	if (is_null($class)) {
		$class = 'taglist';
	}
	if (!$nofollow) {
		$nofollow = "";
	} else {
		$nofollow = " rel=\"nofollow\"";
	}
	$singletag = getTags();
	$tagstring = implode(', ', $singletag);
	if ($tagstring === '' or $tagstring === NULL) {
		$preText = '';
	}
	if (in_context(ZP_IMAGE)) {
		$object = "image";
	} else if (in_context(ZP_ALBUM)) {
		$object = "album";
	} else if (in_context(ZP_ZENPAGE_PAGE)) {
		$object = "pages";
	} else if (in_context(ZP_ZENPAGE_NEWS_ARTICLE)) {
		$object = "news";
	}
	if (count($singletag) > 0) {
		if (!empty($preText)) {
			echo "<span class=\"tags_title\">" . $preText . "</span>";
		}
		echo '<ul class="' . $class . '" itemprop="keywords">';
		if (is_object($_zp_current_search)) {
			$albumlist = $_zp_current_search->getAlbumList();
		} else {
			$albumlist = NULL;
		}
		$ct = count($singletag);
		$x = 0;
		foreach ($singletag as $atag) {
			if (++$x == $ct) {
				$separator = "";
			}
			if ($option === "links") {
				$links1 = "<a href=\"" . html_encode(SearchEngine::getSearchURL(($atag),'', 'tags', 0, array('albums' => $albumlist))) . "\" title=\"" . html_encode($atag) . "\"$nofollow>";
				$links2 = "</a>";
			} else {
				$links1 = $links2 = '';
			}
			echo "<li>". $links1 . $atag . $links2 . $separator ."</li>\n";
		}
		echo "</ul>";
	} else {
		echo "$tagstring";
	}
}

/**
 * SEO version of the printAllTagsAs function: nofollow added
 Either prints all of the galleries tgs as a UL list or a cloud
 *
 * @param string $option "cloud" for tag cloud, "list" for simple list
 * @param string $class CSS class
 * @param string $sort "results" for relevance list, "random" for random ordering, otherwise the list is alphabetical
 * @param bool $counter TRUE if you want the tag count within brackets behind the tag
 * @param bool $links set to TRUE to have tag search links included with the tag.
 * @param int $maxfontsize largest font size the cloud should display
 * @param int $maxcount the floor count for setting the cloud font size to $maxfontsize
 * @param int $mincount the minimum count for a tag to appear in the output
 * @param int $limit set to limit the number of tags displayed to the top $numtags
 * @param int $minfontsize minimum font size the cloud should display
 * @param bool $exclude_unassigned True or false if you wish to exclude tags that are not assigne to any item (default: true)
 * @param bool $checkaccess True or false (default: false) if you wish to exclude tags that are assigned to items (or are not assigned at all) the visitor is not allowed to see
 * Beware that this may cause overhead on large sites. Usage of the static_html_cache is strongely recommended then.
 * @param bool $nofollow True or false (default: false) if you wish to add nofollow attribute to tag links
 * @since 1.1
 */
function printAllTagsAs_pd ($option, $class = '', $sort = NULL, $counter = FALSE, $links = TRUE, $maxfontsize = 3, $maxcount = 100, $mincount = 1, $limit = NULL, $minfontsize = 1, $exclude_unassigned = true, $checkaccess = false, $nofollow=FALSE) {
	global $_zp_current_search;
	$option = strtolower($option);
	if ($class != "") {
		$class = ' class="' . $class . '"';
	}
	if (!$nofollow) {
		$nofollow = "";
	}
		else {
		$nofollow = ' rel="nofollow"';
	}
	$tagcount = getAllTagsCount($exclude_unassigned, $checkaccess);
	if (!is_array($tagcount)) {
		return false;
	}
	switch ($sort) {
		case 'results':
			arsort($tagcount);
			if (!is_null($limit)) {
				$tagcount = array_slice($tagcount, 0, $limit);
			}
			break;
		case 'random':
			if (!is_null($limit)) {
				$tagcount = array_slice($tagcount, 0, $limit);
			}
			shuffle_assoc($tagcount);
			break;
		default:
			break;
	}
	?>
	<ul<?php echo $class; ?>>
		<?php
		if (count($tagcount) > 0) {
			foreach ($tagcount as $key => $val) {
				if (!$counter) {
					$counter = "";
				} else {
					$counter = " (" . $val . ") ";
				}
				if ($option == "cloud") { // calculate font sizes, formula from wikipedia
					if ($val <= $mincount) {
						$size = $minfontsize;
					} else {
						$size = min(max(round(($maxfontsize * ($val - $mincount)) / ($maxcount - $mincount), 2), $minfontsize), $maxfontsize);
					}
					$size = str_replace(',', '.', $size);
					$size = ' style="font-size:' . $size . 'em;"';
				} else {
					$size = '';
				}
				if ($val >= $mincount) {
					if ($links) {
						if (is_object($_zp_current_search)) {
							$albumlist = $_zp_current_search->getAlbumList();
						} else {
							$albumlist = NULL;
						}
						$link = SearchEngine::getSearchURL(SearchEngine::getSearchQuote($key), '', 'tags', 0, array('albums' => $albumlist));
						?>
						<li><a href="<?php echo html_encode($link); ?>"<?php echo $size; echo $nofollow; ?>><?php echo $key . $counter; ?></a></li>
						<?php
					} else {
						?>
						<li<?php echo $size; ?>><?php echo $key . $counter; ?></li>
						<?php
					}
				}
			} // while end
		} else {
			?>
			<li><?php echo gettext('No popular tags'); ?></li>
			<?php }	?>
	</ul>
	<?php
}
/**
 * Bootstrap breadcrumb. Based on an unordered list. Includes link to root and microdata
 * Prints the breadcrumb navigation for album, gallery and image view.
 *
 * @param string $before Insert here the text to be printed before the links
 * @param string $between Insert here the text to be printed between the links
 * @param string $after Insert here the text to be printed after the links
 * @param mixed $truncate if not empty, the max lenght of the description.
 * @param string $elipsis the text to append to the truncated description
 */
function printParentBreadcrumb_pd() {
	$crumbs = getParentBreadcrumb();
	if (!empty($crumbs)) {
		$output = '';
		$i = 0;
		foreach ($crumbs as $crumb) {
			if ($i > 0) {
				$output;
			}
			$output .= '<li><a href="' . html_encode($crumb['link']) . '">' . html_encode($crumb['text']) . '</a></li>';
			$i++;
		}
		echo $output;
	}
}

/**
 * prints the breadcrumb item for the current images's album. Simpler formatting
 *
 * @param string $before Text to place before the breadcrumb
 * @param string $after Text to place after the breadcrumb
 * @param string $title Text to be used as the URL title tag
 */
function printAlbumBreadcrumb_pd() {
	if ($breadcrumb = getAlbumBreadcrumb()) {
			$output = '';
		$output .= '<li><a href="' . html_encode($breadcrumb['link']) . '">';
		$output .= html_encode($breadcrumb['text']);
		$output .= '</a></li>';
		echo $output;
	}
}


/**
 * Prints the parent items breadcrumb navigation for pages or categories
 *
 * @param string $before Text to place before the breadcrumb item
 * @param string $after Text to place after the breadcrumb item
 */
function printZenpageItemsBreadcrumb_pd() {
	global $_zp_current_zenpage_page, $_zp_current_category;
	$parentitems = array();
	if (is_Pages()) {
		//$parentid = $_zp_current_zenpage_page->getParentID();
		$parentitems = $_zp_current_zenpage_page->getParents();
	}
	if (is_NewsCategory()) {
		//$parentid = $_zp_current_category->getParentID();
		$parentitems = $_zp_current_category->getParents();
	}

	foreach ($parentitems as $item) {
		if (is_Pages()) {
			$pageobj = new ZenpagePage($item);
			$parentitemurl = html_encode($pageobj->getLink());
			$parentitemtitle = $pageobj->getTitle();
		}
		if (is_NewsCategory()) {
			$catobj = new ZenpageCategory($item);
			$parentitemurl = $catobj->getLink();
			$parentitemtitle = $catobj->getTitle();
		}
		echo"<li><a href='" . $parentitemurl . "'>" . html_encode($parentitemtitle) . "</a></li>";
	}
}

/**
 * Prints the title of the currently selected news category
 *
 * @param string $before insert what you want to be show before it
 */
function printCurrentNewsCategory_pd() {
	global $_zp_current_category;
	if (in_context(ZP_ZENPAGE_NEWS_CATEGORY)) {
		echo '<li>';
		echo html_encode($_zp_current_category->getTitle());
		echo '</li>';
	}
}

/**
 * Prints the Metadata data of the current image
 * Simpler version of the classic printImageMetadata
 * @param string $title title tag for the class
 * @param bool $toggle set to true to get a javascript toggle on the display of the data
 * @param string $id style class id
 * @param string $class style class
 * @author Ozh, modified by OF
 */
function printImageMetadata_pd() {
	global $_zp_exifvars, $_zp_current_image;
	if (false === ($exif = getImageMetaData($_zp_current_image, true))) {
		return;
	}	?>

			<table class="table table-striped" itemprop="exifData">
			<?php
				foreach ($exif as $field => $value) {
					$label = $_zp_exifvars[$field][2];
					echo '<tr><th>' . $label . ':</th><td>';
					switch ($_zp_exifvars[$field][6]) {
						case 'time':
							if (!is_int($value) && strpos($value, 'T') !== false) {
								$value = str_replace('T', ' ', substr($value, 0, 19));
							}
							echo zpFormattedDate(DATE_FORMAT, $value);
							break;
						default:
							echo html_encode($value);
							break;
					}
					echo '</td></tr>';
					echo "\n"; } ?>
			</table>
	<?php
}


/**
 * Prints jQuery JS to enable the toggling of search results of Zenpage  items
 *
 */
function printZDSearchToggleJS() {
	?>
	<script type="text/javascript">
		// <!-- <![CDATA[
		function toggleExtraElements(category, show) {
			if (show) {
				jQuery('.' + category + '_showless').show();
				jQuery('.' + category + '_showmore').hide();
				jQuery('.' + category + '_extrashow').show();
			} else {
				jQuery('.' + category + '_showless').hide();
				jQuery('.' + category + '_showmore').show();
				jQuery('.' + category + '_extrashow').hide();
			}
		}
		// ]]> -->
	</script>
	<?php
}

/**
 * Prints the "Show more results link" for search results for Zenpage items
 *
 * @param string $option "news" or "pages"
 * @param int $number_to_show how many search results should be shown initially
 */
function printZDSearchShowMoreLink($option, $number_to_show) {
	$option = strtolower($option);
	switch ($option) {
		case "news":
			$num = getNumNews();
			break;
		case "pages":
			$num = getNumPages();
			break;
	}
	if ($num > $number_to_show) {
		?>
		<a class="<?php echo $option; ?>_showmore"href="javascript:toggleExtraElements('<?php echo $option; ?>',true);"><?php echo gettext('Show more results'); ?></a>
		<a class="<?php echo $option; ?>_showless" style="display: none;"	href="javascript:toggleExtraElements('<?php echo $option; ?>',false);"><?php echo gettext('Show fewer results'); ?></a>
		<?php
	}
}

/**
 * Adds the css class necessary for toggling of Zenpage items search results
 *
 * @param string $option "news" or "pages"
 * @param string $c After which result item the toggling should begin. Here to be passed from the results loop.
 */
function printZDToggleClass($option, $c, $number_to_show) {
	$option = strtolower($option);
	$c = sanitize_numeric($c);
	if ($c > $number_to_show) {
		echo ' class="' . $option . '_extrashow" style="display:none;"';
	}
}

function my_checkPageValidity($request, $gallery_page, $page) {
	switch ($gallery_page) {
		case 'gallery.php':
			$gallery_page = 'index.php'; //	same as an album gallery index
			break;
		case 'index.php':
			if (extensionEnabled('zenpage')) {
				if (getOption('zenpage_zp_index_news')) {
					$gallery_page = 'news.php'; //	really a news page
					break;
				}
				if (getOption('zenpage_homepage')) {
					return $page == 1; // only one page if zenpage enabled.
				}
			}
			break;
		case 'news.php':
		case 'album.php':
		case 'search.php':
		case 'favorites.php':
			break;
		default:
			if ($page != 1) {
				return false;
			}
	}
	return checkPageValidity($request, $gallery_page, $page);
}

/**
 * makex news page 1 link go to the index page
 * @param type $link
 * @param type $obj
 * @param type $page
 */
function newsOnIndex($link, $obj, $page) {
	if (is_string($obj) && $obj == 'news.php') {
		if (MOD_REWRITE) {
			if (preg_match('~' . _NEWS_ . '[/\d/]*$~', $link)) {
				$link = WEBPATH;
				if ($page > 1)
					$link .= '/' . _PAGE_ . '/' . $page;
			}
		} else {
			if (strpos($link, 'category=') === false && strpos($link, 'title=') === false) {
				$link = str_replace('?&', '?', rtrim(str_replace('p=news', '', $link), '?'));
			}
		}
	}
	return $link;
}

if (!OFFSET_PATH) {
	enableExtension('print_album_menu', 1 | THEME_PLUGIN, false);
	setOption('user_logout_login_form', 2, false);
	$_zp_page_check = 'my_checkPageValidity';
	if (extensionEnabled('zenpage') && getOption('zenpage_zp_index_news')) { // only one index page if zenpage plugin is enabled & displaying
		zp_register_filter('getLink', 'newsOnIndex');
	}
}

/**
 * Prints image statistic according to $option as an unordered HTML list
 * A css id is attached by default named accordingly'$option'
 *
 * @param string $number the number of albums to get
 * @param string $option "popular" for the most popular images,
 * 		"popular" for the most popular albums,
 * 		"latest" for the latest uploaded by id (Discovery)
 * 		"latest-date" for the latest by date
 * 		"latest-mtime" for the latest by mtime
 *   	"latest-publishdate" for the latest by publishdate
 *    "mostrated" for the most voted,
 * 		"toprated" for the best voted
 * 		"latestupdated" for the latest updated
 * 		"random" for random order (yes, strictly no statistical order...)
 * @param string $albumfolder foldername of an specific album
 * @param bool $showtitle if the image title should be shown
 * @param bool $showdate if the image date should be shown
 * @param bool $showdesc if the image description should be shown
 * @param integer $desclength the length of the description to be shown
 * @param string $showstatistic "hitcounter" for showing the hitcounter (views),
 * 		"rating" for rating,
 * 		"rating+hitcounter" for both.
 * @param integer $width the width/cropwidth of the thumb if crop=true else $width is longest size. (Default 85px)
 * @param integer $height the height/cropheight of the thumb if crop=true else not used.  (Default 85px)
 * @param bool $crop 'true' (default) if the thumb should be cropped, 'false' if not
 * @param bool $collection only if $albumfolder is set: true if you want to get statistics from this album and all of its subalbums
 * @param bool $fullimagelink 'false' (default) for the image page link , 'true' for the unprotected full image link (to use Colorbox for example)
 * @param integer $threshold the minimum number of ratings an image must have to be included in the list. (Default 0)
 * @return string
 */
function printImageStatistic_pd($number, $option, $albumfolder = '', $showtitle = false, $showdate = false, $showdesc = false, $desclength = 40, $showstatistic = '', $width = NULL, $height = NULL, $crop = NULL, $collection = false, $fullimagelink = false, $threshold = 0) {
	$images = getImageStatistic($number, $option, $albumfolder, $collection, $threshold);
	if (is_null($crop) && is_null($width) && is_null($height)) {
		$crop = 2;
	} else {
		if (is_null($width))
			$width = 85;
		if (is_null($height))
			$height = 85;
		if (is_null($crop)) {
			$crop = 1;
		} else {
			$crop = (int) $crop && true;
		}
	}
	echo '<div id="images-' . $option . '" class="row">';
	echo "\n";
	foreach ($images as $image) {
		if ($fullimagelink) {
			$imagelink = $image->getFullImageURL();
		} else {
			$imagelink = $image->getLink();
		}
	if (getOption('paradigm_full-width')) {
		echo '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">'; }
	else {echo '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">'; }
	echo "\n";
	echo '<div class="thumbnail" itemtype="https://schema.org/image" itemscope>';
	echo "\n";
	echo '<a href="' . html_encode($imagelink) . '" title="' . html_encode($image->getTitle()) . '"';  
		if ($fullimagelink) {
			echo ' rel="lightbox-latest"';
		}
		echo '>';

		switch ($crop) {
			case 0:
				$sizes = getSizeCustomImage($width, NULL, NULL, NULL, NULL, NULL, NULL, $image);
				echo '<img src="' . html_encode(pathurlencode($image->getCustomImage($width, NULL, NULL, NULL, NULL, NULL, NULL, TRUE))) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($image->getTitle()) . '">';
				break;
			case 1:
				$sizes = getSizeCustomImage(NULL, $width, $height, $width, $height, NULL, NULL, $image);
				echo '<img src="' . html_encode(pathurlencode($image->getCustomImage(NULL, $width, $height, $width, $height, NULL, NULL, TRUE))) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($image->getTitle()) . '" width="'. $width . '" height="' . $height . '">';
				break;
			case 2:
				$sizes = getSizeDefaultThumb($image);
				echo '<img src="' . html_encode(pathurlencode($image->getThumb())) . '" width="' . $sizes[0] . '" height="' . $sizes[1] . '" alt="' . html_encode($image->getTitle()) . '">';
				break;
		}
	echo '</a>';
	echo "\n";

		if ($showtitle) {
			echo '<div class="caption">';
			echo '<a href="' . html_encode(pathurlencode($image->getLink())) . '" title="' . html_encode($image->getTitle()) . '">';
			echo $image->getTitle() . '</a>';
			echo '</div>';
			echo "\n";
		}

		if ($showdate) {
			echo '<p>' . zpFormattedDate(DATE_FORMAT, strtotime($image->getDateTime())) . '</p>';
			echo "\n";
		}

		if ($showstatistic === "rating" OR $showstatistic === "rating+hitcounter") {
			$votes = $image->get("total_votes");
			$value = $image->get("total_value");
			if ($votes != 0) {
				$rating = round($value / $votes, 1);
			}
			echo '<p>' . sprintf(gettext('Rating: %1$u (Votes: %2$u)'), $rating, $votes) . '</p>';
			echo "\n";
		}

		if ($showstatistic === "hitcounter" OR $showstatistic === "rating+hitcounter") {
			$hitcounter = $image->getHitcounter();
			if (empty($hitcounter)) {
				$hitcounter = "0";
			}
			echo '<p>' . sprintf(gettext("Views: %u"), $hitcounter) . '</p>';
			echo "\n";
		}

		if ($showdesc) {
			echo shortenContent($image->getDesc(), $desclength, ' (...)');
			echo "\n";
		}

	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n\n";
	}
	echo '</div>';
	echo "\n";
}

function printNewsPageListWithNav_pd ($next, $prev, $nextprev = true, $class = 'pagelist', $firstlast = true, $navlen = 9) {
	global $_zp_zenpage, $_zp_current_category, $_zp_page;
	if (in_context(ZP_ZENPAGE_NEWS_CATEGORY)) {
		$total = $_zp_current_category->getTotalNewsPages();
	} else {
		$total = $_zp_zenpage->getTotalNewsPages();
	}
	if ($total > 1) {
		if ($navlen == 0)
			$navlen = $total;
		$extralinks = 2;
		if ($firstlast)
			$extralinks = $extralinks + 2;
		$len = floor(($navlen - $extralinks) / 2);
		$j = max(round($extralinks / 2), min($_zp_page - $len - (2 - round($extralinks / 2)), $total - $navlen + $extralinks - 1));
		$ilim = min($total, max($navlen - round($extralinks / 2), $_zp_page + floor($len)));
		$k1 = round(($j - 2) / 2) + 1;
		$k2 = $total - round(($total - $ilim) / 2);
		echo "<div class=\"$class\">\n<ul class=\"$class\">\n";
		if ($nextprev) {
			echo "<li class=\"prev\">";
			printPrevNewsPageLink($prev);
			echo "</li>\n";
		}
		if ($firstlast) {
			echo '<li class = "' . ($_zp_page == 1 ? 'current' : 'first') . '">';
			if ($_zp_page == 1) {
				echo "1";
			} else {
				echo '<a href = "' . html_encode(getNewsPathNav(1)) . '" title = "' . gettext("Page") . ' 1">1</a>';
			}
			echo "</li>\n";
			if ($j > 2) {
				echo "<li>";
				$linktext = ($j - 1 > 2) ? '...' : $k1;
				echo '<a href = "' . html_encode(getNewsPathNav($k1)) . '" title = "' . sprintf(ngettext('Page %u', 'Page %u', $k1), $k1) . '">' . $linktext . '</a>';
				echo "</li>\n";
			}
		}
		for ($i = $j; $i <= $ilim; $i++) {
			echo "<li" . (($i == $_zp_page) ? " class=\"current\"" : "") . ">";
			if ($i == $_zp_page) {
				echo $i;
			} else {
				echo '<a href = "' . html_encode(getNewsPathNav($i)) . '" title = "' . sprintf(ngettext('Page %1$u', 'Page %1$u', $i), $i) . '">' . $i . '</a>';
			}
			echo "</li>\n";
		}
		if ($i < $total) {
			echo "<li>";
			$linktext = ($total - $i > 1) ? '...' : $k2;
			echo '<a href = "' . html_encode(getNewsPathNav($k2)) . '" title = "' . sprintf(ngettext('Page %u', 'Page %u', $k2), $k2) . '">' . $linktext . '</a>';
			echo "</li>\n";
		}
		if ($firstlast && $i <= $total) {
			echo "\n  <li class=\"last\">";
			if ($_zp_page == $total) {
				echo $total;
			} else {
				echo '<a href = "' . html_encode(getNewsPathNav($total)) . '" title = "' . sprintf(ngettext('Page {%u}', 'Page {%u}', $total), $total) . '">' . $total . '</a>';
			}
			echo "</li>\n";
		}
		if ($nextprev) {
			echo '<li class = "next">';
			printNextNewsPageLink($next);
			echo "</li>\n";
		}
		echo "</ul>\n</div>\n";
	}
}


/**
 * Prints the latest images by ID (the order zenphoto recognized the images on the filesystem)
 *
 * @param string $number the number of images to get
 * @param string $albumfolder folder of an specific album
 * @param bool $showtitle if the image title should be shown
 * @param bool $showdate if the image date should be shown
 * @param bool $showdesc if the image description should be shown
 * @param integer $desclength the length of the description to be shown
 * @param string $showstatistic
 * 		"hitcounter" for showing the hitcounter (views),
 * 		"rating" for rating,
 * 		"rating+hitcounter" for both.
 * @param integer $width the width/cropwidth of the thumb if crop=true else $width is longest size. (Default 85px)
 * @param integer $height the height/cropheight of the thumb if crop=true else not used.  (Default 85px)
 * @param bool $crop 'true' (default) if the thumb should be cropped, 'false' if not
 * @param bool $collection only if $albumfolder is set: true if you want to get statistics from this album and all of its subalbums
 * @param bool $fullimagelink 'false' (default) for the image page link , 'true' for the unprotected full image link (to use Colorbox for example)
 */
function printLatestImages_pd($number = 5, $albumfolder = '', $showtitle = false, $showdate = false, $showdesc = false, $desclength = 40, $showstatistic = '', $width = NULL, $height = NULL, $crop = NULL, $collection = false, $fullimagelink = false) {
	printImageStatistic_pd($number, "latest", $albumfolder, $showtitle, $showdate, $showdesc, $desclength, $showstatistic, $width, $height, $crop, $collection, $fullimagelink);
}

/**
 * Prints the x related articles based on a tag search
 *
 * @param int $number Number of items to get
 * @param string $type 'albums', 'images','news','pages', "all" for all combined.
 * @param string $specific If $type = 'albums' or 'images' name of album
 * @param bool $excerpt If a text excerpt (gallery items: description; Zenpage items: content) should be shown. NULL for none or number of length
 * @param bool $thumb For $type = 'albums' or 'images' if a thumb should be shown (default size as set on the options)
 */
function printRelatedItems_pd($number = 5, $type = 'news', $specific = NULL, $excerpt = NULL, $thumb = false, $date = false) {
	$label = array(
			'albums' => gettext('Related albums'),
			'images' => gettext('Related images'),
			'news' => gettext('Related news'),
			'pages' => gettext('Related pages'),
			'all' => gettext('Related')
	);
	$result = getRelatedItems($type, $specific);
	$resultcount = count($result);
	if ($resultcount != 0) {
		?>
		<h2 class="related-items"><i class="glyphicon glyphicon-link"></i><?php echo $label[$type]; ?></h2>
		<ul id="related-items">
			<?php
			$count = 0;
			foreach ($result as $item) {
				$count++;
				?>
				<li class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-2 '; } ?>col-lg-3 col-md-4 col-sm-6 col-xs-12 related-<?php echo $item['type']; ?>">
					<?php
					$category = '';
					switch ($item['type']) {
						case 'albums':
							$obj = AlbumBase::newAlbum($item['name']);
							$url = $obj->getLink();
							$text = $obj->getDesc();
							$textshort = $obj->getCustomData();
							$category = gettext('Album');
							break;
						case 'images':
							$alb = AlbumBase::newAlbum($item['album']);
							$obj = Image::newImage($alb, $item['name']);
							$url = $obj->getLink();
							$text = $obj->getDesc();
							$textshort = $obj->getCustomData();
							$category = gettext('Image');
							break;
						case 'news':
							$obj = new ZenpageNews($item['name']);
							$url = $obj->getLink();
							$text = $obj->getContent();
							$textshort = $obj->getCustomData();
							$category = gettext('News');
							break;
						case 'pages':
							$obj = new ZenpagePage($item['name']);
							$url = $obj->getLink();
							$text = $obj->getContent();
							$textshort = $obj->getCustomData();
							$category = gettext('Page');
							break;
					}
					?>
					<?php
					if ($thumb) {
						$thumburl = false;
						switch ($item['type']) {
							case 'albums':
								$thumburl = $obj->getThumb();
								break;
							case 'images':
								$thumburl = $obj->getThumb();
								break;
							case 'news':
								if ($hasFeaturedImage = getFeaturedImage($obj)) {;
								$featimage = getFeaturedImage($obj);
								$thumburl = $featimage->getCustomImage(getOption('thumb_size'),null,null,null,null,null,null,true,null);}
				else {
				$thumburl = false; }
								break;
							case 'pages':
								if ($hasFeaturedImage = getFeaturedImage($obj)) {;
								$featimage = getFeaturedImage($obj);
								$thumburl = $featimage->getCustomImage(getOption('thumb_size'),null,null,null,null,null,null,true,null); }
				else {
				$thumburl = false; }
								break;
						}
						if ($thumburl) {
							?>
							<a href="<?php echo html_encode(pathurlencode($url)); ?>" title="<?php echo html_encode($obj->getTitle()); ?>" class="related-items_thumb">
								<img src="<?php echo html_encode(pathurlencode($thumburl)); ?>" alt="<?php echo html_encode($obj->getTitle()); ?>" />
							</a>
							<?php
						}
					}
					?>
					<h3><?php if ($type == 'all') { ?>
					<?php if ($category == 'Image') { ?><i class="glyphicon glyphicon-picture"></i>
					<?php } elseif ($category == 'Album') { ?><i class="glyphicon glyphicon-folder-close"></i>
			<?php } elseif ($category == 'News') { ?><i class="glyphicon glyphicon-pencil"></i>
			<?php } else { ?><i class="glyphicon glyphicon-file"></i><?php } ?><?php } ?><a href="<?php echo html_encode(pathurlencode($url)); ?>" title="<?php echo html_encode($obj->getTitle()); ?>"><?php echo html_encode($obj->getTitle()); ?></a></h3>

					<?php if ($date) {
							switch ($item['type']) {
								case 'albums':
								case 'images':
									$d = $obj->getDateTime();
									break;
								case 'news':
								case 'pages':
									$d = $obj->getDateTime();
									break;
							} ?>
							<p class="related-items_date">
								<?php echo zpFormattedDate(DATE_FORMAT, strtotime($d)); ?>
							</p>
							<?php }	?>
					
					<?php if (($excerpt) && ($textshort != '')) { ?>
						<p class="excerpt"><?php echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',$textshort)))); ?></p>
					<?php } elseif ($excerpt) { ?>
						<p class="excerpt"><?php echo shortenContent(strip_tags(preg_replace( "/\r|\n/", "",(str_replace('</p>',' ',$text)))), $excerpt, '...', true); ?></p>
					<?php } ?>
				</li>
				<?php
				if ($count == $number) {
					break;
				}
			} // foreach
			if ($count) {
				?>
			</ul>
			<?php	}
	}
}

?>