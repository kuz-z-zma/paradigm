					<div id="albums" class="row">
						<?php while (next_album()): ?>
							<div class="media col-lg-6" style="height:<?php echo html_encode(getOption('thumb_size')+20);echo 'px'; ?>">
								<h2 class="media-heading"><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printBareAlbumTitle(); ?>"><i class="glyphicon glyphicon-folder-close"></i><?php printAlbumTitle(); ?></a></h2>		
								<div class="media-body">
									<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printBareAlbumTitle(); ?>"><?php printAlbumThumbImage(getBareAlbumTitle(),"media-object"); ?></a>
										<p>
											<?php 
											if (getAlbumCustomData()!='') 
											{ echo getAlbumCustomData(); }
											else 
											{ echo shortenContent(getAlbumDesc(), (getOption('homepage_content_albums_desc_length')), '...'); } ?>
								    </p>
								</div>	
							</div>
						<?php endwhile; ?>
					</div>