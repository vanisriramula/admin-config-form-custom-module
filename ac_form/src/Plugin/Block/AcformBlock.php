<?php
namespace Drupal\ac_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'form' block.
 *
 * @Block(
 *   id = "acform_block",
 *   admin_label = @Translation("AC Block"),
 *   category = @Translation("Custom AC form block")
 * )
 */

class AcformBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
   public function build() {
       $service = \Drupal::service('ac_form.my_service');
	   //dpm($service->getMySetting());
	   
	    
		
  }
  
}