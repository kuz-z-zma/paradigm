<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
die();
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid';} ?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row" itemscope itemtype="https://schema.org/ImageGallery">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">

<h1 itemprop="name"><i class="glyphicon glyphicon-folder-open"></i><?php printAlbumTitle(); ?></h1>

<div id="album-caption" class="content" itemprop="description"><?php printAlbumDesc(); ?></div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_albumlist.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_imagethumbs.php'); ?>

<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>

<div id="album-details" class="row">
<div id="album-info" class="col-sm-12">
<h2><i class="glyphicon glyphicon-info-sign"></i>Album Info</h2>
<?php if ((getAlbumCustomData()!='') && getOption('paradigm_album-custom')) { ?>
<!-- Custom data -->
<?php printAlbumCustomData(); ?>
<?php } ?>

<?php if (getCodeBlock(1,$_zp_current_album)!='') { ?>
<!-- Album Codeblock 2 -->
<div class="codeblock-data block">
<?php printcodeblock (1, $_zp_current_album); ?>
</div>
<?php } ?>
</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (getTags()) { ?>
<!-- Tags -->
<div id="tags" class="block">
<h3><i class="glyphicon glyphicon-tag"></i>Tags</h3>
<?php printTags_pd('links', '', 'taglist', ', ',getOption('paradigm_tags-nofollow')); ?>
</div>
<?php } ?>

<?php if (function_exists('getHitCounter'))  { ?>
<!-- Hitcounter -->
<div id="hitcounter" class="block"><h3><i class="glyphicon glyphicon-eye-open"></i>Other info</h3>
<p><strong>Views:</strong> <?php echo gethitcounter(); ?> views</p>
</div>
<?php } ?>

<!-- Copyright -->
<?php if (getOption('paradigm_copyright_message') != '') { ?>
<div id="copyright" class="image-copy block" itemprop="copyrightHolder"><h3><i class="glyphicon glyphicon-copyright-mark"></i>Copyright</h3>
<?php echo getOption('paradigm_copyright_message'); ?>
</div>
<?php } else { ?>
<?php (getImageData('copyright')!='') ?>
<div id="copyright" class="image-copy block"><h3><i class="glyphicon glyphicon-copyright-mark"></i>Copyright</h3>
<p itemprop="copyrightHolder"><?php echo get_language_string(getImageData('copyright')); ?></p>
</div>
<?php } ?>

</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (function_exists('printAddToFavorites') && ($_zp_gallery_page == 'album.php')) { ?>
<!-- Favorites -->
<div id="favorites" class="block"><h3><i class="glyphicon glyphicon-heart"></i>Favorites</h3>
<?php printAddToFavorites($_zp_current_album); ?>
</div>
<?php } ?>


<?php if (extensionEnabled('rating')) { ?>
<!-- Rating -->
<div id="rating" class="block"><h3><i class="glyphicon glyphicon-star"></i>Rating</h3>
<?php printRating(); ?>
</div>
<?php } ?>

<?php if (getCodeBlock(2,$_zp_current_album)!='') { ?>
<!-- Album Codeblock 2 -->
<div class="codeblock-data block">
<?php printcodeblock (2, $_zp_current_album); ?>
</div>
<?php } ?>
</div>

<!-- Maps -->
<?php if ((getAlbumLocation()!='')||function_exists('printGoogleMap')||function_exists('printOpenStreetMap')) { ?>
<div id="location" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-12">
<?php if (getAlbumLocation()!='') { ?>
<h3><i class="glyphicon glyphicon-map-marker"></i>Map</h3>
<p><strong>Location: </strong><span itemprop="contentLocation"><?php printAlbumLocation(); ?></span></p>
<?php } ?>

<?php if (function_exists('printGoogleMap')) { ?>
<?php printGoogleMap("","","show"); ?>
<?php } ?>

<?php if (function_exists('printOpenStreetMap')) { ?>
<?php openStreetMap::printOpenStreetMap(); ?>
<?php } ?>
</div>
<?php } ?>

<?php if (getCodeBlock(3,$_zp_current_album)!='') { ?>
<!-- Album Codeblock 3 -->
<div id="album-extras" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-12">
<?php printcodeblock (3, $_zp_current_album); ?>
</div>
<?php } ?>

<?php if (function_exists('printRelatedItems') && getOption('paradigm_album-related-enable')) { ?>
<div id="album-related" class="col-sm-12">
<?php printRelatedItems_pd(getOption('paradigm_album-related-number'),getOption('paradigm_album-related-type'),NULL,getOption('paradigm_album-related-length'),getOption('paradigm_album-related-thumb'),getOption('paradigm_album-related-date')); ?>
</div>
<?php	} ?>

</div>

<!-- Comments -->
<?php printCommentForm(); ?>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>