<?php
// force UTF-8 Ø
/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 *
 */
 
class ThemeOptions {

	function __construct() {
		$me = basename(dirname(__FILE__));
		setThemeOptionDefault('albums_per_row', 4);
		setThemeOptionDefault('albums_per_page', 12);
		setThemeOptionDefault('images_per_row', 5);
		setThemeOptionDefault('images_per_page', 20);
		setThemeOptionDefault('thumb_size', 240);
		setThemeOptionDefault('thumb_crop', 0);
		setThemeOptionDefault('thumb_crop_width', 240);
		setThemeOptionDefault('thumb_crop_height', 240);
		setThemeOptionDefault('image_size', 800);
		setThemeOptionDefault('image_use_side', 'longest');
		setThemeOptionDefault('custom_index_page', 'gallery');

		setOptionDefault('gmap_width', '100%');
		setOptionDefault('htmlmeta_name-title', 0);
		setOptionDefault('htmlmeta_name-description', 0);
		setOptionDefault('htmlmeta_canonical-url', 0);
		setOptionDefault('htmlmeta_opengraph', 0);
		setOptionDefault('htmlmeta_twittercard', 0);

		setThemeOptionDefault('paradigm_lightbox', false);
		setThemeOptionDefault('paradigm_nav_menu-albums', true);
		setThemeOptionDefault('paradigm_nav_menu-news', true);
		setThemeOptionDefault('paradigm_nav_menu-pages', true);
		setThemeOptionDefault('paradigm_logo', '');
		setThemeOptionDefault('paradigm_tagline', false);
		setThemeOptionDefault('paradigm_search', true);
		setThemeOptionDefault('paradigm_homepage-message', false);
		setThemeOptionDefault('paradigm_homepage-slideshow-number', '5');
		setThemeOptionDefault('paradigm_homepage-blog-number', '4');
		setThemeOptionDefault('paradigm_homepage-blog-length', 250);
		setThemeOptionDefault('paradigm_homepage-albums-desc', true);
		setThemeOptionDefault('paradigm_homepage-albums-desc-length', 250);
		setThemeOptionDefault('paradigm_homepage-image-number', '8');
		setThemeOptionDefault('paradigm_nav_menu-archive', true);
		setThemeOptionDefault('paradigm_nav_footer-archive', true);
		setThemeOptionDefault('paradigm_archive-sidebar', true);
		setThemeOptionDefault('paradigm_album-related-enable',true);
		setThemeOptionDefault('paradigm_album-related-thumb',true);
		setThemeOptionDefault('paradigm_album-related-date',true);
		setThemeOptionDefault('paradigm_album-related-number',4);
		setThemeOptionDefault('paradigm_album-related-type','albums');
		setThemeOptionDefault('paradigm_album-related-length','');
		setThemeOptionDefault('paradigm_image-caption', 'below');
		setThemeOptionDefault('paradigm_image-download', false);
		setThemeOptionDefault('paradigm_image-related-enable',true);
		setThemeOptionDefault('paradigm_image-related-thumb',true);
		setThemeOptionDefault('paradigm_image-related-date',true);
		setThemeOptionDefault('paradigm_image-related-number',4);
		setThemeOptionDefault('paradigm_image-related-type','images');
		setThemeOptionDefault('paradigm_image-related-length','');
		setThemeOptionDefault('paradigm_news-feat-image-size', 'thumb_size');
		setThemeOptionDefault('paradigm_news-feat-image-size-cat', 'thumb_size');
		setThemeOptionDefault('paradigm_news-related-enable',true);
		setThemeOptionDefault('paradigm_news-related-thumb',true);
		setThemeOptionDefault('paradigm_news-related-date',true);
		setThemeOptionDefault('paradigm_news-related-number',3);
		setThemeOptionDefault('paradigm_news-related-type','news');
		setThemeOptionDefault('paradigm_news-related-length',250);
		setThemeOptionDefault('paradigm_page-feat-image-size', 'thumb_size');
		setThemeOptionDefault('paradigm_page-related-enable',true);
		setThemeOptionDefault('paradigm_page-related-thumb',true);
		setThemeOptionDefault('paradigm_page-related-date',true);
		setThemeOptionDefault('paradigm_page-related-number',3);
		setThemeOptionDefault('paradigm_page-related-type','all');
		setThemeOptionDefault('paradigm_page-related-length','');
		setThemeOptionDefault('paradigm_sidebar-albums-gallery', true);
		setThemeOptionDefault('paradigm_sidebar-albums-depth', '2');
		setThemeOptionDefault('paradigm_sidebar-news-news', true);
		setThemeOptionDefault('paradigm_sidebar-news-depth', '2');
		setThemeOptionDefault('paradigm_sidebar-pages-pages', true);
		setThemeOptionDefault('paradigm_sidebar-pages-depth', '2');
		setThemeOptionDefault('paradigm_sidebar-tags', true);
		setThemeOptionDefault('paradigm_tags-nofollow', false);
		setThemeOptionDefault('paradigm_tags-maxfontsize', 2);
		setThemeOptionDefault('paradigm_tags-minfontsize', 0.8);
		setThemeOptionDefault('paradigm_tags-maxcount', 50);
		setThemeOptionDefault('paradigm_tags-mincount', 1);
		setThemeOptionDefault('paradigm_footer_menu-sitemap', true);
		setThemeOptionDefault('paradigm_footer_rss', true);

		if (class_exists('cacheManager')) {
			$me = basename(dirname(__FILE__));
			cacheManager::deleteCacheSizes($me);
			cacheManager::addCacheSize($me, getThemeOption('image_size'), NULL, NULL, NULL, NULL, NULL, NULL, false, NULL, NULL, NULL);
			cacheManager::addCacheSize($me, getThemeOption('thumb_size'), NULL, NULL, getThemeOption('thumb_crop_width'), getThemeOption('thumb_crop_height'), NULL, NULL, true, NULL, NULL, NULL);
		}
	}

