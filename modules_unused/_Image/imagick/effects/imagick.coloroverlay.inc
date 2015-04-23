<?php

/**
 * Adds an overlay to a image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $layer
 *   The image that needs to be placed on top of the source image.
 * @param $x
 *   The horizontal offset of the overlay.
 * @param $y
 *   The vertical offset of the overlay.
 * @param $alpha
 *   The transparency of the overlay layer.
 */
function image_imagick_overlay(stdClass $image, stdClass $layer, $x, $y, $alpha = 100, $reverse = FALSE) {
  $path = drupal_realpath($layer->source);
  $overlay = new Imagick($path);
  if ($alpha != 100) {
    $overlay->setImageFormat('png');
    $overlay->setImageOpacity($alpha / 100);
  }
  return $image->resource->compositeImage($overlay, Imagick::COMPOSITE_DEFAULT, $x, $y);
}

/**
 * Implements hook_{toolkit}_{effect}()
 */
function image_imagick_coloroverlay(stdClass $image, $data = array()) {
  $color = new Imagick();
  $color->newImage($image->info['width'], $image->info['height'], $data['RGB']['HEX']);

  return $image->resource->compositeImage($color, Imagick::COMPOSITE_DEFAULT, 0, 0);
}

/**
 * Adds an overlay to a image
 *
 * @param $image
 *   An image object. The $image->resource value will be modified by this call.
 * @param $hex
 *   The color used to create the overlay.
 * @param $alpha
 *   The transparency of the overlay layer.
 */
function image_imagick_coloroverlay_alpha(stdClass $image, $hex, $alpha) {
  $color = new Imagick();
  $color->newImage($image->info['width'], $image->info['height'], $hex);
  $color->setImageFormat('png');
  $color->setImageOpacity($alpha / 100);

  return $image->resource->compositeImage($color, Imagick::COMPOSITE_DEFAULT, 0, 0);
}

/**
 * Implements the imagick color overlay with alpha effect.
 *
 * @param $image
 *   An image object
 * @param array $data
 *   The data passed from the form
 */
function imagick_coloroverlay_alpha($image, $data = array()) {
  image_toolkit_invoke('coloroverlay_alpha', $image, $data);
}

/**
 * Settings form for the imagick color overlay with alpha effect.
 *
 * @param $action
 *   The saved action form parameters.
 */
function imagick_coloroverlay_alpha_form($action) {
  $default = array(
    'HEX' => '#E2DB6A',
    'alpha' => 50,
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
  $form['HEX'] = array(
    '#type' => 'textfield',
    '#title' => t('HEX'),
    '#default_value' => $action['HEX'],
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
  $form['HEX']['#attached'] = array(
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
  $form['alpha'] = array(
    '#type' => 'textfield',
    '#title' => t('Opacity'),
    '#description' => t('Opacity of the color overlay in percents.'),
    '#default_value' => $action['alpha'],
    '#size' => 3,
  );
  return $form;
}
