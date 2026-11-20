<?php
if (!defined('ABSPATH')) exit;
function mg_img($id, $size = 'large') {
    $t = get_post_thumbnail_id($id); if (!$t) return '';
    return wp_get_attachment_image_url($t, $size) ?: wp_get_attachment_image_url($t, 'full') ?: '';
}
function mg_asset($f) { return preg_match('#^(https?:)?//|^/#', $f) ? $f : get_theme_file_uri('assets/img/' . $f); }
function mg_ico($n, $s = 20) {
    $p = [
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="1"/><path d="m3 7 9 6 9-6"/>',
        'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
        'pin' => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
        'menu' => '<path d="M3 6h18M3 12h18M3 18h18"/>',
        'x' => '<path d="M6 6l12 12M18 6 6 18"/>',
        'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'left' => '<path d="m15 6-6 6 6 6"/>', 'right' => '<path d="m9 6 6 6-6 6"/>', 'down' => '<path d="m6 9 6 6 6-6"/>',
        'up' => '<path d="m6 15 6-6 6 6"/>',
        'play' => '<circle cx="12" cy="12" r="10"/><path d="m10 8 6 4-6 4z" fill="currentColor"/>',
        'factory' => '<path d="M2 20V9l6 4V9l6 4V5h4l2 15z"/><path d="M6 17h2M11 17h2M16 17h2"/>',
        'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2 20c0-3.5 3-6 7-6s7 2.5 7 6"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14c2.3.7 4 2.9 4 6"/>',
        'box' => '<path d="m12 2 9 5v10l-9 5-9-5V7z"/><path d="m3 7 9 5 9-5M12 12v10"/>',
        'tool' => '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.4 2.4-2.4-.6-.6-2.4z"/>',
        'chat' => '<path d="M21 12a8 8 0 0 1-11.6 7.1L3 21l1.9-5.6A8 8 0 1 1 21 12z"/>',
        'check' => '<path d="M20 6 9 17l-5-5"/>',
    ];
    if ($n === 'fb') return '<svg width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8.2h2.8l.5-3.3h-3.3V8.4c0-.9.4-1.7 1.8-1.7h1.6V3.8s-1.4-.3-2.8-.3c-3 0-4.6 1.8-4.6 4.8v2.2H6.8v3.3h2.8V22z"/></svg>';
    if ($n === 'yt') return '<svg width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.6 7.2a2.5 2.5 0 0 0-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.4A2.5 2.5 0 0 0 2.4 7.2C2 8.8 2 12 2 12s0 3.2.4 4.8a2.5 2.5 0 0 0 1.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.4a2.5 2.5 0 0 0 1.8-1.8c.4-1.6.4-4.8.4-4.8s0-3.2-.4-4.8zM10 15V9l5.2 3z"/></svg>';
    if ($n === 'zalo') return '<svg width="' . $s . '" height="' . $s . '" viewBox="0 0 48 48" aria-hidden="true"><text x="24" y="31" text-anchor="middle" font-family="Arial,sans-serif" font-weight="700" font-size="17" fill="currentColor">Zalo</text></svg>';
    return '<svg width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($p[$n] ?? '') . '</svg>';
}
/** Nối NBSP 2 từ cuối, giữ mã model không bị ngắt ở dấu gạch. */
function mg_nb($t) {
    $t = esc_html(wp_strip_all_tags($t));
    $t = preg_replace('/\b(đô|công|chà|xe|máy|nhà|hút|phun|áp|xịt|khu|phụ|vệ|hóa|thiết|bàn|Hà|Hồ|TP\.) (thị|nghiệp|sàn|quét|nâng|kéo|chở|xưởng|bụi|xịt|lực|tùng|sinh|chất|bị|giao|Nội|Chí)\b/iu', '$1&nbsp;$2', $t);
    $t = preg_replace('/\s+(\S+)$/u', '&nbsp;$1', $t);
    return preg_replace('/(\S*\d\S*-\S*|\S*-\S*\d\S*)/u', '<span class="nw">$1</span>', $t);
}
function mg_top_cats() {
    $ts = get_terms(['taxonomy' => 'product_cat', 'parent' => 0, 'hide_empty' => true]);
    $ts = array_values(array_filter($ts, fn($t) => $t->slug !== 'chua-phan-loai'));
    $order = array_column(mg_lines('cat_tabs'), 0);
    usort($ts, function ($a, $b) use ($order) { $x = array_search($a->slug, $order); $y = array_search($b->slug, $order); return ($x === false ? 99 : $x) <=> ($y === false ? 99 : $y) ?: $b->count <=> $a->count; });
    return $ts;
}
function mg_products($slug = '', $n = 6, $extra = []) {
    $a = ['post_type' => 'product', 'post_status' => 'publish', 'numberposts' => $n, 'orderby' => 'menu_order date', 'order' => 'DESC'];
    if ($slug) $a['tax_query'] = [['taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => (array) $slug, 'include_children' => true]];
    return get_posts($a + $extra);
}
function mg_excerpt($id, $len = 22) {
    $p = get_post($id); $t = $p->post_excerpt ?: $p->post_content;
    $t = preg_replace('~\[[^\]]+\]~', '', $t);
    return wp_trim_words(html_entity_decode(wp_strip_all_tags($t)), $len, '…');
}
/** Thẻ sản phẩm: home = kiểu lưới trang chủ (ảnh lớn, gạch vàng), list = kiểu trang danh mục (viền, nút xem chi tiết). */
function mg_card($id, $mode = 'list') {
    $t = get_the_title($id); $u = get_permalink($id); $im = mg_img($id, 'large');
    $img = $im ? '<img loading="lazy" src="' . esc_url($im) . '" alt="' . esc_attr($t) . '" width="900" height="1137">' : '<span class="noimg">Ảnh đang cập nhật</span>';
    if ($mode === 'home') {
        return '<article class="pcard reveal"><a class="pcard__img" href="' . esc_url($u) . '">' . $img . '</a><h3 class="pcard__t"><a href="' . esc_url($u) . '">' . mg_nb($t) . '</a></h3><i class="bar"></i></article>';
    }
    return '<article class="lcard reveal"><a class="lcard__img" href="' . esc_url($u) . '">' . $img . '</a><h3 class="lcard__t"><a href="' . esc_url($u) . '">' . mg_nb($t) . '</a></h3><p class="lcard__x">' . esc_html(mg_excerpt($id, 14)) . '</p><a class="lcard__btn" href="' . esc_url($u) . '">Xem chi tiết</a></article>';
}
function mg_post_card($p, $mode = 'grid') {
    $id = is_object($p) ? $p->ID : $p; $t = get_the_title($id); $u = get_permalink($id); $im = mg_img($id, 'large');
    $img = $im ? '<img loading="lazy" src="' . esc_url($im) . '" alt="' . esc_attr($t) . '" width="1200" height="750">' : '<span class="noimg">Ảnh đang cập nhật</span>';
    if ($mode === 'row') {
        return '<article class="nrow reveal"><a class="nrow__img" href="' . esc_url($u) . '">' . $img . '</a><div class="nrow__b"><h3><a href="' . esc_url($u) . '">' . mg_nb($t) . '</a></h3><time>' . esc_html(get_the_date('d/m/Y', $id)) . '</time><p>' . esc_html(mg_excerpt($id, 40)) . '</p><a class="more" href="' . esc_url($u) . '">Đọc thêm ' . mg_ico('arrow', 16) . '</a></div></article>';
    }
    return '<article class="ncard reveal"><a class="ncard__img" href="' . esc_url($u) . '">' . $img . '</a><div class="ncard__b"><h3><a href="' . esc_url($u) . '">' . mg_nb($t) . '</a></h3><time>' . esc_html(get_the_date('d/m/Y', $id)) . '</time><p>' . esc_html(mg_excerpt($id, 24)) . '</p><a class="more" href="' . esc_url($u) . '">Đọc thêm</a></div></article>';
}
function mg_breadcrumb() {
    $b = ['<a href="' . esc_url(home_url('/')) . '">Trang chủ</a>'];
    if (is_singular('product')) {
        $t = get_the_terms(get_the_ID(), 'product_cat');
        if ($t && !is_wp_error($t)) { usort($t, fn($a, $c) => $c->parent <=> $a->parent); $b[] = '<a href="' . esc_url(get_term_link($t[0])) . '">' . esc_html($t[0]->name) . '</a>'; }
    } elseif (is_tax('product_cat')) {
        $q = get_queried_object(); if ($q->parent) { $p = get_term($q->parent); $b[] = '<a href="' . esc_url(get_term_link($p)) . '">' . esc_html($p->name) . '</a>'; }
    } elseif (is_singular('post')) {
        $c = get_the_category(); if ($c) $b[] = '<a href="' . esc_url(get_category_link($c[0])) . '">' . esc_html($c[0]->name) . '</a>';
    }
    return '<nav class="crumb" aria-label="Breadcrumb">' . implode('<i>/</i>', $b) . '<i>/</i><span>' . esc_html(mg_title()) . '</span></nav>';
}
function mg_title() {
    if (is_search()) return 'Tìm kiếm: ' . get_search_query();
    if (is_404()) return 'Không tìm thấy trang';
    if (is_tax() || is_category() || is_tag()) return single_term_title('', false);
    if (is_post_type_archive('product')) return 'Sản phẩm';
    if (is_home()) return 'Tin tức';
    return wp_strip_all_tags(get_the_title());
}
/** Dải banner đầu trang con (nền ảnh tối + tiêu đề + breadcrumb). */
function mg_banner($title = '', $img = 'nha-may.jpg') {
    $title = $title ?: mg_title();
    echo '<section class="pbanner" style="background-image:url(' . esc_url(mg_asset($img)) . ')"><div class="wrap"><h1>' . mg_nb($title) . '</h1>' . mg_breadcrumb() . '</div></section>';
}
/** Hàng icon danh mục (trang Sản phẩm/danh mục): biểu tượng đặc, hình máy dễ nhận ra (góp ý khách 13/11). */
function mg_cat_icon($slug) {
    $m = ['cha-san' => 'cha-san', 'quet-rac' => 'quet', 'hut-bui' => 'hut', 'phun-xit' => 'phun', 'cho-rac' => 'cho', 'keo-hang' => 'nang', 'nang-hang' => 'nang', 'phu-tung' => 'phutung', 'hoa-chat' => 'hoachat'];
    $w = 'fill="#fff"';
    $p = [
        'cha-san' => '<rect x="4.5" y="3.5" width="2.4" height="7" rx="1.1"/><rect x="4.5" y="8.6" width="7" height="2.2" rx="1"/><path d="M3 11.5h11.5l3.5 2.2v3.8H3z"/><path d="M13.6 11 15.8 5" fill="none" stroke="currentColor" stroke-width="1.7"/><rect x="13.6" y="3.6" width="4.6" height="1.6" rx=".8" transform="rotate(-12 15.9 4.4)"/><rect x="2" y="18.2" width="15" height="2.3" rx="1.1"/><path d="M1 21.8h4" stroke="currentColor" stroke-width="1.4"/><rect x="18.5" y="16" width="1.6" height="5" rx=".5"/><path d="M17 21.3h5" stroke="currentColor" stroke-width="1.4"/><rect x="6" y="13.3" width="6" height="1.3" rx=".65" ' . $w . '/>',
        'quet' => '<rect x="8.5" y="5" width="13.5" height="11.5" rx="1.5"/><rect x="2" y="7.5" width="7.5" height="9" rx="1.5"/><rect x="3.3" y="8.8" width="4.8" height="3.4" rx=".5" ' . $w . '/><rect x="11" y="7.5" width="8.5" height="1.4" rx=".7" ' . $w . '/><circle cx="6" cy="17.8" r="2.3"/><circle cx="18" cy="17.8" r="2.3"/><circle cx="6" cy="17.8" r=".9" ' . $w . '/><circle cx="18" cy="17.8" r=".9" ' . $w . '/><ellipse cx="3.2" cy="21" rx="3" ry="1"/><ellipse cx="11.5" cy="21" rx="3" ry="1"/>',
        'hut' => '<rect x="4.5" y="3.5" width="12" height="2.6" rx="1"/><rect x="5.5" y="6.5" width="10" height="11.5" rx="2"/><path d="M15.5 9.5c4.2 0 5.4 2 5.4 6v3.5" fill="none" stroke="currentColor" stroke-width="1.9"/><rect x="18.6" y="18.6" width="4.6" height="2" rx=".6"/><circle cx="8" cy="19.6" r="1.8"/><circle cx="13" cy="19.6" r="1.8"/><rect x="7.5" y="9" width="6" height="1.3" rx=".65" ' . $w . '/>',
        'phun' => '<rect x="2" y="9" width="10.5" height="9" rx="2"/><path d="M3.5 9V4.2h6.5" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="5" cy="19.2" r="2.3"/><circle cx="5" cy="19.2" r=".9" ' . $w . '/><path d="M12.5 14c4.5 0 3.5-6 6.5-6" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M16.5 5.5h5.5v2.4h-2.4l-.9 3.1h-1.8l.7-3.1h-1.1z"/><circle cx="23" cy="4" r=".7"/><circle cx="23.2" cy="6.7" r=".7"/><circle cx="21.6" cy="2.6" r=".6"/>',
        'cho' => '<rect x="1.5" y="5" width="13" height="11.5" rx="1"/><path d="M15.5 8h4l3 4.2v4.3h-7z"/><path d="M16.8 9.3h2.1l1.9 2.7h-4z" ' . $w . '/><rect x="3.5" y="7.5" width="9" height="1.3" rx=".65" ' . $w . '/><circle cx="5.5" cy="17.8" r="2.3"/><circle cx="18.5" cy="17.8" r="2.3"/><circle cx="5.5" cy="17.8" r=".9" ' . $w . '/><circle cx="18.5" cy="17.8" r=".9" ' . $w . '/>',
        'nang' => '<path d="M3 11.5 5 8h6l2.5 4.5v5.5H3z"/><path d="M5.6 8V4h4.6l1.6 4" fill="none" stroke="currentColor" stroke-width="1.6"/><rect x="15" y="3" width="1.8" height="15"/><rect x="16" y="16.4" width="7" height="1.6" rx=".5"/><rect x="13.2" y="12.5" width="2" height="1.6"/><circle cx="6" cy="18.6" r="2.3"/><circle cx="11.5" cy="18.6" r="2.3"/><circle cx="6" cy="18.6" r=".9" ' . $w . '/><circle cx="11.5" cy="18.6" r=".9" ' . $w . '/>',
        'phutung' => '<g transform="translate(12 12)">' . implode('', array_map(fn($r) => '<rect x="-1.6" y="-10" width="3.2" height="5" rx=".6" transform="rotate(' . $r . ')"/>', [0, 45, 90, 135, 180, 225, 270, 315])) . '<circle r="6.6"/><circle r="2.7" ' . $w . '/></g>',
        'hoachat' => '<path d="M9 2h6v2.8h-1v2.3l3 3V21a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V10.1l3-3V4.8H9z"/><rect x="9" y="13" width="6" height="5" rx=".6" ' . $w . '/>',
        'all' => '<rect x="3" y="3" width="8" height="8" rx="1.2"/><rect x="13" y="3" width="8" height="8" rx="1.2"/><rect x="3" y="13" width="8" height="8" rx="1.2"/><rect x="13" y="13" width="8" height="8" rx="1.2"/>',
    ];
    $k = 'all'; foreach ($m as $s => $v) if (strpos($slug, $s) !== false) { $k = $v; break; }
    return '<svg class="ctabs__ic" width="44" height="44" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">' . $p[$k] . '</svg>';
}
function mg_cat_tabs($cur = 0) {
    $o = '<nav class="ctabs" aria-label="Danh mục sản phẩm"><a class="' . ($cur ? '' : 'on') . '" href="' . esc_url(home_url('/danh-muc-san-pham.html')) . '">' . mg_cat_icon('all') . '<span>Tất cả sản phẩm</span></a>';
    foreach (mg_top_cats() as $t) $o .= '<a class="' . ($cur == $t->term_id ? 'on' : '') . '" href="' . esc_url(get_term_link($t)) . '">' . mg_cat_icon($t->slug) . '<span>' . esc_html($t->name) . '</span></a>';
    return $o . '</nav>';
}
/** Form yêu cầu báo giá (gửi về mu-plugin xqb_quote). */
function mg_quote_form($title = 'Gửi yêu cầu báo giá', $product = '', $fid = 'bao-gia') {
    $act = esc_url(admin_url('admin-post.php'));
    $ok = isset($_GET['bg']) && $_GET['bg'] === 'ok'; $err = isset($_GET['bg']) && $_GET['bg'] === 'err';
    ob_start(); ?>
    <form class="qform" id="<?php echo esc_attr($fid); ?>" method="post" action="<?php echo $act; ?>">
      <h3><?php echo esc_html($title); ?></h3>
      <?php if ($ok) echo '<p class="qform__ok">Đã nhận yêu cầu. Kỹ thuật viên ICD sẽ gọi lại cho bạn trong giờ làm việc.</p>'; if ($err) echo '<p class="qform__err">Chưa gửi được. Vui lòng nhập số điện thoại hợp lệ.</p>'; ?>
      <input type="hidden" name="action" value="xqb_quote"><?php wp_nonce_field('xqb_quote', '_xqb'); ?>
      <div class="qform__g">
        <label><span>Số điện thoại *</span><input name="phone" required inputmode="tel" pattern="[0-9 +.]{9,15}" autocomplete="tel" placeholder=" "></label>
        <label class="qform__full"><span>Sản phẩm quan tâm</span><input name="sp" value="<?php echo esc_attr($product); ?>"></label>
      </div>
      <label class="qform__full"><span>Nội dung</span><textarea name="note" rows="4" placeholder="Diện tích cần làm sạch, loại mặt sàn, số ca làm việc..."></textarea></label>
      <input class="hp" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
      <button class="btn" type="submit">Gửi yêu cầu <?php echo mg_ico('arrow', 18); ?></button>
    </form>
    <?php return ob_get_clean();
}

/** Catalog tải về: URL file PDF (catalog dài) hoặc ảnh (catalog ngắn), lưu ở meta xqb_catalog của sản phẩm. */
function mg_catalog_url($id) {
    $u = trim((string) get_post_meta($id, 'xqb_catalog', true)); if ($u === '') return '';
    if (!preg_match('~^https?://~i', $u)) { $up = wp_get_upload_dir(); $u = $up['baseurl'] . '/' . ltrim($u, '/'); }
    return esc_url_raw($u);
}
function mg_catalog_form($id) {
    $u = mg_catalog_url($id); if (!$u) return '';
    $ext = strtolower(pathinfo(parse_url($u, PHP_URL_PATH), PATHINFO_EXTENSION)); $kind = $ext === 'pdf' ? 'PDF' : 'ảnh ' . strtoupper($ext);
    $act = esc_url(admin_url('admin-post.php'));
    ob_start(); ?>
    <form class="qform cform" id="tai-catalog" method="post" action="<?php echo $act; ?>" data-file="<?php echo esc_url($u); ?>">
      <h3>Tải catalog <?php echo esc_html(get_the_title($id)); ?></h3>
      <p class="cform__s">Điền họ tên và số điện thoại để tải catalog (<?php echo esc_html($kind); ?>). Kỹ thuật viên ICD sẽ gọi lại tư vấn khi bạn cần.</p>
      <input type="hidden" name="action" value="xqb_catalog"><input type="hidden" name="pid" value="<?php echo (int) $id; ?>"><?php wp_nonce_field('xqb_catalog', '_xqb'); ?>
      <div class="qform__g">
        <label><span>Họ tên</span><input name="name" autocomplete="name" placeholder=" "></label>
        <label><span>Số điện thoại *</span><input name="phone" required inputmode="tel" pattern="[0-9 +.]{9,15}" autocomplete="tel" placeholder=" "></label>
      </div>
      <input class="hp" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
      <button class="btn" type="submit"><?php echo mg_ico('arrow', 18); ?> Tải catalog</button>
      <p class="cform__f">Chưa tải được? <a href="<?php echo esc_url($u); ?>" download>Bấm vào đây để tải trực tiếp</a>.</p>
    </form>
    <?php return ob_get_clean();
}
add_action('admin_post_nopriv_xqb_catalog', 'mg_handle_catalog');
add_action('admin_post_xqb_catalog', 'mg_handle_catalog');
function mg_handle_catalog() {
    $back = wp_get_referer() ?: home_url('/'); $pid = (int) ($_POST['pid'] ?? 0); $file = $pid ? mg_catalog_url($pid) : '';
    if (!$file || !isset($_POST['_xqb']) || !wp_verify_nonce($_POST['_xqb'], 'xqb_catalog') || !empty($_POST['website'])) { wp_safe_redirect($back); exit; }
    $name = sanitize_text_field($_POST['name'] ?? ''); $phone = preg_replace('/[^0-9+ .]/', '', $_POST['phone'] ?? '');
    if (strlen(preg_replace('/\D/', '', $phone)) < 9) { wp_safe_redirect(add_query_arg('bg', 'err', $back) . '#tai-catalog'); exit; }
    if ($name === '') $name = 'Khách tải catalog';
    $sp = get_the_title($pid);
    $body = "Họ tên: $name\nĐiện thoại: $phone\nSản phẩm: $sp\nNhu cầu: Tải catalog\nTrang gửi: $back";
    wp_insert_post(['post_type' => 'bao_gia', 'post_status' => 'publish', 'post_title' => "$name - $phone - Tải catalog - $sp", 'post_content' => $body]);
    wp_mail(get_option('xqb_email') ?: get_option('admin_email'), "[Tải catalog] $name - $phone", $body);
    wp_redirect($file); exit;
}
add_action('add_meta_boxes', function () {
    add_meta_box('xqb_catalog', 'Catalog tải về', function ($p) {
        $v = get_post_meta($p->ID, 'xqb_catalog', true); wp_nonce_field('xqb_catalog_save', '_xqb_cat');
        echo '<p>Dán đường dẫn file catalog (PDF nếu dài, ảnh JPG/PNG nếu ngắn; có thể ghi dạng catalog/ten-file.pdf cho file trong thư viện Media). Có đường dẫn thì trang sản phẩm hiện tab "Tải catalog" có form điền họ tên và số điện thoại.</p><input type="url" name="xqb_catalog" value="' . esc_attr($v) . '" style="width:100%" placeholder="https://.../catalog.pdf">';
    }, 'product', 'normal');
});
add_action('save_post_product', function ($id) {
    if (!isset($_POST['_xqb_cat']) || !wp_verify_nonce($_POST['_xqb_cat'], 'xqb_catalog_save') || !current_user_can('edit_post', $id)) return;
    $u = trim($_POST['xqb_catalog'] ?? ''); $u = preg_match('~^https?://~i', $u) ? esc_url_raw($u) : ltrim(sanitize_text_field($u), '/'); $u ? update_post_meta($id, 'xqb_catalog', $u) : delete_post_meta($id, 'xqb_catalog');
});
/** Nội dung cũ: cặp "☑️ Nhãn / giá trị" -> bảng thông số. */
function mg_pretty_content($h) {
    $h = preg_replace('~<strong>\s*(?:☑️|✅|✔️|☑)\s*([^<]+?)\s*</strong>\s*(?:<br\s*/?>|\R|\s)+([^<\r\n][^<\r\n]*)~u', '<tr><th>$1</th><td>$2</td></tr>', $h);
    $h = preg_replace('~((?:<tr><th>.*?</td></tr>\s*){2,})~us', '<table class="spec"><tbody>$1</tbody></table>', $h);
    // chuỗi >= 3 đoạn dạng "Nhãn: giá trị" liền nhau -> bảng thông số
    $h = preg_replace_callback('~(?:<p>\s*[^<:]{2,45}:\s*[^<]{1,80}</p>\s*){3,}~u', function ($m) {
        preg_match_all('~<p>\s*([^<:]{2,45}):\s*([^<]{1,80})</p>~u', $m[0], $r, PREG_SET_ORDER);
        $o = '<table class="spec"><tbody>'; foreach ($r as $x) $o .= '<tr><th>' . trim($x[1]) . '</th><td>' . trim($x[2]) . '</td></tr>'; return $o . '</tbody></table>';
    }, $h);
    return $h;
}
add_filter('the_content', fn($c) => (is_singular('product') || is_singular('post')) ? mg_pretty_content($c) : $c, 11);
/** Ảnh sản phẩm: ảnh đại diện + ảnh trong nội dung + gallery. */
function mg_product_images($id) {
    $ids = array_filter(array_merge([get_post_thumbnail_id($id)], array_map('intval', explode(',', (string) get_post_meta($id, '_product_image_gallery', true)))));
    $ids = array_diff($ids, [(int) get_post_meta($id, '_xqb_old_thumb', true)]); // ảnh cũ còn logo cũ: không hiện
    $urls = []; foreach (array_unique($ids) as $a) { $u = wp_get_attachment_image_url($a, 'large'); if ($u) $urls[] = $u; }
    return array_slice(array_values(array_unique($urls)), 0, 8);
}
/** Vài dòng thông số đầu từ bảng .spec để hiện cạnh ảnh. */
function mg_key_specs($html, $n = 6) {
    if (!preg_match_all('~<tr[^>]*>\s*<t[hd][^>]*>(.*?)</t[hd]>\s*<td[^>]*>(.*?)</td>~us', $html, $m, PREG_SET_ORDER)) return [];
    $o = []; foreach ($m as $r) { $k = trim(wp_strip_all_tags($r[1])); $v = trim(wp_strip_all_tags($r[2])); if ($k && $v && mb_strlen($k) < 40 && mb_strlen($v) < 60 && !preg_match('~^(tiêu chí|thông số)~ui', $k)) $o[] = [$k, $v]; if (count($o) >= $n) break; }
    return $o;
}
add_action('pre_get_posts', function ($q) {
    if (is_admin() || !$q->is_main_query()) return;
    if ($q->is_search() && !$q->get('post_type')) $q->set('post_type', ['product', 'post']);
    if ($q->is_tax('product_cat') || $q->is_tax('product_tag') || $q->is_post_type_archive('product')) $q->set('posts_per_page', 16);
    if ($q->is_category() || $q->is_home()) $q->set('posts_per_page', 8);
});
function mg_pagination() {
    $l = paginate_links(['type' => 'array', 'prev_text' => '‹', 'next_text' => '›', 'mid_size' => 1]);
    if ($l) echo '<nav class="pager" aria-label="Phân trang">' . implode('', $l) . '</nav>';
}
// Nút đổi cỡ chữ cho người đọc (bật/tắt ở Cài đặt Magnum > Chữ bài viết)
function mg_fsz() {
    if (mg('c_reader') === '0') return;
    echo '<div class="fsz" role="group" aria-label="Cỡ chữ"><span>Cỡ chữ</span><button type="button" data-fsz="-1" aria-label="Chữ nhỏ hơn">A-</button><button type="button" data-fsz="0" aria-label="Cỡ chữ mặc định">A</button><button type="button" data-fsz="1" aria-label="Chữ lớn hơn">A+</button></div>';
}
