<?php

namespace Drupal\examples\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Welcome Message' Block.
 *
 * @Block(
 *   id = "examples_welcome_block",
 *   admin_label = @Translation("Welcome Block"),
 *   category = @Translation("Examples"),
 * )
 */
class WelcomeMessage extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $msg = 'Today is a great day to start something new!!';
    $num1 = 10;
    $num2 = 20;


    return [
      '#theme' => 'examples_welcome_block',
      '#message' => $msg,
      '#result' => $num1 + $num2,
    ];
  }

}