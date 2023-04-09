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

  <section class="p-single-works">
    <div class="l-inner">
      <div class="p-single-works__contents">
        <h2 class="p-single-works__">
          <?php the_title(); ?>
        </h2>
        <div class="p-single-works__meta">
          <time datetime="<?php echo wp_date('y-m-d'); ?>" class="p-single-works__date">
            <?php echo wp_date('y.m.d'); ?>
          </time>
          <div class="p-single-works__category">
            <?php
            $term = get_the_terms($post->ID, 'works_category');
            echo $term[0]->name;
            ?>
          </div>
        </div>
        <!-- スライダー -->
        <div class="p-single-works__main-swiper p-single-works-main-slider swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img1');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img2');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img3');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img4');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img5');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-main-slider__item">
              <?php $image = get_field('single-works_img6');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="p-single-works-main-slider__next swiper-button-next"></div>
          <div class="p-single-works-main-slider__prev swiper-button-prev"></div>
        </div>
        <!-- サムネイル -->
        <div class="p-single-works__sub-swiper p-single-works-sub-slider swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img1');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img2');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img3');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img4');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img5');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
            <div class="swiper-slide p-single-works-sub-slider__item">
              <?php $image = get_field('single-works_img6');
              if (!empty($image)) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!--  -->
        <ul class="p-single-works__point">
          <li class="p-single-works__point-item">
            <?php $text = get_field('single-works_text1'); ?>
            <?php if ($text) : ?>
              <h3>制作のポイント</h3>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
          </li>
          <li class="p-single-works__point-item">
            <?php $text = get_field('single-works_text2'); ?>
            <?php if ($text) : ?>
              <h3>デザインのポイント</h3>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
          </li>
          <li class="p-single-works__point-item">
            <?php $text = get_field('single-works_text3'); ?>
            <?php if ($text) : ?>
              <h3>その他のポイント</h3>
              <p><?php echo $text; ?></p>
            <?php endif; ?>
          </li>
        </ul>
        <!-- ページネーション -->
        <div class="p-single-works__single-pagination c-single-pagination">
          <div class="c-single-pagination__btn">
            <a href="<?php echo esc_url(home_url('/works')); ?>">一覧</a>
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

  <!-- 関連記事 -->
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
          $post_type_slug = 'works'; // カスタム投稿の投稿タイプスラッグ
          $taxonomy_slug = 'works_category'; // タクソノミーのスラッグ
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
                      $taxonomy_terms = get_the_terms($post->ID, 'works_category');
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