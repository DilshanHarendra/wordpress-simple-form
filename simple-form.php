<?php
/**
 * Plugin Name: simple-form
 * Plugin URI: https://github.com/DilshanHarendra/wordpress-simple-form
 * Description: This is a test form plugin
 * Author: Dilshan
 * Author URI: https://github.com/DilshanHarendra
 * Version: 1.0.0
 * Text Domain: Simple Form
 *
 *
 *
 *
 */
// Exit if accessed directly


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class SimpleForm
{
    public function __construct()
    {
        add_action('init',array($this,'create_custom_form'));

        add_action('wp_enqueue_scripts',array($this,'load_assets'));
    }

    public function create_custom_form()
    {
        $args= array(
            'public'=> true,
            'has_archive'=>true,
            'supports'=>array('title'),
            'exclude_from_queryable'=>false,
            'publicly_queryable'=>false,
            'capability'=>'manage_options',
            'labels'=>array(
                'name'=>'simple-form',
                'singular_name'=>'singular name'
            ),
            'menu_icon'=>'dashicons-media-text'
        );

        register_post_type('simple-form',$args);
    }



    public function load_assets(){
        wp_enqueue_style('simple-form',plugin_dir_url(__FILE__).'/css/simple-form.css',array(),1,'all');

        wp_enqueue_script('simple-form',plugin_dir_url(__FILE__).'/js/simple-form.js',array(),1,true);

    }


}

new SimpleForm;
