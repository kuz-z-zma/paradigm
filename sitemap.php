<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
	<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>
		<div id="center" class="row" itemscope itemtype="https://schema.org/AboutPage">
			<section class="col-sm-12" id="main" itemprop="mainContentOfPage">
				
			<h1 itemprop="name"><i class="glyphicon glyphicon-list"></i>Sitemap</h1>
			
				
			<?php if (function_exists("printAllNewsCategories") && (getNumNews(true))) { ?>
			<h2><i class="glyphicon glyphicon-pencil"></i><?php echo gettext("News categories"); ?></h2>
			<div id="sitemap-news-output">
				<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list", true,""); ?>						
			</div>
			<hr>
			<?php } ?>
			
			<?php if (function_exists("printPageMenu") && (getNumPages(true))) { ?>
			<h2><i class="glyphicon glyphicon-list-alt"></i>Pages</h2>
				<div id="sitemap-pages-output">
					<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "", true); ?>
				</div>
				<hr>
			<?php } ?>
				
			<?php if(function_exists("printAlbumMenu")) { ?>
				<h2><i class="glyphicon glyphicon-folder-close"></i>Albums</h2>
					<div id="sitemap-albums-output">
						<?php printAlbumMenu("list", false, "sitemap-albums", "open", "sitemap-submenu", "open", "", true , false, false); ?>
					</div>
				<?php } else { ?>
				<p>Enable Print Album Menu plugin to get list of albums.</p>
			<?php } ?>
				
			</section>
		</div>
	</div>
</div>		

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
