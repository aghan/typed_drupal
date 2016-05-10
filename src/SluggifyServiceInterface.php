<?php

/**
 * @file
 * Contains \Drupal\sluggify\SluggifyServiceInterface.
 */

namespace Drupal\sluggify;

/**
 * Interface SluggifyServiceInterface.
 *
 * @package Drupal\sluggify
 */
interface SluggifyServiceInterface {
  public function sluggifyfunction(string $string, string $separator = '-', int $maxLength = 96) : string;
}
