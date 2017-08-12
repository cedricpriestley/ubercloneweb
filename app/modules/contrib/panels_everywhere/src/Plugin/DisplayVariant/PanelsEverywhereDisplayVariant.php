<?php

/**
 * @file
 * Contains \Drupal\panels_everywhere_poc\Plugin\DisplayVariant\PanelsEverywhereDisplayVariant.
 */

namespace Drupal\panels_everywhere\Plugin\DisplayVariant;

use Drupal\panels\Plugin\DisplayVariant\PanelsDisplayVariant;
use Drupal\Core\Display\PageVariantInterface;
use Drupal\Core\Block\MainContentBlockPluginInterface;

/**
 * Provides a display variant that simply contains blocks.
 *
 * @todo: This shouldn't be necessary - the PanelsDisplayVariant should
 * implement PageVariantInterface, because, it's easy and then it can be used
 * to render the full page.
 *
 * @DisplayVariant(
 *   id = "panels_everywhere_variant",
 *   admin_label = @Translation("Panels Everywhere")
 * )
 */
class PanelsEverywhereDisplayVariant extends PanelsDisplayVariant implements PageVariantInterface {

  /**
   * The render array representing the main page content.
   *
   * @var array
   */
  protected $mainContent = [];

  /**
   * The title for the display variant.
   *
   * @var string
   */
  protected $title;

  /**
   * Sets the title for the page being rendered.
   *
   * @param string|array $title
   *   The page title: either a string for plain titles or a render array for
   *   formatted titles.
   *
   * @return $this
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setMainContent(array $main_content) {
    $this->mainContent = $main_content;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $main_content_included = NULL;
    $this->setPageTitle($this->title);
    foreach ($this->getRegionAssignments() as $region => $blocks) {
      if (!$blocks) {
        continue;
      }
      foreach ($blocks as $block_id => $block) {
        if ($block instanceof MainContentBlockPluginInterface) {
          $block->setMainContent($this->mainContent);
          $main_content_included = array($region, $block_id);
        }
      }
    }

    // Build it the render array!
    $build = parent::build();

    // Copied from BlockPageVariant.php.
    // The main content block cannot be cached: it is a placeholder for the
    // render array returned by the controller. It should be rendered as-is,
    // with other placed blocks "decorating" it.
    if (!empty($main_content_included)) {
      list ($region, $block_id) = $main_content_included;
      unset($build[$region][$block_id]['#cache']['keys']);
    }

    return $build;
  }
}
