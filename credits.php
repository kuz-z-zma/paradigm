<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
die();
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row" itemscope itemtype="https://schema.org/ContactPage">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">
<h1 itemprop="name"><i class="glyphicon glyphicon-copyright-mark"></i><?php echo gettext_th('Credits'); ?></h1>

<h2><?php echo gettext_th('Copyright'); ?></h2>

<?php if (getOption('paradigm_copyright_message') != '') { ?>
<div class="image-copy-full" itemprop="copyrightHolder">
<?php echo getOption('paradigm_copyright_message'); ?>
</div>
<?php } else { ?>
<p itemprop="copyrightHolder"><strong><?php echo gettext_th('Copyright:'); ?></strong> <?php printCopyrightNotice(); ?> &#169; <?php echo date('Y'); ?>.</p>
<?php } ?>

<h2>Zenphoto</h2>

<p><?php echo gettext_th('This website is based on <a href="https://www.zenphoto.org/" rel="nofollow" target="_blank">Zenphoto</a>, the simple media website CMS.'); ?></p>
<p><strong><?php echo gettext_th('Theme used:'); ?></strong> <?php echo gettext_th('<a href="https://www.blog.private-universe.net/web-and-tech/zenphoto-theme-paradigm/" rel="nofollow" target="_blank" title="Paradigm Zenphoto theme">Paradigm</a>.'); ?></p>
<p><?php echo gettext_th('This theme was originally created by Olivier Ffrench (<a href="http://www.france-in-photos.com" rel="nofollow">France in Photos</a>).'); ?></p>
<p><?php echo gettext_th('Since Paradigm v1.2 this theme is developed by kuzzzma (<a href="https://www.blog.private-universe.net/web-and-tech/zenphoto-theme-paradigm/" rel="nofollow">Private Universe</a>).'); ?></p>
</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>		

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
