<?php if (getOption('paradigm_homepage-slideshow'))	{ ?>	
<div id="background-slideshow" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<div id="paradigm-carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php $images = getImageStatistic(getOption('paradigm_homepage-slideshow-number'),getOption('paradigm_homepage-slideshow-type'),getOption('paradigm_homepage-slideshow-album'),true);
$firstpict =array_shift($images);
echo '<div class="item active" style="background-image:url('.html_encode(pathurlencode($firstpict->getCustomImage(null,null,null,null,null,null,null,true))).')">';
echo '<div class="carousel-caption">';
echo '<p>' . $firstpict->getTitle() .'</p>';
echo '</div>';
echo '</div>';

foreach ($images as $image) {
echo '<div class="item" style="background-image:url('.html_encode(pathurlencode($image->getCustomImage(null,null,null,null,null,null,null,true))).')">';
echo '<div class="carousel-caption">';
echo '<p>' . $image->getTitle() .'</p>';
echo '</div>';
echo '</div>';
} ?>
</div><!-- Controls -->
<a class="left carousel-control" href="#paradigm-carousel" role="button" data-slide="prev"><span class="sr-only">Previous</span></a>
<a class="right carousel-control" href="#paradigm-carousel" role="button" data-slide="next"><span class="sr-only">Next</span></a>
</div>
</div>
</div>	
<?php } ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<?php if ((getOption('paradigm_logo') != '')||(getOption('paradigm_tagline') == 'homepage')||(getOption('paradigm_homepage-message') != '')) { ?>
<div class="home-extended-message col-sm-12">
<?php if (getOption('paradigm_logo') != '') { ?>
<h1><?php printGalleryTitle(); ?></h1> 
<?php } ?>

<?php if (getOption('paradigm_tagline') == 'homepage') { ?>
<?php printGalleryDesc(); ?>
<?php } ?>

<?php if (getOption('paradigm_homepage-message') != '') { ?>
<?php echo getOption('paradigm_homepage-message'); ?>
<?php } ?>
</div>
<?php } ?>

<?php if (class_exists('Zenpage') && getNumNews(true) && (getOption('paradigm_homepage-blog'))) { ?>
<div class="col-sm-12">
<h2 class="homepage-blog-heading"><i class="glyphicon glyphicon-pencil"></i><?php if (getOption('paradigm_nav_text-news')!='') {echo getOption('paradigm_nav_text-news');} else { echo gettext('News'); } ?></h2>

<div id="blog-style-homepage">
<?php // news article loop
$cnt=0;
while (next_news() && $cnt<(getOption('paradigm_homepage-blog-number'))):; ?>
<div class="homepage-news-item col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
<h3><?php printNewsURL(); ?></h3>
<?php if (function_exists('getFeaturedImage')) $hasfeaturedimage = getFeaturedImage($_zp_current_zenpage_news); ?>
<?php if($hasfeaturedimage) {echo '<a href="' . getNewsURL() . '"><img src="' . pathurlencode($hasfeaturedimage->getThumb()) . '" alt="' . html_encode($hasfeaturedimage->getTitle()) . '" class="feat-image-home"></a>'; } ?>

<?php if (getNewsCustomData()!='') { ?>
<div class="excerpt"><?php printNewsCustomData(); ?></div>
<?php } else { ?>
<div class="excerpt"><?php echo printNewsContent(getOption('paradigm_homepage-blog-length')); ?></div>
<?php } ?>

</div>
<?php $cnt++; endwhile; ?>
</div>
</div>
<?php } ?>


<?php	if (getOption('paradigm_homepage-albums')) { ?>
<div id="albums-homepage" class="col-sm-12">
<h2><i class="glyphicon glyphicon-folder-close"></i><?php echo gettext("Albums"); ?></h2>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_albumlist.php'); ?>

<div class="pagelist">
<ul class="pagelist">
<li><?php printCustomPageURL(gettext('All albums'), 'gallery'); ?></li>
</ul>
</div>
</div>
<?php } ?>

<?php if (getOption('paradigm_homepage-image-uploads')||getOption('paradigm_homepage-image-recent')||getOption('paradigm_homepage-image-popular')||getOption('paradigm_homepage-image-rated')||getOption('paradigm_homepage-image-random')) { ?>
<div id="images-homepage" class="col-sm-12">

<?php if (getOption('paradigm_homepage-image-uploads')) { ?>
<h2><i class="glyphicon glyphicon-upload"></i><?php echo gettext("Latest uploads"); ?></h2>
<?php if (function_exists('getImageStatistic')) { ?>
<?php printImageStatistic_zb(getOption('paradigm_homepage-image-number'),"latest","",true,false,false,"",false,NULL,NULL,NULL,"", false); ?>
<?php } else { ?>
<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images.</div>
<?php }	?>
<?php } ?>

<?php if (getOption('paradigm_homepage-image-recent')) { ?>
<h2><i class="glyphicon glyphicon-time"></i><?php echo gettext("Recent images"); ?></h2>
<?php if (function_exists('getImageStatistic')) { ?>
<?php printImageStatistic_zb(getOption('paradigm_homepage-image-number'),"latest-date","",true,false,false,"",false,NULL,NULL,NULL,"", false); ?>
<?php } else { ?>
<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images.</div>
<?php }	?>
<?php } ?>

<?php if (getOption('paradigm_homepage-image-popular')) { ?>
<h2><i class="glyphicon glyphicon-fire"></i><?php echo gettext("Most popular"); ?></h2>
<?php if (function_exists('getImageStatistic')) { ?>
<?php printImageStatistic_zb(getOption('paradigm_homepage-image-number'),"popular","",true,false,false,"",false,NULL,NULL,NULL,"", false); ?>
<?php } else { ?>
<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images.</div>
<?php }	?>
<?php } ?>

<?php if (getOption('paradigm_homepage-image-rated')) { ?>
<h2><i class="glyphicon glyphicon-star"></i><?php echo gettext("Top rated"); ?></h2>
<?php if (function_exists('getImageStatistic')) { ?>
<?php printImageStatistic_zb(getOption('paradigm_homepage-image-number'),"toprated","",true, false, false,"",false,NULL,NULL,NULL,"", false); ?>
<?php } else { ?>
<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images.</div>
<?php }	?>
<?php } ?>

<?php if (getOption('paradigm_homepage-image-random')) { ?>
<h2><i class="glyphicon glyphicon-random"></i><?php echo gettext("Random images"); ?></h2>					
<?php if (function_exists('getImageStatistic')) { ?>
<?php printImageStatistic_zb(getOption('paradigm_homepage-image-number'),"random","", true, false, false,"",false,NULL,NULL,NULL,"", false); ?>
<?php } else { ?>
<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images.</div>
<?php }	?>
<?php } ?>

</div>
<?php } ?>

</div>
</div>
