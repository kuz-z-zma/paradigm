<aside id="sidebar" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-2 '; } ?>col-lg-3 col-md-3 col-sm-3 hidden-xs">

<?php if (getcodeblock(1, $_zp_gallery)!='') { ?>
<!-- Gallery Codeblock 1 -->
<?php printcodeblock (1, $_zp_gallery);	?>
<?php	} ?>  

<h2 class="sidebar-header">Navigation</h2>

<?php	if ((function_exists('printRegisterURL')||function_exists('printUserLogin_out')) && getOption('paradigm_sidebar-user-menu')) { ?>
<!-- User menu in Sidebar -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title">User menu</h3></div>
<div class="panel-body">
<ul id="nav-local-users">
<?php if (!zp_loggedin() && function_exists('printRegisterURL')){ ?><li><?php printRegisterURL(gettext('Register'), '', ''); ?></li><?php } ?>
<?php if (function_exists('printUserLogin_out')&& ($_zp_gallery_page !== 'register.php')){ ?><li><?php printUserLogin_out('',''); ?></li><?php } ?>
</ul>
</div>
</div>
<?php }	?>

<?php if (function_exists('printFavoritesURL')) { ?>
<!-- Favorites menu in Gallery -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title">Collections</h3></div>
<div class="panel-body">
<ul id="nav-local-favorites">
<?php printFavoritesURL(NULL, '<li>', '</li><li>', '</li>'); ?>
</ul>
</div>
</div>
<?php }	?>

<?php if(function_exists("printAlbumMenu") && getOption('paradigm_sidebar-albums-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php')||($_zp_gallery_page == 'password.php')||($_zp_gallery_page == 'register.php'))) { ?>
<!-- Album menu in Gallery -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title"><?php if (getOption('paradigm_nav_text-gallery')!='') {echo getOption('paradigm_nav_text-gallery');} else { echo gettext('Albums');} ?></h3></div>
<div class="panel-body">
<?php	printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", getOption('paradigm_sidebar-albums-depth'), false, false); ?>
</div>
</div>
<?php } ?>


<?php if (function_exists("printAllNewsCategories") && getNumNews(true)) { ?>
<?php if  ((getOption('paradigm_sidebar-news-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php')))||
(getOption('paradigm_sidebar-news-news') && ($_zp_gallery_page == 'news.php'))||
(getOption('paradigm_sidebar-news-pages') && ($_zp_gallery_page == 'pages.php'))||
(getOption('paradigm_sidebar-news-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php')))
) { ?>
<!-- News menus -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title"><?php if (getOption('paradigm_nav_text-news')!='') {echo getOption('paradigm_nav_text-news');} else { echo gettext('News');} ?></h3></div>
<div class="panel-body">
<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list", getOption('paradigm_sidebar-news-depth'),""); ?>						
</div>
</div>	
<?php } ?>
<?php } ?>

<?php if (function_exists("printPageMenu") && (getNumPages(true) > 0)) { ?>
<?php if ((getOption('paradigm_sidebar-pages-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php'))) ||
(getOption('paradigm_sidebar-pages-news') && ($_zp_gallery_page == 'news.php'))||
(getOption('paradigm_sidebar-pages-pages') && ($_zp_gallery_page == 'pages.php'))||
(getOption('paradigm_sidebar-pages-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php')))
) { ?>
<!-- Page menus -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title"><?php if (getOption('paradigm_nav_text-pages')!='') {echo getOption('paradigm_nav_text-pages');} else { echo gettext('Pages');} ?></h3></div>
<div class="panel-body">
<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "",getOption('paradigm_sidebar-pages-depth'), true); ?>
</div>
</div>	
<?php } ?>
<?php } ?> 


<?php if (function_exists("printAlbumMenu")) { ?>
<?php if ((getOption('paradigm_sidebar-albums-news') && ($_zp_gallery_page == 'news.php'))||
(getOption('paradigm_sidebar-albums-pages') && ($_zp_gallery_page == 'pages.php'))||
(getOption('paradigm_sidebar-albums-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php')))
) { ?>
<!-- Album menus -->
<div class="panel panel-default nav-local">
<div class="panel-heading"><h3 class="panel-title"><?php if (getOption('paradigm_nav_text-gallery')!='') {echo getOption('paradigm_nav_text-gallery');} else { echo gettext('Albums');} ?></h3></div>
<div class="panel-body">
<?php printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", 0 , false, false); ?>
</div>
</div>
<?php } ?>
<?php } ?>	

<?php if (getcodeblock(2, $_zp_gallery)!='') { ?>
<!-- Gallery Codeblock 2 -->
<?php printcodeblock (2, $_zp_gallery);	?>
<?php		} ?>


<?php if (getAllTagsCount() && getOption('paradigm_sidebar-tags')) { ?>
<!-- Tag cloud in Sidebar-->
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title"><?php echo gettext('Popular Tags'); ?></h3></div>
<div id="tag_cloud" class="panel-body">
<?php printAllTagsAs_zb('cloud','taglist','', false, true, getOption('paradigm_tags-maxfontsize'), getOption('paradigm_tags-maxcount'), getOption('paradigm_tags-mincount'), null, getOption('paradigm_tags-minfontsize'), false, false, getOption('paradigm_tags-nofollow')); ?>
</div>
</div>
<?php } ?>



<?php if (getcodeblock(3, $_zp_gallery)!='') { ?>
<!-- Gallery Codeblock 3 -->
<?php printcodeblock (3, $_zp_gallery);	?>
<?php		} ?>

</aside>
