<?php get_header(); mg_banner('Sản phẩm'); $pg = max(1, (int) get_query_var('paged'), (int) ($_GET['trang'] ?? 0));
$q = new WP_Query(['post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => 16, 'paged' => $pg, 'orderby' => 'menu_order date', 'order' => 'DESC']); ?>
<section class="sec sec--tight"><div class="wrap"><?php echo mg_cat_tabs(0); ?>
<?php foreach (mg_top_cats() as $t) : $ps = mg_products($t->slug, 4); if (!$ps) continue; ?>
  <div class="cblock reveal">
    <div class="cblock__h"><h2><a href="<?php echo esc_url(get_term_link($t)); ?>"><?php echo esc_html($t->name); ?></a></h2><a class="more" href="<?php echo esc_url(get_term_link($t)); ?>">Xem tất cả <?php echo (int) $t->count; ?> sản phẩm <?php echo mg_ico('arrow', 16); ?></a></div>
    <div class="lgrid"><?php foreach ($ps as $p) echo mg_card($p->ID); ?></div>
  </div>
<?php endforeach; ?>
</div></section>
<?php get_footer();
