<?php

/**
 * Pico Custom Headers Plugin 
 * @package Pico
 * @version 0.0.1
 * @author Miguel Angel Sosvilla Luis
 * @author Shawn Sandy <shawnsandy04@gmail.com> (Adv Meta Plugin)
 *
 */
class Pico_Custom_Headers {

    private /* default custom headers */
            $custom_headers = array(
                //page slug keep lower case
                'slug' => 'Slug',
                //page category
                'category' => 'Category',
                //page status
                'status' => 'Status',
                //Type -- page, post, plugin
                'type' => 'Type',
                //Page Thumbnail -- (theme/images)
                'thumbnail' => 'Thumbnail',
                // image for page icon -- (theme/images/)
                'icon' => 'Icon',
                //use custom page template(s)
                'tpl' => 'Tpl'
                    );
            

    public function __construct() {

    }


    public function config_loaded(&$settings) {

        if (isset($settings['custom_headers']))
            $this->custom_headers = $settings['custom_headers'];
    }

    public function before_read_file_meta(&$headers) {

        foreach ($this->custom_headers as $field => $regex) {
            $headers[$field] = $regex;
        }
    }

    public function get_page_data(&$data, $page_meta) {

        foreach ($this->custom_headers as $field => $regex) {
          $data[$field] = $page_meta[$field] ;
        }
    }

}
