<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
die();
if (class_exists('favorites')) {
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid'; } ?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row" itemscope itemtype="https://schema.org/ImageGallery">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">

<h1 itemprop="name"><i class="glyphicon glyphicon-heart"></i><?php printAlbumTitle(); ?></h1>

<div id="caption" class="content" itemprop="description"><?php printAlbumDesc(); ?></div>

<!-- Favourite albums -->
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_albumlist.php'); ?>

<!-- Favourite images -->
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_imagethumbs.php'); ?>

<?php printPageListWithNav("« " . gettext_th("prev"), gettext_th("next") . " »"); ?>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>

<?php } else { include(SERVERPATH . '/' . THEMEFOLDER  . '/paradigm/404.php'); } ?>