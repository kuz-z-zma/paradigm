<html lang="<?php echo getOption('locale');?>">

<head>
<?php
	if (getOption('analytics_code')!='') { ?>
	<!-- Analytics -->
	<?php include(SERVERPATH . '/' . THEMEFOLDER . '/paradigm/includes/_analyticstracking.php'); ?>
<?php	} ?> 
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php $searchwords = getSearchWords();?>
<?php $searchdate = getSearchDate();?>

<!-- meta -->

<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />

<title>
<?php
	if ($_zp_gallery_page == 'index.php') {echo getGalleryTitle();}
	else {
	if ($_zp_gallery_page == 'album.php') {echo getBareAlbumTitle(); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }echo ' | ';}
	if ($_zp_gallery_page == 'gallery.php') {echo gettext('Gallery'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']';}echo ' | ';}
	if ($_zp_gallery_page == '404.php') {echo gettext('Object not found'); echo ' | ';}
	if ($_zp_gallery_page == 'archive.php') {echo gettext('Archive View'); echo ' | ';}
	if ($_zp_gallery_page == 'contact.php') {echo gettext('Contact'); echo ' | ';}
	if ($_zp_gallery_page == 'favorites.php') {echo gettext('My favorites'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }echo ' | ';}
	if ($_zp_gallery_page == 'image.php') {echo getBareImageTitle() . ' - photo from album ' . getBareAlbumTitle(); echo ' | ';}
	if (($_zp_gallery_page == 'news.php') && (is_NewsPage())&& (!is_NewsCategory())&& (!is_NewsArticle())) {echo gettext('Blog'); echo ' | ';}	
	if (($_zp_gallery_page == 'news.php') && (is_NewsCategory())) {printCurrentNewsCategory(); echo ' | '; echo gettext('Blog'); echo ' | ';}	
	if (($_zp_gallery_page == 'news.php') && (is_NewsArticle())) {echo getBareNewsTitle(); echo ' | '; echo gettext('Blog'); echo ' | ';}
	if ($_zp_gallery_page == 'pages.php') {echo getBarePageTitle(); echo ' | ';}
	if ($_zp_gallery_page == 'password.php') {echo gettext('Password required'); echo ' | ';}
	if ($_zp_gallery_page == 'register.php') {echo gettext('Register'); echo ' | ';}
	if ($_zp_gallery_page == 'credits.php') {echo gettext('Credits'); echo ' | ';}
	if ($_zp_gallery_page == 'explore.php') {echo gettext('Explore'); echo ' | ';}
	if ($_zp_gallery_page == 'sitemap.php') {echo gettext('Sitemap'); echo ' | ';}	
	if ($_zp_gallery_page == 'search.php') {echo html_encode($searchwords); echo html_encode($searchdate); echo ' | ';}
	echo getParentSiteTitle();}
	?>
</title>

<?php
	if (($_zp_gallery_page == 'image.php') && getImageCustomData()!='') { echo '<meta name="Description" content="'; echo getImageCustomData(); echo '"/>'; }
	elseif (($_zp_gallery_page == 'image.php') && getBareImageDesc()!='') { echo '<meta name="Description" content="'; echo getBareImageDesc(); echo '"/>'; }
	elseif ($_zp_gallery_page == 'image.php') { echo '<meta name="Description" content="'; echo getBareImageTitle(); echo '"/>'; }
	?>
	
	<?php
	if (($_zp_gallery_page == 'album.php') && getAlbumCustomData()!='') {echo '<meta name="Description" content="'; echo getAlbumCustomData(); echo '"/>';}	
		elseif (($_zp_gallery_page == 'album.php') && getBareAlbumDesc()!='') {echo '<meta name="Description" content="'; echo getBareAlbumDesc(); echo '"/>';}
	if (($_zp_gallery_page == 'index.php') && getBareGalleryDesc()!='') {echo '<meta name="Description" content="'; echo getBareGalleryDesc(); echo'"/>';}
	if (($_zp_gallery_page == 'news.php') && getNewsCustomData()!='') {echo '<meta name="Description" content="'; echo getNewsCustomData(); echo'"/>';}	
	if (($_zp_gallery_page == 'gallery.php') && getBareAlbumDesc()!='') {echo '<meta name="Description" content="'; echo getBareAlbumDesc(); echo '"/>';}
	if (($_zp_gallery_page == 'pages.php') && getPageCustomData()!='') {echo '<meta name="Description" content="'; echo getPageCustomData(); echo '"/>';}	
