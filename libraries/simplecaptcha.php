<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simplecaptcha class
 *
 * @package     CodeIgniter
 * @subpackage  Controller
 * @category    captcha
 * @author      Muhammad Nur Hidayat
 * @link        https://github.com/seebeb/ci-simple-captcha
 */
class Simplecaptcha {

    function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('session');
    }

    /*set captcha session*/
    function set_captcha_session()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        if($CI->session->userdata('captcha_key')):
            $CI->session->unset_userdata('captcha_key');
        endif;
        $random_str = substr(md5(microtime()),0,6);
        $CI->session->set_userdata('captcha_key',$random_str);
    }

    /*create captcha*/
    function create_captcha()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        
        $new_image = imagecreatetruecolor(75, 30); //(Panjang, Tinggi)
        $line_color = imagecolorallocate($new_image,233,239,239); //line color
        $text_color = imagecolorallocate($new_image, 255, 255, 255); //text color-white
        imagestring($new_image, 6, 11, 6, $CI->session->userdata('captcha_key'), $text_color);// Draw a random string horizontally
        header('Content-type: image/png');
        imagepng($new_image);
        imagedestroy($new_image);
    }
}