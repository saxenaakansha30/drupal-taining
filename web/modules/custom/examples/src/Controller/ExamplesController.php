<?php

namespace Drupal\examples\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Drupal\user\Entity\User;

/**
 * Provides route responses for the Example module.
 */
class ExamplesController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function content(NodeInterface $node) {
    // dump($node);
    // die;
    $id = $node->get('uid')->getValue()[0]['target_id'];
    $account = User::load($id); // pass your uid
    $name = $account->getDisplayName();

    return [
      '#markup' => 'Hello, world ' . $name,
    ];
  }

}