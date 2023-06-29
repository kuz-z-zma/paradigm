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
		<div id="center" class="row" itemscope itemtype="https://schema.org/ContactPage">
			
			<section class="col-sm-9" id="main" itemprop="mainContentOfPage">
				
			<h1 itemprop="name"><?php echo gettext('Credits'); ?></h1>
			<h2>Copyright</h2>
				Copyright 
				<?php 
					$admin = $_zp_authority->getMasterUser();
					$author = $admin->getName(); 
					echo $author;
				?>
				<?php echo date('Y'); ?>.
				
			<h2>Zenphoto</h2>
			<p>This website is based on <a href="https://www.zenphoto.org/" target="_blank">ZenPhoto</a>, the simple media website CMS.</p>
			<p><strong>Theme used:</strong> <a href="https://www.blog.private-universe.net/web-and-tech/zenphoto-theme-paradigm/" title="Paradigm ZenPhoto theme">Paradigm</a>.</p>
			<p>This theme was originally created by Olivier Ffrench (<a href="http://www.france-in-photos.com">France in Photos</a>) and updated for ZenPhoto version 1.6 by kuzzzma (<a href="https://www.private-universe.net">Private Universe</a>) </p>
			</section>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
		</div>
	</div>
</div>		

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
