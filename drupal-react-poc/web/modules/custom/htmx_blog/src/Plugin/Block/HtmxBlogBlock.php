<?php

namespace Drupal\htmx_blog\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\image\Entity\ImageStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an 'HTMX Blog' Block.
 *
 * @Block(
 * id = "htmx_blog_block",
 * admin_label = @Translation("HTMX Blog Block"),
 * category = @Translation("Custom")
 * )
 */
class HtmxBlogBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new HtmxBlogBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $limit = 10;
    $nids = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('status', 1)
      ->condition('type', 'blog')
      ->sort('field_sort_weight', 'ASC')
      ->sort('created', 'ASC')
      ->range(0, $limit + 1)
      ->accessCheck(TRUE)
      ->execute();

    $has_next_page = count($nids) > $limit;
    $nids_to_load = array_slice($nids, 0, $limit);
    $nodes = $this->entityTypeManager->getStorage('node')->loadMultiple($nids_to_load);

    $posts_data = [];
    foreach ($nodes as $node) {
      $image_url = '';
      if (!$node->get('field_visual')->isEmpty()) {
        $image_uri = $node->get('field_visual')->entity->getFileUri();
        $image_url = ImageStyle::load('thumbnail')->buildUrl($image_uri);
      }
      $posts_data[] = [
        'nid' => $node->id(),
        'title' => $node->label(),
        'url' => $node->toUrl()->toString(),
        'visual' => $image_url,
        'htmx_url' => Url::fromRoute('htmx_blog.get_blog_post', ['node' => $node->id()])->toString(),
      ];
    }

    $build['content'] = [
      '#theme' => 'htmx_blog_list',
      '#posts' => $posts_data,
      '#next_page' => $has_next_page ? 2 : NULL,
    ];
    $build['#attached']['library'][] = 'htmx_blog/htmx';
    $build['#attached']['library'][] = 'htmx_blog/styling';
    $build['#attached']['library'][] = 'htmx_blog/sortable';
    $build['#attached']['library'][] = 'htmx_blog/main';
    return $build;
  }

}
