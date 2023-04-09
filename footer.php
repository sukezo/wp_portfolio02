<!-- お問い合わせ -->
<?php if (!is_page('contact') && !is_page('contact_thanks')) : ?>
  <?php get_template_part('parts/contact-parts'); ?>
<?php endif; ?>

</main>

<!-- フッター -->
<footer class="p-footer l-footer">
  <div class="p-footer__inner">
    <div class="p-footer__contents">
      <div class="p-footer__logo">
        sukezo design.
      </div>
      <ul class="p-footer__items">
        <li class="p-footer___item">
          <a href="<?php echo esc_url(home_url('/')); ?>">top</a>
        </li>
        <li class="p-footer___item">
          <a href="<?php echo esc_url(home_url('/news')); ?>">news</a>
        </li>
        <li class="p-footer___item">
          <a href="<?php echo esc_url(home_url('/works')); ?>">works</a>
        </li>
        <li class="p-footer___item">
          <a href="<?php echo esc_url(home_url('/overview')); ?>">overview</a>
        </li>
        <li class="p-footer___item">
          <a href="<?php echo esc_url(home_url('/blog')); ?>">blog</a>
        </li>
      </ul>
    </div>
    <div class="p-footer__copylight">
      <small>© 2023 sukezo design.</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>