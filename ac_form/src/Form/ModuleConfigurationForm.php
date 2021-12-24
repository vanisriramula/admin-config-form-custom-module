<?php

namespace Drupal\ac_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;



class ModuleConfigurationForm extends ConfigFormBase{
	
	 public function getFormId(){
       return 'ac_form';
  }
  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ac_form.adminsettings',
    ];
  }


  public function buildForm(array $form, FormStateInterface $form_state) {
	//$config = $this->config(static::SETTINGS);
    $config = $this->config('ac_form.adminsettings');  
   $form['Country'] = [
      '#type' => 'textfield',
	  '#title' => $this->t('Country'),
      '#maxlength' => 50,
      '#required' => true,
	  '#default_value' => $config->get('Country'),
      ];
     $form['City'] = [
      '#type' => 'textfield',
	  '#title' => $this->t('City'),
      '#maxlength' => 50,
      '#required' => true,
	  '#default_value' => $config->get('City'),
      ];
	  $form['Timezone'] = array(
      '#title' => t('Timezone'),
      '#type' => 'select',
     '#options' => array(t('SELECT'), 
							'America/Chicago' => t('America/Chicago'), 
							'America/New_York' => t('America/New_York'), 
							'Asia/Tokyo' => t('Asia/Tokyo'), 
							'Asia/Dubai' => t('Asia/Dubai'), 
							'Asia/Kolkata' => t('Asia/Kolkata'), 
							'Europe/Amsterdam' => t('Europe/Amsterdam'), 
							'Europe/Oslo' => t('Europe/Oslo'), 
							'Europe/London' => t('Europe/London')),
	 '#default_value' => $config->get('Timezone'),
);
	

    return parent::buildForm($form, $form_state); 	
  }

 public function submitForm(array &$form, FormStateInterface $form_state) {
	 
	 
	 $this->config('ac_form.adminsettings')
	 ->set('Country',$form_state->getValue('Country'))
	  ->set('City',$form_state->getValue('City'))
	   ->set('Timezone',$form_state->getValue('Timezone'))
	 ->save();
 
 parent::submitForm($form, $form_state);
   

   //dpm($this->config('ac_form.adminsettings')->get('Country'));
	
   
   
  }

}
