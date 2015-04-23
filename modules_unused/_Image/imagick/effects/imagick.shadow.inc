<?php

/**
 * Genrates a shadow around an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $color
 *   The color of the shadow.
 * @param $opacity
 *   The opacity of the shadow.
 * @param $sigma
 *   The sigma of the shadow.
 * @param $x
 *   The angle of the shadow.
 * @param $y
 *   The angle of the shadow.
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_shadow(stdClass $image, $color, $opacity, $sigma, $x, $y) {
  $shadow = new Imagick();
  $shadow->newImage($image->resource->getImageWidth(), $image->resource->getImageHeight(), $color);
  $shadow->setImageBackgroundColor(new ImagickPixel($color));
  $shadow->setImageFormat("png");
  $shadow->shadowImage($opacity, $sigma, $x, $y);
  $shadow->compositeImage($image->resource, Imagick::COMPOSITE_OVER, $x + ($sigma * 2), $y + ($sigma * 2));

  $image->resource = $shadow;
  return $image->resource;
}

/**
 * Implements the imagick shadow effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_shadow($image, $data = array()) {
  image_toolkit_invoke('shadow', $image, $data);
}

/**
 * Settings form for the imagick shadow effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_shadow_form($action) {
  $default = array(
    'color' => '#454545',
    'opacity' => '100',
    'sigma' => '25',
    'x' => '0',
    'y' => '0',
  );
  $action = array_merge($default, (array) $action);

  $form = array(
    '#prefix' => '<div class="colorform" >',
    '#suffix' => '</div>',
  );

  $form['colorpicker'] = array(
    '#weight' => -1,
    '#markup' => '<div class="colorpicker" style="float:right;"></div>',
  );
  $form['color'] = array(
    '#type' => 'textfield',
    '#title' => t('Color of the shadow'),
    '#default_value' => $action['color'],
    '#size' => 7,
    '#element_validate' => array('imagecache_rgb_validate'),
    '#attributes' => array('class' => array('colorentry')),
  );

  // Adds the JS that binds the textarea with the farbtastic element.

  // Find each colorpicker placeholder:
  // initialize it,
  // then find the nearby textfield that is of type colorentry
  // and attach the colorpicker behavior to it.
  // This is so we can support more that one per page if neccessary.
  $init_colorpicker_script = "
    (function ($) {
      Drupal.behaviors.attachcolorpicker = {
        attach: function(context) {
          $('.colorpicker').each(function () {
            // Configure picker to be attached to the nearest colorentry field.
            linked_target = $('.colorentry', $(this).closest('.colorform'))
            farb = $.farbtastic($(this), linked_target);
          });
        }
      }
    })(jQuery);
  ";

  // Add Farbtastic color picker.
  $form['color']['#attached'] = array(
    'library' => array(
      array('system', 'farbtastic'),
    ),
    'js' => array(
      array(
        'type' => 'inline',
        'data' => $init_colorpicker_script,
      ),
    ),
  );

  $form['opacity'] = array(
    '#type' => 'textfield',
    '#title' => t('Opacity'),
    '#description' => t('The opacity of the shadow'),
    '#default_value' => $action['opacity'],
    '#size' => 3,
  );
  $form['sigma'] = array(
    '#type' => 'textfield',
    '#title' => t('Sigma'),
    '#description' => t('The sigma of the shadow'),
    '#default_value' => $action['sigma'],
    '#size' => 3,
  );
  $form['x'] = array(
    '#type' => 'textfield',
    '#title' => t('X'),
    '#description' => t('The X value of the shadow'),
    '#default_value' => $action['x'],
    '#size' => 3,
  );
  $form['y'] = array(
    '#type' => 'textfield',
    '#title' => t('Y'),
    '#description' => t('The Y value of the shadow'),
    '#default_value' => $action['y'],
    '#size' => 3,
  );
  return $form;
}
