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

<div id="center" class="row" itemscope itemtype="https://schema.org/AboutPage">
<section id="main" class="col-xs-12" itemprop="mainContentOfPage">

<h1 itemprop="name"><i class="glyphicon glyphicon-list"></i><?php echo gettext_th('Sitemap'); ?></h1>

<?php if (function_exists("printAllNewsCategories") && (getNumNews(true))) { ?>
<div id="news-results">
<h2><i class="glyphicon glyphicon-pencil"></i><?php echo gettext_th("News categories"); ?></h2>
<div id="sitemap-news-output">
<?php printAllNewsCategories("",false,"nav-local-news","open",true,"submenu","open", "list", true,""); ?>
</div>
</div>
<?php } ?>

<?php if (function_exists("printPageMenu") && (getNumPages(true))) { ?>
<div id="page-results">
<h2><i class="glyphicon glyphicon-list-alt"></i><?php echo gettext_th('Pages'); ?></h2>
<div id="sitemap-pages-output">
<?php printPageMenu("list","nav-local-pages", "open", "submenu", "open", "", true); ?>
</div>
</div>
<?php } ?>

<?php if(function_exists("printAlbumMenu")) { ?>
<div id="albums-results">
<h2><i class="glyphicon glyphicon-folder-close"></i><?php echo gettext_th('Albums'); ?></h2>
<div id="sitemap-albums-output">
<?php printAlbumMenu("list", false, "sitemap-albums", "open", "sitemap-submenu", "open", "", true , false, false); ?>
</div>
</div>
<?php } else { ?>
<p><?php echo gettext_th('Enable <strong>Print Album Menu</strong> plugin to get list of albums.'); ?></p>
<?php } ?>

</section>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>
