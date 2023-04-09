<?php get_header(); ?>
<main>
  <!-- 下層ページメインビュー -->
  <div class="p-sub-mv">
    <?php
    $contact_page = get_page_by_path('contact');
    ?>
    <div class="p-sub-mv__img">
      <?php
      $main_visual = get_field('contact_mainvisual', $contact_page->ID);
      if (!empty($main_visual)) : ?>
      <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="p-sub-mv__title">
      <div class="p-sub-mv__title-en"><?php echo ($contact_page->post_name); ?></div>
      <div class="p-sub-mv__title-jp"><?php echo ($contact_page->post_title); ?></div>
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
  <section class="p-contact">
    <div class="l-inner">
      <div class="p-contact__contents">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php echo do_shortcode('[contact-form-7 id="211" title="お問い合わせ"]'); ?>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>