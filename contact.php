<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();
if (function_exists('printContactForm')) {
	?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
	<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>
		<div id="center" class="row" itemscope itemtype="https://schema.org/ContactPage">
				<?php if (function_exists("printAlbumMenu")) { ?>
				<section class="col-sm-9" id="main" itemprop="mainContentOfPage">

			<h1><i class="glyphicon glyphicon-envelope"></i><?php echo gettext('Contact') ?></h1>
				
			<p>						
				<?php
						printContactForm();
				?>
			</p>
				
			</section>
				<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
			<?php } else { ?>
			<section class="col-sm-12" id="main" itemprop="mainContentOfPage">
			<h1><i class="glyphicon glyphicon-envelope"></i><?php echo gettext('Contact') ?></h1>
				
			<p>						
				<?php
						printContactForm();
				?>
			</p>
				
			</section>
			<?php } ?>
		</div>
	</div>
</div>		

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
	<?php
} else {
	include(SERVERPATH . '/' . ZENFOLDER . '/404.php');
}
	?>