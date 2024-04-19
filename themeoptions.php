<?php
// force UTF-8 Ø
/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 *
 */
 
class ThemeOptions {

	function __construct() {
		$me = basename(dirname(__FILE__));
		setThemeOptionDefault('albums_per_row', 4);
		setThemeOptionDefault('albums_per_page', 12);
		setThemeOptionDefault('images_per_row', 5);
		setThemeOptionDefault('images_per_page', 20);
		setThemeOptionDefault('thumb_size', 240);
		setThemeOptionDefault('thumb_crop', 0);
		setThemeOptionDefault('thumb_crop_width', 240);
		setThemeOptionDefault('thumb_crop_height', 240);
		setThemeOptionDefault('image_size', 800);
		setThemeOptionDefault('image_use_side', 'longest');
		setThemeOptionDefault('custom_index_page', 'gallery');
		
		setOptionDefault('gmap_width', '100%');
		setOptionDefault('htmlmeta_name-title', 0);
		setOptionDefault('htmlmeta_name-description', 0);
		setOptionDefault('htmlmeta_canonical-url', 0);
		setOptionDefault('htmlmeta_opengraph', 0);
		setOptionDefault('htmlmeta_twittercard', 0);
		
		setThemeOptionDefault('display_lightbox', false);
		setThemeOptionDefault('Dropdown_albums', true);
		setThemeOptionDefault('Dropdown_news', true);
		setThemeOptionDefault('Dropdown_pages', true);
		setThemeOptionDefault('menu_text_gallery', 'Gallery');
		setThemeOptionDefault('menu_text_news', 'News');
		setThemeOptionDefault('zenphoto_logo', '');
		setThemeOptionDefault('zenphoto_tagline', false);
		setThemeOptionDefault('extended_homepage_message', false);
		setThemeOptionDefault('carousel_number', '5');
		setThemeOptionDefault('homepage_content_albums_desc_show', true);
		setThemeOptionDefault('homepage_content_albums_desc_length', 250);
		setThemeOptionDefault('news_number', '4');
		setThemeOptionDefault('homepage_news_length', 250);
		setThemeOptionDefault('Allow_search', true);
		setThemeOptionDefault('display_archive-main', true);
		setThemeOptionDefault('display_archive-footer', true);
		setThemeOptionDefault('display_archive-sidebar', true);
		setThemeOptionDefault('display_caption', 'below');
		setThemeOptionDefault('display_albums-sidebar-gallery', true);
		setThemeOptionDefault('display_albums-sidebar-depth', '2');
		setThemeOptionDefault('display_news-sidebar-news', true);
		setThemeOptionDefault('display_news-sidebar-depth', '2');
		setThemeOptionDefault('display_pages-sidebar-pages', true);
		setThemeOptionDefault('display_pages-sidebar-depth', '2');
		setThemeOptionDefault('display_tags-sidebar', true);
		setThemeOptionDefault('tags-seo-nofollow', false);
		setThemeOptionDefault('display_tags-maxfontsize', 2);
		setThemeOptionDefault('display_tags-minfontsize', 0.8);
		setThemeOptionDefault('display_tags-maxcount', 50);
		setThemeOptionDefault('display_tags-mincount', 1);
		setThemeOptionDefault('display_footer_menu-sitemap', true);
		setThemeOptionDefault('display_rss_links', true);
		
		if (class_exists('cacheManager')) {
			$me = basename(dirname(__FILE__));
			cacheManager::deleteCacheSizes($me);
			cacheManager::addCacheSize($me, getThemeOption('image_size'), NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL);
			cacheManager::addCacheSize($me, getThemeOption('thumb_size'), NULL, NULL, getThemeOption('thumb_crop_width'), getThemeOption('thumb_crop_height'), NULL, NULL, true, NULL, NULL, NULL);
		}		
	}

