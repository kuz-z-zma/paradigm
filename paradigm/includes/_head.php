<html lang="<?php echo getOption('locale');?>">

<head>
<?php
	if (getOption('analytics_code')!='') { ?>
	<!-- Analytics -->
	<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_analyticstracking.php'); ?>
<?php } ?> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php $searchwords = getSearchWords();?>
<?php $searchdate = getSearchDate();?>

<!-- meta -->

<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
<title><?php if ($_zp_gallery_page == 'index.php') {echo getGalleryTitle(); }
	else {
	if ($_zp_gallery_page == 'album.php') {echo getBareAlbumTitle(); if ($_zp_page > 1) {echo ' (Page ' . $_zp_page . ')'; }echo ' | ';}
	if (($_zp_gallery_page == 'gallery.php') && (getOption('paradigm_nav_text-gallery')!='')) {echo (getOption('paradigm_nav_text-gallery')); if ($_zp_page > 1) {echo ' (Page ' . $_zp_page . ')';}echo ' | '; }
	if (($_zp_gallery_page == 'gallery.php') && (getOption('paradigm_nav_text-gallery') == '')) {echo gettext_th('Gallery'); if ($_zp_page > 1) {echo ' (Page ' . $_zp_page . ')';}echo ' | '; }
	if ($_zp_gallery_page == '404.php') {echo gettext_th('Object not found'); echo ' | '; }
	if ($_zp_gallery_page == 'archive.php') {echo gettext_th('Archive View'); echo ' | '; }
	if ($_zp_gallery_page == 'contact.php') {echo gettext_th('Contact'); echo ' | '; }
	if ($_zp_gallery_page == 'favorites.php') {echo gettext_th('My favorites'); if ($_zp_page > 1) {echo ' (Page ' . $_zp_page . ')'; }echo ' | '; }
	if ($_zp_gallery_page == 'image.php') {echo getBareImageTitle() . ' - photo ' . imageNumber() . ' from album ' . getBareAlbumTitle(); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (is_NewsPage()) && (getOption('paradigm_nav_text-news')!='') && (!is_NewsCategory()) && (!is_NewsArticle())) {echo (getOption('paradigm_nav_text-news')); printCurrentPageAppendix(' (Page ', ')'); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (is_NewsPage()) && (getOption('paradigm_nav_text-news') =='') && (!is_NewsCategory()) && (!is_NewsArticle())) {echo gettext_th('News'); printCurrentPageAppendix(' (Page ', ')'); echo ' | ';}
	if (($_zp_gallery_page == 'news.php') && (getOption('paradigm_nav_text-news')!='') && (is_NewsCategory())) {printCurrentNewsCategory(); echo ' | '; echo (getOption('paradigm_nav_text-news')); printCurrentPageAppendix(' (Page ', ')'); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (getOption('paradigm_nav_text-news') =='') && (is_NewsCategory())) {printCurrentNewsCategory(); echo ' | '; echo gettext_th('News'); printCurrentPageAppendix(' (Page ', ')'); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (getOption('paradigm_nav_text-news')!='') && (is_NewsArticle())) {echo getBareNewsTitle(); echo ' | '; echo (getOption('paradigm_nav_text-news')); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (getOption('paradigm_nav_text-news') =='') && (is_NewsArticle())) {echo getBareNewsTitle(); echo ' | '; echo gettext_th('News'); echo ' | '; }
	if ($_zp_gallery_page == 'pages.php') {echo getBarePageTitle(); echo ' | '; }
	if ($_zp_gallery_page == 'password.php') {echo gettext_th('Password required'); echo ' | '; }
	if ($_zp_gallery_page == 'register.php') {echo gettext_th('Register'); echo ' | '; }
	if ($_zp_gallery_page == 'credits.php') {echo gettext_th('Credits'); echo ' | '; }
	if ($_zp_gallery_page == 'explore.php') {echo gettext_th('Explore'); echo ' | '; }
	if ($_zp_gallery_page == 'sitemap.php') {echo gettext_th('Sitemap'); echo ' | '; }
	if ($_zp_gallery_page == 'search.php') {echo html_encode($searchwords); echo html_encode($searchdate); echo ' | '; }
	echo getParentSiteTitle(); } ?></title>
