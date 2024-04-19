<!-- footer -->

<footer id="background-footer" class="background">
	<div class="container">
		<div id="footer" class="row">
			<div class="col-sm-9" id="footer-menu">
				<ul class="list-inline">
					<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
					<li><?php if (getOption('menu_text_gallery')!=''){ printCustomPageURL(getOption('menu_text_gallery'), 'gallery');} else {printCustomPageURL(gettext('Gallery'), 'gallery');} ?></li>
					<?php if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) { ?>
						<li><?php if (getOption('menu_text_news')!='') {printNewsIndexURL(getOption('menu_text_news'),'', gettext('News'));} else {printNewsIndexURL(gettext('News'),'', gettext('News'));} ?></li>
					<?php } ?>
					<?php if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { ?> <?php printPageMenu("list-top","","","","","","1",false); ?><?php } ?>
					<?php if (getOption('display_archive-footer')) { ?>
					<li><?php printCustomPageURL(gettext('Archive'), 'archive'); ?></li><?php } ?>
					<?php if (extensionEnabled('contact_form')) { ?><li><?php printCustomPageURL(gettext('Contact'), 'contact'); ?></li><?php } ?>
					<?php if (getOption('display_footer_menu-credits')) { ?>
						<li><?php printCustomPageURL(gettext('Credits'), 'credits'); ?></li><?php } ?>
					<?php if (getOption('display_footer_menu-explore')) { ?>
					<li><?php printCustomPageURL(gettext('Explore'),'explore'); ?></li><?php } ?>
					<?php if (getOption('display_footer_menu-sitemap')) { ?>
					<li class="last"><?php printCustomPageURL(gettext('Sitemap'), 'sitemap'); ?></li><?php } ?>
				</ul>
			</div>
			<div class="col-sm-3 text-right" id="social">
				<?php if (class_exists('RSS') && getOption('display_rss_links')) { ?>
					<ul class="links-rss list-inline">
					<?php if (getOption('RSS_articles') && ($_zp_gallery_page == 'news.php')) {
						echo '<li>';
						printRSSLink('News','',gettext('RSS News'),'',false);
						echo '</li>';
						}	?>
						<?php if (getOption('RSS_pages') && ($_zp_gallery_page == 'pages.php')) {
						echo '<li>';
						printRSSLink('Pages','',gettext('RSS Pages'),'',false);
						echo '</li>';
						} ?>
					<?php if (getOption('RSS_album_image')) {
						echo '<li>';
						printRSSLink('Gallery','',gettext('RSS Gallery'),'',false);
						echo '</li>';
						} ?>
						</ul>
				<?php } ?>
				
				<?php if (getOption('display_social_links')) { ?>
				<ul class="links-social list-inline">
					<?php if (getOption('facebook_url')!='') {
						echo '<li><a href="';
						echo getOption('facebook_url');
						echo '" rel="me" target="_blank"><em class="social-icon-facebook"></em></a></li>';
					}
					?>
					<?php if (getOption('twitter_profile')!='') {
						echo '<li><a href="https://twitter.com/';
						echo getOption('twitter_profile');
						echo '" rel="me" target="_blank"><em class="social-icon-twitter"></em></a></li>';
					}
					?>
					<?php if (getOption('flickr_url')!='') {
						echo '<li><a href="';
						echo getOption('flickr_url');
						echo '" rel="me" target="_blank"><em class="social-icon-flickr"></em></a></li>';
					}
					?>
					<?php if (getOption('500px_url')!='') {
						echo '<li><a href="';
						echo getOption('500px_url');
						echo '" rel="me" target="_blank"><em class="social-icon-500px"></em></a></li>';
					}
					?>
					<?php if (getOption('instagram_url')!='') {
						echo '<li><a href="';
						echo getOption('instagram_url');
						echo '" rel="me" target="_blank"><em class="social-icon-instagram"></em></a></li>';
					}
					?>
					<?php if (getOption('pinterest_url')!='') {
						echo '<li><a href="';
						echo getOption('pinterest_url');
						echo '" rel="me" target="_blank"><em class="social-icon-pinterest"></em></a></li>';
					}
					?>
					<?php if (getOption('deviantart_url')!='') {
						echo '<li><a href="';
						echo getOption('deviantart_url');
						echo '" rel="me" target="_blank"><em class="social-icon-deviantart"></em></a></li>';
					}
					?>
					<?php if (getOption('tumblr_url')!='') {
						echo '<li><a href="';
						echo getOption('tumblr_url');
						echo '" rel="me" target="_blank"><em class="social-icon-tumblr"></em></a></li>';
					}
					?>
					</ul>
				<?php } ?>
			</div>			
		</div>
	</div>
</footer>


<?php
	zp_apply_filter('theme_body_close');
?>

<?php if (getOption('sharethis_id')!='') { ?>

	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "<?php echo getOption('sharethis_id'); ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php }?>

</body>

</html>	