?>


<?php 	
	if (isset($_GET["page"]) && $_zp_gallery_page == 'favorites.php' || $_zp_gallery_page == 'password.php' || $_zp_gallery_page == 'register.php' || $_zp_gallery_page == 'contact.php' || $_zp_gallery_page == 'search.php' || $_zp_gallery_page == 'archive.php' || $_zp_gallery_page == '404.php') { 
		echo '<meta name="robots" content="noindex, follow">';
	}
	else {
		echo '<meta name="robots" content="index, follow">';		
	}
?>
	
<link rel="canonical" href="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>"/>
	
<!-- Open Graph -->

<meta property="og:title" content="<?php
	if (($_zp_gallery_page == 'index.php')) {echo gettext('Home') . ' | '; }
	if ($_zp_gallery_page == 'album.php') {echo getBareAlbumTitle(); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }echo ' | ';}
	if ($_zp_gallery_page == 'gallery.php') {echo gettext('Albums'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']';}echo ' | ';}
	if ($_zp_gallery_page == '404.php') {echo gettext('Object not found'); echo ' | ';}
	if ($_zp_gallery_page == 'archive.php') {echo gettext('Archive View'); echo ' | ';}
	if ($_zp_gallery_page == 'contact.php') {echo gettext('Contact'); echo ' | ';}
	if ($_zp_gallery_page == 'favorites.php') {echo gettext('My favorites'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }echo ' | ';}
	if ($_zp_gallery_page == 'image.php') {echo getBareImageTitle() . ' | ' . getBareAlbumTitle(); echo ' | ';}
	if (($_zp_gallery_page == 'news.php') && (is_NewsPage())&& (!is_NewsCategory())&& (!is_NewsArticle())) {echo gettext('Blog'); echo ' | ';}	
	if (($_zp_gallery_page == 'news.php') && (is_NewsCategory())) {printCurrentNewsCategory(); echo ' | '; echo gettext('Blog'); echo ' | ';}	
	if (($_zp_gallery_page == 'news.php') && (is_NewsArticle())) {echo getBareNewsTitle(); echo ' | '; echo gettext('Blog'); echo ' | ';}
	if ($_zp_gallery_page == 'pages.php') {echo getBarePageTitle(); echo ' | ';}
	if ($_zp_gallery_page == 'password.php') {echo gettext('Password required'); echo ' | ';}
	if ($_zp_gallery_page == 'register.php') {echo gettext('Register'); echo ' | ';}
	if ($_zp_gallery_page == 'search.php') {echo gettext('Search'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']';} echo ' | ';}
	echo getParentSiteTitle();
	?>" />	
