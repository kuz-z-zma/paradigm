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
		setThemeOptionDefault('custom_index_page', 'gallery.php');
		
		setOptionDefault('gmap_width', '100%');
		setOptionDefault('htmlmeta_name-title', 0);
		setOptionDefault('htmlmeta_name-description', 0);
		
		setThemeOptionDefault('Dropdown_albums', true);
		setThemeOptionDefault('Dropdown_news', true);
		setThemeOptionDefault('Dropdown_pages', true);
		setThemeOptionDefault('zenphoto_logo', '');
		setThemeOptionDefault('zenphoto_tagline', false);
		setThemeOptionDefault('extended_homepage_message', false);
		setThemeOptionDefault('carousel_number', '5');
		setThemeOptionDefault('homepage_content_albums_desc_show', true);
		setThemeOptionDefault('homepage_content_albums_desc_length', 250);
		setThemeOptionDefault('news_number', '4');
		setThemeOptionDefault('homepage_news_length', 250);
		setThemeOptionDefault('Allow_search', true);
		setThemeOptionDefault('display_archive', true);
		setThemeOptionDefault('display_archive-sidebar', true);
		setThemeOptionDefault('display_tags-sidebar', true);
		setThemeOptionDefault('tags-seo-nofollow', false);
		setThemeOptionDefault('display_tags-maxfontsize', 2);
		setThemeOptionDefault('display_tags-minfontsize', 0.8);
		setThemeOptionDefault('display_tags-maxcount', 50);
		setThemeOptionDefault('display_tags-mincount', 1);
		setThemeOptionDefault('display_sitemap_page', true);
		
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
			gettext('Fluid') => array('key' => 'full_width', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 1, 
				'desc' => gettext('Check to enable fluid full width layout.')),
			gettext('Header logo') => array('key' => 'zenphoto_logo', 'type' => OPTION_TYPE_CUSTOM, 
				'order' => 2, 
				'desc' => sprintf(gettext('Select a logo (files in the <em>%s</em> folder) or select to use a text logo of your gallery name. You can use the built in file uploader in Zenphoto to upload your logo file and then select it here.'),UPLOAD_FOLDER)),
			gettext('Header tagline') => array('key' => 'zenphoto_tagline', 'type' => OPTION_TYPE_CHECKBOX, 
				'order' => 2, 
				'desc' => gettext('Check to display Gallery description in header alongside Gallery Title.')),
			gettext('Allow search')=> array('key' => 'Allow_search', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 3,
				'desc' => gettext('Check to enable search form.')),
			gettext('Show Dropdown menus') => array(
				'key' => 'dropdown_menu',
				'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 4,
				'checkboxes' => array(
					gettext('Albums') => 'dropdown_menu_albums',
					gettext('News Categories') => 'dropdown_menu_news',
					gettext('Pages') => 'dropdown_menu_pages'),
				'desc' => gettext('Choose what Dropdown menus to display in Main Menu')),
			array('key' => 'paradigm_homepage_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 5,
				'desc' => gettext('<h2>Homepage options</h2><hr />')),	
			gettext('Homepage Message') => array(
						'key' => 'extended_homepage_message',
						'type' => OPTION_TYPE_TEXTAREA,
						'texteditor' => 1,
						'multilingual' => 0,
						'order' => 5,
						'desc' => gettext('Extended message for your homepage, different from Gallery Description. HTML can be used.')),
			gettext('Homepage slideshow') => array('key' => 'homepage_slideshow', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 6,
				'desc' => gettext('Check to include a slideshow on the homepage.')),
			gettext('Slideshow Type') => array('key' => 'carousel_type', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 7, 
				'selections' => array(
					gettext('Random') => 'random', 
					gettext('Popular') => 'popular', 
					gettext('Latest by ID') => 'latestbyid', 
					gettext('Latest by Date') => 'latestbydate', 
					gettext('Latest by mtime') => 'latestbymtime', 
					gettext('Latest by Publish Date') => 'latestbypdate', 
					gettext('Most Rated') => 'mostrated', 
					gettext('Top Rated') => 'toprated'), 
				'desc' => gettext('Select how the pictures will be chosen for the homepage slideshow.')),
			gettext('Album to choose from') => array('key' => 'carousel_album', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 7, 
				'selections' => $albumlist, 
				'desc' => gettext('Choose a specific album to display its pictures. Album needs to be published. Images are preferably in panoramic format: 1920px wide')),
			gettext('Number of slides') => array('key' => 'carousel_number', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 7, 
				'selections' => array(
					gettext('3') => '3', 
					gettext('4') => '4', 
					gettext('5') => '5', 
					gettext('6') => '6', 
					gettext('7') => '7', 
					gettext('8') => '8', 
					gettext('9') => '9', 
					gettext('10') => '10'), 
				'desc' => gettext('Select how the pictures will be chosen for the homepage slideshow. Default is 5')),
			gettext('Homepage blog') => array('key' => 'homepage_blog', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 8, 
				'desc' => gettext('Check to enable blog posts as main content of the homepage.')),
			gettext('Number of news items to show on homepage') => array('key' => 'news_number', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 9, 
				'selections' => array(
					gettext('2') => '2', 
					gettext('4') => '4', 
					gettext('6') => '6', 
					gettext('8') => '8', 
					gettext('10') => '10', 
					gettext('12') => '12', 
					gettext('14') => '14'), 
				'desc' => gettext('Select how many news items will be shown on the homepage. Default is 4')),	
			gettext('Number characters for homepage news items to show') => array('key' => 'homepage_news_length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 10, 
				'desc' => gettext('Select default length for homepage news items. Default is 250 characters.')),	
			gettext('Homepage content') => array(
				'key' => 'homepage_content',
				'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 11,
				'checkboxes' => array(
					gettext('Albums') => 'homepage_content_albums',
					gettext('Recent uploads images') => 'homepage_content_uploads',
					gettext('Recent taken images') => 'homepage_content_recent',
					gettext('Most popular images') => 'homepage_content_popular',
					gettext('Top rated images') => 'homepage_content_rated',
					gettext('Random images') => 'homepage_content_random'),
				'desc' => gettext('Choose what to display on the homepage. Multi-choice.')),
			gettext('Descriptions for homepage albums') => array('key' => 'homepage_content_albums_desc_show', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 12, 
				'desc' => gettext('Select to show description for homepage albums. If Album Custom Data is present - it is shown in full, if it is not available, Album Description is used.')),
			gettext('Length of homepage albums descriptions') => array('key' => 'homepage_content_albums_desc_length', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 12, 
				'desc' => gettext('Select default length for homepage news items. Default is 250 characters.')),
			gettext('Number of images') => array('key' => 'homepage_content_number', 'type' => OPTION_TYPE_SELECTOR,
				'order' => 12, 
				'selections' => array(
					gettext('4') => '4', 
					gettext('8') => '8', 
					gettext('12') => '12', 
					gettext('16') => '16',
					gettext('20') => '20',
					gettext('24') => '24'), 
				'desc' => gettext('Select how the pictures will be chosen for the homepage display of images. Default is 12.')),
			array('key' => 'paradigm_archive_options',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 13,
				'desc' => gettext('<h2>Archive options</h2><hr />')),
						
			gettext('Archive') => array('key' => 'display_archive', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 14,
				'desc' => gettext('Display Archive link in footer and main menu.')),
			gettext('Sidebar in archive') => array('key' => 'display_archive-sidebar', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 15,
				'desc' => gettext('Display Sidebar on Archive page.')),
			array('key' => 'paradigm_options_tags',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 16,
				'desc' => gettext('<h2>Options for Popular Tags display</h2><hr />')),	
			gettext('Tags in sidebar') => array('key' => 'display_tags-sidebar', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 17,
				'desc' => gettext('Display Popular Tags in Sidebar.')),
			gettext('Remove Tags links from index by search engines') => array('key' => 'tags-seo-nofollow', 'type' => OPTION_TYPE_CHECKBOX,
				'order' => 18,
				'desc' => gettext('Adds adds rel="nofollow" to Tag links everywhere, so they are removed from Search Engines Index.')),
			gettext('Maximum font size for popular tags:') => array('key' => 'display_tags-maxfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 19,
				'desc' => gettext('Font-size to use for most common tags. Adjust based on your tags usage. Default is 2.')),
			gettext('Minimum font size for popular tags:') => array('key' => 'display_tags-minfontsize', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 20,
				'desc' => gettext('Font-size to use for less common tags. Adjust based on your tags usage. Default is 0,8em.')),
			gettext('Maximum font size for tags with count over:') => array('key' => 'display_tags-maxcount', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 21,
				'desc' => gettext('Tags with tag count over this number will be shown with maximum font-size. Adjust based on your tags usage. Default is 50.')),
			gettext('Minimal tag count to include:') => array('key' => 'display_tags-mincount', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 22,
				'desc' => gettext('Tags with tag count over this number will be included in Popular Tag list. Default is 1.')),
			array('key' => 'paradigm_options_external',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 23,
				'desc' => gettext('<h2>Links and Services</h2><hr />')),		
			gettext('Google Analytics id') => array('key' => 'analytics_code', 'type' => OPTION_TYPE_CLEARTEXT,
				'order' => 24,
				'desc' => gettext('If you use Google Analytics, paste your ID here. Works with UA and GA4 properties. Use according to your local laws.')),
			gettext('ShareThis id') => array('key' => 'sharethis_id', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 25,
				'desc' => gettext('Provide your ShareThis ID')),
			gettext('URL to Facebook') => array('key' => 'facebook_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 26,
				'desc' => gettext('Provide your Facebook page or profile URL')),
			gettext('Twitter profile name') => array('key' => 'twitter_profile', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 27,
				'desc' => gettext('Provide your Twitter profile name (without the @)')),
			gettext('URL to FlickR') => array('key' => 'flickr_url', 'type' => OPTION_TYPE_TEXTBOX, 
				'order' => 28,
				'desc' => gettext('Provide your FlickR gallery URL')),
			gettext('URL to 500px')	=> array('key' => '500px_url', 'type' => OPTION_TYPE_TEXTBOX, 
				'order' => 29,
				'desc' => gettext('Provide your 500px gallery URL')),	
			gettext('URL to Instagram')	=> array('key' => 'instagram_url', 'type' => OPTION_TYPE_TEXTBOX, 
				'order' => 30,
				'desc' => gettext('Provide your Instagram')),											
			gettext('URL to Pinterest')	=> array('key' => 'pinterest_url', 'type' => OPTION_TYPE_TEXTBOX, 
				'order' => 31,
				'desc' => gettext('Provide your Pinterest board or page')),											
			gettext('URL to Deviantart') => array('key' => 'deviantart_url', 'type' => OPTION_TYPE_TEXTBOX,
				'order' => 32,
				'desc' => gettext('Provide your Deviantart page')),
			gettext('URL to Tumblr') => array('key' => 'tumblr_url', 'type' => OPTION_TYPE_TEXTBOX, 
				'order' => 33,
				'desc' => gettext('Provide your Tumblr page URL')),
			array('key' => 'paradigm_copyright_image_notice',
				'type' => OPTION_TYPE_NOTE, 
				'order' => 34,
				'desc' => gettext('<h2>Options for Copyright notice on Image pages</h2><hr />')),
			gettext('Copyright Notice') => array(
						'key' => 'extended_copyright_message',
						'type' => OPTION_TYPE_TEXTAREA,
						'texteditor' => 0,
						'multilingual' => 0,
						'order' => 35,
						'desc' => gettext('Extended copyright notice to display on Solo Image page and Credits page if enabled. HTML can be used. 
						If Empty - "Image copyright rightsholder" from Image Options is used instead.')),
			array('key' => 'paradigm_footer_options',
					'type' => OPTION_TYPE_NOTE, 
					'order' => 36,
					'desc' => gettext('<h2>Options for Copyright notice on Image pages</h2><hr />')),
			gettext('Credits page') => array('key' => 'display_credits_page', 'type' => OPTION_TYPE_CHECKBOX,
					'order' => 37,
					'desc' => gettext('Show Credits page in footer menu.')),
			gettext('Sitemap page') => array('key' => 'display_sitemap_page', 'type' => OPTION_TYPE_CHECKBOX,
					'order' => 38,
					'desc' => gettext('Show Sitemap page in footer menu.')),
			gettext('Explore page') => array('key' => 'display_explore_page', 'type' => OPTION_TYPE_CHECKBOX,
					'order' => 39,
					'desc' => gettext('Show Explore page (listing all tags) in footer menu.'))					
		);	
	}
	function getOptionsDisabled() {
		return array('custom_index_page', 'paradigm_zp_index_news','paradigm_homepage');
	}
	function handleOption($option, $currentValue) {
		if($option == "zenphoto_logo") { ?>
			<select id="zenphoto_logo" name="zenphoto_logo">
				<option value="" style="background-color:LightGray"><?php echo gettext('*Use Gallery Name Text'); ?></option>';
				<?php zp_apply_filter('theme_head');
				generateListFromFiles($currentValue, SERVERPATH.'/'.UPLOAD_FOLDER,'');
				?>
			</select>
		<?php }			
	}
}
?>