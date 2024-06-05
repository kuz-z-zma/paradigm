<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
die();
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row" itemscope itemtype="https://schema.org/WebPage">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemscope itemtype="https://schema.org/ImageObject">

<!-- pagination -->
<ul class="pagination pull-right">
<?php if (hasPrevImage()) { ?>
<li><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext_th("Previous Image"); ?>"><?php echo gettext_th("« prev"); ?></a></li>
<?php } if (hasNextImage()) { ?>
<li><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext_th("Next Image"); ?>"><?php echo gettext_th("next »"); ?></a></li>
<?php } ?>
</ul>

<h1 itemprop="name"><?php printImageTitle(); ?></h1>

<?php if ((getImageDesc() != '') && (getOption('paradigm_image-caption') == 'above')) { ?>
<div id="image-caption" class="content" itemprop="caption">
<?php printImageDesc(); ?>
</div>
<?php } ?>

<!-- The Image -->
<div id="photo" class="row full-image text-center">

<?php if ($_zp_current_image->isPhoto()) {
$fullimage = getFullImageURL(); } else { $fullimage = NULL; }
if (!empty($fullimage)) { ?>
<?php } ?>
<?php if ($_zp_current_image->isPhoto()) {
echo '<img src="'. getFullImageURL() . '" alt="'. getImageTitle() . '" class="full-image">';
} else { printDefaultSizedImage(getImageTitle()); }
if (!empty($fullimage)) { ?>
<?php } ?>
</div>

<div id="image-details" class="row">
<?php if ((getImageDesc() != '') && (getOption('paradigm_image-caption') == 'below')) { ?>
<div id="image-caption" class="col-sm-12 content" itemprop="caption"><h2><i class="glyphicon glyphicon-pencil"></i><?php echo gettext_th('Caption'); ?></h2>
<?php printImageDesc(); ?>
</div>
<?php } ?>

<div id="image-info" class="col-sm-12">
<h2><i class="glyphicon glyphicon-info-sign"></i><?php echo gettext_th('Image Info'); ?></h2>
<?php if ((getImageCustomData()!='') && getOption('paradigm_image-custom')) { ?>
<!-- Custom data -->
<?php printImageCustomData(); ?>
<?php } ?>

<?php if (getCodeBlock(1,$_zp_current_image)!='') { ?>
<!-- Image Codeblock 1 -->
<div class="codeblock-data block">
<?php printCodeBlock(1,$_zp_current_image); ?>
</div>
<?php } ?>
</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<!-- Tags -->
<?php if (getTags()) { ?>
<div id="tags" class="block"><h3><i class="glyphicon glyphicon-tag"></i><?php echo gettext_th('Tags'); ?></h3>
<?php printTags_pd('links', '', 'taglist', ', ',getOption('paradigm_tags-nofollow')); ?>
</div>
<?php } ?>

<!-- Copyright -->
<?php if (getOption('paradigm_copyright_message') != '') { ?>
<div id="copyright" class="image-copy block" itemprop="copyrightHolder"><h3><i class="glyphicon glyphicon-copyright-mark"></i><?php echo gettext_th('Copyright'); ?></h3>
<?php echo getOption('paradigm_copyright_message'); ?>
</div>					
<?php } else { ?>
<?php (getImageData('copyright')!='') ?> 
<div id="copyright" class="image-copy block"><h3><i class="glyphicon glyphicon-copyright-mark"></i><?php echo gettext_th('Copyright'); ?></h3>
<p itemprop="copyrightHolder"><?php echo (getImageData('copyright')); ?></p>
</div>
<?php } ?>	

<?php if (getImageMetaData()) { ?>
<div id="image-metadata" class="block">
<h3><i class="glyphicon glyphicon glyphicon-camera"></i><?php echo gettext_th('Metadata'); ?></h3>
<?php printImageMetadata_pd(); ?>
</div>
<?php } ?>

</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (function_exists('getHitCounter')) { ?>
<!-- Hitcounter -->
<div id="hitcounter" class="block"><h3><i class="glyphicon glyphicon-eye-open"></i><?php echo gettext_th('Other info'); ?></h3>
<p><strong><?php echo gettext_th('Views:'); ?></strong> <?php echo gethitcounter(); ?></p>
<?php } ?>
</div>

