<?php

namespace Drupal\alter_car\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * Class AlterCarsController
 */
class AlterCarsController extends ControllerBase {

  /**
   * Get user cars information.
   *
   * @return array
   *   Return cars info markup.
   */
  public function carsCount() {
    $uid = $this->currentUser()->id();
    $count = $this->getUserCarsByUid($uid);
    return [
      '#type' => 'markup',
      '#markup' => $this->t('You have a @count cars', [
        '@count' => $count,
      ])
    ];
  }

  /**
   * Get user referenced cars.
   *
   * @param int user id
   *   The user id.
   *
   * @return int
   *   Return user referenced cars.
   */
  public function getUserCarsByUid($uid) {
    $user = User::load($uid);
    $count = count($user->get('field_car')->getValue());
    return $count;
  }
}
