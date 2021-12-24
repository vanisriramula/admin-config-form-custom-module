<?php
namespace Drupal\ac_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\ac_form\Services\MyServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'form' block.
 *
 * @Block(
 *   id = "acform_block",
 *   admin_label = @Translation("AC Block"),
 *   category = @Translation("Custom AC form block")
 * )
 */

class AcformBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
  /**
   * @var customservice\Drupal\ac_form\Services\MyServices
   */
  protected $my_service;
  
  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   Class ContainerInterface.
   * @param array $configuration
   *   The Configuration.
   * @param string $plugin_id
   *   The Plugin ID.
   * @param mixed $plugin_definition
   *   The Plugin Definition.
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('my_service')
    );
  }

  /**
   * @param array $configuration
   *   The Configuration.
   * @param string $plugin_id
   *   The Plugin ID.
   * @param mixed $plugin_definition
   *   The Plugin Definition.
   * @param \Drupal\ac_form\Services\MyServices $my_Services
   *   Class MyServices.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, MyServices $my_Services) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->my_service = $my_Services;
  }
  
  /**
   * {@inheritdoc}
   */
   public function build() {
       
      $service = $this->my_service->getMySetting();
	  
	  return [
      '#theme' => 'ac_form_block',
      '#data' => ['location' => $service]
     ];
		
  }
  
}