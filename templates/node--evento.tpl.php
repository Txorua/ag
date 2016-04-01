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
  <?php print $variables['date']; ?>
    <?php if (isset($content['field_imagen'][0])): ?>
    <?php
        $content['field_imagen'][0]['#item']['attributes'] = array('class' => 'img-responsive pull-right breadcrumb');
        print render($content['field_imagen'][0]);
    ?>
    <?php endif; ?>
    <?php print render($content); ?>
    <div style="clear: both; padding: 1em 0;">
      <div id="sharrre" class="si-share"></div>
    </div>
<?php endif; ?>
