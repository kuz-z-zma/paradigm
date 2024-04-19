# Paradigm

Paradigm is a responsive theme for Zenphoto CMS, based on the Bootstrap (version 3.3.5) framework. It’s optimised for SEO and works well on a variety of platforms, from desktops to laptops, tablets and mobile phones.

Theme uses logical document titles hierarchy, accessible to search engines tag pages, conditional meta title and description, microdata (schema.org), OpenGraph and Twitter cards. Social sharing buttons can be integrated with ShareThis, links to social profiles can be added to the footer.
Extra files include robots.txt and .htaccess.

Originally this theme was created and developed by Olivier Ffrench, but seems to be abandoned by the author. I’ve unsuccessfully tried to contact him with bug report in February 2023, and wrote again in June 2023 to ask for permission to release my update with fixes, so the theme can be used with Zenphoto 1.6 release.
Since I’ve updated this theme to fix usage of depreciated functions and added several new features, I’ve decided to make it available to others.

New additions include: more flexibility for displaying content.

version 1.5:

 - Reworked all Options groupings and settings.
 - Fixed Lightbox pop-up with image previews in Albums, Archive, Search etc.
 - Links to Lightbox previews were assigned with rel=”nofollow” to exclude generated links to preview images from indexing.
 - Added option to disable usage of Lightbox previews.
 - Option to choose custom text for Gallery link in Main Menu (it’s also used in Footer menu and Sidebar panel).
 - Option to choose custom text for News link in Main Menu (it’s also used in Footer menu and Sidebar panel).
 - Option to choose custom text for Pages header in Sidebar navigation panel.
 - Options to choose when to display Album Menu in Sidebar (multi-choice: Gallery, News, Pages, Archives).
 - Options to choose when to display News Categories Menu in Sidebar (multi-choice: Gallery, News, Pages, Archives).
 - Options to choose when to display Pages Menu in Sidebar (multi-choice: Gallery, News, Pages, Archives).
 - Change of CSS for Albums, News Categories & Pages Menu navigational panels in Sidebar from id=”nav-local” to class=”nav-local”.
 - Option to specify number of levels of Album menu to display in Sidebar (for Gallery; News, Pages, Archives use “Top-level only” setting).
 - Option to specify number of levels of News Categories Menu in Sidebar (used for Gallery, News, Pages, Archives).
 - Option to specify number of levels of Pages Menu in Sidebar (used for Gallery, News, Pages, Archives).
 - Fixed font-size calculation for Popular Tags cloud in Sidebar.
 - Option to display Image Caption above or below Image on Image Page.
 - Updated Theme functions to use correct time from metadata for Photos in Metadata section on Image Pages (without added timezone of server).
 - Reworked settings for additional pages in Main Footer menu.
 - Option to display RSS Links in Footer.
 - Option to display Social Media Links in Footer (if linked in “Links and Services” section of Paradigm Options).
 - Option to remove Tags pages from Search Engines Index by adding “noindex, follow” to Head section.
 - Option to remove Archive pages from Search Engines Index by adding “noindex, follow” to Head section.
 - Moved News Archive links before Gallery links in Archive.
 - Some fixes in Breadcrumbs section (typos, leftover code).
 - Added missing icon for H1 in News/News categories pages
 - Enabled automatic generation of Description meta-tags from sanitized Custom Data for Pages.
 - Other clean-up of rules for auto-generating Meta tags: titles, descriptions etc.
 - Reworked auto-generation of Open Graph meta-tags.
 - Reworked auto-generation of Twitter-cards meta-tags.
 - Favorites plugin now works (with Zenphoto 1.6.3), therefore I’ve completely reworked Favorites page.
