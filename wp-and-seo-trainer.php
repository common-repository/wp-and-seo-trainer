<?php
/*
* Plugin Name: WP And SEO Trainer
* Plugin URI:  https://www.rankya.com/wp-and-seo-trainer-plugin/
* Description: WP And SEO Trainer provides tutorials and lessons for using WordPress CMS as well as training videos for search engine optimization best practices. Learn how to use WordPress CMS and Popular Plugins like Yoast SEO, Contact Form 7, All in One SEO Pack Plugin without leaving your Dashboard. <a href="https://www.rankya.com/wp-and-seo-trainer-plugin/?utm_source=wp-admin&utm_medium=plugin-description&utm_campaign=1.0">Improvement suggestions are welcome</a>
* Version:     1.0
* Author:      RankYa
* Author URI:  https://www.rankya.com
* License:     GPL3
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
* Requires at least: 4.0
* Tested up to: 4.6.1
*/
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/

//defined — Checks whether a given named constant exists
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Check WordPress version and provide hyperlink for updating old versions (best prcactice for using WordPress CMS)
global $wp_version;
if ( !version_compare($wp_version,"4.0",">=") ) {
	$wpupdateurl = 'http://codex.wordpress.org/Upgrading_WordPress';
	die('You need at least version 4.0 of WordPress to use this plugin. Upgrade your WordPress to the latest version. Learn more here <a target="_blank" title="How to Upgrade" href="'.esc_url($wpupdateurl).'">Upgrade</a>&#8599;');
}

// Use rwast_ begining for unique function names, defines, and classnames. Prevents conflicts with other WP plugins and Themes

//include once php.net/manual/en/function.include-once.php for all plugin activated checks
include_once( trailingslashit( ABSPATH ) . 'wp-admin/includes/plugin.php' );

