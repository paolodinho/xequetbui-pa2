<?php get_header(); the_post(); mg_banner(); ?>
<section class="sec sec--tight">
  <div class="wrap art">
    <article class="art__m entry">
      <div class="art__bar"><time class="art__d"><?php echo esc_html(get_the_date('d/m/Y')); ?></time><?php mg_fsz(); ?></div>
      <?php the_content(); ?>
    </article>
    <aside class="art__s">
      <div class="side"><h3>Bài mới</h3><?php foreach (get_posts(['numberposts' => 5, 'post__not_in' => [get_the_ID()]]) as $p) echo '<a href="' . esc_url(get_permalink($p)) . '">' . esc_html(get_the_title($p)) . '<time>' . esc_html(get_the_date('d/m/Y', $p)) . '</time></a>'; ?></div>
      <div class="side side--cats"><h3>Sản phẩm</h3><?php foreach (mg_top_cats() as $t) echo '<a href="' . esc_url(get_term_link($t)) . '">' . esc_html($t->name) . '</a>'; ?></div>
      <div class="side side--cta"><h3>Cần tư vấn chọn máy?</h3><p>Hotline <a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a></p><a class="btn" href="#bao-gia" data-quote>Yêu cầu báo giá</a></div>
    </aside>
  </div>
</section>
<?php get_footer();
