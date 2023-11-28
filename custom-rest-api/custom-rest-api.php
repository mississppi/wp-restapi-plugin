<?php
/**
 * @package custom-rest-api
 */
/*
Plugin Name: custom-rest-api
Plugin URI: 
Description: restapiの機能を拡張したプラグインです
Version: 1.0
Author: msp
Author URI: 
License: GPLv2 or later
*/

if(!defined('ABSPATH')) {
    die;
}

if(!function_exists('add_action')){
    echo 'can\t access this file';
    exit;
}

class CustomRestApi
{
    function activate(){}

    function deactivate(){}
    
    function uninstall(){}

    public function __construct()
    {
        add_action('init', [$this, 'createType'], 10);
        add_action('rest_api_init', [$this, 'registerApi'], 15);
    }

    public function createType()
    {
        include_once('custom-content.php');
    }

    public function registerApi()
    {
        include_once('custom-api-controller.php');
    }
}

if (class_exists('CustomRestApi')){
    $customRestApi = new CustomRestApi();
}