	function getOptionsSupported() {

		global $_zp_gallery;
		$albumlist = array();
		$albumlist['Entire Gallery'] = '';
		$albums = getNestedAlbumList(null, 9999999, false);
		foreach($albums as $album) {
			$albumobj = AlbumBase::newAlbum($album['name'], true);
			$albumlist[$album['name']] = $album['name'];
		}

		return array(
			
			/* Set of OPTIONS for the whole site */
			
			array('key' => 'paradigm_site_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 1,
				'desc' => gettext('<h2>Site options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
          gettext('Fluid layout') => array('key' => 'full_width', 'type' => OPTION_TYPE_CHECKBOX,
            'order' => 2, 
            'desc' => gettext('Check to enable fluid full width layout.')),
					gettext('Preview in Lightbox') => array('key' => 'display_lightbox', 'type' => OPTION_TYPE_CHECKBOX,
							'order' => 3,
							'desc' => gettext('Use Lightbox preview for images throughoot the site .')),
			/* Set of OPTIONS for the site HEADER */
			
			array('key' => 'paradigm_header_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 10,
				'desc' => gettext('<h2>Site Header options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Header logo') => array('key' => 'zenphoto_logo', 'type' => OPTION_TYPE_CUSTOM, 
						'order' => 11, 
						'desc' => sprintf(gettext('Select a logo (files in the <em>%s</em> folder) or select to use a text logo of your gallery name. You can use FTP to upload your logo file and then select it here.'),UPLOAD_FOLDER)),
					gettext('Header tagline') => array('key' => 'zenphoto_tagline', 'type' => OPTION_TYPE_CHECKBOX, 
						'order' => 12, 
						'desc' => gettext('Check to display Gallery description in header alongside Gallery Title.')),
					gettext('Allow search')=> array('key' => 'Allow_search', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 13,
						'desc' => gettext('Check to enable search form.')),
						
			/* Set of OPTIONS for the site NAVIGATION */
			
			array('key' => 'paradigm_navigation_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 20,
				'desc' => gettext('<h2>Main navigation options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Show Dropdown menus') => array(
						'key' => 'dropdown_menu',
						'type' => OPTION_TYPE_CHECKBOX_UL,
						'order' => 21,
						'checkboxes' => array(
							gettext('Albums') => 'dropdown_menu_albums',
							gettext('News Categories') => 'dropdown_menu_news',
							gettext('Pages') => 'dropdown_menu_pages'),
						'desc' => gettext('Choose what Dropdown menus to display in Main Menu')),
					gettext('Menu text for Gallery') => array('key' => 'menu_text_gallery', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 22,
						'desc' => gettext('Option to rename the title of main GALLERY page, to anything that suits your site, Albums for example.  Note this does not change the url from "page/gallery", it changes the title used in various places on website only. Default is Gallery.')),
					gettext('Menu text for News') => array('key' => 'menu_text_news', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 23,
						'desc' => gettext('Option to rename the title of main NEWS page, to anything that suits your site, Blog for example.  Note this does not change the url from "news", it changes the title used in various places on website only. Default is News.')),
			
			/* Set of OPTIONS for the site HOMEPAGE */
			
			array('key' => 'paradigm_homepage_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 30,
				'desc' => gettext('<h2>Homepage options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Homepage Message') => array(
								'key' => 'extended_homepage_message',
								'type' => OPTION_TYPE_TEXTAREA,
								'texteditor' => 1,
								'multilingual' => 0,
								'order' => 31,
								'desc' => gettext('Extended message for your homepage, different from Gallery Description. HTML can be used.')),
			
			/*--------------------- HOMEPAGE Slideshow*/
			
					gettext('Homepage slideshow') => array('key' => 'homepage_slideshow', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 32,
						'desc' => gettext('Check to include a slideshow on the homepage.')),
					gettext('Slideshow Type') => array('key' => 'carousel_type', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 33, 
						'selections' => array(
							gettext('Random') => 'random', 
							gettext('Popular') => 'popular', 
							gettext('Latest by ID') => 'latestbyid', 
							gettext('Latest by Date') => 'latestbydate', 
							gettext('Latest by mtime') => 'latestbymtime', 
							gettext('Latest by Publish Date') => 'latestbypdate', 
							gettext('Most Rated') => 'mostrated', 
							gettext('Top Rated') => 'toprated'), 
						'desc' => gettext('Select how the pictures will be chosen for the homepage slideshow.')),
					gettext('Album to choose from') => array('key' => 'carousel_album', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 34, 
						'selections' => $albumlist, 
						'desc' => gettext('Choose a specific album to display its pictures.Album needs to be published, Dynamic albums work too.<br>Images should be preferably in panoramic format (or you can adjust styling via custom CSS).')),
					gettext('Number of slides') => array('key' => 'carousel_number', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 35, 
						'selections' => array(
							gettext('3') => '3', 
							gettext('4') => '4', 
							gettext('5') => '5', 
							gettext('6') => '6', 
							gettext('7') => '7', 
							gettext('8') => '8', 
							gettext('9') => '9', 
							gettext('10') => '10'), 
						'desc' => gettext('Select how the pictures will be chosen for the homepage slideshow. Default is 5')),
			
			/*---------------------  HOMEPAGE Blog*/
			
					gettext('Homepage blog') => array('key' => 'homepage_blog', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 36, 
						'desc' => gettext('Check to enable blog posts as main content of the homepage.')),
					gettext('Number of news items to show on homepage') => array('key' => 'news_number', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 37, 
						'selections' => array(
							gettext('2') => '2', 
							gettext('4') => '4', 
							gettext('6') => '6', 
							gettext('8') => '8', 
							gettext('10') => '10', 
							gettext('12') => '12', 
							gettext('14') => '14'), 
						'desc' => gettext('Select how many news items will be shown on the homepage. Default is 4')),	
					gettext('Number characters for homepage news items to show') => array('key' => 'homepage_news_length', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 38, 
						'desc' => gettext('Select default length for homepage news items. Default is 250 characters.')),
			
			/*---------------------  HOMEPAGE Content*/
			
					gettext('Homepage content') => array(
						'key' => 'homepage_content',
						'type' => OPTION_TYPE_CHECKBOX_UL,
						'order' => 39,
						'checkboxes' => array(
							gettext('Albums') => 'homepage_content_albums',
							gettext('Recently uploaded images') => 'homepage_content_uploads',
							gettext('Recently taken images') => 'homepage_content_recent',
							gettext('Most popular images') => 'homepage_content_popular',
							gettext('Top rated images') => 'homepage_content_rated',
							gettext('Random images') => 'homepage_content_random'),
						'desc' => gettext('Choose what to display on the homepage. Multi-choice.')),
					gettext('Descriptions for homepage albums') => array('key' => 'homepage_content_albums_desc_show', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 40, 
						'desc' => gettext('Select to show description for homepage albums. If Album Custom Data is present - it is shown in full, if it is not available, Album Description is used.')),
					gettext('Length of homepage albums descriptions') => array('key' => 'homepage_content_albums_desc_length', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 41, 
						'desc' => gettext('Select default length for homepage album descriptions. Default is 250 characters.')),
					gettext('Number of images') => array('key' => 'homepage_content_number', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 42, 
						'selections' => array(
							gettext('4') => '4', 
							gettext('8') => '8', 
							gettext('12') => '12', 
							gettext('16') => '16',
							gettext('20') => '20',
							gettext('24') => '24'), 
						'desc' => gettext('Select how the pictures will be chosen for the homepage display of images. Default is 12.')),
						
			/* Set of OPTIONS for the site ALBUM PAGES */
			
			array('key' => 'paradigm_album_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 60,
				'desc' => gettext('<h2>Album Page options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
		array('key' => 'paradigm_album_notice',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 61,
				'desc' => gettext('No additional Album Page options yet.')),
						
			/* Set of OPTIONS for the site IMAGE PAGES */
			
			array('key' => 'paradigm_image_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 70,
				'desc' => gettext('<h2>Image Page options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
						
					gettext('Image caption display') => array('key' => 'display_caption', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 71,
						'selections' => array(
							gettext('Above image') => 'above', 
							gettext('Below image') => 'below'), 
						'desc' => gettext('Display Image Caption data above Image on image pages. Default is Below image.')),		
			
			/* Set of OPTIONS for the site ARCHIVE */
			
			array('key' => 'paradigm_archive_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 80,
				'desc' => gettext('<h2>Archive options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
			gettext('Display Archive in menu') => array(
						'key' => 'display_archive-menus',
						'type' => OPTION_TYPE_CHECKBOX_ARRAY,
						'order' => 81,
						'checkboxes' => array(
								gettext('Main menu') => 'display_archive-main', 
								gettext('Footer') => 'display_archive-footer'
						),
						'desc' => gettext('Display where links to Archive will be displayed. Multi-choice.')),
			gettext('Sidebar in archive') => array('key' => 'display_archive-sidebar', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 82,
						'desc' => gettext('Display Sidebar on Archive page.')),
			
			/* Set of OPTIONS for the site SIDEBAR */
			
			array('key' => 'paradigm_sidebar_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 90,
				'desc' => gettext('<h2>Sidebar options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Display Albums menu in Sidebar') => array(
						'key' => 'display_albums-sidebar',
						'type' => OPTION_TYPE_CHECKBOX_ARRAY,
						'order' => 91,
						'checkboxes' => array(
								gettext('Gallery') => 'display_albums-sidebar-gallery', 
								gettext('News') => 'display_albums-sidebar-news',
								gettext('Pages') => 'display_albums-sidebar-pages',
								gettext('Archive') => 'display_albums-sidebar-archive'
						),
						'desc' => gettext('Choose when to display Albums menu in Sidebar. Multi-choice.')),
			gettext('Nested lists of Album menu to display:') => array('key' => 'display_albums-sidebar-depth', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 92, 
						'selections' => array(
							gettext('Top-level only') => '0',
							gettext('Depth of 2') => '2', 
							gettext('Depth of 3') => '3', 
							gettext('Depth of 4') => '4', 
							gettext('All levels') => 'true'), 
						'desc' => gettext('Select how many levels of nested lists of Album menu to display in Sidebar in Gallery. Default is "Depth of 2". "Top-level only" is also used for display of Albums menu in News, Pages and Archives.')),	
			
					gettext('Display News Categories menu in Sidebar') => array(
						'key' => 'display_news-sidebar',
						'type' => OPTION_TYPE_CHECKBOX_ARRAY,
						'order' => 93,
						'checkboxes' => array(
								gettext('Gallery') => 'display_news-sidebar-gallery', 
								gettext('News') => 'display_news-sidebar-news',
								gettext('Pages') => 'display_news-sidebar-pages',
								gettext('Archive') => 'display_news-sidebar-archive'
						),
						'desc' => gettext('Choose when to display News Categories menu in Sidebar. Multi-choice.')),
						gettext('Nested lists of News Categories menu to display:') => array('key' => 'display_news-sidebar-depth', 'type' => OPTION_TYPE_SELECTOR,
									'order' => 94, 
									'selections' => array(
										gettext('Top-level only') => '0', 
										gettext('Depth of 2') => '2', 
										gettext('Depth of 3') => '3', 
										gettext('Depth of 4') => '4', 
										gettext('All levels') => 'true'), 
									'desc' => gettext('Select how many levels of nested lists of News Categories menu to display in Sidebar in News, Gallery, Pages and Archives. Default is "Depth of 2".')),	
			
					gettext('Display Pages menu in Sidebar') => array(
						'key' => 'display_pages-sidebar',
						'type' => OPTION_TYPE_CHECKBOX_ARRAY,
						'order' => 95,
						'checkboxes' => array(
								gettext('Gallery') => 'display_pages-sidebar-gallery', 
								gettext('News') => 'display_pages-sidebar-news',
								gettext('Pages') => 'display_pages-sidebar-pages',
								gettext('Archive') => 'display_pages-sidebar-archive'
						),
						'desc' => gettext('Choose when to display Pages menu in Sidebar. Multi-choice.')),
						gettext('Nested lists of Pages menu to display:') => array('key' => 'display_pages-sidebar-depth', 'type' => OPTION_TYPE_SELECTOR,
						'order' => 96, 
						'selections' => array(
							gettext('Top-level only') => '0', 
							gettext('Depth of 2') => '2', 
							gettext('Depth of 3') => '3', 
							gettext('Depth of 4') => '4', 
							gettext('All levels') => 'true'), 
						'desc' => gettext('Select how many levels of nested lists of Pages menu to display in Sidebar in Pages, News, Gallery and Archives. Default is "Depth of 2".')),	
			gettext('Sidebar menu header for Pages') => array('key' => 'menu_text_pages', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 97,
						'desc' => gettext('Option to rename the title of Pages menu header in the Sidebar to anything that suits your site.  Default is Pages.')),
					gettext('Tags in sidebar') => array('key' => 'display_tags-sidebar', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 99,
						'desc' => gettext('Display Popular Tags in Sidebar.')),
			
			/* Set of OPTIONS for the site Copyright Info */
			
			array('key' => 'paradigm_copyright_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 100,
				'desc' => gettext('<h2>Options for Copyright notice on Image pages</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Copyright Notice') => array(
								'key' => 'extended_copyright_message',
								'type' => OPTION_TYPE_TEXTAREA,
								'texteditor' => 0,
								'multilingual' => 0,
								'order' => 101,
								'desc' => gettext('Extended copyright notice to display on Solo Image page and Credits page if enabled. HTML can be used. 
								If Empty - "Image copyright rightsholder" from Image Options is used instead.')),
			
			/* Set of OPTIONS for the site TAGS Display */
			
			array('key' => 'paradigm_tags_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 110,
				'desc' => gettext('<h2>Options for Popular Tags display</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Maximum font size for popular tags:') => array('key' => 'display_tags-maxfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 111,
						'desc' => gettext('Font-size to use for most common tags. Adjust based on your tags usage. Default is 2.')),
					gettext('Minimum font size for popular tags:') => array('key' => 'display_tags-minfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 112,
						'desc' => gettext('Font-size to use for less common tags. Adjust based on your tags usage. Default is 0,8em.')),
					gettext('Maximum font size for tags with count over:') => array('key' => 'display_tags-maxcount', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 113,
						'desc' => gettext('Tags with tag count over this number will be shown with maximum font-size. Adjust based on your tags usage. Default is 50.')),
					gettext('Minimal tag count to include:') => array('key' => 'display_tags-mincount', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 114,
						'desc' => gettext('Tags with tag count over this number will be included in Popular Tag list. Default is 1.')),
			
			/* Set of OPTIONS for the site FOOTER */
			
			array('key' => 'paradigm_footer_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 120,
				'desc' => gettext('<h2>Footer options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
		gettext('Main Footer menu') => array(
						'key' => 'display_footer_menu',
						'type' => OPTION_TYPE_CHECKBOX_UL,
						'order' => 121,
						'checkboxes' => array(
								gettext('Credits page') => 'display_footer_menu-credits', 
								gettext('Explore page') => 'display_footer_menu-explore',
								gettext('Sitemap page') => 'display_footer_menu-sitemap'),
						'desc' => gettext('<p>Choose what extra pages to display in main Footer menu. Multi-choice.</p>
						<p>Credits page - uses Copyright notice (see option for that above) to inform visitors about authorship and your copyright policy + gives credit to Zenphoto and author of this Theme.<br>
						Explore page - lists all tags, used throughout website.<br>
						Sitemap page - lists all News categories, Pages and Albums.</p>')),
			
				gettext('Display RSS Links') => array('key' => 'display_rss_links', 'type' => OPTION_TYPE_CHECKBOX,
							'order' => 124,
							'desc' => gettext('Display RSS Links in Footer.')),
					gettext('Display Social profiles') => array('key' => 'display_social_links', 'type' => OPTION_TYPE_CHECKBOX,
							'order' => 125,
							'desc' => gettext('Display Social Links in Footer as linked in Links & Services section below.')),
			
			/* Set of OPTIONS for the linked external SERVICES */
			
			array('key' => 'paradigm_external_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 130,
				'desc' => gettext('<h2>Links and Services</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			
					gettext('Google Analytics id') => array('key' => 'analytics_code', 'type' => OPTION_TYPE_CLEARTEXT,
						'order' => 131,
						'desc' => gettext('If you use Google Analytics, paste your ID here. Works with UA and GA4 properties. Use according to your local laws.')),
					gettext('ShareThis id') => array('key' => 'sharethis_id', 'type' => OPTION_TYPE_TEXTBOX,
						'order' => 132,
						'desc' => gettext('Provide your ShareThis ID')),
					gettext('URL to Facebook') => array('key' => 'facebook_url', 'type' => OPTION_TYPE_TEXTBOX,
						'order' => 133,
						'desc' => gettext('Provide your Facebook page or profile URL')),
					gettext('Twitter profile name') => array('key' => 'twitter_profile', 'type' => OPTION_TYPE_TEXTBOX,
						'order' => 134,
						'desc' => gettext('Provide your Twitter profile name (without the @)')),
					gettext('URL to FlickR') => array('key' => 'flickr_url', 'type' => OPTION_TYPE_TEXTBOX, 
						'order' => 135,
						'desc' => gettext('Provide your FlickR gallery URL')),
					gettext('URL to 500px')	=> array('key' => '500px_url', 'type' => OPTION_TYPE_TEXTBOX, 
						'order' => 136,
						'desc' => gettext('Provide your 500px gallery URL')),	
					gettext('URL to Instagram')	=> array('key' => 'instagram_url', 'type' => OPTION_TYPE_TEXTBOX, 
						'order' => 137,
						'desc' => gettext('Provide your Instagram')),											
					gettext('URL to Pinterest')	=> array('key' => 'pinterest_url', 'type' => OPTION_TYPE_TEXTBOX, 
						'order' => 138,
						'desc' => gettext('Provide your Pinterest board or page')),											
					gettext('URL to Deviantart') => array('key' => 'deviantart_url', 'type' => OPTION_TYPE_TEXTBOX,
						'order' => 139,
						'desc' => gettext('Provide your Deviantart page')),
					gettext('URL to Tumblr') => array('key' => 'tumblr_url', 'type' => OPTION_TYPE_TEXTBOX, 
						'order' => 140,
						'desc' => gettext('Provide your Tumblr page URL')),
			
			/* Set of OPTIONS for the site METADATA */
			
			array('key' => 'paradigm_meta_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 160,
				'desc' => gettext('<h2>Metadata options</h2><hr />')),
			/*------------------------------------------------------------------------------*/
			gettext('Add Nofollow to Tags links') => array('key' => 'tags-seo-nofollow', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 161,
						'desc' => gettext('Adds rel="nofollow" to Tag links everywhere so they are not scanned by Search Engines.')),
			gettext('Remove Tags Pages from Index by search engines') => array('key' => 'meta-tags-noindex', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 162,
						'desc' => gettext('Adds "noindex, follow" to Tags pages so they are removed from Search Engines Index.')),
			gettext('Remove Archive Pages from Index by search engines') => array('key' => 'meta-archive-noindex', 'type' => OPTION_TYPE_CHECKBOX,
						'order' => 163,
						'desc' => gettext('Adds "noindex, follow" to Archive pages so they are removed from Search Engines Index.')),
		);	
	}
	function getOptionsDisabled() {
		return array('custom_index_page', 'paradigm_zp_index_news','paradigm_homepage');
	}
	function handleOption($option, $currentValue) {
		if($option == "zenphoto_logo") { ?>
			<select id="zenphoto_logo" name="zenphoto_logo">
				<option value="" style="background-color:LightGray"><?php echo gettext('*Use Gallery Name Text'); ?></option>';
				<?php zp_apply_filter('theme_head');
				generateListFromFiles($currentValue, SERVERPATH.'/'.UPLOAD_FOLDER,'');
				?>
			</select>
		<?php }			
	}
}
?>