<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
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
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header class="site-header" role="banner">
  <div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <ul class="list-inline list-unstyled">
          <li><a href="#"> <i class="fa fa-sitemap"></i><?php print t('Sitemap'); ?></a></li>
          <li><a href="/user"> <i class="fa fa-unlock-alt"></i><?php print t('Login'); ?></a></li>
        </ul>
      </div>
      <div class="col-sm-7">
        <ul class="list-inline list-unstyled pull-right">
          <li><a href="#"><i class="fa fa-map-marker"></i><?php print t('Location'); ?></a></li>
          <li><a href="<?php print $language->language; ?>/contact"><i class="fa fa-envelope"> </i>udala@getaria.org</a></li>
          <li><a href="tel:943896024"><i class="fa fa-phone"></i>+34 943 896 024</a></li>
          <li>
            <ul class="list-inline list-unstyled">
            <li><i class="fa fa-flag"></i></li>
          <?php if (!empty($language_links)): ?>
          <?php print $language_links; ?>
          <?php endif; ?>
            </ul>
           </li>
        </ul>
      </div>
    </div>
  </div>
  </div>
  <div class="container-fluid header-links">
    <div class="row">
      <div class="col-sm-5 col-md-6 hidden-xs">
        <h1>
        <a href="<?php print $front_page; ?>" title="Home">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive">
            <!--<span class="col-sm-8 col-md-8 site-name"><?php //print $site_name; ?></span>-->
          </a>
        </h1>
      </div>
      <div class="col-xs-6 col-sm-4 col-md-3 text-right">
        <?php print render($page['navigation']); ?>
      </div>
      <div class="col-xs-6 col-sm-3 col-md-3 text-right">
        <ul class="list-inline list-unstyled h4">
          
        </ul>
      </div>
    </div><!-- end row -->
  </div><!-- end container -->
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if (!empty($site_name)): ?>
      <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <span class="visible-xs">
          <?php if ($logo): ?>
          <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="visible-xs">
          <?php endif; ?>
          <?php //print $site_name; ?>
        </span>
      </a>
      <?php endif; ?>
    </div>
    <div class="collapse navbar-collapse">
      <?php if (!empty($primary_nav)): ?>
      <?php print render($primary_nav); ?>
      <?php endif; ?>
    </div>
  </nav>
</header>

<div class="container main">
  <div class="row">
    <div class="col-md-9">
      <a id="main-content"></a>
      <main>
        <?php print $messages; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <section>
          <?php print render($page['before_content']); ?>
        </section>
        <section>
          <?php print render($page['after_content']); ?>
        </section>
      </main>
    </div>
    <aside class="col-xs-12 col-md-3">
      <?php print render($page['sidebar_second']); ?>
    </aside>
  </div>
</div>

<footer class="site-footer">
  <div class="container">
    <div class="row">
      <?php print render($page['sub_footer_1']); ?>
      <?php print render($page['sub_footer_2']); ?>
      <?php print render($page['sub_footer_3']); ?>
      <?php print render($page['sub_footer_4']); ?>
    </div>
  </div>

  <hr>

  <div class="container">
    <div class="row">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</footer>
