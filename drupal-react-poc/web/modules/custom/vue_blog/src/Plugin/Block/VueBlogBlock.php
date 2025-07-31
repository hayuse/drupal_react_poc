<?php

namespace Drupal\vue_blog\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Vue Blog' Block.
 *
 * @Block(
 *   id = "vue_blog_block",
 *   admin_label = @Translation("Vue Blog Block"),
 *   category = @Translation("Custom"),
 * )
 */
class VueBlogBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'vue_blog_template',
      '#attached' => [
        'library' => [
          'vue_blog/vue_blog',
        ],
      ],
    ];
  }

}
