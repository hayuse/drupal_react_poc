<?php

namespace Drupal\react_blog\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'React Blog' Block.
 *
 * @Block(
 *   id = "react_blog_block",
 *   admin_label = @Translation("React Blog Block"),
 *   category = @Translation("Custom"),
 * )
 */
class ReactBlogBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'react_blog_template',
      '#attached' => [
        'library' => [
          'react_blog/react_blog',
        ],
      ],
    ];
  }

}
