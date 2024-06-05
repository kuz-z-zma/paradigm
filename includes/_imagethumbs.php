<?php if (getNumImages() > 0) { ?>
<div id="images" class="row">
<?php if (($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'search.php')) { ?>
<h3 class="media-heading col-xs-12"><i class="glyphicon glyphicon-picture"></i><?php echo gettext_th('Images:'); ?></h3>
<?php } else { ?>
<h2 class="media-heading col-xs-12"><i class="glyphicon glyphicon-picture"></i><?php echo gettext_th('Images:'); ?></h2>
<?php } ?>

<?php while (next_image()): ?>
<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-2 col-lg-3 '; } ?>col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/ImageObject">
<div class="thumbnail" itemprop="thumbnail">
<?php	if ($_zp_current_image->isPhoto() && getOption('paradigm_lightbox')) { ?>
<a href="<?php echo html_encode(getDefaultSizedImage()); ?>" rel="lightbox noopener nofollow" title="<?php printBareImageTitle(); ?>"><?php printImageThumb(getBareImageTitle()); ?></a>
<?php	} else { ?>
<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>"><?php printImageThumb(getBareImageTitle()); ?></a>
<?php	}	?>

<div class="caption">
<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>"><p itemprop="name"><?php printBareImageTitle(); ?></p></a>
</div>

<?php if (class_exists('favorites') && ($_zp_gallery_page == 'favorites.php')) { ?>
<div class="favorites fav-images"><?php printAddToFavorites($_zp_current_image, '', gettext_th('Remove')); ?></div>
<?php } ?>

</div>
</div>
<?php endwhile; ?>
</div>
<?php } ?>