	function getOptionsSupported() {

		global $_zp_gallery;
		$albumlist = array();
		$albumlist['Entire Gallery'] = '';
		$albums = getNestedAlbumList(null, 9999999, false);
		foreach($albums as $album) {
			$albumobj = AlbumBase::newAlbum($album['name'], true);
			$albumlist[$album['name']] = $album['name'];
		}

		return array(

/*================ Set of OPTIONS for the whole site ================*/

			array('key' => 'paradigm_site_options',
				'type' => OPTION_TYPE_NOTE,
				'order' => 1,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Site options</h2>')),
/*===================================================================*/

			gettext('Fluid layout') => array('key' => 'paradigm_full-width', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 2,
				'desc' => gettext('Check to enable fluid full width layout.')),
			gettext('Preview in Lightbox') => array('key' => 'paradigm_lightbox', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 3,
				'desc' => gettext('Use Lightbox preview for images throughoot the site.')),
			gettext('Custom CSS File') => array('key' => 'paradigm_css-custom', 'type' => OPTION_TYPE_CUSTOM,
				'order' => 5,
				'desc' => sprintf(gettext('Select your custom CSS file (from CSS files in the <em>%s</em> folder).<br>If you use elFinder plugin for Uploads - it can upload files to this folder, alternatively you can use FTP to upload your CSS files and then select it here.'),(UPLOAD_FOLDER.'/design/'))),

/*================ Set of OPTIONS for the site HEADER ================*/

			array('key' => 'paradigm_header_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 20,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Site Header options</h2>')),
/*=====================================================================*/

			gettext('Header logo') => array('key' => 'paradigm_logo', 'type' => OPTION_TYPE_CUSTOM,
				'order' => 21,
				'desc' => sprintf(gettext('Select a Logo (from image files in the <em>%s</em> folder) or select to use a text H1 of your Gallery Title.<br>If you use elFinder plugin for Uploads - it can upload files to this folder, alternatively you can use FTP to upload your Logo file and then select it here.<br>Different sizes might need adjustments in CSS! (Use custom CSS file: see above option to select CSS file).'),(UPLOAD_FOLDER.'/design/'))),
			gettext('Display Gallery Decription') => array('key' => 'paradigm_tagline', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 22,
				'selections' => array(
					gettext('Do not display') => 'none',
					gettext('Header') => 'header',
					gettext('Homepage') => 'homepage'),
				'desc' => gettext('Choose where to display Gallery Description (taken from Options->Gallery->Gallery description).')),
			gettext('Allow search')=> array('key' => 'paradigm_search', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 23,
				'desc' => gettext('Check to enable search form.')),

/*================ Set of OPTIONS for the site NAVIGATION ================*/

			array('key' => 'paradigm_nav_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 40,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Main navigation options</h2>')),
/*========================================================================*/

			gettext('Show Dropdown menus in Top Navigation') => array('key' => 'paradigm_nav_menu', 'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 42,
				'checkboxes' => array(
					gettext('Albums') => 'paradigm_nav_menu-albums',
					gettext('News Categories') => 'paradigm_nav_menu-news',
					gettext('Pages') => 'paradigm_nav_menu-pages'),
						'desc' => gettext('Choose what Dropdown menus to display in Main Menu.<br>Multi-choice.')),
			gettext('Menu text for Gallery') => array('key' => 'paradigm_nav_text-gallery', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 43,
				'multilingual' => 0,
				'desc' => gettext('Option to rename the title of main GALLERY page, to anything that suits your site, Albums for example.<br>Note this does not change the url from "page/gallery", it changes the title used in various places on website only.<br>If EMPTY - Default is used (Gallery).')),
			gettext('Menu text for News') => array('key' => 'paradigm_nav_text-news', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 44,
				'multilingual' => 0,
				'desc' => gettext('Option to rename the title of main NEWS page, to anything that suits your site, Blog for example.<br>Note this does not change the url from "news", it changes the title used in various places on website only.<br>If EMPTY - Default is used (News).')),

/*================ Set of OPTIONS for the site HOMEPAGE ================*/

			array('key' => 'paradigm_homepage_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 60,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Homepage options</h2>')),
/*======================================================================*/

