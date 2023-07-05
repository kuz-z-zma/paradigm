# Paradigm

Paradigm is a responsive theme for Zenphoto CMS, based on the Bootstrap (version 3.3.5) framework. It’s optimised for SEO and works well on a variety of platforms, from desktops to laptops, tablets and mobile phones.

Theme uses logical document titles hierarchy, accessible to search engines tag pages, conditional meta title and description, microdata (schema.org), OpenGraph and Twitter cards. Social sharing buttons can be integrated with ShareThis, links to social profiles can be added to the footer.
Extra files include robots.txt and .htaccess.

Originally this theme was created and developed by Olivier Ffrench, but seems to be abandoned by the author. I’ve unsuccessfully tried to contact him with bug report in February 2023, and wrote again in June 2023 to ask for permission to release my update with fixes, so the theme can be used with Zenphoto 1.6 release.
Since I’ve updated this theme to fix usage of depreciated functions and added several new features, I’ve decided to make it available to others.

New additions include: more flexibility for displaying content.

version 1.3 and 1.3.1:

 - Cleaned up and structured Theme Options.
 - Control how many News Items are shown on Homepage.
 - Control if Dropdown Menus are shown, separately for Albums, News, Pages.
 - Option to display mix of Albums and various sets of Images on Homepage.
 - Optional Sidebar in Archive.
 - If Print_album_menu is enabled, Album List it’s shown in Sidebar for Contact, Search and Credits pages.
 - Optional Popular Tags in Sidebar.
 - Control how Popular Tags are displayed.
 - Extended “Copyright Notice” field (HTML allowed), displayed on Image and Credits pages.
 - Additional “Homepage Message” field (HTML allowed), to display on Homepage.
 - Option to display “Gallery Description” as tagline under Text Logo in Header.
 - Fixed noindex/nofollow for Tags pages.
 - Favicon in [website root] folder will be linked in the Head section.
 - If you use IMG Logo in Header, it will be automatically included as OpenGraph and Twitter Preview Image for Homepage.
 - If logo not selected: img.png in [website root]/uploaded folder will used.
 - Preview Images for other pages for OpenGraph and Twitter cards either use Default Size for Images in gallery or 800px width.
 - Added glyphicons from Bootstap to Headings for more uniform look.
 - New optional pages: Explore (lists all used Tags) and Sitemap (lists all News Categories, Pages and all Albums).
 - Some code clean-up and updates for mobile presentation.
 - fix getMainSiteURL() (depreciated function) in header, footer and breadcrumbs.
 - fixed breadcrumbs for uniform look on all pages with home icon.