<meta property="og:type" content="article" /> 
<meta property="og:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" /> 
<?php
	if ($_zp_gallery_page == 'image.php' && ($_zp_current_image->isPhoto())) {echo '<meta property="og:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getDefaultSizedImage()); echo '" />
';}
	if ($_zp_gallery_page == 'image.php' && !($_zp_current_image->isPhoto())) {echo '<meta property="og:image" content="';echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getImageThumb()); echo '" />
';}
	if ($_zp_gallery_page == 'album.php') {echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo getCustomAlbumThumb(Null, 800);; echo '" />
';}
	if ($_zp_gallery_page == 'index.php' && (getOption('zenphoto_logo') != '')) { echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/"); echo (getOption('zenphoto_logo')); echo '" />'; }	else {echo '<meta property="og:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/"); echo 'logo.png" /> ';		
	} ?>
<?php
if (($_zp_gallery_page == 'image.php') && getImageCustomData()!='') { echo '<meta property="og:description" content="'; echo getImageCustomData(); echo '"/>'; }
	elseif (($_zp_gallery_page == 'image.php') && getBareImageDesc()!='') { echo '<meta property="og:description" content="'; echo getBareImageTitle(); echo '"/>'; }
if (($_zp_gallery_page == 'album.php') && getAlbumCustomData()!='') {echo '<meta property="og:description" content="'; echo getAlbumCustomData(); echo '"/>';}	
	elseif (($_zp_gallery_page == 'album.php') && getBareAlbumDesc()!='') {echo '<meta property="og:description" content="'; echo getBareAlbumDesc(); echo '"/>';}	
if ((($_zp_gallery_page == 'news.php') && (is_NewsArticle()) && getNewsCustomData()!=''))  {echo '<meta property="og:description" content="';echo getNewsCustomData(); echo '" />
';}
?>
<meta property="og:site_name" content="<?php echo getParentSiteTitle(); ?>" />


<!-- twitter cards -->
<?php if (($_zp_gallery_page == 'index.php')) { ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:title" content="<?php echo gettext('Home') . ' | '; echo getParentSiteTitle(); ?>" />
<meta name="twitter:description" content="<?php printBareGalleryDesc(); ?>"  />
<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<?php	} ?> 
<?php if ($_zp_gallery_page == 'index.php' && (getOption('zenphoto_logo') != '')) { echo '<meta property="twitter:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/"); echo (getOption('zenphoto_logo')); echo '" />'; }	else {echo '<meta property="twitter:image" content="'; echo (PROTOCOL."://".$_SERVER['HTTP_HOST']."/".UPLOAD_FOLDER."/"); echo 'logo.png" /> ';		
	} ?>
<?php if (($_zp_gallery_page == 'image.php')  && ($_zp_current_image->isPhoto())) { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:creator" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>	
<meta name="twitter:title" content="<?php printImageTitle(); ?>" />
<meta name="twitter:description" content="<?php echo getBareImageTitle(); ?> <?php echo getBareImageDesc(); ?>" />
<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<meta name="twitter:image" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getDefaultSizedImage()); ?>" />
<?php	} ?>
<?php if (($_zp_gallery_page == 'image.php')  && !($_zp_current_image->isPhoto())) { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:creator" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>	
<meta name="twitter:title" content="<?php printImageTitle(); ?>" />
<meta name="twitter:description" content="<?php echo getBareImageDesc(); ?>" />
<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<meta name="twitter:image" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo (getImageThumb()); ?>" />
<?php	} ?>
<?php if ($_zp_gallery_page == 'album.php') { ?>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:creator" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:title" content="<?php printAlbumTitle(); echo (' '); echo gettext('album');?>" />
<meta name="twitter:description" content="<?php if (getAlbumCustomData()!='') { echo getAlbumCustomData(); } else {echo getBareAlbumDesc();} ?>" />
<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />
<meta name="twitter:image" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo getCustomAlbumThumb(Null, 800); ?>" />
<?php	} ?>
<?php if ((($_zp_gallery_page == 'news.php') && (is_NewsArticle()) ))  { ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="<?php if (getOption('twitter_profile')!='') {
	echo '@';
	echo getOption('twitter_profile');
	}
	?>"/>
<meta name="twitter:title" content="<?php echo getBareNewsTitle() ?>" />
<?php if ( getNewsCustomData()!='')  {echo '<meta name="twitter:description" content="';echo getNewsCustomData(); echo '" />';} ?>

<meta name="twitter:url" content="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>" />

<?php	} ?> 


<!-- css -->

<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/bootstrap.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/site.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/icons.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/slimbox2.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/custom.css" type="text/css" media="screen"/>


<!-- favicon -->

<link rel="shortcut icon" href="<?php echo (PROTOCOL."://".$_SERVER['HTTP_HOST']); echo '/favicon.ico'; ?>">


<!-- js -->

<script src="<?php echo $_zp_themeroot; ?>/js/bootstrap.js" type="text/javascript" defer></script>
<script src="<?php echo $_zp_themeroot; ?>/js/slimbox2-ar.js" type="text/javascript" defer></script>


<!-- rss -->

<?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
<?php if (class_exists('RSS')) printRSSHeaderLink("News", "Zenpage news", ""); ?>
	
<?php zp_apply_filter('theme_head'); ?>

</head>