<?php get_header(); mg_banner(); ?>
<section class="sec sec--tight"><div class="wrap">
  <form class="bsearch" role="search" action="<?php echo esc_url(home_url('/')); ?>"><input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Nhập tên máy, model..." aria-label="Từ khoá"><button class="btn">Tìm kiếm</button></form>
  <?php $pr = []; $po = []; while (have_posts()) { the_post(); if (get_post_type() === 'product') $pr[] = get_the_ID(); else $po[] = get_the_ID(); }
  if ($pr) { echo '<div class="lgrid">'; foreach ($pr as $i) echo mg_card($i); echo '</div>'; }
  if ($po) { echo '<div class="nlist">'; foreach ($po as $i) echo mg_post_card($i, 'row'); echo '</div>'; }
  if (!$pr && !$po) echo '<p>Không tìm thấy kết quả phù hợp. Thử từ khoá khác hoặc gọi hotline ' . esc_html(mg('hotline')) . '.</p>';
  mg_pagination(); ?>
</div></section>
<?php get_footer();
