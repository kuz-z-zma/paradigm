<div id="albums" class="row">
<?php while (next_album()): ?>

<?php if ($_zp_gallery_page == 'index.php') { ?>
<div class="media <?php if (getOption('paradigm_full-width')) {echo 'col-xl-2 col-lg-3 '; } ?>col-md-4 col-sm-6 col-xs-12">
<h3 class="media-heading"><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext_th('View album:'); ?> <?php printBareAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
<?php } elseif ($_zp_gallery_page == 'search.php') { ?>
<div class="media <?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 '; } ?>col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h3 class="media-heading"><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext_th('View album: '); ?><?php printBareAlbumTitle(); ?>"><i class="glyphicon glyphicon-folder-close"></i><?php printAlbumTitle(); ?></a></h3>
<?php } else { ?>
<div class="media <?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 '; } ?>col-lg-6 col-md-6 col-sm-6 col-xs-12">
<?php if (class_exists('favorites') && ($_zp_gallery_page == 'favorites.php')) { ?><div class="favorites fav-albums"><?php printAddToFavorites($_zp_current_album, '', gettext_th('Remove')); ?></div><?php } ?>
<h2 class="media-heading"><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext_th('View album: '); ?><?php printBareAlbumTitle(); ?>"><i class="glyphicon glyphicon-folder-close"></i><?php printAlbumTitle(); ?></a></h2>
<?php } ?>

<div class="media-body">
<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext_th('View album: '); ?><?php printBareAlbumTitle(); ?>"><?php printAlbumThumbImage(getBareAlbumTitle(),"media-object"); ?></a>

<?php if (getOption('paradigm_homepage-albums-desc')) { ?>
<p><?php if (getAlbumCustomData()!='') { ?>
<?php printAlbumCustomData(); ?>
<?php } else { ?>
<?php echo shortenContent(strip_tags(preg_replace( "/\r|\n/","",(str_replace('</p>',' ',getAlbumDesc())))),getOption('paradigm_homepage-albums-desc-length'),'...'); } ?>
</p>
<?php } ?>

</div>
</div>
<?php endwhile; ?>
</div>
