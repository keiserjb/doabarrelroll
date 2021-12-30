<?php

/**
 * @file
 * Contains \Drupal\doabarrelroll\Form\DoabarrelrollSettingsForm.
 */

namespace Drupal\doabarrelroll\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to configure the barrel roll settings.
 */
class DoabarrelrollSettingsForm extends ConfigFormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormID()
  {
    return 'doabarrelroll_settings_form';
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'doabarrelroll.settings',
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('doabarrelroll.settings');
    $form['doabarrelroll_style'] = array(
      '#type' => 'checkbox',
      '#title' => t('Do the official barrel roll'),
      '#description' => t('The Barrel Roll, as made famous by Star Fox and Google, is actually a move known by airplane pilots as the Aileron Roll. The actual Barrel Roll is a different move, also supported by this module. After enabling this setting, try typing "Do a Barrel Roll" and "Do an Aileron Roll".'),
      '#default_value' => $this->config('doabarrelroll.settings')->get('style') == 'barrel',
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $config = $this->config('doabarrelroll.settings');
    $config->set('style', $form_state->getValue('style') ? 'barrel' : 'aileron');
    $config->save();

    parent::submitForm($form, $form_state);
  }
}
