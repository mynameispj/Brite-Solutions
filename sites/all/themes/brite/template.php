<?php

function brite_menu_tree__main_menu($variables) {
	return '<nav><ul class="nav nav-pills">' . $variables['tree'] . '</ul></nav>';
}

function brite_menu_link__main_menu(array $variables) {
	$element = $variables['element'];
	$dropDownToggle = 0; 
	$attributesClassArray = $element['#attributes']['class']; 
	
	for($i = 0; $i < count($element['#attributes']['class']);$i++){
	    if ($element['#attributes']['class'][$i] == 'expanded') {
	       $element['#attributes']['class'][$i] = 'dropdown';
	       $dropDownToggle = 1; 
		}
	    if ($element['#attributes']['class'][$i] == 'leaf') {
	       $element['#attributes']['class'][$i] = '';
		}
	}
	$sub_menu = '';

	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
		$sub_menu = str_replace('<nav><ul class="nav nav-pills">','<ul class="dropdown-menu">',$sub_menu); 
		$sub_menu = str_replace('</ul></nav>','</ul>',$sub_menu); 		
	}
	
	if ($dropDownToggle == 1) {
		return '<li' . drupal_attributes($element['#attributes']) . '><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $element['#title'] . '<b class="caret"></b></a>' . $sub_menu . "</li>\n";
	} else {	
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
		return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";	
	}
}

function brite_menu_link__menu_block(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function brite_menu_tree__menu_block($variables) {
  return '<ul class="menu">' . $variables['tree'] . '</ul>';
}



function brite_webform_element($variables) {
  // Ensure defaults.
  $variables['element'] += array(
    '#title_display' => 'before',
  );

  $element = $variables['element'];

  // All elements using this for display only are given the "display" type.
  if (isset($element['#format']) && $element['#format'] == 'html') {
    $type = 'display';
  }
  else {
    $type = (isset($element['#type']) && !in_array($element['#type'], array('markup', 'textfield'))) ? $element['#type'] : $element['#webform_component']['type'];
  }

  // Convert the parents array into a string, excluding the "submitted" wrapper.
  $nested_level = $element['#parents'][0] == 'submitted' ? 1 : 0;
  $parents = str_replace('_', '-', implode('--', array_slice($element['#parents'], $nested_level)));

  $wrapper_classes = array(
   'form-item',
   'webform-component',
   'webform-component-' . $type,
  );
  if (isset($element['#title_display']) && strcmp($element['#title_display'], 'inline') === 0) {
    $wrapper_classes[] = 'webform-container-inline';
  }
//  $output = '<div class="' . implode(' ', $wrapper_classes) . '" id="webform-component-' . $parents . '">' . "\n";
  $output = '<div class="control-group" id="webform-component-' . $parents . '">' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . _webform_filter_xss($element['#field_prefix']) . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . _webform_filter_xss($element['#field_suffix']) . '</span>' : '';

  switch ($element['#title_display']) {
    case 'inline':
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= ' <p class="help-block">' . $element['#description'] . "</p>\n";
  }

  $output .= "</div>\n";

  return $output;
}



