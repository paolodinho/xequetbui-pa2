<?php get_header(); ?>
<section class="hero" aria-label="Giới thiệu nổi bật">
  <h1 class="sr"><?php echo esc_html(get_bloginfo('name') . ' - ' . (mg_lines('slides')[0][0] ?? '')); ?></h1>
  <div class="hero__track">
  <?php foreach (mg_lines('slides') as $i => $s) : [$t, $d, $u, $b, $img] = array_pad($s, 5, ''); ?>
  <?php if (strpos($img, 'banner-') === 0) : $mob = preg_replace('/\.jpg$/', '-m.jpg', $img); $mob = file_exists(get_theme_file_path('assets/img/' . $mob)) ? $mob : $img; ?>
    <div class="hero__s hero__s--ban<?php echo $i ? '' : ' on'; ?>" style="--bg:url(<?php echo esc_url(mg_asset($img)); ?>);--bgm:url(<?php echo esc_url(mg_asset($mob)); ?>)">
      <a class="hero__ban" href="<?php echo esc_url(home_url($u)); ?>" aria-label="<?php echo esc_attr($t); ?>"></a>
    </div>
  <?php continue; endif; ?>
    <div class="hero__s<?php echo $i ? '' : ' on'; ?>" style="background-image:url(<?php echo esc_url(mg_asset($img)); ?>)">
      <div class="wrap hero__in">
        <p class="hero__h"><?php echo mg_nb($t); ?></p>
        <p class="hero__d"><?php echo esc_html($d); ?></p>
        <?php if ($u) : ?><a class="btn" href="<?php echo esc_url(home_url($u)); ?>"><?php echo esc_html($b); ?> <?php echo mg_ico('arrow', 18); ?></a><?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
  <button class="hero__nav hero__nav--p" aria-label="Slide trước"><?php echo mg_ico('left', 26); ?></button>
  <button class="hero__nav hero__nav--n" aria-label="Slide sau"><?php echo mg_ico('right', 26); ?></button>
  <div class="hero__dots"></div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="stitle reveal"><h2>Danh mục sản phẩm</h2><i class="bar"></i></div>
    <?php $tabs = array_merge([['', 'Sản phẩm nổi bật']], mg_lines('cat_tabs')); ?>
    <div class="ptabs reveal" role="tablist">
      <?php foreach ($tabs as $i => $tb) echo '<button role="tab" aria-selected="' . ($i ? 'false' : 'true') . '" data-tab="t' . $i . '">' . esc_html($tb[1]) . '</button>'; ?>
    </div>
    <?php foreach ($tabs as $i => $tb) :
      $ps = $tb[0] === '' ? mg_products('', 6, ['tax_query' => [['taxonomy' => 'product_visibility', 'field' => 'name', 'terms' => 'featured']]]) : mg_products($tb[0], 6);
      if (!$ps && $tb[0] === '') $ps = mg_products(['may-lau-san-cha-san-nha-xuong-cong-nghiep', 'xe-quet-rac'], 6);
      $term = $tb[0] ? get_term_by('slug', $tb[0], 'product_cat') : null;
      $all = $term ? get_term_link($term) : home_url('/danh-muc-san-pham.html'); ?>
      <div class="ppanel" id="t<?php echo $i; ?>" role="tabpanel"<?php echo $i ? ' hidden' : ''; ?>>
        <div class="pgrid"><?php foreach ($ps as $p) echo mg_card($p->ID, 'home'); ?></div>
        <a class="btn btn--block" href="<?php echo esc_url($all); ?>">Hiển thị tất cả <?php echo mg_ico('arrow', 18); ?></a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="sec sec--about">
  <div class="wrap about">
    <div class="about__img reveal reveal--l">
      <img class="a1" src="<?php echo esc_url(mg_asset('nha-may.jpg')); ?>" alt="Nhà máy ICD tại KCN Phúc Yên" loading="lazy" width="1555" height="667">
      <img class="a2" src="<?php echo esc_url(mg_asset('viif-2026.jpg')); ?>" alt="Đội ngũ ICD Greentech tại gian hàng VIIF 2026" loading="lazy" width="1280" height="960">
    </div>
    <div class="about__t reveal reveal--r">
      <div class="stitle stitle--l"><h2><?php echo esc_html(mg('about_title')); ?></h2><i class="bar"></i></div>
      <?php foreach (preg_split('/\R/', mg('about_text')) as $para) if (trim($para)) echo '<p>' . esc_html($para) . '</p>'; ?>
      <a class="btn" href="<?php echo esc_url(home_url('/ve-chung-toi.html')); ?>">Khám phá thêm <?php echo mg_ico('arrow', 18); ?></a>
    </div>
  </div>
