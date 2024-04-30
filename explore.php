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

<h1 itemprop="name"><i class="glyphicon glyphicon-tags"></i>Tags</h1>

<?php if (getAllTagsCount() >0) { ?>
<div id="sitemap-tags">
<?php printAllTagsAs_zb('cloud', 'list', 'abc', false, true,1,1,0,null,1,getOption('paradigm_tags-nofollow')); ?>
</div>
<?php } ?>

</section>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>