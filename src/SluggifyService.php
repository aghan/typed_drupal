<?php


/**
 * @file
 * Contains \Drupal\sluggify\SluggifyService.
 */

namespace Drupal\sluggify;

/**
 * Class SluggifyService.
 *
 * @package Drupal\sluggify
 */
class SluggifyService implements SluggifyServiceInterface {
  /**
   * Constructor.
   */
  public function __construct() {}

  public function sluggifyfunction(string $string, string $separator = '-', int $maxLength = 96) : string {
    $title = preg_replace("%[^-/+|\w ]%", '', $string);
    $title = strtolower(trim(substr($title, 0, $maxLength), '-'));
    $title = preg_replace("/[\/_|+ -]+/", $separator, $title);
    return $title;
  }
}
