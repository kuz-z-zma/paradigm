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
<section id="main" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-10 '; } ?>col-lg-9 col-md-9 col-sm-9 col-xs-12" itemprop="mainContentOfPage">

<?php
$zenpage = extensionEnabled('zenpage');
$numimages = getNumImages();
$numalbums = getNumAlbums();
$total = $numimages + $numalbums;
if ($zenpage && !isArchive()) {
$numpages = getNumPages();
$numnews = getNumNews();
$total = $total + $numnews + $numpages;
} else {
$numpages = $numnews = 0;
}
if ($total == 0) {
$_zp_current_search->clearSearchWords();
}
?>

<?php
$searchwords = getSearchWords();
$searchdate = getSearchDate();
if (!empty($searchdate)) {
if (!empty($searchwords)) {
$searchwords .= ": ";
}
$searchwords .= $searchdate;}
if ($total > 0) {
?>
<h1><i class="glyphicon glyphicon-search"></i>
<?php printf(gettext_th('Results for')); echo ':&nbsp;'; echo html_encode($searchwords); ?>
</h1>
<?php
}
if ($_zp_page == 1) { //test of zenpage searches
if ($numpages > 0) {
$number_to_show = 5;
$c = 0;
?>

<div id="page-results" class="row col-sm-12">
<h2><?php printf(gettext_th('Pages (%s)'), $numpages); ?> <small><?php printZDSearchShowMoreLink("pages", $number_to_show); ?></small></h2>
<ul class="searchresults">
<?php while (next_page()) {	$c++ ;	?>
<li<?php printZDToggleClass('pages', $c, $number_to_show); ?>>
<h3><?php printPageURL(); ?></h3>
<p class="excerpt"><?php if (getPageCustomData()!=''){ ?>
<?php echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',getPageCustomData())))); ?>
<?php echo ' '; ?><span class="readmorelink"><a href="<?php echo getPageURL(); ?>" title="<?php echo getNewsReadMore(); ?>"><?php echo getNewsReadMore(); ?></a></span> 
<?php } else { ?>
<?php echo shortenContent(strip_tags(preg_replace( "/\r|\n/", "",(str_replace('</p>',' ',getPageContent())))),getOption('paradigm_homepage-blog-length'),'...'); ?> 
<?php echo ' '; ?><span class="readmorelink"><a href="<?php echo getPageURL(); ?>" title="<?php echo getNewsReadMore(); ?>"><?php echo getNewsReadMore(); ?></a></span>
<?php } ?>
</p></li>
<?php }	?>
</ul>
</div>

<?php
}
if ($numnews > 0) {
$number_to_show = 5;
$c = 0;
?>

<div id="news-results" class="row col-sm-12">
<h2><?php printf(gettext_th('Articles (%s)'), $numnews); ?> <small><?php printZDSearchShowMoreLink("news", $number_to_show); ?></small></h2>
<ul class="searchresults">
<?php while (next_news()) { $c++;	?>
<li<?php printZDToggleClass('news', $c, $number_to_show); ?>>
<h3><?php printNewsURL(); ?></h3>
<p class="excerpt"><?php if (getNewsCustomData()!='') { ?>
<?php echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',getNewsCustomData())))); ?>
<?php echo ' '; ?><span class="readmorelink"><a href="<?php echo getNewsURL(); ?>" title="<?php echo getNewsReadMore(); ?>"><?php echo getNewsReadMore(); ?></a></span>
<?php } else { ?>
<?php echo shortenContent(strip_tags(preg_replace( "/\r|\n/", "",(str_replace('</p>',' ',getNewsContent())))),getOption('paradigm_homepage-blog-length'),'...'); ?>
<?php echo ' '; ?><span class="readmorelink"><a href="<?php echo getNewsURL(); ?>" title="<?php echo getNewsReadMore(); ?>"><?php echo getNewsReadMore(); ?></a></span><?php } ?>
</p></li>
<?php } ?>
</ul>
</div>
<?php }	?>
<?php }	?>

<h2><?php if (getOption('search_no_albums')) {
if (!getOption('search_no_images') && ($numpages + $numnews) > 0) {
printf(gettext_th('Images (%s)'), $numimages); }
} else {
if (getOption('search_no_images')) {
if (($numpages + $numnews) > 0) {
printf(gettext_th('Albums (%s)'), $numalbums); }
} else {printf(gettext_th('Albums (%1$s) &amp; Images (%2$s)'), $numalbums, $numimages); }
} ?></h2>

<?php if (getNumAlbums() != 0) { ?>
<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_albumlist.php'); ?>
<?php } ?>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_imagethumbs.php'); ?>

<?php if ($total == 0) { ?>
<div id="caption" class="content">Sorry, no matches found. Try refining your search.</div>
<?php } ?>

<?php printPageListWithNav("« " . gettext_th("prev"), gettext_th("next") . " »"); ?>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>
</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>