<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
die();
?>
<!DOCTYPE html>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_head.php'); ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_header.php'); ?>

<div id="background-main" class="background">
<div class="container<?php if (getOption('paradigm_full-width')) {echo '-fluid';}?>">

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_breadcrumbs.php'); ?>

<div id="center" class="row">
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">

<div id="caption" class="content" itemprop="description"><strong><?php echo gettext_th("A password is required for the page you requested"); ?></strong></div>

<div id="password-form"><?php printPasswordForm('', true, false); ?></div>

<div><?php if (!zp_loggedin() && function_exists('printRegisterURL') && $_zp_gallery->isUnprotectedPage('register')) { ?>
<?php printRegisterURL(gettext_th('Register for this site'), '<br />'); ?>
<?php } ?>
</div>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>