<?php if (($_zp_gallery_page == 'image.php') && getImageCustomData()!='') { echo '<meta name="description" content="'; echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',getImageCustomData())))); echo '"/>'; }
	elseif (($_zp_gallery_page == 'image.php') && getBareImageDesc()!='') { echo '<meta name="description" content="'; echo getBareImageDesc(); echo '"/>'; }
	elseif ($_zp_gallery_page == 'image.php') { echo '<meta name="description" content="'; echo getBareImageTitle() . ' - photo ' . imageNumber() . ' from album ' . getBareAlbumTitle(); echo '"/>'; }	?>
<?php if (($_zp_gallery_page == 'album.php') && getAlbumCustomData()!='') {echo '<meta name="description" content="'; echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',getAlbumCustomData())))); echo '"/>'; }
	elseif (($_zp_gallery_page == 'album.php') && getBareAlbumDesc()!='') {echo '<meta name="description" content="'; echo getBareAlbumDesc(); echo '"/>'; }
	elseif ($_zp_gallery_page == 'album.php') { echo '<meta name="description" content="'; echo getBareAlbumTitle(); echo ' photos"/>'; }
	if (($_zp_gallery_page == 'index.php') && getBareGalleryDesc()!='') {echo '<meta name="description" content="'; echo getBareGalleryDesc(); echo'"/>'; }
	if (($_zp_gallery_page == 'news.php') && getNewsCustomData()!='') {echo '<meta name="description" content="'; echo getNewsCustomData(); echo'"/>'; }
	if (($_zp_gallery_page == 'gallery.php') && getBareAlbumDesc()!='') {echo '<meta name="description" content="'; echo getBareAlbumDesc(); echo '"/>'; }
	if (($_zp_gallery_page == 'pages.php') && getPageCustomData()!='') {echo '<meta name="description" content="'; echo strip_tags(preg_replace( "/\r|\n/", "",(str_replace('<br>','. ',getPageCustomData())))); echo '"/>'; }	
	if ($_zp_gallery_page == 'search.php') {echo '<meta name="description" content="Photos of '; echo html_encode($searchwords); echo html_encode($searchdate);echo '"/>'; } ?>

<?php if (getOption ('paradigm_meta-tags-noindex') && $_zp_gallery_page == 'search.php') {echo '<meta name="robots" content="noindex, follow">'; }
	elseif (getOption ('paradigm_meta-tags-noindex') && $_zp_gallery_page == 'explore.php') {echo '<meta name="robots" content="noindex, nofollow">'; }
	elseif (getOption ('paradigm_meta-archive-noindex') && $_zp_gallery_page == 'archive.php') {echo '<meta name="robots" content="noindex, follow">'; }
	elseif (isset($_GET["page"]) && $_zp_gallery_page == 'favorites.php' || $_zp_gallery_page == 'password.php' || $_zp_gallery_page == 'register.php' || $_zp_gallery_page == 'contact.php' || $_zp_gallery_page == '404.php') {
	echo '<meta name="robots" content="noindex, follow">';
} else {echo '<meta name="robots" content="index, follow">'; } ?>

<link rel="canonical" href="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>"/>

<!-- Open Graph -->

<meta property="og:title" content="<?php if (($_zp_gallery_page == 'index.php')) {echo gettext_th('Home') . ' | '; }
	if ($_zp_gallery_page == 'album.php') {echo getBareAlbumTitle(); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; } echo ' | '; }
	if ($_zp_gallery_page == 'gallery.php') {echo gettext_th('Albums'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; } echo ' | '; }
	if ($_zp_gallery_page == '404.php') {echo gettext_th('Object not found'); echo ' | '; }
	if ($_zp_gallery_page == 'archive.php') {echo gettext_th('Archive View'); echo ' | '; }
	if ($_zp_gallery_page == 'contact.php') {echo gettext_th('Contact'); echo ' | '; }
	if ($_zp_gallery_page == 'favorites.php') {echo gettext_th('My favorites'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; } echo ' | '; }
	if ($_zp_gallery_page == 'image.php') {echo getBareImageTitle() . ' | ' . getBareAlbumTitle(); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (is_NewsPage())&& (!is_NewsCategory())&& (!is_NewsArticle())) {echo gettext_th('Blog'); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (is_NewsCategory())) {printCurrentNewsCategory(); echo ' | '; echo gettext_th('Blog'); echo ' | '; }
	if (($_zp_gallery_page == 'news.php') && (is_NewsArticle())) {echo getBareNewsTitle(); echo ' | '; echo gettext_th('Blog'); echo ' | '; }
	if ($_zp_gallery_page == 'pages.php') {echo getBarePageTitle(); echo ' | ';}
	if ($_zp_gallery_page == 'password.php') {echo gettext_th('Password required'); echo ' | '; }
	if ($_zp_gallery_page == 'register.php') {echo gettext_th('Register'); echo ' | '; }
	if ($_zp_gallery_page == 'search.php') {echo gettext_th('Search'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; } echo ' | '; }
	echo getParentSiteTitle(); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<?php if (($_zp_gallery_page == 'image.php') && getImageCustomData()!='') { echo '<meta property="og:description" content="'; echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getImageCustomData())))); echo '" />'; }
	elseif (($_zp_gallery_page == 'image.php') && getBareImageDesc()!='') { echo '<meta property="og:description" content="'; echo getBareImageTitle(); echo '"/>'; }