<!-- Favorites -->	
<?php if (function_exists('printAddToFavorites')) { ?>
<div id="favorites" class="block"><h3><i class="glyphicon glyphicon-heart"></i><?php echo gettext_th('Favorites'); ?></h3>
<?php printAddToFavorites($_zp_current_image); ?></div>
<?php } ?>

<!-- Rating -->	
<?php if (extensionEnabled('rating')) { ?>
<div id="rating" class="block"><h3><i class="glyphicon glyphicon-star"></i><?php echo gettext_th('Rating'); ?></h3>
<?php printRating(); ?>
</div>
<?php } ?>

<?php if (getOption('paradigm_image-download')) { ?>
<div id="download" class="block"><h3><i class="glyphicon glyphicon-download"></i><?php echo gettext_th('Download'); ?></h3>	
<a class="button buttons" href="<?php echo html_encode(getFullImageURL()); ?>" title="Download Original">Original (<?php echo getFullWidth();echo ' x '; echo getFullHeight(); ?>)</a>
</div>
<?php } ?>

<?php if (function_exists('printImageMarkupFields') && (zp_loggedin() OR (getOption('imageMarkup_permission') == 'everyone'))) { ?>
<div id="codecopy" class="markup-copy-field block"><h3><i class="glyphicon glyphicon-paste"></i><?php echo gettext_th('Image code'); ?></h3>
<?php	printImageMarkupFields(gettext_th('Code')); ?>
</div>
<?php } ?>

<?php if (getCodeBlock(2,$_zp_current_image)!='') { ?>
<!-- Image Codeblock 2 -->
<div class="codeblock-data block">
<?php printCodeBlock(2,$_zp_current_image); ?>
</div>
<?php } ?>

</div>

<!-- Maps -->
<?php if (((getImageData('location')!='') || (getImageData('city')!='') || (getImageData('state')!='') || (getImageData('country')!=''))||(function_exists('printGoogleMap') && (getImageData('EXIFGPSLatitude')!=''))||(function_exists('printOpenStreetMap') && (getImageData('EXIFGPSLatitude')!=''))) { ?>
<div id="location" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-6 col-lg-4 '; } ?>col-sm-12">
<h3><i class="glyphicon glyphicon-map-marker"></i><?php echo gettext_th('Map'); ?></h3>

<?php if ((getImageData('location')!='') || (getImageData('city')!='') || (getImageData('state')!='') || (getImageData('country')!='')) { ?>
<?php if (getImageData('location')!='') { ?>
<p><strong>Location:</strong>&nbsp;<span itemprop="contentLocation">
<?php echo get_language_string(getImageData('location')); ?>
</span></p>
<?php } ?>
<?php if (getImageData('city')!='') { ?>
<p><strong><?php echo gettext_th('City:'); ?></strong>&nbsp;
<?php echo get_language_string(getImageData('city')); ?>
</p>
<?php } ?>
<?php if (getImageData('state')!='') { ?>
<p><strong><?php echo gettext_th('State:'); ?></strong>&nbsp;
<?php echo get_language_string(getImageData('state')); ?>
</p>
<?php } ?>
<?php if (getImageData('country')!='') { ?>
<p><strong><?php echo gettext_th('Country:'); ?></strong>&nbsp;
<?php echo get_language_string(getImageData('country')); ?>
</p>
<?php } ?>
<?php } ?>


<?php if (function_exists('printGoogleMap') && (getImageData('EXIFGPSLatitude')!='')) { ?>
<?php printGoogleMap("","","show"); ?>
<?php } ?>

<?php if (function_exists('printOpenStreetMap') && (getImageData('EXIFGPSLatitude')!='')) { ?>
<?php openStreetMap::printOpenStreetMap(); ?>			
<?php } ?>
</div>
<?php } ?>

<?php if (getCodeBlock(3,$_zp_current_image)!='') { ?>
<!-- Image Codeblock 3 -->
<div id="image-extras" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-6 col-lg-4 '; } ?>col-sm-12">
<?php printCodeBlock(3,$_zp_current_image);	?>
</div>
<?php	} ?>

<?php if (function_exists('printRelatedItems') && getOption('paradigm_image-related-enable')) { ?>
<div id="image-related" class="row col-sm-12">
<?php printRelatedItems_pd(getOption('paradigm_image-related-number'),getOption('paradigm_image-related-type'),NULL,getOption('paradigm_image-related-length'),getOption('paradigm_image-related-thumb'),getOption('paradigm_image-related-date')); ?>
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