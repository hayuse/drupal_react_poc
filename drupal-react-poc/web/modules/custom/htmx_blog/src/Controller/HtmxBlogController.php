<?php

namespace Drupal\htmx_blog\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Url;
use Drupal\image\Entity\ImageStyle;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for HTMX Blog routes.
 */
class HtmxBlogController extends ControllerBase {
  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new HtmxBlogController object.
   *
   * @param \Drupal\Core\Render\RendererInterface $renderer
   * The renderer.
   */

  /**
   * コンストラクタを追加.
   */
  public function __construct(RendererInterface $renderer, EntityTypeManagerInterface $entity_type_manager) {
    $this->renderer = $renderer;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */

  /**
   * Create メソッドを追加.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('renderer'),
      $container->get('entity_type.manager'),
    );
  }

  /**
   * ブログ詳細ページのレンダリング.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node to render.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The rendered node content.
   */
  public function getPost(NodeInterface $node) {
    if (!$node->access('view')) {
      return new Response($this->t('Access denied'), 403);
    }

    $view_builder = $this->entityTypeManager->getViewBuilder('node');
    $node_view = $view_builder->view($node, 'full');

    $build = [
      '#type' => 'container',
      '#attributes' => [
        'class' => 'blog-details-area',
        'id' => 'blog-details-area',
      ],
      'content' => $node_view,
    ];

    $rendered_html = $this->renderer->renderRoot($build);

    return new Response($rendered_html);
  }

  /**
   * Loads the next page of blog posts for infinite scroll.
   */
  public function loadMore(Request $request) {
    // 'page'パラメータを取得、なければ2
    $page = $request->query->get('page', 2);
    $limit = 10;
    $offset = ($page - 1) * $limit;

    // 次のページがあるか確認するため、1件多く取得.
    $nids = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('status', 1)
      ->condition('type', 'blog')
      ->sort('field_sort_weight', 'ASC')
      ->sort('created', 'ASC')
      ->range($offset, $limit + 1)
      ->accessCheck(TRUE)
      ->execute();

    $has_next_page = count($nids) > $limit;
    // 実際に表示するのはlimit件数分.
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

    // 新しいテンプレートを呼び出す.
    $build = [
      '#theme' => 'htmx_blog_list_items',
      '#posts' => $posts_data,
      '#next_page' => $has_next_page ? $page + 1 : NULL,
    ];

    $rendered_html = $this->renderer->renderRoot($build);
    return new Response($rendered_html);
  }

  /**
   * Saves the new sort order of blog posts.
   */
  public function saveSortOrder(Request $request) {
    // POSTされた 'item' パラメータ（IDの配列）を取得.
    $parameters = $request->request->all();
    $sorted_ids = $parameters['item'] ?? [];

    if (!empty($sorted_ids)) {
      $nodes = $this->entityTypeManager->getStorage('node')->loadMultiple($sorted_ids);

      $weight = 0;
      foreach ($sorted_ids as $nid) {
        if (isset($nodes[$nid])) {
          $node = $nodes[$nid];
          // 新しい重み（ソート順）を設定.
          $node->set('field_sort_weight', $weight);
          $node->save();
          $weight++;
        }
      }
    }

    // 成功を伝える（コンテンツは返さない）.
    return new Response(NULL, 204);
  }

}
