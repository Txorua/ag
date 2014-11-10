<?php
  hide($content['field_geo']);
  print render($content);
  if (isset($variables['field_direccion'][0]['phone_number'])):
    print $variables['field_direccion'][0]['phone_number'];
  endif;
  print render($content['field_geo']);
?>
