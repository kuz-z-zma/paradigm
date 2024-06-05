<div id="breadcrumbs" class="row">
<div class="col-sm-12">
<ul class="breadcrumb" itemscope itemtype="https://schema.org/Breadcrumb">
<?php if ($_zp_gallery_page == 'index.php') { ?><?php } ?>
<?php if ($_zp_gallery_page == 'gallery.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php if (getOption('paradigm_nav_text-gallery')!='') {echo getOption('paradigm_nav_text-gallery');} else { echo gettext_th('Gallery');} ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'album.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php if (getOption('paradigm_nav_text-gallery')!='') { printCustomPageURL(getOption('paradigm_nav_text-gallery'), 'gallery'); } else { printCustomPageURL(gettext_th('Gallery'), 'gallery'); } ?></li><?php printParentBreadcrumb_pd(); ?><li class="active"><?php printAlbumTitle(); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'image.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php if (getOption('paradigm_nav_text-gallery')!='') { printCustomPageURL(getOption('paradigm_nav_text-gallery'), 'gallery'); } else { printCustomPageURL(gettext_th('Gallery'), 'gallery'); } ?></li><?php printParentBreadcrumb_pd(); ?><?php printAlbumBreadcrumb_pd();?><li class="active"><?php printImageTitle(); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'archive.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th("Archive View"); ?></li><?php } ?>
<?php if ($_zp_gallery_page == '404.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th("Not found"); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'contact.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th('Contact us') ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'favorites.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<?php printParentBreadcrumb_pd(); ?><li class="active"><?php printAlbumTitle(); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'news.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php if (getOption('paradigm_nav_text-news')!='') {printNewsIndexURL(getOption('paradigm_nav_text-news'),''); } else { printNewsIndexURL(gettext_th('News'),''); } ?></li>
<?php printZenpageItemsBreadcrumb_pd();	printCurrentNewsCategory_pd(); ?>
<?php if (is_NewsArticle()) { ?><li class="active"><?php printNewsTitle();	printCurrentNewsArchive(); ?></li><?php } ?>
<?php } ?>
<?php if ($_zp_gallery_page == 'pages.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<?php printZenpageItemsBreadcrumb_pd("", ""); ?>
<li class="active"><?php printPageTitle(); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'credits.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th('Credits'); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'explore.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th('Explore'); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'sitemap.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li class="active"><?php echo gettext_th('Sitemap'); ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'password.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php echo gettext_th("Login"); ?></li><?php } ?>		
<?php if ($_zp_gallery_page == 'register.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php echo gettext_th('User Registration') ?></li><?php } ?>
<?php if ($_zp_gallery_page == 'search.php') { ?>
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php echo gettext_th('Index'); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php echo html_encode($searchwords); ?></li> <?php } ?>
</ul>
</div>

<?php if (getOption('sharethis_id')!='') { ?>
<!-- ShareThis -->
<div class="col-sm-3" id="sharing">
<span class='st_facebook'></span>
<span class='st_twitter'></span>
<span class='st_pinterest'></span>
<span class='st_email'></span>
</div>
<?php } ?>
</div>