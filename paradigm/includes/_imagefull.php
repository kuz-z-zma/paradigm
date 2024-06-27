<?php if (getNumImages() > 0) { ?>
<div id="images" class="row">
<?php while (next_image()): ?>
<div class="content">
<h2 class="media-heading col-xs-12" itemprop="name"><?php printBareImageTitle(); ?></h2>
<div class="col-xs-12" itemscope itemtype="https://schema.org/ImageObject">

<?php if ((getImageDesc() != '') && (getOption('paradigm_image-caption') == 'above')) { ?>
<div class="image-caption col-sm-12" itemprop="caption">
<?php printImageDesc(); ?>
</div>
<?php } ?>

<div class="full-image text-center">
<?php if ($_zp_current_image->isPhoto()) {
$fullimage = getFullImageURL(); } else { $fullimage = NULL; }
if (!empty($fullimage)) { ?>
<?php } ?>
<?php if ($_zp_current_image->isPhoto()) { ?>
<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
<?php echo '<img src="'. getFullImageURL() . '" alt="'. getImageTitle() . '" class="full-image">'; ?>
</a>
<?php } else { printDefaultSizedImage(getImageTitle()); }
if (!empty($fullimage)) { ?>
<?php } ?>
</div>

<?php if ((getImageDesc() != '') && (getOption('paradigm_image-caption') == 'below')) { ?>
<div class="image-caption col-sm-12" itemprop="caption">
<?php printImageDesc(); ?>
</div>
<?php } ?>
</div>
</div>
<?php endwhile; ?>
</div>
<?php } ?>
