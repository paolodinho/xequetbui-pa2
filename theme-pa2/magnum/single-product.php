<?php get_header(); the_post(); $id = get_the_ID();
$content = apply_filters('the_content', get_the_content());
$imgs = mg_product_images($id); $specs = mg_key_specs($content, 8);
$cats = get_the_terms($id, 'product_cat'); $tags = get_the_terms($id, 'product_tag');
mg_banner(); ?>
<section class="sec sec--tight">
  <div class="wrap pd">
    <div class="pd__gal" data-gal>
      <div class="pd__main"><?php if ($imgs) : ?><img src="<?php echo esc_url($imgs[0]); ?>" alt="<?php the_title_attribute(); ?>" width="900" height="1137"><?php else : ?><span class="noimg">Ảnh đang cập nhật</span><?php endif; ?></div>
      <?php if (count($imgs) > 1) : ?>
      <div class="pd__thumbs"><button class="pd__arr" data-dir="-1" aria-label="Ảnh trước"><?php echo mg_ico('left', 18); ?></button><div class="pd__tt">
        <?php foreach ($imgs as $i => $u) echo '<button class="' . ($i ? '' : 'on') . '" data-src="' . esc_url($u) . '" aria-label="Ảnh ' . ($i + 1) . '"><img src="' . esc_url($u) . '" alt="" loading="lazy"></button>'; ?>
      </div><button class="pd__arr" data-dir="1" aria-label="Ảnh sau"><?php echo mg_ico('right', 18); ?></button></div>
      <?php endif; ?>
    </div>
    <div class="pd__info">
      <h1 class="pd__t"><?php echo mg_nb(get_the_title()); ?></h1>
      <?php if ($specs) : ?><dl class="pd__specs"><?php foreach ($specs as $s) echo '<div><dt>' . esc_html($s[0]) . '</dt><dd>' . esc_html($s[1]) . '</dd></div>'; ?></dl>
      <?php else : ?><p class="pd__x"><?php echo esc_html(mg_excerpt($id, 50)); ?></p><?php endif; ?>
      <div class="pd__btns">
        <a class="btn" href="<?php echo esc_url(mg('zalo')); ?>" target="_blank" rel="noopener"><?php echo mg_ico('chat', 18); ?> Tư vấn trực tuyến</a>
        <a class="btn btn--o" href="#bao-gia" data-quote>Gửi yêu cầu báo giá</a>
      </div>
      <p class="pd__hot">Hotline: <a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a> · <a href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>"><?php echo esc_html(mg('hotline2')); ?></a></p>
      <?php if ($cats && !is_wp_error($cats)) { echo '<p class="pd__meta"><b>Danh mục:</b> '; echo implode(', ', array_map(fn($c) => '<a href="' . esc_url(get_term_link($c)) . '">' . esc_html($c->name) . '</a>', $cats)); echo '</p>'; } ?>
      <?php if ($tags && !is_wp_error($tags)) { echo '<p class="pd__meta"><b>Từ khoá:</b> '; echo implode(', ', array_map(fn($c) => '<a href="' . esc_url(get_term_link($c)) . '">' . esc_html($c->name) . '</a>', array_slice($tags, 0, 6))); echo '</p>'; } ?>
    </div>
  </div>
  <div class="wrap">
    <div class="dtabs" role="tablist"><button role="tab" aria-selected="true" data-tab="d1">Mô tả</button><?php $catf = mg_catalog_form($id); if ($catf) echo '<button role="tab" aria-selected="false" data-tab="d3">Tải catalog</button>'; ?><button role="tab" aria-selected="false" data-tab="d2">Sản phẩm đề xuất</button></div>
    <div class="dpanel entry" id="d1" role="tabpanel"><?php mg_fsz(); echo $content; ?></div>
    <?php if ($catf) echo '<div class="dpanel" id="d3" role="tabpanel" hidden>' . $catf . '</div>'; ?>
    <div class="dpanel" id="d2" role="tabpanel" hidden><div class="lgrid">
      <?php $rel = $cats ? mg_products(wp_list_pluck($cats, 'slug'), 9, ['post__not_in' => [$id]]) : []; foreach (array_slice($rel, 0, 8) as $p) echo mg_card($p->ID); ?>
    </div></div>
    <div class="pd__form"><?php echo mg_quote_form('Nhận báo giá ' . get_the_title(), get_the_title()); ?></div>
  </div>
</section>
<?php get_footer();
