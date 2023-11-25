<?php if (getOption('homepage_slideshow'))	{ ?>	
<div id="background-slideshow" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
		<div id="paradigm-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
 				<?php 
				   $images = getImageStatistic(getOption('carousel_number'),getOption('carousel_type'),getOption('carousel_album'),true);
				   $firstpict =array_shift($images);
				   echo '<div class="item active" style="background-image:url('.html_encode(pathurlencode($firstpict->getCustomImage(null,null,null,null,null,null,null,true))).')">';
				   echo '<div class="carousel-caption">';
					   echo '<p>' . $firstpict->getTitle() .'</p>';
				   echo '</div>';
				   echo '</div>';

				   foreach ($images as $image) {
				   echo '<div class="item" style="background-image:url('.html_encode(pathurlencode($image->getCustomImage(null,null,null,null,null,null,null,true))).')">';
				   echo '<div class="carousel-caption">';
					   echo '<p>' . $image->getTitle() .'</p>';						   
				   echo '</div>';           				   
				   echo '</div>';
				} ?>
			</div><!-- Controls -->
					<a class="left carousel-control" href="#paradigm-carousel" role="button" data-slide="prev"><span class="sr-only">Previous</span></a> 
					<a class="right carousel-control" href="#paradigm-carousel" role="button" data-slide="next"><span class="sr-only">Next</span></a>
		</div>
	</div>
</div>	
<?php } ?>
<div id="background-main" class="background">
	<div class="container<?php if (getOption('full_width')) {echo '-fluid';}?>">
		<div class="row">
			<div class="col-sm-12">
				<?php if (getOption('zenphoto_logo') != '') { ?>
				<h1 itemprop="name"><?php printGalleryTitle(); ?></h1>
				<div class="home-extended-message"><?php printGalleryDesc(); ?>
				<?php if (getOption('extended_homepage_message') != '') { ?>
						<?php echo getOption('extended_homepage_message'); ?>
				<?php } ?>
				</div>
				<?php } elseif ((getOption('zenphoto_logo') == '') && (getOption('zenphoto_tagline'))) { ?>
				<?php if (getOption('extended_homepage_message') != '') { ?>
						<div class="home-extended-message"><?php echo getOption('extended_homepage_message'); ?></div>
						<?php } ?>
				<?php } elseif ((getOption('zenphoto_logo') == '') && (getGalleryTitle() != '')) { ?>
				<div class="home-extended-message"><?php printGalleryDesc(); ?>
					<?php if (getOption('extended_homepage_message') != '') { ?>
						<?php echo getOption('extended_homepage_message'); ?>
						<?php } ?>
				</div>
				<?php } ?>
				</div>		
		</div>
					
	
