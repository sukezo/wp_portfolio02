<?php get_header(); ?>
<main>
  <!-- 下層ページメインビュー -->
  <div class="p-sub-mv">
    <?php
    $overview_page = get_page_by_path('overview');
    ?>
    <div class="p-sub-mv__title"><?php echo ($overview_page->post_name); ?></div>
    <div class="p-sub-mv__img">
      <?php
    $main_visual = get_field('overview_mainvisual', $overview_page->ID);
    if (!empty($main_visual)) : ?>
      <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="p-sub-mv__title">
      <div class="p-sub-mv__title-en"><?php echo ($overview_page->post_name); ?></div>
      <div class="p-sub-mv__title-jp"><?php echo ($overview_page->post_title); ?></div>
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


  <section class="p-overview">
    <div class="l-inner">
      <div class="p-overview__contents">
        <dl class="p-overview__item">
          <dt>会社名</dt>
          <dd><?php the_field('overview_company-name'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>設立</dt>
          <dd><?php the_field('overview_established'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>資本金</dt>
          <dd><?php the_field('overview_capital'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>売上高</dt>
          <dd><?php the_field('overview_earnings'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>代表者</dt>
          <dd><?php the_field('overview_ceo'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>従業員数</dt>
          <dd><?php the_field('overview_total-employees'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>事業内容</dt>
          <dd><?php the_field('overview_contents'); ?></dd>
        </dl>
        <dl class="p-overview__item">
          <dt>所在地</dt>
          <dd><?php the_field('overview_address'); ?></dd>
        </dl>
        <div class="p-overview__map">
          <?php $map = get_field('overview_map'); ?>
          <?php if ($map) : ?>
          <p><?php echo $map; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>