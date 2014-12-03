<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php //dsm($row); ?>
<div class="row">
  <div class="col-sm-6">
    <?php if ($row->field_field_direccion): ?>
    <p>
      <?php print $row->field_field_direccion[0]['raw']['thoroughfare']; ?><br/>
      <?php print $row->field_field_direccion[0]['raw']['postal_code']; ?> &ndash;
      <?php print $row->field_field_direccion[0]['raw']['locality']; ?>
    </p>
    <?php endif; ?>

    <?php if ($row->field_field_direccion): ?>
    <p>
      <?php if ($row->field_field_direccion[0]['raw']['phone_number']): ?>
      <i class="glyphicon glyphicon-earphone">&nbsp;</i><?php print $row->field_field_direccion[0]['raw']['phone_number']; ?><br/>
      <?php endif; ?>
      <?php if ($row->field_field_direccion[0]['raw']['mobile_number']): ?>
      <i class="glyphicon glyphicon-phone">&nbsp;</i><?php print $row->field_field_direccion[0]['raw']['mobile_number']; ?><br/>
      <?php endif; ?>
      <?php if ($row->field_field_direccion[0]['raw']['fax_number']): ?>
      <i class="glyphicon glyphicon-print">&nbsp;</i><?php print $row->field_field_direccion[0]['raw']['fax_number']; ?>
      <?php endif; ?>
    </p>
    <?php endif; ?>

    <?php if ($row->field_field_horario): ?>
    <div>
      <span class="h4"><?php print t('Office hours'); ?>:</span>
      <?php print $variables['fields']['field_horario']->content; ?>
    </div>
    <?php endif; ?>
  </div>

  <div class="col-sm-6">
    <?php print $variables['fields']['field_geo']->content; ?> 
  </div>
</div>
