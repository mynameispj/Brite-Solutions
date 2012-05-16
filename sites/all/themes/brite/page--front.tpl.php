<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div class="wrapper"><!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres -->
	
	<header class="gradient">
		<div class="content">
			<h1><a href="<?php print $base_path; ?>" id="brand">Brite Solutions</a></h1>
			<?php print render($page['header']); ?>
		</div>
	</header>
	<div class="backdrop">
		<article>
			<div class="welcome">
				<div class="content">
					<h1>
						<span class="xsmall">Brite Solutions is a </span>
						<span class="large">full-service maintenance
						management provider</span>
						<span class="small">dedicated to & driven by quality & service</span>
					</h1>
					<div id="specialties">
						<button class="prev">previous</button></button>
						<button class="next">next</button>
						<div class="specialties">
							<ul>
								<li class="orange">
									<a href="<?php print drupal_get_path_alias('node/28'); ?>">
										<h2>Janitorial</h2>
										<img src="<?php print $base_path . $directory ?>/images/home-slider-filler.jpg" alt="Janitorial" width="128" height="120" />
									</a>
								</li>
								<li class="purple">
									<a href="<?php print drupal_get_path_alias('node/30'); ?>">
										<h2>General</h2>
										<img src="<?php print $base_path . $directory ?>/images/home/hvac.jpg" alt="General Maintenance" width="128" height="120" />
									</a>
								</li>
								<li class="green">
									<a href="<?php print drupal_get_path_alias('node/29'); ?>">
										<h2>Lawn Care</h2>
										<img src="<?php print $base_path . $directory ?>/images/home/landscaping.jpg" alt="Lawn Care" width="128" height="120" />
									</a>
								</li>
								<li class="blue">
									<a href="<?php print drupal_get_path_alias('node/31'); ?>">
										<h2>Rail Services</h2>
										<img src="<?php print $base_path . $directory ?>/images/home/home-rail.jpg" alt="Rail Servicesr" width="128" height="120" />
									</a>
								</li>
								<li class="green">
									<a href="<?php print drupal_get_path_alias('node/32'); ?>">
										<h2>Security &amp; Patrol</h2>
										<img src="<?php print $base_path . $directory ?>/images/home/security.jpg" alt="Security / Patrol" width="128" height="120" />
									</a>
								</li>
			
							</ul>
						</div>
					</div>
				</div>
	
			</div>		
		</article>
		
		<div class="push"></div>
		<img src="sites/all/themes/brite/css/i/bg-large-img.jpg" alt="bg-large-img" class="backdrop" />
	</div>
</div>
<footer>
	<div class="content"> 
		<h3>Brite Solutions serves clients across the country.</h3>
		<div class="phone">1-(877)-57-BRITE</div>
		
		<address>
			<span>
				Brite Solutions, Inc<br/>
				PO Box 1390<br/>
				Cordova, TN 38088 
			</span> 
			<span> 
				1-(877)-57-BRITE &nbsp;Toll Free<br/>
				901-386-2021 Phone<br/>
				901-729-6121 Fax<br/>
				901-266-3343 Fax
			</span>
		</address>
		<?php print render($page['footerMenu']); ?>
		<div class="membership">
			<p>Brite Solutions is a member of:</p>
			<ul>
				<li><img src="<?php print $base_path . $directory ?>/images/issa.png" alt="ISSA" /></li>
				<li><img src="<?php print $base_path . $directory ?>/images/bscai.png" alt="BSCAI" /></li>
				<li><img src="<?php print $base_path . $directory ?>/images/ifma.png" alt="IFMA"  /></li>
				<li><img src="<?php print $base_path . $directory ?>/images/janitorial-store.png" alt="The Janitorial Store" /></li>
			</ul>
		</div>
		<p class="copyright"><small>&copy; Copyright Brite Solutions <?php print date('Y'); ?>. All Rights Reserved.</small></p>
	</div>
	
</footer>



     