			gettext('Homepage Message') => array('key' => 'paradigm_homepage-message','type' => OPTION_TYPE_TEXTAREA,
				'texteditor' => 1,
				'multilingual' => 0,
				'order' => 61,
				'desc' => gettext('Extended message for your Homepage, different from Gallery Description.<br>HTML can be used.')),

/*--------------------- HOMEPAGE Slideshow*/

			array('key' => 'paradigm_homepage_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 70,
				'desc' => gettext('<h3 style="font-weight: bold;">Homepage Slideshow options</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Enable Homepage slideshow') => array('key' => 'paradigm_homepage-slideshow', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 71,
				'desc' => gettext('Check to include a slideshow on the Homepage.')),
			gettext('Slideshow Type') => array('key' => 'paradigm_homepage-slideshow-type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 72,
				'selections' => array(
					gettext('Random') => 'random',
					gettext('Popular') => 'popular',
					gettext('Latest by ID') => 'latestbyid',
					gettext('Latest by Date') => 'latestbydate',
					gettext('Latest by mtime') => 'latestbymtime',
					gettext('Latest by Publish Date') => 'latestbypdate',
					gettext('Most Rated') => 'mostrated',
					gettext('Top Rated') => 'toprated'),
				'desc' => gettext('Select how the images will be chosen for the Homepage slideshow.')),
			gettext('Album to choose from') => array('key' => 'paradigm_homepage-slideshow-album', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 73,
				'selections' => $albumlist,
				'desc' => gettext('Choose a specific album to display its pictures. Album needs to be published, Dynamic albums work too.<br>Images should be preferably in panoramic format (or you can adjust styling via custom CSS*).<br>*Сustom CSS: option to enable one is in "Site options" section.')),
			gettext('Number of slides') => array('key' => 'paradigm_homepage-slideshow-number', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 74,
				'desc' => gettext('Specify number of images to be used for the Homepage slideshow.<br>Default is 5.')),

/*--------------------- HOMEPAGE Blog */

			array('key' => 'paradigm_homepage_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 80,
				'desc' => gettext('<h3 style="font-weight: bold;">Homepage Blog options</h3><hr>')),
/*------------------------------------------------------------------------------*/
			gettext('Enable Homepage blog') => array('key' => 'paradigm_homepage-blog', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 81, 
				'desc' => gettext('Check to enable showing blog posts/news items on the Homepage.')),
			gettext('Number of news items to show on Homepage') => array('key' => 'paradigm_homepage-blog-number', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 82,
				'selections' => array(
					gettext('2') => '2',
					gettext('4') => '4',
					gettext('6') => '6',
					gettext('8') => '8',
					gettext('10') => '10',
					gettext('12') => '12',
					gettext('14') => '14'),
				'desc' => gettext('Select how many news items will be shown on the Homepage.<br>Default is 4.')),
			gettext('Length of Homepage news items excerpt') => array('key' => 'paradigm_homepage-blog-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 83,
				'desc' => gettext('Specify length (number of characters) for a News item excerpt to show on Homepage.<br>Default is 250 characters.')),

/*--------------------- HOMEPAGE Content*/

			array('key' => 'paradigm_homepage_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 90,
				'desc' => gettext('<h3 style="font-weight: bold;">Homepage Content options</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Homepage content') => array('key' => 'paradigm_homepage','type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 91,
				'checkboxes' => array(
					gettext('Albums') => 'paradigm_homepage-albums',
					gettext('Recently uploaded images') => 'paradigm_homepage-image-uploads',
					gettext('Recently taken images') => 'paradigm_homepage-image-recent',
					gettext('Most popular images') => 'paradigm_homepage-image-popular',
					gettext('Top rated images') => 'paradigm_homepage-image-rated',
					gettext('Random images') => 'paradigm_homepage-image-random'),
				'desc' => gettext('Choose what to display on the homepage.<br>Multi-choice.')),
			gettext('Descriptions for Homepage albums') => array('key' => 'paradigm_homepage-albums-desc', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 92,
				'desc' => gettext('Check to show description for Homepage albums.<br>If Album Custom Data is present - it is shown in full, if it is not available, Album Description is used.')),
			gettext('Length of Homepage albums descriptions') => array('key' => 'paradigm_homepage-albums-desc-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 93,
				'desc' => gettext('Specify length (number of characters) for Homepage album descriptions.<br>Default is 250 characters.')),
			gettext('Number of images') => array('key' => 'paradigm_homepage-image-number', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 94, 
				'selections' => array(
					gettext('4') => '4',
					gettext('8') => '8',
					gettext('12') => '12',
					gettext('16') => '16',
					gettext('20') => '20',
					gettext('24') => '24'),
				'desc' => gettext('Select how many images will be chosen for the Homepage display of images.<br>Default is 8.')),

/*================ Set of OPTIONS for the site ALBUM PAGES ================*/

			array('key' => 'paradigm_album_options', 'type' => OPTION_TYPE_NOTE, 
				'order' => 110,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Album Page options</h2>')),
/*=========================================================================*/

			gettext('Display Custom Data for Album') => array('key' => 'paradigm_album-custom', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 111,
				'desc' => gettext("Check to display info from Album Custom Data (if set).")),

/*--------------------- Related Items: Album--*/

			array('key' => 'paradigm_album-related_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 125,
				'desc' => gettext('<h3 style="font-weight: bold;">Related Items for Albums</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Options for Related Items on Album pages') => array('key' => 'paradigm_album-related','type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 126,
				'checkboxes' => array(
					gettext('Show Related Items') => 'paradigm_album-related-enable',
					gettext('Show Thumb') => 'paradigm_album-related-thumb',
					gettext('Show Date') => 'paradigm_album-related-date'),
				'desc' => gettext('Related Items plugin must be enabled, for options to take effect.<br>Multi-choice.')),
			gettext('Number of Related Items on Album pages') => array('key' => 'paradigm_album-related-number', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 127,
				'desc' => gettext('Enter number of Related Items to show on Album pages.<br>Default is 4.')),
			gettext('Types of Related Items to show on Album pages') => array('key' => 'paradigm_album-related-type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 128,
				'selections' => array(
					gettext('All') => 'all',
					gettext('Images') => 'images',
					gettext('Albums') => 'albums',
					gettext('News') => 'news',
					gettext('Pages') => 'pages'),
				'desc' => gettext('Choose what content to show among Related Items on Album pages.<br>Default is Albums.')),
			gettext('Content description for Album Related Items (Length+Enable)') => array('key' => 'paradigm_album-related-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 129,
				'desc' => gettext('Specify length (number of characters) of item description to ENABLE.<br>If EMPTY, they are disabled.')),

/*================ Set of OPTIONS for the site IMAGE PAGES ================*/

			array('key' => 'paradigm_image_options',
				'type' => OPTION_TYPE_NOTE,
				'order' => 130,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Image Page options</h2>')),
/*=========================================================================*/

			gettext('Image caption display') => array('key' => 'paradigm_image-caption', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 131,
				'selections' => array(
					gettext('Above image') => 'above',
					gettext('Below image') => 'below'),
				'desc' => gettext('Choose where to display Image Caption data: above or below Image on image pages.<br>Default is Below image.')),
			gettext('Download Button') => array('key' => 'paradigm_image-download', 'type' => OPTION_TYPE_CHECKBOX, 
				'order' => 132,
				'desc' => gettext("Check to enable users ability to download original image from image details page.<br>If you want a save dialog, you will need to set the appropriate option in Options->Image ->Full image protection as well (choose: Download).")),
			gettext('Display Custom Data for Image') => array('key' => 'paradigm_image-custom', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 133,
				'desc' => gettext("Check to display info from Image Custom Data (if set).")),

/*--------------------- Related Items: Images--*/

			array('key' => 'paradigm_image-related_options',
				'type' => OPTION_TYPE_NOTE,
				'order' => 145,
				'desc' => gettext('<h3 style="font-weight: bold;">Related Items for Images</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Options for Related Items on Image pages') => array('key' => 'paradigm_image-related','type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 146,
				'checkboxes' => array(
					gettext('Show Related Items') => 'paradigm_image-related-enable', 
					gettext('Show Thumb') => 'paradigm_image-related-thumb',
					gettext('Show Date') => 'paradigm_image-related-date'),
				'desc' => gettext('Related Items plugin must be enabled, for options to take effect.<br>Multi-choice.')),
			gettext('Number of Related Items on Image pages') => array('key' => 'paradigm_image-related-number', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 147,
				'desc' => gettext('Enter number of Related Items to show on Image pages.<br>Default is 4.')),
			gettext('Types of Related Items to show on Image pages') => array('key' => 'paradigm_image-related-type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 148,
				'selections' => array(
					gettext('All') => 'all',
					gettext('Images') => 'images',
					gettext('Albums') => 'albums',
					gettext('News') => 'news',
					gettext('Pages') => 'pages'),
				'desc' => gettext('Choose what content to show among Related Items on Image pages.<br>Default is Images.')),
			gettext('Content description for Image Related Items (Length+Enable)') => array('key' => 'paradigm_image-related-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 149,
				'desc' => gettext('Specify length (number of characters) of item description to ENABLE.<br>If EMPTY, they are disabled.')),

/*================ Set of OPTIONS for the site ARCHIVE ================*/

			array('key' => 'paradigm_archive_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 150,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Archive options</h2>')),
/*=====================================================================*/

			gettext('Display Archive in menu') => array('key' => 'paradigm_nav_archive', 'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 151,
				'checkboxes' => array(
					gettext('Main menu') => 'paradigm_nav_menu-archive',
					gettext('Footer') => 'paradigm_nav_footer-archive'),
				'desc' => gettext('Choose where links to Archive will be displayed.<br>Multi-choice.')),
			gettext('Sidebar in archive') => array('key' => 'paradigm_archive-sidebar', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 152,
				'desc' => gettext('Check to display Sidebar on Archive page.')),

/*================ Set of OPTIONS for the site NEWS ================*/

			array('key' => 'paradigm_blog_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 160,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">News options</h2>')),
/*===================================================================*/

			gettext('Featured Image in News article') => array('key' => 'paradigm_news-feat-image', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 161,
				'desc' => gettext('Check to display Featured Image on a News Article page (if set).')),
			gettext('Size of Featured Image in News article') => array('key' => 'paradigm_news-feat-image-size', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 162,
				'selections' => array(
					gettext('Thumb size image') => 'thumb_size',
					gettext('Default size image') => 'image_size'),
						'desc' => gettext('Choose what size of Featured Image to display on a single News Article page (if set).<br>Default is Thumb Size.')),
			gettext('Size of Featured Image in News Category') => array('key' => 'paradigm_news-feat-image-size-cat', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 163,
				'selections' => array(
					gettext('Thumb size image') => 'thumb_size',
					gettext('Default size image') => 'image_size'),
						'desc' => gettext('Choose what size of Featured Image to display on a single News Category page (if set).<br>Default is Thumb Size.')),
			gettext('News Article Extra features') => array('key' => 'paradigm_news_options', 'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 164,
				'checkboxes' => array(
					gettext('Custom data') => 'paradigm_news-custom',
					gettext('Rating') => 'paradigm_news-rating',
					gettext('Hitcounter') => 'paradigm_news-hitcounter'),
				'desc' => gettext('Choose what extra features to display for a single News Article. Multi-choice.<br>Custom data setting works for both News single article and News Categories (if it exists).<br>Rating and Hitcounter plugins must be enabled, otherwise those features are disabled.')),

/*--------------------- Related Items: News--*/

			array('key' => 'paradigm_news-related_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 175,
				'desc' => gettext('<h3 style="font-weight: bold;">Related Items for News</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Options for Related Items for News') => array('key' => 'paradigm_news-related','type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 176,
				'checkboxes' => array(
					gettext('Show Related Items') => 'paradigm_news-related-enable',
					gettext('Show Thumb') => 'paradigm_news-related-thumb',
					gettext('Show Date') => 'paradigm_news-related-date'),
						'desc' => gettext('Related Items plugin must be enabled, for options to take effect.<br>Multi-choice.')),
			gettext('Number of Related Items to show in News') => array('key' => 'paradigm_news-related-number', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 177,
				'desc' => gettext('Enter number of related Items to show in News.<br>Default is 3.')),
			gettext('Types of Related Items to show in News') => array('key' => 'paradigm_news-related-type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 178,
				'selections' => array(
					gettext('All') => 'all',
					gettext('Images') => 'images',
					gettext('Albums') => 'albums',
					gettext('News') => 'news',
					gettext('Pages') => 'pages'),
				'desc' => gettext('Choose what content to show among Related Items in News.<br>Default is News.')),
			gettext('Content description in for News Related Items (Length+Enable)') => array('key' => 'paradigm_news-related-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 179,
				'desc' => gettext('Specify length (number of characters) of item description to ENABLE.<br>If EMPTY, they are disabled.')),

/*================ Set of OPTIONS for the site PAGES ================*/

			array('key' => 'paradigm_pages_options','type' => OPTION_TYPE_NOTE,
				'order' => 180,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Pages options</h2>')),
/*===================================================================*/

			gettext('Featured Image in Page') => array('key' => 'paradigm_page-feat-image', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 181,
				'desc' => gettext('Check to display Featured Image on a Page (if set).')),
			gettext('Size of Featured Image in Page') => array('key' => 'paradigm_page-feat-image-size', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 182,
				'selections' => array(
					gettext('Thumb size image') => 'thumb_size',
					gettext('Default size image') => 'image_size'),
				'desc' => gettext('Choose what size of Featured Image to display on a Page (if set).<br>Default is Thumb Size.')),
			gettext('Page Extra features') => array('key' => 'paradigm_page_options', 'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 183,
				'checkboxes' => array(
					gettext('Custom data') => 'paradigm_page-custom',
					gettext('Rating') => 'paradigm_page-rating',
					gettext('Hitcounter') => 'paradigm_page-hitcounter'),
				'desc' => gettext('Choose what extra features to display for a single Page. Multi-choice.<br>Rating and Hitcounter plugins must be enabled, otherwise those features are disabled.')),

/*--------------------- Related Items: Pages--*/

			array('key' => 'paradigm_image-related_options', 'type' => OPTION_TYPE_NOTE, 
				'order' => 195,
				'desc' => gettext('<h3 style="font-weight: bold;">Related Items for Pages</h3><hr>')),
/*------------------------------------------------------------------------------*/

			gettext('Options for Related Items for Pages') => array('key' => 'paradigm_page-related','type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 196,
				'checkboxes' => array(
					gettext('Show Related Items') => 'paradigm_page-related-enable',
					gettext('Show Thumb') => 'paradigm_page-related-thumb',
					gettext('Show Date') => 'paradigm_page-related-date'),
				'desc' => gettext('Related Items plugin must be enabled, for options to take effect.<br>Multi-choice.')),
			gettext('Number of Related Items to show in Pages') => array('key' => 'paradigm_page-related-number', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 197, 
				'desc' => gettext('Enter number of related Items to show in Pages.<br>Default is 3.')),
			gettext('Types of Related Items to show in Page') => array('key' => 'paradigm_page-related-type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 198,
				'selections' => array(
					gettext('All') => 'all',
					gettext('Images') => 'images',
					gettext('Albums') => 'albums',
					gettext('News') => 'news',
					gettext('Pages') => 'pages'),
				'desc' => gettext('Choose what content to show among Related Items in Pages.<br>Default is All.')),
			gettext('Content description for Pages Related Items (Length+Enable)') => array('key' => 'paradigm_page-related-length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 199, 
				'desc' => gettext('Specify length (number of characters) of item description to ENABLE.<br>If EMPTY, they are disabled.')),

/*================ Set of OPTIONS for the site SIDEBAR ================*/

			array('key' => 'paradigm_sidebar_options', 'type' => OPTION_TYPE_NOTE, 
				'order' => 200,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Sidebar options</h2>')),
/*=====================================================================*/

			gettext('Display Albums menu in Sidebar') => array('key' => 'paradigm_sidebar-albums', 'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 201,
				'checkboxes' => array(
					gettext('Gallery') => 'paradigm_sidebar-albums-gallery',
					gettext('News') => 'paradigm_sidebar-albums-news',
					gettext('Pages') => 'paradigm_sidebar-albums-pages',
					gettext('Archive') => 'paradigm_sidebar-albums-archive'),
				'desc' => gettext('Choose when to display Albums menu in Sidebar.<br>Multi-choice.')),
			gettext('Nested lists of Album menu to display:') => array('key' => 'paradigm_sidebar-albums-depth', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 202,
				'selections' => array(
					gettext('Top-level only') => '0',
					gettext('Depth of 2') => '2',
					gettext('Depth of 3') => '3',
					gettext('Depth of 4') => '4',
					gettext('All levels') => 'true'),
				'desc' => gettext('Select how many levels of nested lists of Album menu to display in Sidebar in Gallery. Default is "Depth of 2".<br>"Top-level only" is also used for display of Albums menu in News, Pages and Archives.')),
			gettext('Display News Categories menu in Sidebar') => array('key' => 'paradigm_sidebar-news', 'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 203,
				'checkboxes' => array(
					gettext('Gallery') => 'paradigm_sidebar-news-gallery',
					gettext('News') => 'paradigm_sidebar-news-news',
					gettext('Pages') => 'paradigm_sidebar-news-pages',
					gettext('Archive') => 'paradigm_sidebar-news-archive'),
				'desc' => gettext('Choose when to display News Categories menu in Sidebar.<br>Multi-choice.')),
			gettext('Nested lists of News Categories menu to display:') => array('key' => 'paradigm_sidebar-news-depth', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 204, 
				'selections' => array(
					gettext('Top-level only') => '0',
					gettext('Depth of 2') => '2',
					gettext('Depth of 3') => '3',
					gettext('Depth of 4') => '4',
					gettext('All levels') => 'true'),
				'desc' => gettext('Select how many levels of nested lists of News Categories menu to display in Sidebar in News, Gallery, Pages and Archives.<br>Default is "Depth of 2".')),
			gettext('Display Pages menu in Sidebar') => array('key' => 'paradigm_sidebar-pages', 'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'order' => 205,
				'checkboxes' => array(
					gettext('Gallery') => 'paradigm_sidebar-pages-gallery',
					gettext('News') => 'paradigm_sidebar-pages-news',
					gettext('Pages') => 'paradigm_sidebar-pages-pages',
					gettext('Archive') => 'paradigm_sidebar-pages-archive'),
				'desc' => gettext('Choose when to display Pages menu in Sidebar.<br>Multi-choice.')),
			gettext('Nested lists of Pages menu to display:') => array('key' => 'paradigm_sidebar-pages-depth', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 206,
				'selections' => array(
					gettext('Top-level only') => '0',
					gettext('Depth of 2') => '2',
					gettext('Depth of 3') => '3',
					gettext('Depth of 4') => '4',
					gettext('All levels') => 'true'),
				'desc' => gettext('Select how many levels of nested lists of Pages menu to display in Sidebar in Pages, News, Gallery and Archives.<br>Default is "Depth of 2".')),
			gettext('Sidebar menu header for Pages') => array('key' => 'paradigm_nav_text-pages', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 207,
				'multilingual' => 0,
				'desc' => gettext('Option to rename the title of Pages menu header in the Sidebar to anything that suits your site.<br>If EMPTY - Default is used (Pages).')),
			gettext('User menu in Sidebar') => array('key' => 'paradigm_sidebar-user-menu', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 208,
				'desc' => gettext('Check to display User menu in Sidebar.')),
			gettext('Tags in Sidebar') => array('key' => 'paradigm_sidebar-tags', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 209,
				'desc' => gettext('Check to display Popular Tags in Sidebar. Options for presentation of Tag cloud are below.')),
			gettext('FlickrFeed in Sidebar') => array('key' => 'paradigm_sidebar-flickr', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 210,
				'desc' => gettext('Check to display Flickr Feed Items in Sidebar (Needs FlickrFeed plugin installed, enabled & User ID provided).')),
/*================ Set of OPTIONS for the site Copyright Info ================*/

			array('key' => 'paradigm_copyright_options', 'type' => OPTION_TYPE_NOTE, 
				'order' => 230,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Options for Copyright notice on Image pages</h2>')),
/*============================================================================*/

			gettext('Copyright Notice') => array( 'key' => 'paradigm_copyright_message', 'type' => OPTION_TYPE_TEXTAREA,
				'texteditor' => 0,
				'multilingual' => 0,
				'order' => 231,
				'desc' => gettext('Extended copyright notice to display on Solo Image page and Credits page if enabled.<br>HTML can be used.<br>If Empty - "Image copyright rightsholder" from Options->Image is used instead.')),

/*================ Set of OPTIONS for the site TAGS Display ================*/

			array('key' => 'paradigm_tags_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 240,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Options for Popular Tags display</h2>')),
/*==========================================================================*/

			gettext('Maximum font size for popular tags:') => array('key' => 'paradigm_tags-maxfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 241,
				'desc' => gettext('Font-size to use for most common tags. Adjust based on your tags usage.<br>Default is 2.')),
			gettext('Minimum font size for popular tags:') => array('key' => 'paradigm_tags-minfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 242,
				'desc' => gettext('Font-size to use for less common tags. Adjust based on your tags usage.<br>Default is 0,8em.')),
			gettext('Maximum font size for tags with count over:') => array('key' => 'paradigm_tags-maxcount', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 243,
				'desc' => gettext('Tags with tag count over this number will be shown with maximum font-size. Adjust based on your tags usage.<br>Default is 50.')),
			gettext('Minimal tag count to include:') => array('key' => 'paradigm_tags-mincount', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 244,
				'desc' => gettext('Tags with tag count over this number will be included in Popular Tag list.<br>Default is 1.')),

/*================ Set of OPTIONS for the site FOOTER ================*/

			array('key' => 'paradigm_footer_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 250,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Footer options</h2>')),
/*====================================================================*/

			gettext('Main Footer menu') => array('key' => 'paradigm_footer_menu', 'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 251,
				'checkboxes' => array(
					gettext('Credits page') => 'paradigm_footer_menu-credits',
					gettext('Explore page') => 'paradigm_footer_menu-explore',
					gettext('Sitemap page') => 'paradigm_footer_menu-sitemap'),
				'desc' => gettext('<p>Choose what extra pages to display in main Footer menu. Multi-choice.</p><p>Credits page - uses Copyright notice (see option for that above) to inform visitors about authorship and your copyright policy + gives credit to Zenphoto and author of this Theme.<br>Explore page - lists all tags, used throughout website.<br>Sitemap page - lists all News categories, Pages and Albums.</p>')),
			gettext('User menu in Footer') => array('key' => 'paradigm_footer_user-menu', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 252,
				'desc' => gettext('Check to display User menu in Footer.')),
			gettext('Display RSS Links') => array('key' => 'paradigm_footer_rss', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 253,
				'desc' => gettext('Check to display RSS Links in Footer. Channels are set in RSS plugins settings.')),
			gettext('Display Social profiles') => array('key' => 'paradigm_footer_social', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 254,
				'desc' => gettext('Check to display Social Links in Footer as linked in Links & Services section below.')),

/*================ Set of OPTIONS for the linked external SERVICES ================*/

			array('key' => 'paradigm_external_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 270,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Links and Services</h2>')),
/*=================================================================================*/

			gettext('Google Analytics ID') => array('key' => 'analytics_code', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 271,
				'desc' => gettext('If you use Google Analytics, paste your ID here. Works with UA and GA4 properties.<br>Use according to your local laws.')),
			gettext('ShareThis ID') => array('key' => 'sharethis_id', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 272,
				'desc' => gettext('Provide your ShareThis ID')),
			gettext('URL to Facebook') => array('key' => 'facebook_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 273,
				'desc' => gettext('Provide your Facebook page or profile URL')),
			gettext('Twitter (X) profile name') => array('key' => 'twitter_profile', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 274,
				'desc' => gettext('Provide your Twitter (X) profile name (without the @)')),
			gettext('URL to Flickr') => array('key' => 'flickr_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 275,
				'desc' => gettext('Provide your Flickr gallery URL')),
			gettext('URL to 500px')	=> array('key' => '500px_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 276,
				'desc' => gettext('Provide your 500px gallery URL')),
			gettext('URL to Instagram')	=> array('key' => 'instagram_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 277,
				'desc' => gettext('Provide your Instagram URL')),
			gettext('URL to Pinterest')	=> array('key' => 'pinterest_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 278,
				'desc' => gettext('Provide your Pinterest board or page URL')),
			gettext('URL to Deviantart') => array('key' => 'deviantart_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 279,
				'desc' => gettext('Provide your Deviantart page URL')),
			gettext('URL to Tumblr') => array('key' => 'tumblr_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 280,
				'desc' => gettext('Provide your Tumblr page URL')),

/*================ Set of OPTIONS for the site METADATA ================*/

			array('key' => 'paradigm_meta_options', 'type' => OPTION_TYPE_NOTE,
				'order' => 290,
				'desc' => gettext('<h2 style="font-size: 110%; background: #bac9cf; padding: 7px;">Metadata options</h2>')),
/*======================================================================*/
			gettext('Add Nofollow to Tags links') => array('key' => 'paradigm_tags-nofollow', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 291,
				'desc' => gettext('Adds rel="nofollow" to Tag links everywhere so they are not scanned by Search Engines.')),
			gettext('Remove Tags Pages from Index by search engines') => array('key' => 'paradigm_meta-tags-noindex', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 292,
				'desc' => gettext('Adds "noindex, follow" to Tags pages so they are removed from Search Engines Index.')),
			gettext('Remove Archive Pages from Index by search engines') => array('key' => 'paradigm_meta-archive-noindex', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 293,
				'desc' => gettext('Adds "noindex, follow" to Archive pages so they are removed from Search Engines Index.')),
			gettext('Site preview for Open Graph/Twitter cards') => array('key' => 'paradigm_logo-preview', 'type' => OPTION_TYPE_CUSTOM,
				'order' => 294,
				'desc' => sprintf(gettext('Select an image (from files in the <em>%s</em> folder) that will serve as an preview/banner for your site<br>It is used in Open Graph or Twitter cards when sharing content from Index, News or Pages.<br>If you use elFinder plugin for Uploads - it can upload files to this folder, alternatively you can use FTP to upload your logo file and then select it here.'),(UPLOAD_FOLDER.'/design/'))),
		);
	}
	function getOptionsDisabled() {
		return array('custom_index_page', 'paradigm_zp_index_news','paradigm_homepage');
	}
	function handleOption($option, $currentValue) {
		if($option == "paradigm_logo") { ?>
			<select id="paradigm_logo" name="paradigm_logo">
				<option value="" style="background-color:LightGray"><?php echo gettext('* Use Gallery Name Text'); ?></option>';
				<?php zp_apply_filter('theme_head');
				generateListFromFiles($currentValue, SERVERPATH.'/'.UPLOAD_FOLDER.'/design/','');
				?>
			</select>
		<?php }
		if($option == "paradigm_logo-preview") { ?>
			<select id="paradigm_logo-preview" name="paradigm_logo-preview">
				<option value="" style="background-color:LightGray"><?php echo gettext('* no site preview selected'); ?></option>';
				<?php zp_apply_filter('theme_head');
				generateListFromFiles($currentValue, SERVERPATH.'/'.UPLOAD_FOLDER.'/design/','');
				?>
			</select>
		<?php }
		if($option == "paradigm_css-custom") { ?>
			<select id="paradigm_css-custom" name="paradigm_css-custom">
				<option value="" style="background-color:LightGray"><?php echo gettext('* no custom CSS'); ?></option>';
				<?php zp_apply_filter('theme_head');
				generateListFromFiles($currentValue, SERVERPATH.'/'.UPLOAD_FOLDER.'/design/','.css');
				?>
			</select>
	<?php }
	}
}
?>