</section>

<section class="stats" style="background-image:url(<?php echo esc_url(mg_asset('duong-pho.jpg')); ?>)">
  <div class="wrap">
    <div class="stitle stitle--w reveal"><h2><?php echo esc_html(mg('stats_title')); ?></h2><i class="bar"></i><p><?php echo esc_html(mg('stats_text')); ?></p></div>
    <div class="stats__g">
      <?php foreach (mg_lines('stats') as $s) echo '<div class="stat reveal"><b data-count="' . esc_attr(preg_replace('/\D/', '', $s[0])) . '" data-suf="' . esc_attr(preg_replace('/\d/', '', $s[0])) . '">' . esc_html($s[0]) . '</b><span>' . esc_html($s[1] ?? '') . '</span></div>'; ?>
    </div>
  </div>
</section>

<?php $ho = array_filter(array_map('intval', explode(',', mg('ho_ids')))); if ($ho) : ?>
<section class="sec" id="ban-giao">
  <div class="wrap">
    <div class="stitle reveal"><h2><?php echo esc_html(mg('ho_title')); ?></h2><i class="bar"></i></div>
    <div class="carousel" data-carousel>
      <div class="carousel__track"><?php foreach ($ho as $id) if (get_post_status($id) === 'publish') echo mg_post_card($id); ?></div>
      <button class="carousel__b carousel__b--p" aria-label="Dự án trước"><?php echo mg_ico('left', 22); ?></button>
      <button class="carousel__b carousel__b--n" aria-label="Dự án sau"><?php echo mg_ico('right', 22); ?></button>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="sec sec--gray">
  <div class="wrap sol">
    <div class="sol__img sol__img--wide reveal reveal--r"><img loading="lazy" src="<?php echo esc_url(mg_asset('giai-phap-xe-quet-doc.jpg')); ?>" alt="Các dòng xe quét đường, máy chà sàn Magnum: MN-C150, MN-E810FB, MN-S1800, MN-V75, MN-V51" width="1380" height="840"></div>
    <div class="sol__t">
      <div class="stitle stitle--l"><h2><?php echo esc_html(mg('sol_title')); ?></h2><i class="bar"></i></div>
      <p class="sol__lead"><?php echo esc_html(mg('sol_text')); ?></p>
      <ul class="sol__l">
        <?php $ic = ['factory', 'box', 'tool', 'users']; foreach (mg_lines('sol_list') as $i => $s) echo '<li><span class="sol__ic">' . mg_ico($ic[$i % 4], 30) . '</span><div><h3>' . esc_html($s[0]) . '</h3><p>' . esc_html($s[1] ?? '') . '</p></div></li>'; ?>
      </ul>
      <a class="btn" href="<?php echo esc_url(home_url('/ung-dung.html')); ?>">Xem ứng dụng thực tế <?php echo mg_ico('arrow', 18); ?></a>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="stitle reveal"><h2>Tin tức công ty</h2><i class="bar"></i></div>
    <?php $news = get_posts(['numberposts' => 9, 'category_name' => 'tin-tuc,tu-van,linh-vuc']); ?>
    <div class="carousel" data-carousel>
      <div class="carousel__track"><?php foreach ($news as $p) echo mg_post_card($p); ?></div>
      <button class="carousel__b carousel__b--p" aria-label="Tin trước"><?php echo mg_ico('left', 22); ?></button>
      <button class="carousel__b carousel__b--n" aria-label="Tin sau"><?php echo mg_ico('right', 22); ?></button>
    </div>
  </div>
</section>

<section class="inq" style="background-image:url(<?php echo esc_url(mg_asset('nen-sang.jpg')); ?>)">
  <div class="wrap inq__in reveal">
    <div><h2><?php echo mg_nb(mg('cta_title')); ?></h2><p><?php echo esc_html(mg('cta_text')); ?></p></div>
    <div class="inq__act"><div class="inq__tels"><span>Gọi ngay</span><a class="inq__tel" href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a><i>-</i><a class="inq__tel" href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>"><?php echo esc_html(mg('hotline2')); ?></a></div><a class="btn" href="#bao-gia" data-quote>Gửi yêu cầu <?php echo mg_ico('arrow', 18); ?></a></div>
  </div>
</section>
<?php get_footer(); ?>
