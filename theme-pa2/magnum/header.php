<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main">Bỏ qua tới nội dung</a>
<div class="topbar">
  <div class="wrap topbar__in">
    <div class="topbar__c">
      <a href="mailto:<?php echo esc_attr(mg('email')); ?>"><?php echo mg_ico('mail', 16); ?><span><?php echo esc_html(mg('email')); ?></span></a>
      <a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo mg_ico('phone', 16); ?><span><?php echo esc_html(mg('hotline')); ?></span></a>
    </div>
    <div class="topbar__r">
      <form class="tsearch" role="search" action="<?php echo esc_url(home_url('/')); ?>"><input type="search" name="s" placeholder="Tìm sản phẩm" aria-label="Tìm sản phẩm" value="<?php echo esc_attr(get_search_query()); ?>"><button aria-label="Tìm"><?php echo mg_ico('search', 16); ?></button></form>
      <a class="soc soc--fb" href="<?php echo esc_url(mg('facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php echo mg_ico('fb', 16); ?></a>
      <a class="soc soc--yt" href="<?php echo esc_url(mg('youtube')); ?>" target="_blank" rel="noopener" aria-label="YouTube"><?php echo mg_ico('yt', 16); ?></a>
      <a class="soc soc--za" href="<?php echo esc_url(mg('zalo')); ?>" target="_blank" rel="noopener" aria-label="Zalo"><?php echo mg_ico('zalo', 22); ?></a>
    </div>
  </div>
</div>
<header class="hdr" id="hdr">
  <div class="wrap hdr__in">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Magnum - Trang chủ"><img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo-dark.png')); ?>" alt="Magnum" width="176" height="46"></a>
    <nav class="nav" id="nav" aria-label="Menu chính">
      <ul>
        <li class="<?php echo is_front_page() ? 'on' : ''; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
        <li class="has-sub <?php echo (is_tax('product_cat') || is_singular('product') || is_page('danh-muc-san-pham')) ? 'on' : ''; ?>"><a href="<?php echo esc_url(home_url('/danh-muc-san-pham.html')); ?>">Sản phẩm</a><button class="sub-t" aria-label="Mở danh mục"><?php echo mg_ico('down', 14); ?></button>
          <ul class="sub"><?php foreach (mg_top_cats() as $t) echo '<li><a href="' . esc_url(get_term_link($t)) . '">' . esc_html($t->name) . '</a></li>'; ?></ul></li>
        <li class="<?php echo is_page('ve-chung-toi') ? 'on' : ''; ?>"><a href="<?php echo esc_url(home_url('/ve-chung-toi.html')); ?>">Giới thiệu</a></li>
        <li class="<?php echo is_page('ung-dung') ? 'on' : ''; ?>"><a href="<?php echo esc_url(home_url('/ung-dung.html')); ?>">Ứng dụng</a></li>
        <li class="<?php echo (is_category('tin-tuc') || is_category('tin-tuyen-dung')) ? 'on' : ''; ?>"><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tin-tuc'))); ?>">Tin tức</a></li>
        <li class="<?php echo is_category('tu-van') ? 'on' : ''; ?>"><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tu-van'))); ?>">Tư vấn</a></li>
        <li class="<?php echo is_page('lien-he') ? 'on' : ''; ?>"><a href="<?php echo esc_url(home_url('/lien-he.html')); ?>">Liên hệ</a></li>
      </ul>
    </nav>
    <a class="btn hdr__cta" href="#bao-gia" data-quote>Yêu cầu báo giá</a>
    <button class="burger" id="burger" aria-label="Mở menu" aria-controls="nav" aria-expanded="false"><?php echo mg_ico('menu', 24); ?></button>
  </div>
</header>
<main id="main">
