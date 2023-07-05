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
		<div id="center" class="row" itemscope itemtype="https://schema.org/WebPage">
			<?php if (getOption('display_archive-sidebar')) { ?>
			<section class="col-sm-9" id="main" itemprop="mainContentOfPage">
				
			<h1><i class="glyphicon glyphicon-calendar"></i><?php echo gettext('Archive'); ?></h1>
			<h2 itemprop="name"><?php echo gettext('Gallery archive'); ?></h2>	
			<div class="columns"><?php printAllDates(); ?></div>
							
			<hr />
			
			<?php if (function_exists("printNewsArchive")) { ?>
					<h2><?php echo gettext('News archive'); ?></h2>
					<div class="columns">
					<?php printNewsArchive("archive"); ?>
					</div>
					<hr />
			<?php } ?>	

			<br style="clear:both;" />
			</section>
			<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
			<?php } else { ?>
			<section class="col-sm-12" id="main" itemprop="mainContentOfPage">
			<h1><i class="glyphicon glyphicon-folder-close"></i><?php echo gettext('Archive'); ?></h1>	
			<h2 itemprop="name"><?php echo gettext('Gallery archive'); ?></h2>
				
			<div class="columns"><?php printAllDates(); ?></div>
							
			<hr />
			
			<?php if (function_exists("printNewsArchive")) { ?>
					<h2><?php echo gettext('News archive'); ?></h2>
					<div class="columns">
					<?php printNewsArchive("archive"); ?>
					</div>
					<hr />
			<?php } ?>	

			<br style="clear:both;" />
			</section>
			<?php } ?>	
			
		</div>		
	</div>	
</div>	

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>