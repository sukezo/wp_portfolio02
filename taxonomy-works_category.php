<?php get_header(); ?>
<main>
  <!-- 下層ページメインビュー -->
  <div class="p-sub-mv">
    <?php
    $works_page = get_page_by_path('works');
    ?>
    <div class="p-sub-mv__img">
      <?php
      $main_visual = get_field('works_mainvisual', $works_page->ID);
      if (!empty($main_visual)) : ?>
        <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="p-sub-mv__title">
      <div class="p-sub-mv__title-en"><?php echo ($works_page->post_name); ?></div>
      <div class="p-sub-mv__title-jp"><?php echo ($works_page->post_title); ?></div>
    </div>
  </div>

  <!-- パンくず -->
  <?php if (!is_front_page()) { ?>
    <?php if (function_exists('bcn_display')) { ?>
      <nav class="c-bread-crumbs">
        <div class="l-inner">
          <div class="c-bread-crumbs__contents" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        </div>
      </nav>
    <?php } ?>
  <?php } ?>

  <section class="p-works">
    <div class="l-inner">
      <div class="p-works__category c-category">
        <!-- カテゴリー選択ボタン -->
        <?php
        $queried_object = get_queried_object();
        $cat_slug = $queried_object->slug;
        $cat_name = $queried_object->name;
        ?>
        <a href="<?php echo esc_url(home_url('/works/')); ?>" class="c-category-btn">all</a>
        <?php
        $terms = get_terms('works_category');
        foreach ($terms as $term) :
        ?>
          <a href="<?php echo esc_url(get_term_link($term->term_id)); ?>" class="c-category-btn 
        <?php if ($cat_slug === $term->slug) {
            echo 'c-category-btn--current';
          } ?>">
            <?php echo $term->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
      <!-- 投稿出力 -->
      <ul class="p-works__cards3 p-cards3">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <li class="p-card3">
              <a href="<?php the_permalink(); ?>">
                <div class="p-card3__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="https://via.placeholder.com/1280.png">
                  <?php endif; ?>
                  <div class="p-card3__meta">
                    <div class="p-card3__category">
                      <?php
                      $term = get_the_terms($post->ID, 'works_category');
                      echo $term[0]->name;
                      ?>
                    </div>
                  </div>
                </div>
                <h3 class="p-card3__title"><?php the_field('works_title'); ?></h3>
              </a>
            </li>
        <? endwhile;
        endif;
        ?>
      </ul>
      <!-- ページネーション -->
      <div class="p-works__pagination">
        <?php
        $archive_pagination = [
          'mid_size' => 1,
          'prev_text' => 'prev',
          'next_text' => 'next',
          'screen_reader_text' => ' ',
        ];
        the_posts_pagination($archive_pagination);
        ?>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>