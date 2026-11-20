<?php
if (!defined('ABSPATH')) exit;
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('woocommerce');
    register_nav_menus(['primary' => 'Menu chính', 'footer' => 'Liên kết nhanh (chân trang)']);
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mg-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap', [], null);
    wp_enqueue_style('mg-main', get_theme_file_uri('assets/css/main.css'), [], filemtime(get_theme_file_path('assets/css/main.css')));
    // Chữ phần nội dung bài viết / mô tả SP: chỉnh ở Cài đặt Magnum > Chữ bài viết
    $fonts = mg_fonts(); $cf = isset($fonts[mg('c_font')]) ? mg('c_font') : 'Open Sans';
    if ($cf !== 'Open Sans') wp_enqueue_style('mg-font-content', 'https://fonts.googleapis.com/css2?family=' . str_replace(' ', '+', $cf) . ':ital,wght@0,400;0,600;0,700;1,400&display=swap', [], null);
    $num = fn($k, $min, $max, $def) => is_numeric(mg($k)) && mg($k) >= $min && mg($k) <= $max ? (float) mg($k) : $def;
    $col = preg_match('/^#[0-9a-fA-F]{3,6}$/', mg('c_color')) ? mg('c_color') : '#2B2B2B';
    wp_add_inline_style('mg-main', sprintf(":root{--cf:'%s',%s;--cfs:%spx;--clh:%s;--cw:%spx;--ch2:%spx;--ch3:%spx;--cc:%s}", $cf, $fonts[$cf] === 'serif' ? "Georgia,'Times New Roman',serif" : 'var(--f)', $num('c_size', 14, 22, 17), $num('c_lh', 1.4, 2.2, 1.8), $num('c_width', 600, 1400, 820), $num('c_h2', 20, 34, 26), $num('c_h3', 17, 28, 21), $col));
    wp_enqueue_script('mg-orphan', get_theme_file_uri('assets/js/orphan-glue.js'), [], '1', true);
    wp_enqueue_script('mg-main', get_theme_file_uri('assets/js/main.js'), [], filemtime(get_theme_file_path('assets/js/main.js')), true);
});
add_action('wp_enqueue_scripts', function () { foreach (['wp-block-library', 'global-styles', 'wc-blocks-style', 'woocommerce-general', 'woocommerce-layout', 'woocommerce-smallscreen', 'classic-theme-styles'] as $h) wp_dequeue_style($h); }, 100);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_action('wp_head', function () { echo '<link rel="icon" href="' . esc_url(get_theme_file_uri('assets/img/favicon.png')) . '">' . "\n"; }, 2);

require_once get_theme_file_path('inc/options.php');
require_once get_theme_file_path('inc/helpers.php');

add_filter('the_content', function ($c) {
    return preg_replace(['#(<iframe[^>]+src=["\'])(?:https?:)?//(www\.)?youtube(-nocookie)?\.com#i', '#<iframe(?![^>]*loading=)#i'], ['$1https://www.youtube$3.com', '<iframe loading="lazy"'], $c);
}, 20);
// Không dùng gạch dài
function mg_no_dash($s) { return is_string($s) ? str_replace(['—', '–', '&#8212;', '&#8211;', '&mdash;', '&ndash;'], '-', $s) : $s; }
add_action('template_redirect', function () { if (!is_admin() && !wp_doing_ajax() && !is_feed()) ob_start('mg_no_dash'); }, 0);
add_filter('excerpt_more', fn() => '…');
add_filter('excerpt_length', fn() => 32);
