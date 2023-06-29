<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
	die();
if (class_exists('Zenpage')) {
	?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>
		<div id="center" class="row" itemscope itemtype="https://schema.org/WebPage">
		
			<section class="col-sm-9" id="main">
				
			<h1 itemprop="name"><?php printPageTitle(); ?></h1>
				
			<div itemprop="text" class="content"><?php printPageContent(); ?></div>

		<!-- Extra content -->
			<?php if (getPageExtraContent()!='') {
				echo '<div class="content">';
				printPageExtraContent();
				echo "</div>";
			} 
			?>	

<!-- Codeblock1 -->	
			<p><?php printCodeblock(1);	?> </p>
<!-- Tags -->
			<?php 	
				if (getTags()) {
					echo gettext('<strong>Tags:</strong>');
				} 
				printTags_zb('links', '', 'taglist', ', ');
			?>
<!-- Rating -->	
				<?php
					if (extensionEnabled('rating')) { 
						echo '<div id="rating">';
						echo '<h2>' . gettext('Rating') . '</h2>';
						printRating();
						echo '</div>';
					}
				?>	
				
<!-- Comments -->
			<?php @call_user_func('printCommentForm'); ?>
			</section>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
		</div>
	</div>
</div>		

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
	<?php
} else {
	include(SERVERPATH . '/' . ZENFOLDER . '/404.php');
}
?>
