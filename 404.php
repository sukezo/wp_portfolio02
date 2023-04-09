<?php get_header(); ?>

<main>
  <section class="p-404">
    <div class="l-inner">
      <div class="p-404__contents">
        <h2 class="p-404__title">404 Not Found</h2>
        <p class="p-404__message">お探しのページは<br class="u-mobile">見つかりませんでした。</p>
        <div class="p-404__btn">
          <a href="<?php echo esc_url(home_url('/')); ?>">TOPへ</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>