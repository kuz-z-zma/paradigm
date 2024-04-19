<aside class="col-sm-3 hidden-xs"	id="sidebar">

	<?php
			if (function_exists('printFavoritesURL')) { ?>
	<!-- Favorites menu in Gallery -->
	<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title">Collections</h2></div>
		<div class="panel-body">
			<ul id="nav-local-favorites">
			<?php printFavoritesURL(NULL, '<li>', '</li><li>', '</li>');
			 if (function_exists("printUserLogin_out")) {
				printUserLogin_out("<li>", "</li>"); }
				?>
				</ul>
		</div>
		</div>
	<?php }	?>
	
<?php if(function_exists("printAlbumMenu") && getOption('display_albums-sidebar-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php'))) { ?>
<!-- Album menu in Gallery -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_gallery')!='') {echo getOption('menu_text_gallery');} else { echo gettext('Albums');} ?></h2></div>
	<div class="panel-body">
		<?php
			printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", getOption('display_albums-sidebar-depth'), false, false);
		?>
</div>
</div>
<?php } ?>

<?php if(function_exists("printAllNewsCategories") && getOption('display_news-sidebar-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php'))) {
	if (getNumNews(true)) {
	?>
	<!-- News menu in Gallery-->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_news')!='') {echo getOption('menu_text_news');} else { echo gettext('News');} ?></h2></div>
	<div class="panel-body">
		<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list", getOption('display_news-sidebar-depth'),""); ?>						
	</div>
</div>	
			<?php
		}
	}
	?>
<?php if(function_exists("printPageMenu") && ((getNumPages(true)) > 0) && getOption('display_pages-sidebar-gallery') && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'favorites.php'))) { ?>
<!-- Page menu in Gallery -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_pages')!='') {echo getOption('menu_text_pages');} else { echo gettext('Pages');} ?></h2></div>
	<div class="panel-body">
		<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "",getOption('display_pages-sidebar-depth'), true); ?>
	</div>
</div>	
<?php } ?> 

<?php if(function_exists("printAllNewsCategories") && getOption('display_news-sidebar-news') && ($_zp_gallery_page == 'news.php')) {
	if (getNumNews(true)) {
	?>
	<!-- News menu in News-->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_news')!='') {echo getOption('menu_text_news');} else { echo gettext('News');} ?></h2></div>
	<div class="panel-body">
		<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list",getOption('display_news-sidebar-depth'),""); ?>						
	</div>
</div>	
			<?php
		}
	}
	?>
<?php if(function_exists("printPageMenu") && ((getNumPages(true)) > 0) && getOption('display_pages-sidebar-news') && ($_zp_gallery_page == 'news.php')) { ?>
<!-- Page menu in News -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_pages')!='') {echo getOption('menu_text_pages');} else { echo gettext('Pages');} ?></h2></div>
	<div class="panel-body">
		<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "",getOption('display_pages-sidebar-depth'), true); ?>
	</div>
</div>	
<?php } ?>
	
<?php if(function_exists("printAlbumMenu") && getOption('display_albums-sidebar-news') && ($_zp_gallery_page == 'news.php')) { ?>
<!-- Album menu in News -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_gallery')!='') {echo getOption('menu_text_gallery');} else { echo gettext('Albums');} ?></h2></div>
	<div class="panel-body">
		<?php
			printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", 0 , false, false);
		?>
</div>
</div>
<?php } ?>
	
<?php if(function_exists("printPageMenu") && ((getNumPages(true)) > 0) && getOption('display_pages-sidebar-pages') && ($_zp_gallery_page == 'pages.php')) { ?>
<!-- Page menu in Pages -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_pages')!='') {echo getOption('menu_text_pages');} else { echo gettext('Pages');} ?></h2></div>
	<div class="panel-body">
		<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "",getOption('display_pages-sidebar-depth'), true); ?>
	</div>
</div>	
<?php } ?>
	
	<?php if(function_exists("printAllNewsCategories") && getOption('display_news-sidebar-pages') && ($_zp_gallery_page == 'pages.php')) {
	if (getNumNews(true)) {
	?>
	<!-- News menu in Pages-->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_news')!='') {echo getOption('menu_text_news');} else { echo gettext('News');} ?></h2></div>
	<div class="panel-body">
		<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list",getOption('display_news-sidebar-depth'),""); ?>						
	</div>
</div>	
			<?php
		}
	}
	?>

	<?php if(function_exists("printAlbumMenu") && getOption('display_albums-sidebar-pages') && ($_zp_gallery_page == 'pages.php')) { ?>
<!-- Album menu in Pages -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_gallery')!='') {echo getOption('menu_text_gallery');} else { echo gettext('Albums');} ?></h2></div>
	<div class="panel-body">
		<?php
			printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", 0 , false, false);
		?>
</div>
</div>
<?php } ?>

		<?php if(function_exists("printAlbumMenu") && getOption('display_albums-sidebar-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php'))) { ?>
<!-- Album menu in Archives -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_gallery')!='') {echo getOption('menu_text_gallery');} else { echo gettext('Albums');} ?></h2></div>
	<div class="panel-body">
		<?php
			printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", 0 , false, false);
		?>
</div>
</div>
<?php } ?>

	<?php if(function_exists("printAllNewsCategories") && getOption('display_news-sidebar-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php'))) {
	if (getNumNews(true)) {
	?>
	<!-- News menu in Archive-->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_news')!='') {echo getOption('menu_text_news');} else { echo gettext('News');} ?></h2></div>
	<div class="panel-body">
		<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list",getOption('display_news-sidebar-depth'),""); ?>						
	</div>
</div>	
			<?php
		}
	}
	?>
	
	<?php if(function_exists("printPageMenu") && ((getNumPages(true)) > 0) && getOption('display_pages-sidebar-archive') && (($_zp_gallery_page == 'archive.php')||($_zp_gallery_page == 'contact.php')||($_zp_gallery_page == 'credits.php')||($_zp_gallery_page == 'search.php'))) { ?>
<!-- Page menu in Archive -->
<div class="panel panel-default nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php if (getOption('menu_text_pages')!='') {echo getOption('menu_text_pages');} else { echo gettext('Pages');} ?></h2></div>
	<div class="panel-body">
		<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "",getOption('display_pages-sidebar-depth'), true); ?>
	</div>
</div>	
<?php } ?>
	
	
<?php if (getAllTagsCount() && getOption('display_tags-sidebar')) { ?>
<!-- Tag cloud in Sidebar-->
<div class="panel panel-default">
	<div class="panel-heading"><h2 class="panel-title"><?php echo gettext('Popular Tags'); ?></h2></div>
	<div id="tag_cloud" class="panel-body">
		<?php printAllTagsAs_zb('cloud','taglist','', false, true, getOption('display_tags-maxfontsize'), getOption('display_tags-maxcount'), getOption('display_tags-mincount'), null, getOption('display_tags-minfontsize'), false, false, getOption('tags-seo-nofollow')); ?>
	</div>
	</div>
<?php } ?>
	
<?php if (getcodeblock(1, $_zp_gallery)!='') { ?>
<hr/>
	<div class="well">
		<?php  
			printcodeblock (1, $_zp_gallery);
		?>
	</div>
<?php		} ?>


<?php if (getcodeblock(2, $_zp_gallery)!='') { ?>
<hr/>
	<div class="well">
		<?php  
			printcodeblock (2, $_zp_gallery);
		?>
	</div>
<?php		} ?>

</aside>
