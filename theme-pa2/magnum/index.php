<?php get_header(); mg_banner(); $cur = get_queried_object_id(); ?>
<section class="sec sec--tight"><div class="wrap">
  <nav class="subcats" aria-label="Chuyên mục"><?php foreach (['tin-tuc', 'tu-van', 'tin-tuyen-dung', 'cho-thue-thanh-ly', 'thanh-ly', 'dich-vu', 'linh-vuc'] as $s) { $c = get_category_by_slug($s); if ($c && $c->count) echo '<a class="' . ($cur == $c->term_id ? 'on' : '') . '" href="' . esc_url(get_category_link($c)) . '">' . esc_html($c->name) . '</a>'; } ?></nav>
  <div class="nlist"><?php if (have_posts()) { while (have_posts()) { the_post(); echo mg_post_card(get_the_ID(), 'row'); } } else echo '<p>Chưa có bài viết.</p>'; ?></div>
  <?php mg_pagination(); ?>
</div></section>
<?php get_footer();
