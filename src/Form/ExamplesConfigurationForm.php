<?php

namespace Drupal\examples\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ExamplesConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'examples_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'examples.admin_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('examples.admin_settings');

    $form['your_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your message'),
      '#default_value' => $config->get('your_message'),
    ];

    $form['age'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Age'),
      '#default_value' => $config->get('con_age'),
    ];

    return parent::buildForm($form, $form_state);
  }

 /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('your_message')) < 3) {
      $form_state->setErrorByName('your_message', $this->t('The length  is too short. Please enter long message.'));
    }

    if ($form_state->getValue('age') < 18) {
      $form_state->setErrorByName('age', $this->t('The age should be greater than 18'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('examples.admin_settings')
      ->set('your_message', $form_state->getValue('your_message'))
      ->set('con_age', $form_state->getValue('age'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}