// create the main function if it doesn't exist
if ( !function_exists( 'rwast_rankya_wp_and_seo_trainer' ) ) :
function rwast_rankya_wp_and_seo_trainer() {
	global $current_screen;
	$current_screen = get_current_screen();
	// good coding practice to set var default to work with
	$tutorial = ''; 
	
	//Since WP user can NOT be looking at 2 WP screens at once USE ELSE IF PHP confitional statements to display individual lessons and tips
	//You can't have enough checks for security > current_user_can('manage_options') Allows access to Administration Panel options:
	//TODO: find out if you could create a more logical logic for these checks > visit WP codex and PHP manuals to learn how
	
		// Dashboard
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'dashboard' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/MioTZV8NYzg?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		// update-core display best practices
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'update-core' ) {
			$vaultpressurl = 'https://vaultpress.com';
			$tutorial = 'Tip: always update WordPress to its latest version. And if your plugins and themes have updates, update them as well. Also, backup your WP site before update. There are many backup plugins such as: <br /> <a target="_blank" href="'.esc_url($vaultpressurl).'" title="vaultpress.com" itemprop="url">VaultPress</a>&#8599; that can automate backups for your site.';
			return $tutorial;
		}	
	
		// all post > edit-post	
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'edit-post' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Fhcm9iFe9kk?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}	
	
		// ADD single post > works with post_type and action
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->post_type == 'post' && $current_screen->action == 'add') {
		$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/jwngP1MLCm8?rel=0" frameborder="0" allowfullscreen></iframe>';
		return $tutorial;
	}
	
		// edit single post  > works with post_type and base
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->post_type == 'post' && $current_screen->base == 'post') {
		$tutorial = 'Tip: when creating or editing posts, always think of your site visitors interests. Divide your pragraphs in to more readable chunks. If you are including images in your posts, then optimize their file name and also include "alt attribute" (as shown in video lesson for Media Library)';
		return $tutorial;
	}
	
		//edit category
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'edit-category' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/GDuAV8F0amg?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}	
	
		//edit tags
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'edit-post_tag' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/MN-3cQ3e7gQ?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		//Media Library	
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'upload' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/8dik2PPhcBw?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		//Media Library	add new
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'media' ) {
			$tutorial = 'Tip: this is multi-file uploader, its another way to upload your media to your media Library. If you ever experience media upload issues then try the browser uploader instead.';
			return $tutorial;
		}	
		
		// Link manager	
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'link-manager' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/HKpgoHBRyk8?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		// Link manager	> Add Link
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'link' ) {
			$tutorial = 'Tip: XFN™ stands for XHTML Friends Network. XFN™ (XHTML Friends Network) is a simple way to represent human relationships using hyperlinks.<p>XFN relationships are optional for WordPress links. You can leave all the XFN options blank and the link will still work just fine.</p>';
			return $tutorial;
		}
		
		// Link manager	> Add Category
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'edit-link_category' ) {
			$tutorial = 'Tip: similar to Categories for Blog portion of your site, you can create and manage categories for Link groupings as well.';
			return $tutorial;
		}
	
		// Pages > All Pages
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->post_type == 'page' && $current_screen->id === 'edit-page' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sZCn2DA9KqY?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		// Pages > Add New page > works with post_type=page and action
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->post_type == 'page' && $current_screen->action == 'add') {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/eDAP47gj6SQ?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
	}
	
		// Pages > edit a single page > works with post_type=page and base
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->post_type == 'page' && $current_screen->base == 'post') {
			$tutorial = 'Tip: when creating or editing pages, always think of your site visitors interests. Divide your pragraphs in to more readable chunks. If you are including images in your pages, then optimize their file name and also include "alt attribute" (as shown in Media video lesson)';
			return $tutorial;
	}
	
		// Comments
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'edit-comments' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/3OffLsOo00c?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		//Themes (also do NOT display editing options as some site owners may do things wrong and break their site) (simply do not call the buttons for those sections)
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'themes' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Dp3mrK4t1Co?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
	//Themes > Add New
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'theme-install' ) {
			$tutorial = 'Tip: consider using a theme that is modern, mobile friendly and above all else, a theme that makes it easy to read, and navigate through the information you present on your website. Consider usability <em>for your site visitors</em>';
			return $tutorial;
		}	
		
		//Plugins (also do NOT display editing options as some site owners may do things wrong and breat their site) (simply do not call the buttons for those sections)
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'plugins' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/yxOY1wDp-OQ?rel=0" frameborder="0" allowfullscreen></iframe>"';
			return $tutorial;
		}
		
	//Plugins (also do NOT display editing options as some site owners may do things wrong and breat their site) (simply do not call the buttons for those sections)
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'plugin-install' ) {
			$tutorial = 'Tip: plugins extend the <em>functionality</em> of your site. However, if anytime a plugin creates issues or conflicts with your site setup, you can usually fix that like this:<br /><strong>Login to your web hosting account<br /> File Manager > public_html > wp-content > plugins > thePluginYouSuspectIsCausingIssues</strong><p>Then, simply rename that plugin folder (Right Mouse Click > Rename) to be something else. For example:<br /> <strong>thePluginYouSuspectIsCausingIssues-old</strong><br />This may resolve any plugin issues.</p>';
			return $tutorial;
		}	

		// Widgets
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'widgets' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/tKCRaVcNNP4?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}	
		
		// Menus
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'nav-menus' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Pjf4Pjd93x4?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}	
		
		// Users
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'users' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/jsCTSMUJJR8?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		// User Add New
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'user' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/bX03NhlcRf4?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		// Your Profile
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'profile' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ebenbLsaQZw?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
			
		// Tools
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'tools' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/nnu15AgXQPY?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		// Tools import
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'import' ) {
			$tutorial = 'Tip: you would only import settings in to your WordPress only rare occassions';
			return $tutorial;
		}
		// Tools Export
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'export' ) {
			$tutorial = 'Tip: export your current WordPress settings on regular basis to keep a backup on your local computer.';
			return $tutorial;
		}
		
	
		// Options General
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-general' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/59ChmWBMouE?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}	
		
		// Options Reading
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-reading' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mXkNRQRsT94?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		// Options Writing
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-writing' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Oy8z2_gtsI8?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		// Options Discussions
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-discussion' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/OC0iWNYQVWI?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		// Options Media
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-media' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Kt4qlx0QpQM?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
		// Options Permalink
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'options-permalink' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/89IG8zQT4HA?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	
	
	
	// For plugins use IF statements because above IF statements are for WP Dashboard which won't be TRUE below
	
	//is_plugin_active is defined in wp-admin/includes/plugin.php, this is only available from within the admin pages
	//https://codex.wordpress.org/Function_Reference/is_plugin_active
	//include_once must be used or else WP throws an exception as shown in the WP_DEBUG logs
	
	// if Yoast is activated
	if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'toplevel_page_wpseo_dashboard' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/_yCHSljHM1A?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_titles' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/TBBPaHwkjpg?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_social' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/07Ej-ku34FU?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_xml' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Tot5jzKA4SY?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_advanced' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/d01vQfmcv8E?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_tools' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Dd4CwY6bU2k?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_search_console' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/tQ8bh-Hsj-Y?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_wpseo_licenses' ) {
			$tutorial = 'Following these links below, you can purchase premium versions and enter licenses';
			return $tutorial;
		}
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'seo_page_rankya-yoast-menu' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/iyICYKBJjR4?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	} //end if Yoast active check
	
	
	// if Contact Form 7 is activated
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'toplevel_page_wpcf7' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/LHQNihOjkzc?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'contact_page_wpcf7-new' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/g592q4t6_U8?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'contact_page_wpcf7-integration' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/IQRre9zfpYc?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
	} //end if contact form 7 active check
	
	// if All in One SEO is activated
	if ( is_plugin_active( 'all-in-one-seo-pack/all_in_one_seo_pack.php' ) ) {
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'dashboard_page_aioseop-about' ) {
			$tutorial = 'Tip: this section provides insights and links to further resources for using this plugin';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'toplevel_page_all-in-one-seo-pack/aioseop_class' ) {
			$tutorial = '<iframe width="560" height="315" src="https://www.youtube.com/embed/47YK7q7c4Is?rel=0" frameborder="0" allowfullscreen></iframe>';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_performance' ) {
			$tutorial = 'Tip: modifying settings here can have unintended results for your website. If you require memory limit increase due to various reasons such as "Resource Limit Is Reached" contact your web hosting provider, as they may modify server settings (usually using php.ini settings).';
			return $tutorial;
		}
	
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_sitemap' ) {
			$searchconsolehelpforsitemap = 'https://support.google.com/sites/answer/100283';
			$tutorial = 'Tip: you should leave most of these settings at their default. And <a target="_blank" href="'.esc_url($searchconsolehelpforsitemap).'" title="Submit a sitemap to Google Search Console" itemprop="url">Submit a sitemap to Google Search Console</a>&#8599; (as explained in the main video session) and let Google determine what it should access and index on your site.<p>If you see notices "Potential conflict with unknown file" that means your website has another sitemap, so you should not delete that but rather <strong>Rename Conflicting Files</strong> so you have a backup on your server.</p>';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_aiosp_opengraph' ) {
			$socialmodulehelpurl = 'https://semperplugins.com/documentation/social-meta-module/';
			$tutorial = 'Tip: the Social Meta Module in All in One SEO Pack helps you take advantage of the additional meta data that social networking sites use to display your site or blog on their networks. To learn more visit: <a target="_blank" href="'.esc_url($socialmodulehelpurl).'" title="Social Meta Module in All in One SEO Pack help" itemprop="url">help section</a>&#8599;';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_aiosp_robots_generator' ) {
			$tutorial = 'Tip: here you can add as many new rules as you want. For example: if you wanted User-Agents (also known as web crawlers, or bots) to <strong style="color:red">not</strong> crawl parts of your site called "samplecategory-or-url" then you would:<p><strong style="color:red">Select Rule Type</strong> <em>block</em><br />Place asterix symbol <strong style="color:red">*</strong> <em>in User-Agent Field</em><br /><strong style="color:red">/samplecategory-or-url</strong> <em>in Directory Path</em></p><p>And the generated rule would look like this<br /><strong style="color:blue">User-agent: *<br />
