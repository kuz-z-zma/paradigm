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

<div id="center" class="row" itemscope itemtype="https://schema.org/WebPage">

<?php if (getOption('paradigm_archive-sidebar')) { ?>
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">
<?php } else { ?>
<section id="main" class="col-xs-12"itemprop="mainContentOfPage">
<?php } ?>

<h1><i class="glyphicon glyphicon-calendar"></i><?php echo gettext_th('Archive'); ?></h1>

<?php if (function_exists("printNewsArchive")) { ?>
<div id="news-archive">
<h2><?php echo gettext_th('News archive'); ?></h2>
<div class="columns">
<?php printNewsArchive('archive','year','month','archive-active',false,'asc'); ?>
</div>
</div>
<?php } ?>

<div id="album-archive">
<h2 itemprop="name"><?php echo gettext_th('Gallery archive'); ?></h2>
<div class="columns">
<?php printAllDates('archive','year','month','asc'); ?>
</div>
</div>

</section>

<?php if (getOption('paradigm_archive-sidebar')) { ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
<?php } ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>