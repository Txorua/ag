<div class="col-md-4">
<header>
<h1 class="h5"><?php print $variables['fields']['name_i18n']->content; ?></h1>
</header>
<?php if($row->field_field_imagen): ?>
<?php
  $uri = $row->field_field_imagen[0]['raw']['uri'];
  $src = image_style_url('imagen_400x220', $uri);
?>
  <img src="<?php print $src; ?>" class="img-responsive breadcrumb" typeof="foaf:Image">
<?php endif; ?>
</div>
