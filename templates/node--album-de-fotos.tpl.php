<?php
/**
 * Teaser
 */
?>
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
          <?php if (!empty($variables['field_imagen'])): ?>
            <div class="album-de-fotos">
              <?php
                for ($i = 0; $i < count($variables['field_imagen']); $i++) {
                  $img_uri = $variables['field_imagen'][$i]['uri'];
                  $active = ($i == 0) ? 'active' : '';
                  print '<div class="foto col-sm-2 col-md-4">';
                  print '<a href="' . file_create_url($img_uri) . '">';
                  print '<img src="' . image_style_url('imagen_400x220',$img_uri) . '" alt="" class="img-responsive" typeof="foaf:Image" />';
                  print '</a>';
                  print '</div>';
                }
              ?>
            </div><!-- Fin fotos -->
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
