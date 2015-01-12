<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div id="slider-carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php foreach ($rows as $id => $row): ?>
    <li data-target="#slider-carousel" data-slide-to="<?php print $id; ?>" class="<?php if ($id == 0) print "active"; ?>"></li>
    <?php endforeach; ?>
  </ol>

  <div class="carousel-inner" role="listbox">
  <?php foreach ($rows as $id => $row): ?>
    <div class="item <?php if ($id == 0) print "active"; ?>">
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
  </div>

</div>
