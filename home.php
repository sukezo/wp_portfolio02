<?php get_header(); ?>
<main>
  <!-- 下層ページメインビュー -->
  <div class="p-sub-mv">
    <?php
    $news_page = get_page_by_path('news');
    ?>
    <div class="p-sub-mv__img">
      <?php
      $main_visual = get_field('news_mainvisual', $news_page->ID);
      if (!empty($main_visual)) : ?>
        <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="p-sub-mv__title">
      <div class="p-sub-mv__title-en"><?php echo ($news_page->post_name); ?></div>
      <div class="p-sub-mv__title-jp"><?php echo ($news_page->post_title); ?></div>
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

  <!--  -->
  <section class="p-news l-news">
    <div class="p-news__inner">
      <div class="p-news__contents">
        <ul>
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post(); ?>
              <li class="c-news-item">
                <article class="c-news-item__link">
                  <div class="c-news-item__meta">
                    <div class="c-news-item__date">
                      <time datetime="<?php echo wp_date('y-m-d'); ?>">
                        <?php echo wp_date('y.m.d'); ?>
                      </time>
                    </div>
                    <div class="c-news-item__category">
                      <?php
                      $category = get_the_category();
                      echo $category[0]->name;
                      ?>
                    </div>
                  </div>
                  <h4 class="c-news-item__title">
                    <?php the_title(); ?>
                  </h4>
                </article>
              </li>
          <? endwhile;
          endif;
          ?>
        </ul>
        <div class="p-news__pagination">
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
    </div>
  </section>


  <?php get_footer(); ?>