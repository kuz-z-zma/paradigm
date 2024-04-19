<?php if (getNumImages() > 0)  { ?>
<h3><i class="glyphicon glyphicon-picture"></i>Images:</h3>
<div id="images" class="row">
						<?php while (next_image()): ?>
							<div class="col-lg-3 col-md-4 col-xs-6" style="height:<?php echo html_encode(getOption('thumb_size')+55);echo 'px'; ?>" itemscope itemtype="https://schema.org/ImageObject">
								<div class="thumbnail"  itemprop="thumbnail">
									<?php
									if ($_zp_current_image->isPhoto() && getOption('display_lightbox')) { ?>
									<a href="<?php echo html_encode(getDefaultSizedImage()); ?>" rel="lightbox noopener nofollow" title="<?php printBareImageTitle(); ?>"><?php printImageThumb(getBareImageTitle()); ?></a>
									<?php
									} else { ?>
									<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>"><?php printImageThumb(getBareImageTitle()); ?></a>
									<?php
									}
									?>					
									<div class="caption">
										<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>"><span itemprop="name"><?php printBareImageTitle(); ?></span></a>
									</div>
									<?php if (class_exists('favorites') && ($_zp_gallery_page == 'favorites.php')) { ?>
									<div class="favorites fav-images"><?php printAddToFavorites($_zp_current_image, '', gettext('Remove')); ?></div>
								<?php } ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
<?php } ?>