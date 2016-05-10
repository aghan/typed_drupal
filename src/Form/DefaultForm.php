<?php

/**
 * @file
 * Contains \Drupal\sluggify\Form\DefaultForm.
 */
declare(strict_types=1);

namespace Drupal\sluggify\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\sluggify\SluggifyService;

/**
 * Class DefaultForm.
 *
 * @package Drupal\sluggify\Form
 */
class DefaultForm extends FormBase {

  private $slugService;
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sluffigy_form';
  }

  public function __construct(SluggifyService $slugservice) {
    $this->slugService = $slugservice;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
      // Load the service required to construct this class.
      $container->get('sluggify.default')
    );
  }
  
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['url'] = array (
      '#type' => 'textfield',
      '#title' => t('URL Field'),
      '#description' => t('Please enter URL you want to sluggify'),
      '#required' => TRUE,
    );
    // Submit Button.
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $sluggified = $this->slugService->sluggifyfunction($values['url']);  
    drupal_set_message(t('Your sluggified URL is : @slug', ['@slug' => $sluggified]));
    $form_state->setRedirect(
      'sluggify_form'
    );
  }
}
