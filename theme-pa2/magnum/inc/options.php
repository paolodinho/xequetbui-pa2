<?php
/** Trang "Cài đặt Magnum": mọi nội dung hay đổi sửa ở đây, không đụng code. */
if (!defined('ABSPATH')) exit;
function mg_defaults() {
    return [
        'hotline' => '02422 009 188', 'hotline_tel' => '02422009188', 'hotline2' => '0935 482 688', 'hotline2_tel' => '0935482688',
        'zalo' => 'https://zalo.me/0935482688', 'email' => 'khachhang.icd@gmail.com',
        'company' => 'Công ty CP Phát triển Công nghiệp và Đô thị Việt Nam (ICD)',
        'addr_hn' => 'Số 55 cụm 5 đường Anh Dũng, Thiên Lộc, Hà Nội', 'addr_hcm' => '551/212 Lê Văn Khương, phường Tân Thới Hiệp, TP. Hồ Chí Minh',
        'addr_factory' => 'Lô CN 10.3.2 KCN VISIZ Phúc Yên, Phú Thọ', 'hours' => 'Thứ 2 - Thứ 7: 8:00 - 17:30',
        'facebook' => 'https://www.facebook.com/icdgreentech', 'youtube' => 'https://www.youtube.com/@ICD_Greentech',
        'map' => 'https://maps.google.com/maps?q=ICD%20Greentech%20Work%20Shop%2C%20Thi%C3%AAn%20L%E1%BB%99c%2C%20H%C3%A0%20N%E1%BB%99i&hl=vi&z=15&output=embed',
        'slides' => "Xe quét đường điện Magnum|Xe quét đường|/xe-quet-rac.html||banner-1.jpg\nMáy chà sàn công nghiệp Magnum|Máy chà sàn|/danh-muc-san-pham.html||banner-2.jpg\nXe chở rác điện Magnum|Xe chở rác|/xe-cho-rac.html||banner-3.jpg",
        'cat_tabs' => "may-lau-san-cha-san-nha-xuong-cong-nghiep|Máy chà sàn\nxe-quet-rac|Xe quét rác\nmay-hut-bui-cong-nghiep-nha-xuong-cong-suat-lon|Máy hút bụi\nmay-phun-xit-ap-luc-cao-may-ve-sinh-lam-sach-cong-nghiep|Phun áp lực\nxe-cho-rac|Xe chở rác\nxe-dien-keo-hang-nang-hang-trong-nha-xuong|Xe nâng, kéo hàng\nphu-tung-phu-kien-vat-tu-thay-the|Phụ kiện",
        'about_title' => 'Về chúng tôi',
        'about_text' => "ICD Green Tech chuyên cung cấp máy móc, thiết bị cho vệ sinh công nghiệp, môi trường đô thị và nâng hạ, vận chuyển hàng hóa trong nhà xưởng, kho bãi logistics.\nChúng tôi phân phối các dòng máy của FIORENTINI, GLUTTON, TENAX, EP và thương hiệu MAGNUM: máy chà sàn, xe quét bụi, xe quét đường, máy hút bụi công nghiệp, máy phun áp lực, xe chở rác, xe nâng điện và phụ tùng thay thế.\nĐội ngũ kỹ thuật ICD khảo sát hiện trạng, tư vấn chọn máy theo diện tích và ngân sách, bàn giao, hướng dẫn vận hành và bảo dưỡng định kỳ cho khách hàng trên toàn quốc.",
        'stats_title' => 'Năng lực ICD', 'stats_text' => 'Văn phòng tại Hà Nội và TP. Hồ Chí Minh, kho tại KCN VISIZ Phúc Yên, phục vụ khách hàng trên toàn quốc',
        'stats' => "2008|Năm thành lập ICD\n170+|Sản phẩm, thiết bị đang cung cấp\n2000+|Dự án đã hoàn thành cho khách hàng",
        'ho_title' => 'Dự án đã bàn giao', 'ho_ids' => '3068,3066,3064,3062,3013',
        'sol_title' => 'Giải pháp vệ sinh theo nhu cầu',
        'sol_text' => 'Khảo sát mặt bằng, chọn đúng dòng máy và lên phương án vận hành cho từng công trình: mua mới, thuê theo tháng hoặc bảo dưỡng trọn gói.',
        'sol_list' => "Lĩnh vực ứng dụng|Nhà máy, khu công nghiệp, kho logistics, trung tâm thương mại, bệnh viện, trường học, khu đô thị và đường phố.\nSản phẩm chính|Máy chà sàn, xe quét bụi, xe quét đường, máy hút bụi công nghiệp, máy phun áp lực, xe chở rác, xe nâng điện, phụ tùng thay thế.\nDịch vụ đi kèm|Cho thuê theo ngày, tháng, dự án; bảo dưỡng, sửa chữa, thay pin lithium và phụ tùng chính hãng.",
        'cta_title' => 'Nhận báo giá thiết bị trong ngày', 'cta_text' => 'Để lại số điện thoại, kỹ thuật viên ICD gọi lại tư vấn model phù hợp diện tích và ngân sách của bạn.',
        'footer_about' => 'Giải pháp xanh, môi trường sạch.',
        'c_font' => 'Open Sans', 'c_size' => '17', 'c_lh' => '1.8', 'c_width' => '820', 'c_h2' => '26', 'c_h3' => '21', 'c_color' => '#2B2B2B', 'c_reader' => '1',
    ];
}
/** Kiểu chữ cho phần nội dung bài viết / mô tả sản phẩm (đều hỗ trợ tiếng Việt). */
function mg_fonts() { return ['Open Sans' => 'sans', 'Be Vietnam Pro' => 'sans', 'Roboto' => 'sans', 'Noto Sans' => 'sans', 'Inter' => 'sans', 'Mulish' => 'sans', 'Nunito Sans' => 'sans', 'Lora' => 'serif', 'Merriweather' => 'serif', 'Noto Serif' => 'serif']; }
function mg($k) { static $o = null; if ($o === null) $o = wp_parse_args(get_option('mg_options', []), mg_defaults()); return $o[$k] ?? ''; }
function mg_lines($k) { return array_values(array_filter(array_map(fn($l) => array_map('trim', explode('|', $l)), preg_split('/\R/', mg($k))), fn($r) => $r[0] !== '')); }
add_action('admin_menu', function () { add_menu_page('Cài đặt Magnum', 'Cài đặt Magnum', 'manage_options', 'mg-settings', 'mg_settings_page', 'dashicons-admin-generic', 3); });
add_action('admin_init', function () {
    register_setting('mg_group', 'mg_options', ['sanitize_callback' => function ($in) {
        $out = []; foreach (mg_defaults() as $k => $_) $out[$k] = isset($in[$k]) ? sanitize_textarea_field($in[$k]) : '';
        update_option('xqb_email', sanitize_email($out['email'])); return $out;
    }]);
});
function mg_settings_page() {
    $tabs = [
        'lienhe' => ['Liên hệ', ['company' => 'Tên công ty', 'hotline' => 'Hotline (hiển thị)', 'hotline_tel' => 'Hotline (số bấm gọi, viết liền)', 'hotline2' => 'Hotline 2 (hiển thị)', 'hotline2_tel' => 'Hotline 2 (số bấm gọi)', 'zalo' => 'Link Zalo', 'email' => 'Email nhận yêu cầu báo giá', 'addr_hn' => 'Địa chỉ Hà Nội', 'addr_hcm' => 'Địa chỉ TP. HCM', 'addr_factory' => 'Địa chỉ nhà máy', 'hours' => 'Giờ làm việc', 'facebook' => 'Facebook', 'youtube' => 'YouTube', 'map' => 'Link nhúng Google Maps (trang Liên hệ)']],
        'chu' => ['Chữ bài viết', ['c_font' => ['Kiểu chữ nội dung bài viết, mô tả sản phẩm', array_combine(array_keys(mg_fonts()), array_keys(mg_fonts()))], 'c_size' => ['Cỡ chữ đoạn văn (px)', ['15' => '15px', '16' => '16px', '17' => '17px (mặc định)', '18' => '18px', '19' => '19px', '20' => '20px']], 'c_lh' => ['Giãn dòng', ['1.6' => '1.6 (hẹp)', '1.7' => '1.7', '1.8' => '1.8 (mặc định)', '1.9' => '1.9', '2' => '2.0 (thoáng)']], 'c_width' => ['Độ rộng tối đa dòng chữ mô tả sản phẩm (px)', ['720' => '720px (hẹp)', '820' => '820px (mặc định)', '920' => '920px', '1200' => 'Hết khung trang']], 'c_h2' => ['Cỡ tiêu đề mục lớn H2 (px)', ['22' => '22px', '24' => '24px', '26' => '26px (mặc định)', '28' => '28px', '30' => '30px']], 'c_h3' => ['Cỡ tiêu đề mục nhỏ H3 (px)', ['18' => '18px', '19' => '19px', '20' => '20px', '21' => '21px (mặc định)', '22' => '22px', '24' => '24px']], 'c_color' => 'Màu chữ đoạn văn (mã màu, vd #2B2B2B)', 'c_reader' => ['Nút "Cỡ chữ A- A A+" cho người đọc trên bài viết', ['1' => 'Hiện', '0' => 'Ẩn']]]],
        'trangchu' => ['Trang chủ', ['slides' => 'Slide đầu trang (mỗi dòng: Tiêu đề|Mô tả|Link nút|Chữ nút|Tên ảnh trong theme hoặc URL ảnh 1920x700)', 'cat_tabs' => 'Tab danh mục sản phẩm (mỗi dòng: slug danh mục|Tên tab)', 'about_title' => 'Khối giới thiệu - tiêu đề', 'about_text' => 'Khối giới thiệu - nội dung (mỗi dòng 1 đoạn)', 'stats_title' => 'Dải số liệu - tiêu đề', 'stats_text' => 'Dải số liệu - mô tả', 'stats' => 'Số liệu (mỗi dòng: Số|Nhãn)', 'ho_title' => 'Khối dự án bàn giao - tiêu đề', 'ho_ids' => 'Khối dự án bàn giao - mã bài viết (cách nhau dấu phẩy)', 'sol_title' => 'Khối giải pháp - tiêu đề', 'sol_text' => 'Khối giải pháp - mô tả', 'sol_list' => 'Khối giải pháp - các ý (mỗi dòng: Tiêu đề|Mô tả)', 'cta_title' => 'Dải báo giá - tiêu đề', 'cta_text' => 'Dải báo giá - mô tả', 'footer_about' => 'Giới thiệu ngắn chân trang']],
    ];
    $cur = isset($_GET['tab'], $tabs[$_GET['tab']]) ? $_GET['tab'] : 'lienhe';
    echo '<div class="wrap"><h1>Cài đặt Magnum</h1><h2 class="nav-tab-wrapper">';
    foreach ($tabs as $k => $t) printf('<a class="nav-tab %s" href="%s">%s</a>', $k === $cur ? 'nav-tab-active' : '', esc_url(admin_url("admin.php?page=mg-settings&tab=$k")), esc_html($t[0]));
    echo '</h2><form method="post" action="options.php">'; settings_fields('mg_group'); echo '<table class="form-table">';
    foreach ($tabs[$cur][1] as $k => $label) {
        if (is_array($label)) {
            echo '<tr><th><label>' . esc_html($label[0]) . '</label></th><td><select name="mg_options[' . $k . ']">';
            foreach ($label[1] as $ov => $ol) printf('<option value="%s"%s>%s</option>', esc_attr($ov), selected(mg($k), (string) $ov, false), esc_html($ol));
            echo '</select></td></tr>'; continue;
        }
        $v = mg($k); $multi = strpos($v, "\n") !== false || in_array($k, ['slides', 'cat_tabs', 'about_text', 'stats', 'sol_list'], true);
        echo '<tr><th><label>' . esc_html($label) . '</label></th><td>' . ($multi ? '<textarea class="large-text" rows="6" name="mg_options[' . $k . ']">' . esc_textarea($v) . '</textarea>' : '<input class="regular-text" style="width:560px" name="mg_options[' . $k . ']" value="' . esc_attr($v) . '">') . '</td></tr>';
    }
    echo '</table>';
    foreach ($tabs as $tk => $t) if ($tk !== $cur) foreach ($t[1] as $k => $_) echo '<input type="hidden" name="mg_options[' . $k . ']" value="' . esc_attr(mg($k)) . '">';
    submit_button('Lưu cài đặt'); echo '</form></div>';
}
