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
		
			<section class="col-sm-9" id="main"  itemscope itemtype="https://schema.org/ImageObject">
			
		<!-- pagination -->
					<ul class="pagination pull-right">
						<?php if (hasPrevImage()) { ?>
							<li><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext("Previous Image"); ?>">« <?php echo gettext("prev"); ?></a></li>
						<?php } if (hasNextImage()) { ?>
							<li><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext("Next Image"); ?>"><?php echo gettext("next"); ?> »</a></li>
						<?php } ?>
					</ul>

					<h1 itemprop="name"><?php printImageTitle(); ?></h1>
				<?php 
						if ((getImageDesc() != '') && ((getOption('display_caption')) == 'above')) {
							echo '<div itemprop="caption" class="content">';
							printImageDesc(); 
							echo '</div>';
						} 
					?>
				
			<br clear="all"/>

			<!-- The Image -->
			<div class="text-center">
							
					<?php
					if ($_zp_current_image->isPhoto()) {
						$fullimage = getFullImageURL();
					} else {
						$fullimage = NULL;
					}
					if (!empty($fullimage)) {
						?>
						<?php
						}
						if ($_zp_current_image->isPhoto()) {
							echo '<img src="'. getFullImageURL() . '" alt="'. getImageTitle() . '" class="full-image"/>';
						} else {
							printDefaultSizedImage(getImageTitle());
						}
						if (!empty($fullimage)) {
							?>
						<?php
					}
					?>	
							

			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php 
						if ((getImageDesc() != '') && ((getOption('display_caption')) == 'below')) {
							echo '<h2><i class="glyphicon glyphicon-pencil"></i>' . gettext('Caption') . '</h2>';					
							echo '<div itemprop="caption">';
							printImageDesc(); 
							echo '</div>';
						} 
					?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
							
					<?php 
						if ((getImageData('location')!='') || (getImageData('city')!='') || (getImageData('state')!='') || (getImageData('country')!='')) {
								echo '<h2><i class="glyphicon glyphicon-globe"></i>' . gettext('Location'). '</h2>';
								if (getImageData('location')!='') {
									echo '<p><strong>' . gettext('Location:'). '</strong>&nbsp;';
									echo '<span  itemprop="contentLocation">';
									echo get_language_string(getImageData('location'));
									echo '</span></p>';							
								}
								if (getImageData('city')!='') {
									echo '<p><strong>' . gettext('City:'). '</strong>&nbsp;';
									echo get_language_string(getImageData('city'));
									echo '</p>';
								}
								if (getImageData('state')!='') {
									echo '<p><strong>' . gettext('State:'). '</strong>&nbsp;';
									echo get_language_string(getImageData('state'));
									echo '</p>';
								}								
								if (getImageData('country')!='') {
									echo '<p><strong>' . gettext('Country:'). '</strong>&nbsp;';
									echo get_language_string(getImageData('country'));
									echo '</p>';
								}	
						}
					?>

					<?php
						if (getTags()) {
							echo '<h2><i class="glyphicon glyphicon-tag"></i>' . gettext('Tags') . '</h2>';
							printTags_zb('links', '', 'taglist', ', ',getOption('tags-seo-nofollow'));
						}	
					?>
					
					<?php if (function_exists('getHitCounter')) {
						echo '<h2><i class="glyphicon glyphicon-eye-open"></i>' . gettext('Other info') . '</h2>';
							echo '<p><strong>' . gettext('Views:') . '</strong>&nbsp;';
							echo gethitcounter();
							echo ' views</p>';
						}?>	
					<?php if (getOption('extended_copyright_message') != '') { ?>
						<h2><i class="glyphicon glyphicon-copyright-mark"></i>Copyright</h2>
							<div itemprop="copyrightHolder" class="image-copy">
								<?php echo getOption('extended_copyright_message'); ?>
							</div>						
						<?php } else { ?>
							<?php (getImageData('copyright')!='') ?> 
						<p itemprop="copyrightHolder"><strong>Copyright:</strong>
							<?php echo get_language_string(getImageData('copyright')); ?>
							</p>
						<?php } ?>	
				
				<?php if (function_exists('printAddToFavorites')) { ?>
				<div id="favorites" class="block"><h2><i class="glyphicon glyphicon-heart"></i>Favorites</h2>
				<?php printAddToFavorites($_zp_current_image); ?></div>
				<?php } ?>
				
					<!-- Rating -->	
				<?php
					if (extensionEnabled('rating')) { 
						echo '<div id="rating">';
						echo '<h2><i class="glyphicon glyphicon-star"></i>' . gettext('Rating') . '</h2>';
						printRating();
						echo '</div>';
					}
				?>	

					<?php 
						if (function_exists('printImageMarkupFields') && (zp_loggedin() OR (getOption('imageMarkup_permission') == 'everyone'))) {
							echo '<div class="markup-copy-field">';
							echo '<h2><i class="glyphicon glyphicon-paste"></i>Image code</h2>';
							printImageMarkupFields(gettext('Code'));
							echo '</div>';
						}
						?>
				</div>		
				<div class="col-sm-6">
				<?php
					if (getImageMetaData()) {
						echo '<h2><i class="glyphicon glyphicon-info-sign"></i>Image Info</h2>';
						printImageMetadata_zb();
					}
				?>
				
				</div>	
			</div>
							
		<!-- Codeblock 1 -->
			<?php printCodeBlock(1);?>						

				<?php
					if (function_exists('printGoogleMap') && (getImageData('EXIFGPSLatitude')!='')) {
						echo '<div id="location">';
						echo '<h2><i class="glyphicon glyphicon-map-marker"></i>' . gettext('Map') . '</h2>';
						printGoogleMap("","","show");
						echo '</div>';			
					}
				?>

				<?php
					if (function_exists('printOpenStreetMap') && (getImageData('EXIFGPSLatitude')!='')) {
						echo '<div id="location">';
						echo '<h2><i class="glyphicon glyphicon-map-marker"></i>' . gettext('Map') . '</h2>';
						openStreetMap::printOpenStreetMap();
						echo '</div>';						
					}
				?>					

			<br style="clear:both" />
			
			<hr />
			<?php @call_user_func('printCommentForm'); ?>

			</section>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
		</div>				
	</div>
</div>
<!-- end of content row -->
	

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>