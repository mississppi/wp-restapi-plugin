<?php
/**
 * タイプとタクソノミを管理するクラスです
 */
class CustomContent{

    public function __construct()
    {
        add_action('init', [$this, 'create_custom_post_type'], 11);
        add_action('init', [$this, 'create_custom_taxonomy'], 11);
    }

    /**
     * Infomationという投稿タイプを定義します
     *
     * @return void
     */
    public function create_custom_post_type()
    {
        $labels = [
            'name' => 'Informations',
            'singular_name' => 'Information',
            'add_new' => '新しい情報を追加',
            'add_new_item' => '新しい情報を追加',
            'edit_item' => '情報を編集',
            'view_item' => '情報を表示',
            'search_items' => '情報を検索',
            'not_found' => '情報は見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱に情報はありません',
            'parent_item_colon' => '親情報',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'information'),
            'menu_icon' => 'dashicons-info',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'show_in_rest' => true, // REST API を有効にする
        ];

        register_post_type('Information', $args);
    }

    /**
     * タクソノミーを定義します
     *
     * @return void
     */
    public function create_custom_taxonomy()
    {
        $labels = [
            'name' => 'ジャンル',
            'singular_name' => 'ジャンル',
            'search_items' => 'ジャンルを検索',
            'all_items' => 'すべてのジャンル',
            'parent_item' => '親ジャンル',
            'parent_item_colon' => '親ジャンル:',
            'edit_item' => 'ジャンルの編集',
            'update_item' => 'ジャンルの更新',
            'add_new_item' => '新しいジャンルを追加',
            'new_item_name' => '新しいジャンル名',
            'menu_name' => 'ジャンル',
        ];

        $args = [
            'labels' => $labels,
            'hierarchical' => true, // 階層型カテゴリーにするかどうか
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'genre'), // タクソノミースラッグ
            'show_in_rest' => true, // REST API を有効にする
        ];

        register_taxonomy('genre', ['information'], $args);
    }
}

new CustomContent();