if (($_zp_gallery_page == 'album.php') && getAlbumCustomData()!='') {echo '<meta property="og:description" content="'; echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getAlbumCustomData())))); echo '" />'; }
	elseif (($_zp_gallery_page == 'album.php') && getBareAlbumDesc()!='') {echo '<meta property="og:description" content="'; echo getBareAlbumDesc(); echo '"/>'; }
if ((($_zp_gallery_page == 'news.php') && (is_NewsArticle()) && getNewsCustomData()!='')) {echo '<meta property="og:description" content="';echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getNewsCustomData())))); echo '" />'; }
	elseif (($_zp_gallery_page == 'news.php') && (is_NewsArticle())) {echo '<meta property="og:description" content="'; echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('</p>',' ',getNewsContent(120))))); echo '"/>'; }
if ((($_zp_gallery_page == 'pages.php') && (is_Pages()) && getPageCustomData()!='')) {echo '<meta property="og:description" content="';echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getPageCustomData()))));; echo '" />'; } ?>
<meta property="og:site_name" content="<?php echo getParentSiteTitle(); ?>" />
<?php if ($_zp_gallery_page == 'image.php' && ($_zp_current_image->isPhoto())) {echo '<meta property="og:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getFullImageURL()); echo '" />'; }
	elseif ($_zp_gallery_page == 'image.php' && !($_zp_current_image->isPhoto())) {echo '<meta property="og:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getImageThumb()); echo '" />'; }
	elseif ($_zp_gallery_page == 'album.php') {echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo getCustomAlbumThumb(Null, 800); echo '" />'; }
	elseif ((($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'news.php')||($_zp_gallery_page == 'pages.php')) && (getOption('paradigm_logo-preview') != '')) { echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/design/"); echo (getOption('paradigm_logo-preview')); echo '" />'; }
	elseif ((($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'news.php')||($_zp_gallery_page == 'pages.php')) && (getOption('paradigm_logo') != '')) { echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/design/"); echo (getOption('paradigm_logo')); echo '" />'; } ?>

<!-- twitter cards -->

<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {echo '@'; echo getOption('twitter_profile'); } ?>"/>
<meta name="twitter:creator" content="<?php if (getOption('twitter_profile')!='') {echo '@'; echo getOption('twitter_profile');	} ?>"/>
<?php if (($_zp_gallery_page == 'image.php') && ($_zp_current_image->isPhoto())) { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php printImageTitle(); ?>" />
<meta name="twitter:description" content="<?php echo getBareImageTitle(); ?> <?php echo getBareImageDesc(); ?>" />
<?php } ?>
<?php if (($_zp_gallery_page == 'image.php') && !($_zp_current_image->isPhoto())) { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php printImageTitle(); ?>" />
<meta name="twitter:description" content="<?php echo getBareImageDesc(); ?>" />
<?php } ?>
<?php if ($_zp_gallery_page == 'album.php') { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php printAlbumTitle(); echo (' '); echo gettext_th('album');?>" />
<meta name="twitter:description" content="<?php if (getAlbumCustomData()!='') { echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getAlbumCustomData())))); } else {echo getBareAlbumDesc();} ?>" />
<?php } ?>
<?php if ((($_zp_gallery_page == 'news.php') && (is_NewsArticle()) )) { ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo getBareNewsTitle() ?>" />
<meta name="twitter:description" content="<?php if (getNewsCustomData()!='') {echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getNewsCustomData())))); } else {echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('</p>',' ',getNewsContent(120)))));} ?>" />
<?php } ?>
<?php if ((($_zp_gallery_page == 'pages.php') && (is_Pages()) )) { ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo getBarePageTitle() ?>" />
<?php if (getPageCustomData()!='') {echo '<meta name="twitter:description" content="'; echo strip_tags(preg_replace( "/\r|\n/","",(str_replace('<br>','. ',getPageCustomData())))); echo '" />'; } ?>
<?php } ?>
<?php if (($_zp_gallery_page == 'index.php')) { ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo gettext_th('Home') . ' | '; echo getParentSiteTitle(); ?>" />
<meta name="twitter:description" content="<?php printBareGalleryDesc(); ?>" />
<?php } ?>

<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<?php if ($_zp_gallery_page == 'image.php' && ($_zp_current_image->isPhoto())) {echo '<meta property="twitter:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getFullImageURL()); echo '" />'; }
elseif ($_zp_gallery_page == 'image.php' && !($_zp_current_image->isPhoto())) {echo '<meta property="twitter:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getImageThumb()); echo '" />'; }
elseif ($_zp_gallery_page == 'album.php') {echo '<meta property="twitter:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo getCustomAlbumThumb(Null, 800); echo '" />'; }
elseif ((($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'news.php')||($_zp_gallery_page == 'pages.php')) && (getOption('paradigm_logo-preview') != '')) { echo '<meta property="twitter:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/design/"); echo (getOption('paradigm_logo-preview')); echo '" />'; }
elseif ((($_zp_gallery_page == 'index.php')||($_zp_gallery_page == 'news.php')||($_zp_gallery_page == 'pages.php')) && (getOption('paradigm_logo') != '')) { echo '<meta property="twitter:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/design/"); echo (getOption('paradigm_logo')); echo '" />'; } ?>


<!-- css -->

<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/bootstrap.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/site.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/icons.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/slimbox2.css" type="text/css" media="screen"/>
<?php if (getOption('paradigm_css-custom') != '') { ?>
<link rel="stylesheet" href="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/design/"); echo (getOption('paradigm_css-custom')); ?>.css" type="text/css" media="screen"/>
<?php } ?>

<!-- favicon -->

<link rel="shortcut icon" href="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo '/favicon.ico'; ?>">

<!-- js -->

<script src="<?php echo $_zp_themeroot; ?>/js/bootstrap.js" type="text/javascript" defer></script>
<script src="<?php echo $_zp_themeroot; ?>/js/slimbox2-ar.js" type="text/javascript" defer></script>

<!-- rss -->

<?php if (class_exists('RSS') && getOption('RSS_album_image')) { printRSSHeaderLink('Gallery', 'RSS Images'); } ?>
<?php if (class_exists('RSS') && getOption('RSS_album_image')) { printRSSHeaderLink('AlbumsRSS','RSS Albums'); } ?>
<?php if (class_exists('RSS') && getOption('RSS_articles')) printRSSHeaderLink('News','RSS News'); ?>
<?php if (class_exists('RSS') && getOption('RSS_pages')) printRSSHeaderLink('Pages','RSS Pages'); ?>

<?php zp_apply_filter('theme_head'); ?>
</head>