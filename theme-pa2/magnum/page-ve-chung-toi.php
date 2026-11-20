<?php get_header(); the_post(); mg_banner('Giới thiệu');
$raw = get_the_content(); $yt = preg_match('~youtube(?:-nocookie)?\.com/embed/([\w-]{11})~', $raw, $m) ? $m[1] : 'i1MNFxeVmeg';
preg_match_all('~<img[^>]+src="([^"]+)"[^>]*>~', $raw, $im); $pics = array_slice(array_unique($im[1]), 0, 8); ?>
<section class="sec">
  <div class="wrap abt">
    <div class="abt__t reveal reveal--l">
      <div class="stitle stitle--l"><h2>Giới thiệu về chúng tôi</h2><i class="bar"></i></div>
      <?php foreach (preg_split('/\R/', mg('about_text')) as $para) if (trim($para)) echo '<p>' . esc_html($para) . '</p>'; ?>
    </div>
    <div class="abt__v reveal reveal--r"><button class="vtile vtile--lg" data-yt="<?php echo esc_attr($yt); ?>" aria-label="Xem video giới thiệu ICD"><img loading="lazy" src="https://i.ytimg.com/vi/<?php echo esc_attr($yt); ?>/hqdefault.jpg" alt="" width="480" height="360"><span class="vtile__p"><?php echo mg_ico('play', 60); ?></span></button></div>
  </div>
</section>
<section class="stats" style="background-image:url(<?php echo esc_url(mg_asset('nha-may.jpg')); ?>)">
  <div class="wrap"><div class="stitle stitle--w reveal"><h2>Hành trình phát triển</h2><i class="bar"></i></div>
    <div class="tline">
      <div class="reveal"><b>2008</b><p>Thành lập Công ty ICD, cung cấp thiết bị vệ sinh môi trường và hạ tầng đô thị.</p></div>
      <div class="reveal"><b>Nhà máy</b><p>Kho và trung tâm kỹ thuật tại Lô CN 10.3.2 KCN VISIZ Phúc Yên, Phú Thọ: kho thiết bị và phụ tùng.</p></div>
      <div class="reveal"><b>Magnum</b><p>Phát triển thương hiệu Magnum cho dòng xe quét, máy chà sàn và thiết bị làm sạch công nghiệp.</p></div>
      <div class="reveal"><b>Toàn quốc</b><p>Văn phòng tại Hà Nội và TP. Hồ Chí Minh, đội kỹ thuật bàn giao và bảo dưỡng tận nơi.</p></div>
    </div>
  </div>
</section>
<section class="sec sec--gray">
  <div class="wrap"><div class="stitle reveal"><h2>Nhà máy và hoạt động</h2><i class="bar"></i></div>
    <div class="gal4">
      <?php foreach ([['nha-may.jpg', 'Nhà máy ICD tại KCN Phúc Yên'], ['gia-cong.jpg', 'Khu kỹ thuật và kho thiết bị'], ['viif.jpg', 'Gian trưng bày tại triển lãm'], ['ban-giao.jpg', 'Bàn giao thiết bị cho khách hàng']] as $g) echo '<figure class="reveal"><img loading="lazy" src="' . esc_url(mg_asset($g[0])) . '" alt="' . esc_attr($g[1]) . '"><figcaption>' . esc_html($g[1]) . '</figcaption></figure>'; ?>
    </div>
    <?php if ($pics) { echo '<div class="gal4 gal4--more">'; foreach ($pics as $u) echo '<figure class="reveal"><img loading="lazy" src="' . esc_url($u) . '" alt="Hoạt động của ICD tại triển lãm, bàn giao thiết bị"></figure>'; echo '</div>'; } ?>
  </div>
</section>
<section class="inq" style="background-image:url(<?php echo esc_url(mg_asset('viif-2025.jpg')); ?>)">
  <div class="wrap inq__in reveal"><div><h2>Trở thành đối tác của&nbsp;Magnum</h2><p>Đại lý, nhà thầu vệ sinh và đơn vị cho thuê thiết bị: liên hệ để nhận chính sách hợp tác.</p></div><a class="btn" href="<?php echo esc_url(home_url('/lien-he.html')); ?>">Liên hệ ngay <?php echo mg_ico('arrow', 18); ?></a></div>
</section>
<?php get_footer();
