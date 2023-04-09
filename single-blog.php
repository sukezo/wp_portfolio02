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

  <section class="p-single-blog">
    <div class="l-inner">
      <div class="p-single-blog__contents">
        <!--  -->
        <div class="c-blog-main">
          <h2 class="c-blog-main__title"><?php the_title(); ?></h2>
          <div class="c-blog-main__meta">
            <time datetime="<?php echo wp_date('y-m-d'); ?>" class="c-blog-main__date">
              <?php echo wp_date('y.m.d'); ?>
            </time>
            <div class="c-blog-main__category">
              <?php
              $term = get_the_terms($post->ID, 'blog_category');
              echo $term[0]->name;
              ?>
            </div>
          </div>
          <div class="c-blog-main__img">
            <?php $image = get_field('single-blog_main-img');
            if (!empty($image)) : ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
          </div>
          <?php $text = get_the_content();
          if (!$text) {
            // 入力されていなかった場合の処理
          } else {
            $text = str_replace('<p', '<p class="c-blog-main__text" ', $text);
            echo $text;
          }
          ?>
        </div>
        <!--  -->
        <div class="c-blog-sub">
          <?php $text = get_field('single-blog_main-sub-title'); ?>
          <?php if ($text) : ?>
            <h3 class="c-blog-sub__title"><?php echo $text; ?></h3>
          <?php endif; ?>
          <?php $text = get_field('single-blog_main-sub-text'); ?>
          <?php if ($text) : ?>
            <p class="c-blog-sub__text"><?php echo $text; ?></p>
          <?php endif; ?>
        </div>
        <!--  -->
        <div class="c-tab">
          <input id="tab-name1" type="radio" name="tab-name" checked />
          <label class="c-tab__name" for="tab-name1">
            <span><?php the_field('single-blog_sub1-title'); ?></span>
          </label>
          <input id="tab-name2" type="radio" name="tab-name" />
          <label class="c-tab__name" for="tab-name2">
            <span><?php the_field('single-blog_sub2-title'); ?></span>
          </label>
          <input id="tab-name3" type="radio" name="tab-name" />
          <label class="c-tab__name" for="tab-name3">
            <span><?php the_field('single-blog_sub3-title'); ?></span>
          </label>
          <div class="c-tab__item" id="tab-name1__item">
            <?php $text = get_field('single-blog_sub1-text'); ?>
            <?php if ($text) : ?>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
            <div class="c-tab__item-img">
              <?php $image = get_field('single-blog_sub1-img');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="c-tab__item" id="tab-name2__item">
            <?php $text = get_field('single-blog_sub2-text'); ?>
            <?php if ($text) : ?>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
            <div>
              <?php $image = get_field('single-blog_sub2-img');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="c-tab__item" id="tab-name3__item">
            <?php $text = get_field('single-blog_sub3-text'); ?>
            <?php if ($text) : ?>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
            <div>
              <?php $image = get_field('single-blog_sub3-img');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- ページネーション -->
        <div class="p-single-blog__single-pagination c-single-pagination">
          <div class="c-single-pagination__btn">
            <a href="<?php echo esc_url(home_url('/blog')); ?>">一覧</a>
          </div>
          <?php
          the_post_navigation(array(
            'prev_text' => 'next',
            'next_text' => 'prev',
          ));
          ?>
        </div>
      </div>
    </div>
  </section>

  <!--  -->
  <section class="p-related-article">
    <div class="l-inner">
      <div class="p-related-article__contents">
        <h4 class="p-related-article__title">関連記事</h4>
        <!-- 関連記事(同じタームを持つ記事) -->
        <ul class="p-related-article__cards2 p-cards2">
          <?php
          if (wp_is_mobile()) {
            $num = 3; // スマホの表示数(全件は-1)
          } else {
            $num = 5; // PCの表示数(全件は-1)
          }
          $post_type_slug = 'blog'; // カスタム投稿の投稿タイプスラッグ
          $taxonomy_slug = 'blog_category'; // タクソノミーのスラッグ
          $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug);
          if ($post_terms && !is_wp_error($post_terms)) {
            $terms_slug = array();
            foreach ($post_terms as $value) {
              $terms_slug[] = $value->slug;
            }
          }
          $args = array(
            'post_type' => $post_type_slug,
            'posts_per_page' => $num, // 表示件数
            'post__not_in' => array($post->ID), // 表示中の記事は除く
            'orderby' =>  'rand', // ランダムに投稿を取得
            'tax_query' => array(
              array(
                'taxonomy' => $taxonomy_slug,
                'field' => 'slug',
                'terms' => $terms_slug,
              )
            )
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="p-card2">
                <!-- 記事へのリンク -->
                <a href="<?php the_permalink(); ?>" class="p-card2__link">
                  <div class="p-card2__img">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                      <img src="https://via.placeholder.com/500.jpg">
                    <?php endif; ?>
                  </div>
                  <div class="p-card2__lead">
                    <h3 class="p-card2__title"><?php the_title(); ?></h3>
                    <p class="p-card2__text u-mobile"><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                  </div>
                  <div class="p-card2__meta">
                    <div class="p-card2__category">
                      <!-- カテゴリー(ターム)全部表示 -->
                      <?php
                      $taxonomy_terms = get_the_terms($post->ID, 'blog_category');
                      foreach ($taxonomy_terms as $taxonomy_term) {
                        echo '<span class="' . $taxonomy_term->slug . '">' . $taxonomy_term->name . '</span>';
                      }
                      ?>
                    </div>
                    <!-- 投稿日 -->
                    <time datetime="<?php echo wp_date('y-m-d'); ?>" class="p-card2__date">
                      <?php echo wp_date('y.m.d'); ?>
                    </time>
                  </div>
                </a>
              </li>
            <?php endwhile;
          else : ?>
            <?php wp_reset_query(); ?>
            <p>関連記事はありません</p>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>