<!-- footer -->

<footer id="background-footer" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<div id="footer-extras" class="row">
<!-- Gallery Codeblock 4 -->
<?php printcodeblock (4, $_zp_gallery);	?>
</div>

<div id="footer" class="row">
<div id="footer-menu" class="col-sm-9" >
<ul class="list-inline">
<li><a href="<?php echo html_encode(getStandardGalleryIndexURL()); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
<li><?php if (getOption('paradigm_nav_text-gallery')!=''){ printCustomPageURL(getOption('paradigm_nav_text-gallery'),'gallery');} else {printCustomPageURL(gettext_th('Gallery'),'gallery'); } ?></li>
<?php if (function_exists("printAllNewsCategories") && ((getNumNews(true)) > 0)) { ?>
<li><?php if (getOption('paradigm_nav_text-news')!='') {printNewsIndexURL(getOption('paradigm_nav_text-news'),'',gettext_th('News')); } else {printNewsIndexURL(gettext_th('News'),'',gettext_th('News')); } ?></li>
<?php } ?>
<?php if (function_exists("printPageMenu") && ((getNumPages(true)) > 0)) { ?>
<?php printPageMenu("list-top","","","","","","1",false); ?>
<?php } ?>
<?php if (getOption('paradigm_nav_footer-archive')) { ?>
<li><?php printCustomPageURL(gettext_th('Archive'),'archive'); ?></li>
<?php } ?>
<?php if (extensionEnabled('contact_form')) { ?>
<li><?php printCustomPageURL(gettext_th('Contact'),'contact'); ?></li>
<?php } ?>
<?php if (getOption('paradigm_footer_menu-credits')) { ?>
<li><?php printCustomPageURL(gettext_th('Credits'),'credits'); ?></li>
<?php } ?>
<?php if (getOption('paradigm_footer_menu-explore')) { ?>
<li><?php printCustomPageURL(gettext_th('Explore'),'explore'); ?></li>
<?php } ?>
<?php if (getOption('paradigm_footer_menu-sitemap')) { ?>
<li class="last"><?php printCustomPageURL(gettext_th('Sitemap'),'sitemap'); ?></li>
<?php } ?>
</ul>
</div>

<?php
if ((function_exists('printRegisterURL')||function_exists('printUserLogin_out')) && getOption('paradigm_footer_user-menu')) { ?>
<div id="footer-user-menu" class="col-sm-3 text-right">
<ul class="list-inline user-actions">
<?php if (!zp_loggedin() && function_exists('printRegisterURL')){ ?>
<li><?php printRegisterURL(gettext_th('Register'),'',''); ?></li><?php } ?>
<?php if (function_exists("printUserLogin_out") && ($_zp_gallery_page !== 'register.php')){ ?>
<li><?php printUserLogin_out('',''); ?></li>
<li class="last"><i class="glyphicon glyphicon-user"></i></li><?php } ?>
</ul>
</div>
<?php }	?>

<?php if (class_exists('RSS') && getOption('paradigm_footer_rss')) { ?>
<div id="rss" class="col-sm-8" >
<ul class="links-rss list-inline">
<li><i class="glyphicon glyphicon-bullhorn"></i></li>
<?php if (getOption('RSS_articles')) { ?>
<li><?php	printRSSLink('News','',gettext_th('RSS News'),'',false); ?></li>
<?php }	?>
<?php if (getOption('RSS_pages') && ($_zp_gallery_page == 'pages.php')){ ?>
<li><?php	printRSSLink('Pages','',gettext_th('RSS Pages'),'',false); ?></li>
<?php }	?>
<?php if (getOption('RSS_album_image')) { ?>
<li><?php printRSSLink('AlbumsRSS','',gettext_th('RSS Albums'),'',false); ?></li>
<li class="last"><?php printRSSLink('Gallery','',gettext_th('RSS Images'),'',false); ?></li>
<?php }	?>
</ul>
</div>
<?php } ?>


  
<?php if (getOption('paradigm_footer_social')) { ?>
<div id="social" class="col-sm-4 text-right">
<ul class="links-social list-inline">
<?php if (getOption('facebook_url')!=''){ ?>
<li><a href="<?php echo getOption('facebook_url'); ?>" rel="me" target="_blank"><em class="social-icon-facebook"></em></a></li>
<?php	}	?>
<?php if (getOption('twitter_profile')!=''){ ?>
<li><a href="https://twitter.com/<?php echo getOption('twitter_profile'); ?>" rel="me" target="_blank"><em class="social-icon-twitter"></em></a></li>
<?php	}	?>
<?php if (getOption('flickr_url')!=''){ ?>
<li><a href="<?php echo getOption('flickr_url'); ?>" rel="me" target="_blank"><em class="social-icon-flickr"></em></a></li>
<?php	}	?>
<?php if (getOption('500px_url')!=''){ ?>
<li><a href="<?php echo getOption('500px_url'); ?>" rel="me" target="_blank"><em class="social-icon-500px"></em></a></li>
<?php	}	?>
<?php if (getOption('instagram_url')!=''){ ?>
<li><a href="<?php echo getOption('instagram_url'); ?>" rel="me" target="_blank"><em class="social-icon-instagram"></em></a></li>
<?php	}	?>
<?php if (getOption('pinterest_url')!=''){ ?>
<li><a href="<?php echo getOption('pinterest_url'); ?>" rel="me" target="_blank"><em class="social-icon-pinterest"></em></a></li>
<?php	}	?>
<?php if (getOption('deviantart_url')!=''){ ?>
<li><a href="<?php echo getOption('deviantart_url'); ?>" rel="me" target="_blank"><em class="social-icon-deviantart"></em></a></li>
<?php	}	?>
<?php if (getOption('tumblr_url')!=''){ ?>
<li><a href="<?php echo getOption('tumblr_url'); ?>" rel="me" target="_blank"><em class="social-icon-tumblr"></em></a></li>
<?php	}	?>
</ul>
</div>
<?php } ?>
  
</div>
</div>
</footer>

<?php zp_apply_filter('theme_body_close'); ?>

<?php if (getOption('sharethis_id')!='') { ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="https://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "<?php echo getOption('sharethis_id'); ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php } ?>

</body>

</html>	