Disallow: /samplecategory-or-url</strong></p><p style="font-style:italic;color:black;font-weight:bold">Use with Caution</p>';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_file_editor' ) {
			$robotstextfileurl = 'https://www.rankya.com/assets/robots.zip';
			$googlehelpsectionforrobotstextfileurl = 'https://support.google.com/webmasters/answer/6062608';
			$tutorial = 'Tip: you should <strong>not</strong> edit .htaccess file because doing so may break your site. <p>As for robots.txt file: you can safely use the sample <a target="_blank" href="'.esc_url($robotstextfileurl).'" title="sample robots text file directives" itemprop="url">robots.txt</a>&#8599; file I created <strong>after changing</strong> the details to match your website details (as explained in the main video tutorial session)</p> <p><a target="_blank" href="'.esc_url($googlehelpsectionforrobotstextfileurl).'" title="Learn about robots.txt files" itemprop="url">Learn about robots.txt files</a>&#8599; because getting things wrong in robots.txt file may disable search engine access for certain parts of your site.</p> ';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_importer_exporter' ) {
			$tutorial = 'Tip: its smart to conduct regular backups of your website. <p>Export your All in One SEO Pack settings for backup purposes or when migrating your site. You can use the Importer to then import these settings including all meta data into All in One SEO Pack to restore your settings or to duplicate them to a new site.</p> ';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_bad_robots' ) {
			$vaultpressecurity = 'https://vaultpress.com/';
			$wordfenceurl = 'https://www.wordfence.com/';
			$tutorial = 'Tip: using All is One SEO Plugin is not recommended way to protect your WordPress site.<p> Instead consider using security and firewall plugins such as:<br /><a target="_blank" href="'.esc_url($vaultpressecurity).'" title="Backups and Security for WordPress" itemprop="url">VaultPress</a>&#8599;<br /><a target="_blank" href="'.esc_url($wordfenceurl).'" title="WordFence WP Security Plugin" itemprop="url">Wordfence</a>&#8599;</p>';
			return $tutorial;
		}
		
		elseif ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'all-in-one-seo_page_all-in-one-seo-pack/modules/aioseop_feature_manager' ) {
			$tutorial = 'Tip: each time you activate a feature, there will be a new Menu option under plugin Menu link on your Dashboard so that you can further edit the activated feature.<p>You can anytime select "Deactivate" or "Activate" a feature.</p>';
			return $tutorial;
		}
		
	} //end if All in One SEO is active
	
	// if Akismet is activated
	if ( is_plugin_active( 'akismet/akismet.php' ) ) {
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'settings_page_akismet-key-config' ) {
			$akismeturl = 'https://akismet.com/how/';
			$tutorial = 'Tip: Akismet is comment moderation plugin that can make your life easier filtering out spam comments so that you can focus on content publishing. To learn more visit <a target="_blank" href="'.esc_url($akismeturl).'">Akismet FAQ</a>&#8599;';
			return $tutorial;
		}
	} //end if akismet active
	
