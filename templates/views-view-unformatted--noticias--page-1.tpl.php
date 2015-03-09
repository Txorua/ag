<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>


<div>
  <div>
  <?php foreach ($rows as $id => $row): ?>
    <div<?php if ($id == 0) print ' class="active"'; ?>>
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
  </div>
</div
