<?php

/**
 * @file
 * Contains \Drupal\Tests\node\Unit\PageCache\DenyNodePreviewTest.
 */
declare(strict_types=1);

namespace Drupal\Tests\sluggify\Unit\SluggifyService;

use Drupal\Tests\UnitTestCase;

/**
 * 
 * @dataProvider providerTestSluggifyReturnsSluggifiedString
 */
class SluggifyServiceTest extends UnitTestCase {
  /**
     * @param string $originalString String to be sluggified
     * @param string $expectedResult What we expect our slug result to be
     *
     * @dataProvider providerTestSluggifyReturnsSluggifyString
     */
    public function testSluggifyReturnsSluggifyString(string $originalString, string $expectedResult) {
        $url = new \Drupal\sluggify\SluggifyService();
        $result = $url->sluggifyfunction($originalString);
        $this->assertEquals($expectedResult, $result);
    }
    public function providerTestSluggifyReturnsSluggifyString() {
      return array(
        array('This string will be sluggified', 'this-string-will-be-sluggified'),
        array('THIS STRING WILL BE SLUGGIFIED', 'this-string-will-be-sluggified'),
        array('This1 string2 will3 be sluggified10', 'this1-string2-will3-be-sluggified10'),
        array('This! @string#$ %$will ()be "sluggified', 'this-string-will-be-sluggified'),
      );
    }
}
