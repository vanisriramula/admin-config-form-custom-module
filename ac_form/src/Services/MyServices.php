<?php
namespace Drupal\ac_form\Services;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class MyService.
 *
 * @package Drupal\ac_form\Services
 */

class MyServices {
	/**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
	 protected $configFactory;
	 
 /**
   * Constructor.
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }
  public function getCurrentTime() {
    $config = $this->configFactory->get('ac_form.adminsettings');
    return $config->get('ac_form.adminsettings');
  }   
  
  /**
   * Gets my setting.
   */
   public function getMySetting() {
    $config = $this->configFactory->get('ac_form.adminsettings');
    $custom = [];
	$custom['country'] = $config->get('Country'); 
	$custom['timezone'] = $config->get('Timezone'); 
	
	/* dpm($custom); */
	
	$date = new \DateTime("now", new DateTime('Timezone') );
     return $date->format('d-m-Y h:i A'); */
	return $custom;
	//dpm($this->get('Timezone'));
  }
}