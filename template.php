<?php

/**
 * @file
 * template.php
 */

function ag_preprocess_page(&$variables) {
  // Page Suggestions
  if (isset($variables['node'])) {
    $suggestion = 'page__' . str_replace('_', '--', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = $suggestion;
  }

  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    // Build links
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', ' main-menu'));
    // Provide default theme wrapper function.
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }

  // Language nav
  if (drupal_multilingual()) {
    $variables['language_links'] = _ag_language_list();
  }
}

// Menus navbar
function ag_menu_tree(&$variables) {
  return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}

function ag_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav h3" role="menu">' . $variables['tree'] . '</ul>';
}

function ag_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu list-unstyled" role="menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }

  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function ag_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    //dsm($form);
    //$form['actions']['submit']['#type'] = 'image_button';
    $form['search_block_form']['#size'] = 10;
  }
}

function _ag_language_list() {
  $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
  $links = language_negotiation_get_switch_links('language', $path);
  global $language;
  // an array of list items
  //$output = '<li><i class="glyphicon glyphicon-flag"></i></li>';
  $output = '';
  $items = array();
  foreach($links->links as $lang => $info) {
    $name     = $lang;
    $href     = isset($info['href']) ? $info['href'] : '';
    $li_classes   = array('');
    $output .= '<li ';
    // if the global language is that of this item's language, add the active class
    if($lang === $language->language){
      $output .= 'class="active"';
    }
    $output .= '>';
    $link_classes = array();
    $options = array('attributes' => array('class'    => $link_classes),
      'language' => $info['language'],
      'html'     => true
    );
    $link = l($name, $href, $options);
    $output .= $link . '</li>';
  }
  // output
  return $output;
}
