<?php get_header(); the_post(); mg_banner(); ?>
<section class="sec">
  <div class="wrap ct">
    <div class="ct__box reveal reveal--l" style="background-image:url(<?php echo esc_url(mg_asset('nha-may.jpg')); ?>)">
      <h2>Thông tin liên hệ</h2>
      <p class="ct__co"><?php echo esc_html(mg('company')); ?></p>
      <ul>
        <li><?php echo mg_ico('pin', 22); ?><div><b>Hà Nội</b><span><?php echo esc_html(mg('addr_hn')); ?></span></div></li>
        <li><?php echo mg_ico('pin', 22); ?><div><b>TP. Hồ Chí Minh</b><span><?php echo esc_html(mg('addr_hcm')); ?></span></div></li>
        <li><?php echo mg_ico('factory', 22); ?><div><b>Nhà máy</b><span><?php echo esc_html(mg('addr_factory')); ?></span></div></li>
        <li><?php echo mg_ico('phone', 22); ?><div><b>Hotline</b><span><a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a> · <a href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>"><?php echo esc_html(mg('hotline2')); ?></a></span></div></li>
        <li><?php echo mg_ico('mail', 22); ?><div><b>Email</b><span><a href="mailto:<?php echo esc_attr(mg('email')); ?>"><?php echo esc_html(mg('email')); ?></a></span></div></li>
        <li><?php echo mg_ico('clock', 22); ?><div><b>Giờ làm việc</b><span><?php echo esc_html(mg('hours')); ?></span></div></li>
      </ul>
    </div>
    <div class="ct__form reveal reveal--r"><?php echo mg_quote_form('Nhận báo giá miễn phí'); ?></div>
  </div>
</section>
<?php if (mg('map')) : ?><section class="sec sec--tight"><div class="wrap"><div class="stitle"><h2>Bản đồ</h2><i class="bar"></i></div><div class="map"><iframe loading="lazy" src="<?php echo esc_url(mg('map')); ?>" title="Bản đồ văn phòng ICD" referrerpolicy="no-referrer-when-downgrade"></iframe></div></div></section><?php endif; ?>
<?php get_footer();
