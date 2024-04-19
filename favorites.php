<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
	die();
if (class_exists('favorites')) {
	?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>
		<div id="center" class="row" itemscope itemtype="https://schema.org/ImageGallery">
			<section class="col-sm-9" id="main" itemprop="mainContentOfPage">
				
				<h1 itemprop="name"><i class="glyphicon glyphicon-heart"></i><?php printAlbumTitle(); ?></h1>				

				<div itemprop="description" class="content"><?php printAlbumDesc(); ?></div>
			
	<!-- Favourite albums -->		
					<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_albumlist.php'); ?>
				
<!-- Favourite images -->
				
					<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_imagethumbs.php'); ?>
				
					<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>

				<br style="clear:both;" />

			</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
		</div>
	</div>	
</div>			

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>		
	<?php
} else {
	include(SERVERPATH . '/' . THEMEFOLDER  . '/paradigm/404.php');
}
?>