//if limit-login-attempts active
if ( is_plugin_active( 'limit-login-attempts/limit-login-attempts.php' ) ) {
	if ( is_user_logged_in() && current_user_can('manage_options') && $current_screen instanceof WP_Screen && $current_screen->id === 'settings_page_limit-login-attempts' ) {
			$tutorial = 'Tip: this is a basic plugin for controlling what happens when someone tries to login too many times. Providing you with options to set limits for these attempts and lockout unusual attempts';
			return $tutorial;
		}
	} //end if limit-login-attempts active
	
	else {
	return $tutorial;
		}
} //end main function rwast_rankya_wp_and_seo_trainer
endif; // end if function not exist check for rwast_rankya_wp_and_seo_trainer()

// rankya YOU still need to enqueue it, but you do not need to register it, as it is registered automatically by WP.
if ( !function_exists( 'rwast_rankya_wp_and_seo_trainer_admin_scripts' ) ) :
function rwast_rankya_wp_and_seo_trainer_admin_scripts() {
	wp_enqueue_script('jquery');
    wp_enqueue_script( 'rwast_rankya_wp_and_seo_trainer_scripts', plugins_url( 'js/style-notices.js', __FILE__), array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'rwast_rankya_wp_and_seo_trainer_admin_scripts' );
endif; //end if function check for rwast_rankya_wp_and_seo_trainer_admin_scripts()

//codex recommends to externalize and wp_enqueue_style CSS styles
if ( !function_exists( 'rwast_rankya_wp_and_seo_trainer_admin_styles' ) ) :
function rwast_rankya_wp_and_seo_trainer_admin_styles() {
	wp_register_style( 'rwast_rankya_wp_and_seo_trainer_styles', plugins_url( 'css/style.css', __FILE__)) ;
    wp_enqueue_style('rwast_rankya_wp_and_seo_trainer_styles');
}
add_action( 'admin_head', 'rwast_rankya_wp_and_seo_trainer_admin_styles' );
endif; //end if function exist check for rwast_rankya_wp_and_seo_trainer_admin_styles()

// This is one way to include a menu link
// Check Yoast SEO Plugin if found provide lesson for using it
if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
	function rwast_add_menu_item_for_yoast() {
	$manage_options_cap = apply_filters( 'wpseo_manage_options_capability', 'manage_options' );
	add_submenu_page( 'wpseo_dashboard', 'How to Use Yoast Plugin', 'How to Use Yoast', $manage_options_cap, 'rankya-yoast-menu', 'rwast_how_to_yoast_settings_page' );
	}
	// callable function
	function rwast_how_to_yoast_settings_page() {
	?>
<div class="wrap">
  <h3 style="color:#83B730">Thank you for learning with RankYa</h3>
</div>
<?php
	}
	add_action( 'admin_menu',  'rwast_add_menu_item_for_yoast', 20 );
} //end is_plugin_active check for Yoast SEO menu link

