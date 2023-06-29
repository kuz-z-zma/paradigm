<aside class="col-sm-3 hidden-xs"	id="sidebar">

<?php if(function_exists("printAlbumMenu") && (($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'archive.php'))) { ?>
<!-- print album menu if in albums -->
<div class="panel panel-default" id="nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php echo gettext("Albums"); ?></h2></div>
	<div class="panel-body">
		<?php
			printAlbumMenu("list", false, "nav-local-albums", "open", "submenu", "open", "", 0 , false, false);
		?>
</div>
</div>
<?php } ?>

<?php if(function_exists("printAllNewsCategories") && ($_zp_gallery_page == 'news.php')) {
	if (getNumNews(true)) {
	?>
	<!-- Print news menu if in news -->
<div class="panel panel-default" id="nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php echo gettext("News"); ?></h2></div>
	<div class="panel-body">
		<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list", true,""); ?>						
	</div>
</div>	
			<?php
		}
	}
	?>
<?php if(function_exists("printPageMenu") && ($_zp_gallery_page == 'pages.php')) { ?>
<!-- Print pages list if in a page -->
<div class="panel panel-default" id="nav-local">
	<div class="panel-heading"><h2 class="panel-title"><?php echo gettext("Pages"); ?></h2></div>
	<div class="panel-body">
		<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "", true); ?>
	</div>
</div>	
<?php } ?> 

<?php if ((getAllTagsCount()) && (($_zp_gallery_page == 'search.php')||($_zp_gallery_page == 'image.php')||($_zp_gallery_page == 'album.php')||($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'gallery.php')||($_zp_gallery_page == 'news.php')||($_zp_gallery_page == 'pages.php')||($_zp_gallery_page == 'archive.php'))) { ?>
<!-- Print tag cloud -->

<div class="panel panel-default">
	<div class="panel-heading"><h2 class="panel-title"><?php echo gettext('Popular Tags'); ?></h2></div>
	<div id="tag_cloud"  class="panel-body">
		<?php printAllTagsAs_zb('cloud', 'taglist', 'abc', false, true, 2, 500, 1, null); ?>
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



