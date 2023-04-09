<?php get_header(); ?>
<main>
  <!-- 下層ページメインビュー -->
  <div class="p-sub-mv">
    <?php
    $blog_page = get_page_by_path('blog');
    ?>
    <div class="p-sub-mv__img">
      <?php
      $main_visual = get_field('blog_mainvisual', $blog_page->ID);
      if (!empty($main_visual)) : ?>
        <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="p-sub-mv__title">
      <div class="p-sub-mv__title-en"><?php echo ($blog_page->post_name); ?></div>
      <div class="p-sub-mv__title-jp"><?php echo ($blog_page->post_title); ?></div>
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

  <section class="p-blog">
    <div class="l-inner">
      <!-- カテゴリー選択ボタン -->
      <div class="p-blog__category c-category">
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="c-category-btn c-category-btn--current">all</a>
        <?php
        $terms = get_terms('blog_category');
        foreach ($terms as $term) :
        ?>
          <a href="<?php echo esc_url(get_term_link($term->term_id)); ?>" class="c-category-btn">
            <?php echo $term->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
      <!-- 投稿出力 -->
      <ul class="p-blog__cards p-cards">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <li class="p-card">
              <a href="<?php the_permalink(); ?>" class="p-card__link">
                <div class="p-card__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="https://via.placeholder.com/500.jpg">
                  <?php endif; ?>
                </div>
                <div class="p-card__lead">
                  <h3 class="p-card__title"><?php the_title(); ?></h3>
                  <p class="p-card__text"><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                </div>
                <div class="p-card__meta">
                  <div class="p-card__category">
                    <?php
                    $term = get_the_terms($post->ID, 'blog_category');
                    echo $term[0]->name;
                    ?>
                  </div>
                  <time datetime="<?php echo wp_date('y-m-d'); ?>" class="p-card__date">
                    <?php echo wp_date('y.m.d'); ?>
                  </time>
                </div>
              </a>
            </li>
        <? endwhile;
        endif;
        ?>
      </ul>
      <!-- ページネーション -->
      <div class="p-blog__pagination">
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