// Displaying WP And SEO Trainer for Admins
add_action( 'admin_notices', 'rwast_rankya_wp_and_seo_trainer_admin_notices_div' );
if ( !function_exists( 'rwast_rankya_wp_and_seo_trainer_admin_notices_div' ) ) :
function rwast_rankya_wp_and_seo_trainer_admin_notices_div() {
	$lesson = rwast_rankya_wp_and_seo_trainer(); 
	global $current_screen;
	$current_screen = get_current_screen();
	//these are critical and may break a WP site if the admin is unsure on how to use and edit them, so these options shouldn't be shown using this plugin
	//do not show on Theme Editor Plugin Install Plugin Editor screens
	if ( $current_screen->id === 'plugin-editor' || $current_screen->id === 'theme-editor' ) {
			$lesson = '';
		}
else {
	echo '<a id="rankya_seo_trainer_button">WP And SEO Trainer</a>
	<div id="rankyacssforlessondiv">
		<div class="rankya-wrap-video-lesson">'.$lesson.'</div>
		<br class="rankyaclearfloatforlessondiv" />
	</div>';
	
 }
} // end rwast_rankya_wp_and_seo_trainer_admin_notices_div()
//end if function exists check for function rwast_rankya_wp_and_seo_trainer_admin_notices_div()
endif; 
