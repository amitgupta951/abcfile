<?php
/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */
namespace Drupal\resume\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;


class ResumeForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'resume_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['form_title'] = array (
      '#type' => 'textfield',
      '#title' => ('Resume Builder'),
      '#required' => TRUE
    );
    $form['user_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#required' => TRUE,
      '#options' => array(
        'Select' => t('Select'),
        'Male' => t('Mr'),
        'Female' => t('Mrs'),
      ),
    );

    $form['user_fullname'] = array(
      '#type' => 'textfield',
      '#title' => t('Full Name:'),
      '#required' => TRUE,
    );

    $form['user_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      // '#required' => TRUE,
    );

    $form['user_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
      '#required' => TRUE,
    );

    $form['user_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );

    $form['user_address'] = array(
      '#type' => 'textarea',
      '#title' => t('Address:'),
      '#required' => TRUE,
      '#attributes' => array('placeholder' => t('Enter Your Address'),)
    );

    $form['user_objective'] = array(
      '#type' => 'textfield',
      '#title' => t('Objective:'),
      '#attributes' => array('placeholder' => t('Write something you plan to achieve'),)
    );

    $form['user_ssc'] = array(
      '#type' => 'textfield',
      '#title' => t('SSC'),
      '#required' => TRUE,
    );

    $form['user_hsc'] = array(
      '#type' => 'textfield',
      '#title' => t('HSC'),
      '#required' => TRUE,
    );

    $form['user_higher'] = array(
      '#type' => 'textfield',
      '#title' => t('Higher Qualificatin'),
      '#required' => TRUE,
    );

    $form['user_project'] = array(
      '#type' => 'textfield',
      '#title' => t('Project'),
      // '#required' => TRUE,
    );

    $form['user_skill'] = array(
      '#type' => 'textfield',
      '#title' => t('Skills'),
      // '#required' => TRUE,
    );

    $form['user_intrest'] = array(
      '#type' => 'textfield',
      '#title' => t('Intrest'),
      // '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**contents/abs
   * {@inheritdoc}
   */
    public function validateForm(array &$form, FormStateInterface $form_state) {

      if (strlen($form_state->getValue('user_number')) < 10) {
        $form_state->setErrorByName('user_number', $this->t('Your Mobile number is too small.'));
      }

    }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // foreach ($form_state->getValues() as $key => $value) {
        // \Drupal::messenger()->addMessage($this->t($key . ': ' . $value));

        $node = Node::create(['type' => 'resume']);
        $node->title= 'form_title';
        $node->field_gender = $form_state->getValue('user_gender');
        $node->field_full_name = $form_state->getValue('user_fullname');
        $node->field_email_id	= $form_state->getValue('user_mail');
        $node->field_contact_number	= $form_state->getValue('user_number');
        $node->field_dob = $form_state->getValue('user_dob');
        $node->field_address = $form_state->getValue('user_address');
        $node->field_objective = $form_state->getValue('user_objective');
        $node->field_ssc = $form_state->getValue('user_ssc');
        $node->field_hsc_diploma = $form_state->getValue('user_hsc');
        $node->field_higher_qualification	= $form_state->getValue('user_higher');
        $node->field_projects = $form_state->getValue('user_project');
        $node->field_skills = $form_state->getValue('user_skill');
        $node->field_interest = $form_state->getValue('user_intrest');

            $node->save();

            $nid = $node->id();

            //$node->id();
            // \Drupal::messenger()->addMessage($this->t('Your Resume is Successfully Created'));
            // $url = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $node->id()]);
            // return $form_state->setRedirectUrl($url);
            $nid=$node->id();
            \Drupal::messenger()->addMessage($this->t('Your Resume is Successfully Created'));
            $url = \Drupal\Core\Url::fromRoute('resume.resumecreate', ['nid' => $node->id()]);
           $form_state->setRedirectUrl($url);
   }
 }
//  }