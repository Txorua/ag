<?php
/**
 * Teaser
 */
?>
<?php //dpm($variables); ?>
<?php if ($view_mode == "teaser"): ?>
<article>
  <header>
    <h1><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h1>
    <?php print $variables['date']; ?>
  </header>
  <div class="row">
    <div class="col-sm-12">
      <div class="lead">
      <?php print render($content['body']); ?>
      <?php hide($content['links']['node']); ?>
        <p class="text-right"><a title="<?php print $node->title; ?>" rel="tag" href="<?php print $node_url; ?>"><?php print t('continuar'); ?>&hellip;</a></p>
      </div>
    </div>
  </div>
</article>
<?php endif; ?>

<?php
/**
 * Full
 */
?>
<?php if ($view_mode == "full"): ?>
  <?php print $variables['date']; ?>
  <?php hide($content['field_imagen']); ?>
  <?php hide($content['field_adjuntos']); ?>
  <?php hide($content['field_enlaces']); ?>
  <?php hide($content['sharethis']); ?>
  <?php print render($content); ?>

  <?php if (!empty($variables['field_imagen'])): ?>
    <section class="album-de-fotos">
    <?php
        $img_uri = $variables['field_imagen'][0]['uri'];
        print '<div class="foto">';
        print '<a href="' . file_create_url($img_uri) . '">';
        print '<img src="' . file_create_url($img_uri) . '" alt="" class="img-responsive breadcrumb center-block" typeof="foaf:Image" />';
        print '</a>';
        print '</div>';
    ?>

    <?php
      for ($i = 1; $i < count($variables['field_imagen']); $i++) {
        $img_uri = $variables['field_imagen'][$i]['uri'];
        print '<div class="foto col-sm-1 col-md-2">';
        print '<a href="' . file_create_url($img_uri) . '">';
        print '<img src="' . image_style_url('imagen_400x220',$img_uri) . '" alt="" class="img-responsive" typeof="foaf:Image" />';
        print '</a>';
        print '</div>';
      }
    ?>
    </section><!-- Fin fotos -->
  <?php endif; ?>

  <?php if (!empty($variables['field_imagen'])): ?>
    <section>
    <div class="col-xs-12">
      <?php print render($content['field_adjuntos']); ?>
    </div>
    </section>
  <?php endif; ?>

  <?php if (!empty($content['field_enlaces'])): ?>
    <section>
    <div class="col-xs-12 col-md-4">
    <?php foreach ($variables['field_enlaces'] as $id => $enlace): ?>
       <?php $url = explode('/',$enlace['url']); ?>
       <iframe width="480" height="270" src="https://www.youtube.com/embed/<?php print end($url); ?>" frameborder="0" allowfullscreen></iframe>
    <?php endforeach; ?>
    </div>
    </section>
  <?php endif; ?>

  <?php if (!empty($content['field_enlaces'])): ?>
    <section class="clearfix">
    <div class="col-xs-12">
      <?php print render($content['sharethis']); ?>
    </div>
    </section>
  <?php endif; ?>

<?php
drupal_add_js('

  var tpj = jQuery;
  tpj.noConflict();

  tpj(document).ready(function($) {

    var $container = $(".album-de-fotos").imagesLoaded(function() {

      $(".album-de-fotos").magnificPopup({
        type: "image",
        delegate: "a",
        mainClass: "mfp-with-zoom",
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 300,
          easing: "ease-in-out"
        }
      });
    });

  });', array('type' => 'inline', 'scope' => 'footer', 'weight' => 2));

?>

<?php endif; ?>
