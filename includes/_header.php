<body>
<?php zp_apply_filter('theme_body_open'); ?>
<!-- page header -->	

<header id="background-header" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; }?>">
<!-- main navigation -->
<nav id="nav-global" class="navbar navbar-default css-dropdown">
<div>
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<div class="logo-header">
<?php if (getOption('paradigm_logo') != '') { ?>
<a id="logo" href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php printGalleryTitle(); ?>"><img src="<?php echo pathurlencode(WEBPATH.'/'.UPLOAD_FOLDER.'/'.getOption('paradigm_logo')); ?>" alt="<?php printGalleryTitle(); ?>" /></a>
<?php } elseif (getGalleryTitle() != '') { ?>
<h1 id="logo-text"><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="<?php printGalleryTitle(); ?>"><?php printGalleryTitle(); ?></a></h1>
<?php } else { ?>
<h1 id="logo-text"><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>" title="Add Title">Add GalleryTitle in Options->Gallery!</a></h1>
<?php } ?>

<?php if (getOption('paradigm_tagline') == 'header') { ?>
<div class="tagline"><?php printGalleryDesc(); ?></div>
<?php } ?>

</div>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<!-- Gallery -->
<li class="first level1 dropdown <?php if ($_zp_gallery_page == 'image.php' || $_zp_gallery_page == 'gallery.php' || $_zp_gallery_page == 'album.php') {echo 'active';} ?>">
<?php if (getOption('paradigm_nav_text-gallery')!='') { ?>
<?php printCustomPageURL(getOption('paradigm_nav_text-gallery'),'gallery'); ?>
<?php }	else { printCustomPageURL(gettext('Gallery'),'gallery'); } ?>

<?php if(function_exists("printAlbumMenu") && (getOption('paradigm_nav_menu-albums'))) { ?>
<!-- Albums Dropdown-->
<?php printAlbumMenuList('list-top',false,'dropdown_menu_albums','active','submenu','active','',true,false,false,true,0); } ?>
</li>

<?php if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) { ?>
<!-- News -->
<li class="level1 dropdown<?php if ($_zp_gallery_page == 'news.php') {echo 'active';} ?>">
<?php if (getOption('paradigm_nav_text-news')!='') { ?>
<a href="<?php echo getNewsIndexURL(); ?>"><?php echo getOption('paradigm_nav_text-news'); ?></a>
<?php }	else { ?>
<a href=" <?php echo getNewsIndexURL(); ?>"><?php echo gettext('News'); ?></a><?php }	?>

<?php if (getOption('paradigm_nav_menu-news')) { ?>
<!-- News Dropdown-->
<?php printAllNewsCategories('',false,'dropdown_menu_news','active',true,'submenu','active','list-top',false,0); ?><?php } ?>
</li>
<?php } ?>

<?php if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { ?>
<?php if (getOption('paradigm_nav_menu-pages')) { ?>
<!-- Pages Dropdown-->
<?php printPageMenu('list','dropdown_menu_pages','active','submenu','active','',2,false,0); ?>
<?php } else { printPageMenu('list-top','','active','submenu','active','',0,false); } ?>
<?php } ?>

<?php if (getOption('paradigm_nav_menu-archive')) { ?>
<!-- Archive-->
<li class="level1<?php if ($_zp_gallery_page == 'archive.php') {echo 'active';} ?>"><?php printCustomPageURL(gettext('Archive'), 'archive'); ?></li>
<?php } ?>

<?php if (extensionEnabled('contact_form')) { ?>
<!-- Contact page -->
<li class="level1<?php if ($_zp_gallery_page == 'contact.php') {echo 'active';} ?>"><?php printCustomPageURL(gettext('Contact'), 'contact'); ?></li>
<?php } ?>
</ul>

<?php if (getOption('paradigm_search')) { ?>
<?php printSearchForm('','navbar_search',$_zp_themeroot.'/img/magnifying_glass_16x16.png',gettext('Search'),$_zp_themeroot.'/img/list_12x11.png'); ?>
<?php } ?>

</div><!-- /.navbar-collapse -->
</div>
</nav>
</div><!-- /.container-fluid -->
</header>
