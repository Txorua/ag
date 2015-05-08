<?php
  $np = drupal_get_normal_path('content/ayuntamiento', 'es');
  $pa = (explode('/',$np));
  $tnid = end($pa);
  $translations = translation_node_get_translations($tnid);
  $location_path = drupal_get_path_alias('node/' . $translations[$language->language]->nid, $language->language);
?>
<header class="site-header" role="banner">
  <div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-xs-7">
        <ul class="list-inline list-unstyled pull-right">
          <li><a href="/<?php print $language->language . '/' . $location_path; ?>"><i class="fa fa-map-marker"></i><?php print t('Location'); ?></a></li>
          <li><a href="/<?php print $language->language; ?>/contact"><i class="fa fa-envelope"> </i>udala@getaria.org</a></li>
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
  <div class="container-fluid header-links hidden-xs">
    <div class="row">
      <div class="col-sm-5 col-md-6 hidden-xs">
        <h1>
        <a href="<?php print $front_page; ?>" title="Home">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" class="img-responsive">
            <!--<span class="col-sm-8 col-md-8 site-name"><?php //print $site_name; ?></span>-->
          </a>
        </h1>
      </div>
      <?php if ($language->language != 'eu'): ?>
      <div><a href="http://nabigatueuskaraz.com"><img src="<?php print base_path() . path_to_theme() . '/assets/images/nabigatueuskaraz.png'; ?>" class="img-responsive pull-right"></a></div>
      <?php endif; ?>

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

<?php
  $cols = 0;
  if (!empty($page['sidebar_first']) && !empty($page['sidebar_second'])) {
    $cols = 'col-sm-4 col-sm-push-4 col-md-6 col-md-push-3';
  }
  else if (!empty($page['sidebar_first']) || !empty($page['sidebar_second'])) {
    $cols = 'col-sm-8 col-sm-push-4 col-md-9 col-md-push-3';
  }
?>

<main<?php if ($cols) print ' class="' . $cols . '"'; ?>>
  <?php print $messages; ?>
  <?php if (!empty($page['help'])): ?>
    <?php print render($page['help']); ?>
  <?php endif; ?>

  <section>
    <?php print render($page['before_content']); ?>
  </section>

  <a id="main-content"></a>

  <article>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
      <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </header>
    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
    <?php if (!empty($action_links)): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    <?php print render($page['content']); ?>
  </article>
  <section>
    <?php print render($page['after_content']); ?>
  </section>
</main>

<?php if (!empty($page['sidebar_first'])): ?>
<aside class="col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">
<?php print render($page['sidebar_first']); ?>
</aside>
<?php endif; ?>

<?php if (!empty($page['sidebar_second'])): ?>
<aside class="col-sm-4 col-md-3">
<?php print render($page['sidebar_second']); ?>
</aside>
<?php endif; ?>


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

