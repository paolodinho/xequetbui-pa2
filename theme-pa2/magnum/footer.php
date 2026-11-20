</main>
<footer class="ftr">
  <div class="wrap ftr__top">
    <img class="ftr__logo" src="<?php echo esc_url(get_theme_file_uri('assets/img/logo-light.png')); ?>" alt="Magnum" width="176" height="46" loading="lazy">
    <p class="ftr__about"><?php echo esc_html(mg('footer_about')); ?></p>
    <div class="ftr__soc">
      <a class="soc soc--fb" href="<?php echo esc_url(mg('facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php echo mg_ico('fb', 18); ?></a>
      <a class="soc soc--yt" href="<?php echo esc_url(mg('youtube')); ?>" target="_blank" rel="noopener" aria-label="YouTube"><?php echo mg_ico('yt', 18); ?></a>
      <a class="soc soc--za" href="<?php echo esc_url(mg('zalo')); ?>" target="_blank" rel="noopener" aria-label="Zalo"><?php echo mg_ico('zalo', 24); ?></a>
    </div>
  </div>
  <div class="wrap ftr__in">
    <div class="ftr__c">
      <h4>Liên hệ</h4>
      <ul class="ftr__ct">
        <li><?php echo mg_ico('pin', 18); ?><span><b>Hà Nội:</b> <?php echo esc_html(mg('addr_hn')); ?></span></li>
        <li><?php echo mg_ico('pin', 18); ?><span><b>TP. HCM:</b> <?php echo esc_html(mg('addr_hcm')); ?></span></li>
        <li><?php echo mg_ico('factory', 18); ?><span><b>Nhà máy:</b> <?php echo esc_html(mg('addr_factory')); ?></span></li>
        <li><?php echo mg_ico('phone', 18); ?><span><a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a> · <a href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>"><?php echo esc_html(mg('hotline2')); ?></a></span></li>
        <li><?php echo mg_ico('mail', 18); ?><span><a href="mailto:<?php echo esc_attr(mg('email')); ?>"><?php echo esc_html(mg('email')); ?></a></span></li>
      </ul>
    </div>
    <div class="ftr__c">
      <h4>Sản phẩm</h4>
      <ul class="ftr__ln"><?php foreach (array_slice(mg_top_cats(), 0, 8) as $t) echo '<li><a href="' . esc_url(get_term_link($t)) . '">' . esc_html($t->name) . '</a></li>'; ?></ul>
    </div>
    <div class="ftr__c">
      <h4>Liên kết nhanh</h4>
      <ul class="ftr__ln">
        <li><a href="<?php echo esc_url(home_url('/ve-chung-toi.html')); ?>">Giới thiệu</a></li>
        <li><a href="<?php echo esc_url(home_url('/danh-muc-san-pham.html')); ?>">Danh mục sản phẩm</a></li>
        <li><a href="<?php echo esc_url(home_url('/ung-dung.html')); ?>">Ứng dụng</a></li>
        <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tin-tuc'))); ?>">Tin tức</a></li>
        <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tu-van'))); ?>">Tư vấn</a></li>
        <li><a href="<?php echo esc_url(home_url('/lien-he.html')); ?>">Liên hệ</a></li>
      </ul>
    </div>
    <div class="ftr__c">
      <h4>Nhận tư vấn nhanh</h4>
      <p class="ftr__hot">Gọi ngay: <a href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>"><?php echo esc_html(mg('hotline')); ?></a> - <a href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>"><?php echo esc_html(mg('hotline2')); ?></a></p>
      <p>Hoặc để lại số điện thoại, kỹ thuật viên ICD gọi lại trong giờ làm việc (<?php echo esc_html(mg('hours')); ?>).</p>
      <form class="cb" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="xqb_quote"><input type="hidden" name="cb" value="1"><?php wp_nonce_field('xqb_quote', '_xqb', true, true); ?>
        <input class="hp" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
        <input name="phone" required inputmode="tel" placeholder="Số điện thoại" aria-label="Số điện thoại">
        <button class="btn" type="submit">Gửi</button>
      </form>
    </div>
  </div>
  <div class="ftr__b"><div class="wrap">© <?php echo date('Y'); ?> <?php echo esc_html(mg('company')); ?>. Thương hiệu Magnum.</div></div>
</footer>
<a class="hotline-float" href="tel:<?php echo esc_attr(mg('hotline2_tel')); ?>" aria-label="Gọi hotline tư vấn <?php echo esc_attr(mg('hotline2')); ?>"><i><?php echo mg_ico('phone', 24); ?></i><span><small>Hotline tư vấn</small><b><?php echo esc_html(mg('hotline2')); ?></b></span></a>
<div class="float" aria-label="Liên hệ nhanh">
  <a class="float__za" href="<?php echo esc_url(mg('zalo')); ?>" target="_blank" rel="noopener" aria-label="Chat Zalo"><?php echo mg_ico('zalo', 30); ?></a>
  <a class="float__ml" href="mailto:<?php echo esc_attr(mg('email')); ?>" aria-label="Gửi email"><?php echo mg_ico('mail', 22); ?></a>
  <a class="float__ph" href="tel:<?php echo esc_attr(mg('hotline_tel')); ?>" aria-label="Gọi hotline"><?php echo mg_ico('phone', 22); ?></a>
</div>
<button class="totop" id="totop" aria-label="Lên đầu trang"><?php echo mg_ico('up', 22); ?></button>
<div class="qpop" id="qpop" hidden><div class="qpop__bg" data-close></div><div class="qpop__box" role="dialog" aria-modal="true" aria-label="Yêu cầu báo giá"><button class="qpop__x" data-close aria-label="Đóng"><?php echo mg_ico('x', 22); ?></button><?php echo mg_quote_form('Yêu cầu báo giá', is_singular('product') ? get_the_title() : '', 'bao-gia-pop'); ?></div></div>
<?php wp_footer(); ?>
</body>
</html>
