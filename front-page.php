<?php get_header(); ?>
<main>
  <!-- メインビジュアル -->
  <div class="p-mv">
    <div class="p-mv__message">
      <!-- Build a better design.<br> -->
      build a DESIGN.<br>
      we are your PARTNER.
    </div>
    <div class="swiper p-mv-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide p-mv-slider__item">
          <?php $image = get_field('mainvisual_img1');
          if (!empty($image)) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        </div>
        <div class="swiper-slide p-mv-slider__item">
          <?php $image = get_field('mainvisual_img2');
          if (!empty($image)) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        </div>
        <div class="swiper-slide p-mv-slider__item">
          <?php $image = get_field('mainvisual_img3');
          if (!empty($image)) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- お知らせ -->
  <section class="p-top-news l-top-news">
    <div class="l-inner">
      <div class="p-top-news__contents">
        <ul>
          <?php
          $news_query = new WP_Query();
          $param = array(
            'posts_per_page' => '1', //表示件数。-1なら全件表示
            'post_type' => 'post', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
            'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
            'order' => 'DESC'
          );
          $news_query->query($param);
          if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post();
          ?>
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
          <?php
            endwhile;
          endif;
          wp_reset_postdata()
          ?>
        </ul>
        <div class="p-top-news__btn">
          <a href="<?php echo esc_url(home_url('/news')); ?>" class="p-top-news__news-btn c-news-btn">記事一覧へ</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 制作実績 -->
  <?php
  $works_section = get_page_by_path('works');
  ?>
  <section class="p-top-works l-top-works">
    <div class="p-top-works__inner">
      <div class="c-section-title">
        <h2 class="c-section-title__jp">制作実績</h2>
        <span class="c-section-title__en c-section-title__right">works</span>
      </div>
      <div class="p-top-works__contents">
        <div class="p-top-works__swiper">
          <div class="swiper p-top-works-slider">
            <div class="swiper-wrapper">
              <?php
              $works_query = new WP_Query();
              $param = array(
                'post_type' => 'works', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
                'posts_per_page' => '3', //表示件数。-1なら全件表示
              );
              $works_query->query($param);
              if ($works_query->have_posts()) : while ($works_query->have_posts()) : $works_query->the_post();
              ?>
                  <div class="swiper-slide p-top-works-slider__item">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                      <img src="https://via.placeholder.com/1280.png">
                    <?php endif; ?>
                  </div>
              <?php
                endwhile;
              endif;
              wp_reset_postdata()
              ?>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="p-top-works__content">
          <h3><?php the_field('works_top-title', $works_section->ID); ?></h3>
          <p><?php the_field('works_top-text', $works_section->ID); ?></p>
          <div class="p-top-works__btn">
            <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-btn2">詳細を見る</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 企業概要 -->
  <?php
  $overview_section = get_page_by_path('overview');
  ?>
  <section class="p-top-overview l-top-overview">
    <div class="p-top-overview__inner">
      <div class="c-section-title">
        <h2 class="c-section-title__jp">企業概要</h2>
        <span class="c-section-title__en c-section-title__left">overview</span>
      </div>
      <div class="p-top-overview__contents">
        <div class="p-top-overview__content">
          <h3><?php the_field('overview_top-title', $overview_section->ID); ?></h3>
          <p><?php the_field('overview_top-text', $overview_section->ID); ?></p>
          <div class="p-top-overview__btn">
            <a href="<?php echo esc_url(home_url('/overview')); ?>" class="c-btn2">詳細を見る</a>
          </div>
        </div>
        <div class="p-top-overview__img">
          <?php
          $overview_img = get_field('overview_mainvisual', $overview_section->ID);
          if (!empty($overview_img)) : ?>
            <img src="<?php echo esc_url($overview_img['url']); ?>" alt="<?php echo esc_attr($overview_img['alt']); ?>" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- blog -->
  <section class="p-top-blog l-top-blog">
    <div class="l-inner">
      <div class="p-top-blog__contents">
        <div class="c-section-title">
          <h2 class="c-section-title__jp">ブログ</h2>
          <span class="c-section-title__en c-section-title__right">blog</span>
        </div>
        <ul class="p-top-blog__cards p-cards">
          <?php
          $blog_query = new WP_Query();
          $param = array(
            'posts_per_page' => '3', //表示件数。-1なら全件表示
            'post_type' => 'blog', //カスタム投稿タイプの名称を入れる←ここ変える(投稿だったらpost.カスタム投稿ならslug名)
            'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
            'order' => 'DESC'
          );
          $blog_query->query($param);
          if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post();
          ?>
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
          <?php
            endwhile;
          endif;
          wp_reset_postdata()
          ?>
        </ul>
        <div class="p-top-blog__btn">
          <a href="<?php echo esc_url(home_url('/blog')); ?>" class="c-btn2">ブログ一覧へ</a>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>