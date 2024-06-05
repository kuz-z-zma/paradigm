<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
die();
if (class_exists('Zenpage')) {
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row" itemscope itemtype="https://schema.org/WebPage">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12">

<h1 itemprop="name"><?php printPageTitle(); ?></h1>

<div id="page-content" class="content" itemprop="text">
<?php if (function_exists('printFeaturedImageThumb') && getOption('paradigm_page-feat-image')) { ?>
<?php if (getOption('paradigm_page-feat-image-size') == 'thumb_size') { printFeaturedImageThumb(null,'feat-image',null,null,null); } ?>
<?php if (getOption('paradigm_page-feat-image-size') == 'image_size') { printSizedFeaturedImage(null,null,getOption('image_size'),null,null,null,null,null,null,'zenpage_fullimage',null,true,null); } ?>
<?php } ?>

<?php printPageContent(); ?>
</div>

<?php if (getPageExtraContent()!='') { ?>
<!-- Extra content -->
<div id="page-extra-content" class="content">
<?php printPageExtraContent(); ?>
</div>
<?php } ?>

<div id="page-details" class="row">
<div id="page-info" class="col-sm-12">
<h2><i class="glyphicon glyphicon-info-sign"></i><?php echo gettext_th('Page Info'); ?></h2>
<?php if ((getPageCustomData()!='') && getOption('paradigm_page-custom')) { ?>
<!-- Custom data -->
<?php printPageCustomData(); ?>
<?php } ?>

<?php if (getCodeBlock(1,$_zp_current_zenpage_page)!='') { ?>
<!-- Page Codeblock 1 -->
<div class="codeblock-data block">
<?php printCodeBlock(1,$_zp_current_zenpage_page); ?>
</div>
<?php } ?>
</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (getTags()) { ?>
<!-- Tags -->
<div id="tags" class="block">
<h3><i class="glyphicon glyphicon-tag"></i><?php echo gettext_th('Tags'); ?></h3>
<?php printTags_pd('links', '', 'taglist', ', ',getOption('paradigm_tags-nofollow')); ?>
</div>
<?php } ?>

<?php if (function_exists('getHitCounter') && getOption('paradigm_page-hitcounter')) { ?>
<!-- Hitcounter -->
<div id="hitcounter" class="block"><h3><i class="glyphicon glyphicon-eye-open"></i><?php echo gettext_th('Other info'); ?></h3>
<p><strong><?php echo gettext_th('Views:'); ?></strong> <?php echo gethitcounter(); ?></p>
</div>
<?php } ?>
</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (extensionEnabled('rating') && getOption('paradigm_page-rating')) { ?>
<!-- Rating -->
<div id="rating" class="block"><h3><i class="glyphicon glyphicon-star"></i><?php echo gettext_th('Rating'); ?></h3>
<?php printRating(); ?>
</div>
<?php } ?>

<?php if (getCodeBlock(2,$_zp_current_zenpage_page)!='') { ?>
<!-- Page Codeblock 2 -->
<div class="codeblock-data block">
<?php printCodeBlock(2,$_zp_current_zenpage_page); ?>
</div>
<?php } ?>
</div>

<?php if (getCodeBlock(3,$_zp_current_zenpage_page)!='') { ?>
<div id="page-extras" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-6 col-lg-4 '; } ?>col-sm-12">
<!-- Page Codeblock 3 -->
<?php printCodeBlock(3,$_zp_current_zenpage_page); ?>
</div>
<?php } ?>

<?php if (function_exists('printRelatedItems') && getOption('paradigm_page-related-enable')) { ?>
<div id="page-related" class="col-sm-12">
<?php printRelatedItems_pd(getOption('paradigm_page-related-number'),getOption('paradigm_page-related-type'),NULL,getOption('paradigm_page-related-length'),getOption('paradigm_page-related-thumb'),getOption('paradigm_page-related-date')); ?>
</div>
<?php } ?>

</div>

<!-- Comments -->
<?php printCommentForm(); ?>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>

<?php } else { include(SERVERPATH . '/' . ZENFOLDER . '/404.php'); } ?>