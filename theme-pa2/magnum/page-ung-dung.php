<?php get_header(); the_post(); mg_banner('Ứng dụng', 'duong-pho.jpg'); ?>
<section class="sec">
  <div class="wrap">
    <div class="stitle reveal"><h2>Lĩnh vực ứng dụng</h2><i class="bar"></i><p>Thiết bị Magnum đang vận hành tại nhà máy, kho bãi, khu đô thị và công trình công cộng.</p></div>
    <div class="agrid">
      <?php foreach ([['Nhà máy, khu công nghiệp', 'Xe quét bụi, máy chà sàn ngồi lái cho sàn epoxy, bê tông diện tích lớn.', 'xe-quet-rac', 'gia-cong.jpg'], ['Kho bãi, logistics', 'Xe nâng điện, xe kéo hàng và máy chà sàn cho lối đi kho hàng.', 'xe-dien-keo-hang-nang-hang-trong-nha-xuong', 'keo-hang.jpg'], ['Đô thị, đường phố', 'Xe quét đường, xe chở rác và thùng thu gom cho khu đô thị, khu dân cư.', 'xe-cho-rac', 'duong-pho.jpg'], ['Toà nhà, trung tâm thương mại', 'Máy chà sàn liên hợp, máy hút bụi cho sảnh, hành lang, bãi đỗ xe.', 'may-lau-san-cha-san-nha-xuong-cong-nghiep', 'xuong-ngoi-lai.jpg'], ['Trường học, bệnh viện', 'Máy chà sàn đẩy tay và ngồi lái cho hành lang, sân trường, sảnh chờ: chạy êm, sàn khô nhanh.', 'may-lau-san-cha-san-nha-xuong-cong-nghiep', 'ud-truong-hoc.jpg'], ['Nhà ga, sân bay, sảnh lớn', 'Máy chà sàn ngồi lái pin lithium làm sạch liên tục khu vực đông người qua lại.', 'may-lau-san-cha-san-nha-xuong-cong-nghiep', 'ud-nha-ga.jpg']] as $a) :
        $t = get_term_by('slug', $a[2], 'product_cat'); $u = $t ? get_term_link($t) : home_url('/danh-muc-san-pham.html'); ?>
        <a class="acard reveal" href="<?php echo esc_url($u); ?>"><span class="acard__img"><img loading="lazy" src="<?php echo esc_url(mg_asset($a[3])); ?>" alt="<?php echo esc_attr($a[0]); ?>"></span><span class="acard__b"><h3><?php echo esc_html($a[0]); ?></h3><p><?php echo esc_html($a[1]); ?></p><em>Xem thiết bị phù hợp <?php echo mg_ico('arrow', 16); ?></em></span></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<section class="sec sec--gray">
  <div class="wrap">
    <div class="stitle reveal"><h2>Dự án đã bàn giao</h2><i class="bar"></i></div>
    <?php $all = array_filter(get_posts(['numberposts' => -1, 'post_type' => 'post', 'post_status' => 'publish']), fn($p) => preg_match('~^(bàn giao|cung cấp|giao)~iu', $p->post_title)); ?>
    <div class="ngrid"><?php foreach (array_slice($all, 0, 9) as $p) echo mg_post_card($p); ?></div>
  </div>
</section>
<section class="inq" style="background-image:url(<?php echo esc_url(mg_asset('nen-sang.jpg')); ?>)">
  <div class="wrap inq__in reveal"><div><h2><?php echo mg_nb(mg('cta_title')); ?></h2><p><?php echo esc_html(mg('cta_text')); ?></p></div><a class="btn" href="#bao-gia" data-quote>Gửi yêu cầu <?php echo mg_ico('arrow', 18); ?></a></div>
</section>
<?php get_footer();
