<?php

/**
 * Adds a frame to an image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $matte_color
 *   The string representing the matte color
 * @param $width
 *   The width of the border
 * @param $height
 *   The height of the border
 * @param $inner_bevel
 *   The inner bevel width
 * @param $outer_bevel
 *   The outer bevel width
 * @return
 *   TRUE or FALSE, based on success.
 */
function image_imagick_frame(stdClass $image, $matte_color, $width, $height, $inner_bevel, $outer_bevel) {
  return $image->resource->frameImage(new ImagickPixel($matte_color), $width, $height, $inner_bevel, $outer_bevel);
}

/**
 * Implements the imagick frame effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_frame($image, $data = array()) {
  image_toolkit_invoke('frame', $image, $data);
}

/**
 * Settings form for the imagick frame effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_frame_form($action) {
  $default = array(
    'matte_color' => '#707070',
    'width' => '20',
    'height' => '20',
    'inner_bevel' => '5',
    'outer_bevel' => '5',
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
  $form['matte_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Color of the shadow'),
    '#default_value' => $action['matte_color'],
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
  $form['matte_color']['#attached'] = array(
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

  $form['width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#description' => t('The width of the frame'),
    '#default_value' => $action['width'],
    '#size' => 3,
  );
  $form['height'] = array(
    '#type' => 'textfield',
    '#title' => t('Height'),
    '#description' => t('The height of the frame'),
    '#default_value' => $action['height'],
    '#size' => 3,
  );
  $form['inner_bevel'] = array(
    '#type' => 'textfield',
    '#title' => t('Inner bevel'),
    '#description' => t('The inner bevel of the frame'),
    '#default_value' => $action['inner_bevel'],
    '#size' => 3,
  );
  $form['outer_bevel'] = array(
    '#type' => 'textfield',
    '#title' => t('Outer bevel'),
    '#description' => t('The outer bevel of the frame'),
    '#default_value' => $action['outer_bevel'],
    '#size' => 3,
  );
  return $form;
}
