<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

                    <div class='aside-block double-spaced'>
                      <header class='background-neutral'>
                        <h2 class='section-title'>
                          Topics
                        </h2>
                      </header>
                      <ul class='meta-list slats'>
                        <?php $args = array(
                          'show_option_all'    => '',
                          'orderby'            => 'name',
                          'order'              => 'ASC',
                          'style'              => 'list',
                          'show_count'         => 1,
                          'hide_empty'         => 1,
                          'use_desc_for_title' => 1,
                          'child_of'           => 5,
                          'feed'               => '',
                          'feed_type'          => '',
                          'feed_image'         => '',
                          'exclude'            => '',
                          'exclude_tree'       => '',
                          'include'            => '',
                          'hierarchical'       => 1,
                          'title_li'           => '',
                          'show_option_none'   => __('No categories'),
                          'number'             => null,
                          'echo'               => 0,
                          'depth'              => 0,
                          'current_category'   => 0,
                          'pad_counts'         => 0,
                          'taxonomy'           => 'category',
                          'walker'             => null
                        ); ?>
                        <?php
                          $topics = wp_list_categories( $args );
                          $topics = str_replace('<a ', "<a class='text-meta capital-case' ", $topics);
                          $topics = preg_replace('~\((\d+)\)(?=\s*+<)~', "<span class='inline smaller light-text-color'>($1)</span>", $topics);
                          echo $topics;
                        ?>
                      </ul>
                    </div>
