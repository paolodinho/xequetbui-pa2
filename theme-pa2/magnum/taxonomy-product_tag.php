<?php get_header(); $q = get_queried_object(); $top = $q && isset($q->parent) && $q->parent ? get_term($q->parent) : $q;
mg_banner(); ?>
<section class="sec sec--tight">
  <div class="wrap">
    <?php echo mg_cat_tabs($top->term_id ?? 0);
    $kids = $top ? get_terms(['taxonomy' => 'product_cat', 'parent' => $top->term_id, 'hide_empty' => true]) : [];
    if ($kids) { echo '<nav class="subcats" aria-label="Nhóm con"><a class="' . ($q->term_id == $top->term_id ? 'on' : '') . '" href="' . esc_url(get_term_link($top)) . '">Tất cả</a>'; foreach ($kids as $k) echo '<a class="' . ($q->term_id == $k->term_id ? 'on' : '') . '" href="' . esc_url(get_term_link($k)) . '">' . esc_html($k->name) . '</a>'; echo '</nav>'; } ?>
    <div class="lgrid"><?php while (have_posts()) { the_post(); echo mg_card(get_the_ID()); } ?></div>
    <?php mg_pagination(); ?>
    <?php if ($q && $q->description && !is_paged()) echo '<div class="catdesc entry">' . wp_kses_post(wpautop($q->description)) . '</div>'; ?>
  </div>
</section>
<?php get_footer();
