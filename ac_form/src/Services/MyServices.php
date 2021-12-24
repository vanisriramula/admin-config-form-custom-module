<?php
namespace Drupal\ac_form\Services;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\ConfigFactoryInterface;

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
	 
   public function __construct(ConfigFactory $configFactory) {
	   
     $this->configFactory = $configFactory;
	 
   }
  
  /**
   * Gets my setting.
   */
   public function getMySetting() {
    $config = $this->configFactory->get('ac_form.adminsettings');
    $custom = [];
	$custom['country'] = $config->get('Country'); 
	$custom['timezone'] = $timezone = $config->get('Timezone'); 
	
	date_default_timezone_set($timezone);
    $custom['date'] = date('d-m-Y H:i:s');
	return $custom;
  }
}