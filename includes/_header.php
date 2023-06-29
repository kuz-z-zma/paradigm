<body>
<?php zp_apply_filter('theme_body_open'); ?>
<!-- page header -->	

<header id="background-header" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
		<!-- main navigation --> 
		<nav class="navbar navbar-default css-dropdown" id="nav-global">
		  <div>
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
			  
			<?php if (getOption('zenphoto_logo') != '') { ?>
				<a id="logo" href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php printGalleryTitle(); ?>"><img src="<?php echo pathurlencode(WEBPATH.'/'.UPLOAD_FOLDER.'/'.getOption('zenphoto_logo')); ?>" alt="<?php printGalleryTitle(); ?>" /></a>
				<?php } elseif (getGalleryTitle() != '') { ?>
				<h1 id="logo-text"><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php printGalleryTitle(); ?>"><?php printGalleryTitle(); ?></a></h1>
				<?php } ?>
				
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  	<ul class="nav navbar-nav">		
			  		<!-- gallery -->
			  		<li class="first level1 dropdown <?php if ($_zp_gallery_page == 'image.php' || $_zp_gallery_page == 'gallery.php' || $_zp_gallery_page == 'album.php') { ?> active<?php } ?>"><?php printCustomPageURL(gettext('Albums'), 'gallery'); ?>
			  		<?php 
					if(function_exists("printAlbumMenu")) {
						printAlbumMenuList("list-top",false,"","active","","","");} ?>
					</li>
					<?php if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) { ?>
						<!-- news -->
						<li class="level1 dropdown<?php if ($_zp_gallery_page == 'news.php') { ?> active<?php } ?>"><a href="<?php echo getNewsIndexURL(); ?>"><?php echo gettext('Blog')?></a>
								<?php printAllNewsCategories("", false, "", "open", true, "submenu", "open","list-top"); ?>	
							</li>
					<?php } ?>

						
					<?php if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { ?>
						<!-- pages-->
						<?php printPageMenu("list","","active","submenu","active","","2",false); ?>
					<?php } ?>	
					<?php if (getOption('display_archive')) { ?>
						<!-- archive-->
						<li class="level1<?php if ($_zp_gallery_page == 'archive.php') { ?> active<?php } ?>"><?php printCustomPageURL(gettext('Archive'), 'archive'); ?></li>
					<?php } ?>			
						
						
					<?php if (extensionEnabled('contact_form')) { ?>
						<!-- contact page -->
						<li class="level1<?php if ($_zp_gallery_page == 'contact.php') { ?> active<?php } ?>"><?php printCustomPageURL(gettext('Contact'), 'contact'); ?></li>
					<?php } ?>
					</ul>
					<?php printSearchForm('','navbar_search',$_zp_themeroot.'/img/magnifying_glass_16x16.png',gettext('Search'),$_zp_themeroot.'/img/list_12x11.png'); ?>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</header>		