<?php if (class_exists('Zenpage') && getNumNews(true) && (getOption('homepage_blog'))) { ?>
		<div class="row">
			<div class="col-sm-12">
			<h2><i class="glyphicon glyphicon-pencil"></i><?php echo gettext("Blog"); ?></h2>
				<div id="blog-style-homepage">
					<?php  // news article loop
						$cnt=0;					
						while (next_news()&& $cnt<(getOption('news_number'))): ;?>
						<div class="homepage-news-item">
							<h3><?php printNewsURL(); ?></h3>
							<?php $hasFeaturedImage = false; if (function_exists('getFeaturedImage')) $hasfeaturedimage = getFeaturedImage($_zp_current_zenpage_news);
							?>
							<?php if($hasfeaturedimage) {
							echo '<a href="' . getNewsURL() . '"><img src="' . pathurlencode($hasfeaturedimage->getThumb()) . '" alt="' . html_encode($hasfeaturedimage->getTitle()) . '" class="feat-image-home"></a>';}
							?> 		
							<?php 
									if (getNewsCustomData()!='') 
										{echo getNewsCustomData();
										echo '<p class="readmorelink"><a href="' . getNewsURL() . '" title="' . getNewsReadMore() .'" >' . getNewsReadMore() . '</a></p><hr />'; 
										}
									else {printNewsContent(getOption('homepage_news_length'));} 
								?>
						</div>
					<?php
						$cnt++;
						endwhile;
					?>
					</div>					
				</div>
			</div>	
<?php } ?>	
		<div class="row">
			<div class="col-sm-12">
			<?php	if (getOption('homepage_content_albums')) { ?>
				<h2><i class="glyphicon glyphicon-folder-close"></i><?php echo gettext("Albums"); ?></h2>
				
					<?php while (next_album()): ?>
						<div class="media col-lg-4 col-sm-6" style="height:<?php echo html_encode(getOption('thumb_size')+20);echo 'px'; ?>">
						<h3 class="media-heading"><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printBareAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
						<div class="media-body">
									<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printBareAlbumTitle(); ?>"><?php printAlbumThumbImage(getBareAlbumTitle(),"media-object"); ?></a>
									<p><?php	if (getOption('homepage_content_albums_desc_show')) { ?>
										<?php 
										if (getAlbumCustomData()!='') 
										{ echo getAlbumCustomData(); }
										else 
										{ echo shortenContent(getAlbumDesc(), (getOption('homepage_content_albums_desc_length')), '...'); } 
									?></p>
							<?php } ?>
							</div>	
						</div>
					<?php endwhile; ?>
				
					<div class="pagelist">
						<ul class="pagelist">
							<li><?php printCustomPageURL(gettext('All albums'), 'gallery'); ?></li>
						</ul>
					</div>				
			<?php } ?>
			</div>
			<div class="col-sm-12">
			<?php if (getOption('homepage_content_uploads')) { ?>
				<h2><i class="glyphicon glyphicon-upload"></i><?php echo gettext("Latest uploads"); ?></h2>
					<?php
					if (function_exists('getImageStatistic'))  {
						printImageStatistic_zb(getOption('homepage_content_number'),"latest","",true,false,false,"",false,NULL,NULL,NULL,"", false);
						}
					else	{
						echo '<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images</div>';
						}
						?>
			<?php } ?>
			<?php if (getOption('homepage_content_recent')) { ?>
				<h2><i class="glyphicon glyphicon-time"></i><?php echo gettext("Recent images"); ?></h2>
					<?php
					if (function_exists('getImageStatistic'))  {
						printImageStatistic_zb(getOption('homepage_content_number'),"latest-date","",true,false,false,"",false,NULL,NULL,NULL,"", false);
						}
					else	{
						echo '<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images</div>';
						}
						?>
			<?php } ?>
			<?php if (getOption('homepage_content_popular')) { ?>
				<h2><i class="glyphicon glyphicon-fire"></i><?php echo gettext("Most popular"); ?></h2>
					<?php
					if (function_exists('getImageStatistic'))  {
						printImageStatistic_zb(getOption('homepage_content_number'),"popular","",true,false,false,"",false,NULL,NULL,NULL,"", false);
						}
					else	{
						echo '<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images</div>';
						}
						?>
			<?php } ?>
			<?php if (getOption('homepage_content_rated')) { ?>
				<h2><i class="glyphicon glyphicon-star"></i><?php echo gettext("Top rated"); ?></h2>
					<?php
					if (function_exists('getImageStatistic'))  {
						printImageStatistic_zb(getOption('homepage_content_number'),"toprated","",true, false, false,"",false,NULL,NULL,NULL,"", false);
						}
					else	{
						echo '<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display latest images</div>';
						}
						?>
			<?php } ?>
			<?php if (getOption('homepage_content_random')) { ?>
				<h2><i class="glyphicon glyphicon-random"></i><?php echo gettext("Random images"); ?></h2>					
					<?php
						if (function_exists('getImageStatistic')) {
							printImageStatistic_zb(getOption('homepage_content_number'),"random","", true, false, false,"",false,NULL,NULL,NULL,"", false);
							}
					else	{
						echo '<div class="alert alert-warning" role="alert">Please enable the image_album_statistics plugin to display random images</div>';
						}
						?>
				<?php } ?>	
			</div>	
		</div>
	</div>
</div>




