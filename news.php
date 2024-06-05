<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
die();
if (class_exists('Zenpage')) {
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
// single news article
if (is_NewsArticle()) { ?>
<article itemscope itemtype="https://schema.org/Article"> 
<h1 itemprop="name"><?php printNewsTitle(); ?></h1>
<div class="news-data">
<span itemprop="datePublished"><?php printNewsDate(); ?></span>
<?php if (function_exists('getCommentCount')) { ?>
<?php echo ' | '; echo gettext_th('Comments'); echo ': '; ?><span itemprop="commentCount"><?php echo getCommentCount(); ?></span>
<?php } ?>
<?php echo ' | '; ?><span itemprop="articleSection"><?php printNewsCategories(',',gettext_th('Categories:'),'list-inline news-info'); ?></span>
</div>

<div id="article-content" class="content" itemprop="articleBody">
<?php if (function_exists('printFeaturedImageThumb') && getOption('paradigm_news-feat-image')) { ?>
<?php if (getOption('paradigm_news-feat-image-size') == 'thumb_size') { printFeaturedImageThumb(null,'feat-image',null,null,null); } ?>
<?php if (getOption('paradigm_news-feat-image-size') == 'image_size') { printSizedFeaturedImage(null,null,getOption('image_size'),null,null,null,null,null,null,'zenpage_fullimage',null,true,null); } ?>
<?php } ?>

<?php printNewsContent(); ?>
</div>

<?php if (getNewsExtraContent()!='') { ?>
<!-- Extra content -->
<div id="article-extra-content" class="content">
<?php printNewsExtraContent(); ?>
</div>
<?php } ?>

</article>

<!-- Previous and next articles -->

<div class="pagelist col-sm-12">
<ul class="pager">
<?php if (getPrevNewsURL()) { ?><li class="pull-left"><?php printPrevNewsLink(); ?></li>
<?php } ?>
<?php if (getNextNewsURL()) { ?><li class="pull-right"><?php printNextNewsLink(); ?></li>
<?php } ?>
</ul>
</div>

<div id="article-details" class="row">
<div id="article-info" class="col-sm-12">
<h2><i class="glyphicon glyphicon-info-sign"></i><?php echo gettext_th('Info'); ?></h2>
<?php if ((getNewsCustomData()!='') && getOption('paradigm_news-custom')){ ?>
<!-- Custom data -->
<div id="article-data" class="block">
<?php printNewsCustomData(); ?>
</div>
<?php } ?>

<?php if (getCodeBlock(1,$_zp_current_zenpage_news)!='') { ?>
<!-- Page Codeblock 1 -->
<div class="codeblock-data block">
<?php printCodeBlock(1,$_zp_current_zenpage_news); ?>
</div>
<?php } ?>
</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">
<?php if (getTags()) { ?>
<!-- Tags -->
<div id="tags" class="block">
<h3><i class="glyphicon glyphicon-tag"></i><?php echo gettext_th('Tags'); ?></h3>
<?php printTags_pd('links', '', 'taglist', ', ',getOption('paradigm_tags-nofollow')); ?>
</div>
<?php } ?>

<?php if (function_exists('getHitCounter') && getOption('paradigm_news-hitcounter')){ ?>
<!-- Hitcounter -->
<div id="hitcounter" class="block">
<h3><i class="glyphicon glyphicon-eye-open"></i><?php echo gettext_th('Other info'); ?></h3>
<p><strong><?php echo gettext_th('Views:'); ?></strong> <?php echo gethitcounter(); ?></p>
</div>
<?php } ?>

</div>

<div class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-3 col-lg-4 '; } ?>col-sm-6">

<?php if (extensionEnabled('rating') && getOption('paradigm_news-rating')) { ?>
<!-- Rating -->
<div id="rating" class="block">
<h3><i class="glyphicon glyphicon-star"></i><?php echo gettext_th('Rating'); ?></h3>
<?php printRating(); ?>
</div>
<?php } ?>

<?php if (getCodeBlock(2,$_zp_current_zenpage_news)!='') { ?>
<!-- Page Codeblock 2 -->
<div class="codeblock-data block">
<?php printCodeBlock(2,$_zp_current_zenpage_news); ?>
</div>
<?php } ?>
</div>

 <?php if (getCodeBlock(3,$_zp_current_zenpage_news)!='') { ?>
<!-- News Codeblock 3 -->
<div id="articles-extras" class="<?php if (getOption('paradigm_full-width')) {echo 'col-xl-6 col-lg-4 '; } ?>col-sm-12">
<?php printCodeBlock(3,$_zp_current_zenpage_news); ?>
</div>
<?php } ?>

<?php if (function_exists('printRelatedItems') && getOption('paradigm_news-related-enable')) { ?>
<div id="article-related" class="col-sm-12">
<?php printRelatedItems_pd(getOption('paradigm_news-related-number'),getOption('paradigm_news-related-type'),NULL,getOption('paradigm_news-related-length'),getOption('paradigm_news-related-thumb'),getOption('paradigm_news-related-date')); ?>
</div>
<?php } ?>
 
</div>

<!-- Comments -->
<?php printCommentForm(); ?>

<?php } else { ?>

<?php if (in_context(ZP_ZENPAGE_NEWS_CATEGORY)) { ?>
<h1><i class="glyphicon glyphicon-pencil"></i>
<?php if (getOption('paradigm_nav_text-news')!='') { echo (getOption('paradigm_nav_text-news')); echo gettext_th(' category:'); ?>
<?php } else { ?>
<?php echo gettext_th('News category:');} ?> <?php printCurrentNewsCategory(); printCurrentPageAppendix(gettext_th(' (Page: '),')'); ?></h1>

<div id="news-category-caption" class="content">
<?php if (function_exists('printFeaturedImageThumb')){ ?>
<?php if (getOption('paradigm_news-feat-image-size-cat') == 'thumb_size') { printFeaturedImageThumb(null,'feat-image',null,null,null); } ?>
<?php if (getOption('paradigm_news-feat-image-size-cat') == 'image_size') { printSizedFeaturedImage(null,null,getOption('image_size'),null,null,null,null,null,null,'zenpage_fullimage',null,true,null); } ?>
<?php } ?>
<?php printNewsCategoryDesc(); ?>
</div>

<?php if ((getNewsCategoryCustomData()!='') && getOption('paradigm_news-custom')) { ?>
<div id="news-category-info" class="content">
<h2><i class="glyphicon glyphicon-info-sign"></i><?php echo gettext_th('Info'); ?></h2>
<!-- Custom data -->
<?php printNewsCategoryCustomData(); ?>
</div>
<?php } ?>

<h2><i class="glyphicon glyphicon-time"></i><?php echo gettext_th('Latest:'); ?></h2>

<?php } else if (in_context(ZP_ZENPAGE_NEWS_DATE)) { ?>

<h1><i class="glyphicon glyphicon-pencil"></i><?php printCurrentNewsArchive(gettext_th('Archive for '),'plain'); printCurrentPageAppendix(gettext_th(' (Page: '),')'); ?></h1>

<?php } else { ?>

<h1><i class="glyphicon glyphicon-pencil"></i>
<?php if (getOption('paradigm_nav_text-news')!='') { echo (getOption('paradigm_nav_text-news')); ?>
<?php } else { ?>
<?php echo gettext_th('News'); } ?><?php printCurrentPageAppendix(gettext_th(' (Page: '),')'); ?></h1>

<?php } ?>

<!-- news article loop -->
<?php while (next_news()):; ?>

<article class="news-excerpt">
<h2><?php printNewsURL(); ?></h2>

<div class="news-data">
<?php printNewsDate(); ?>
<?php if (function_exists('getCommentCount')) { ?>
<?php echo ' | '; echo gettext_th('Comments'); echo ': '; ?><?php echo getCommentCount(); ?>
<?php } ?>

<?php echo ' | '; ?><?php printNewsCategories(',',gettext_th('Categories:'),'list-inline news-info'); ?>

<?php if (getTags()) { ?>
<?php echo ' | '; ?><?php printTags_pd('links', gettext_th('Tags:'), 'list-inline news-info', ',', getOption('paradigm_tags-nofollow')); ?>
<?php } ?>
</div>

<div class="excerpt">
<?php if (function_exists('printFeaturedImageThumb')) { printFeaturedImageThumb(null,'feat-image',null,null,null); } ?>
<?php printNewsContent(); ?>
</div>

</article>

<?php endwhile; ?>

<!-- pagination -->
<?php printNewsPageListWithNav_pd(gettext_th('next »'), gettext_th('« prev'), true, 'pagelist', true); ?>
<?php } ?>

</section>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_sidebar.php'); ?>

</div>
</div>
</div>

<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_footer.php'); ?>

<?php } else { include(SERVERPATH . '/' . ZENFOLDER . '/404.php'); } ?>