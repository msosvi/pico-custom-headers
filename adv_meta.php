<?php

/**
 * The file description. *
 * @package Pico
 * @subpackage Adv meta
 * @version 0.1.3
 * @author Shawn Sandy <shawnsandy04@gmail.com>
 *
 */
class Adv_Meta {

    private /* default meta values */
            $meta_values = array(
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

        if (isset($settings['custom_meta_values']))
            $this->meta_values = $settings['custom_meta_values'];
    }

    public function before_read_file_meta(&$headers) {

        foreach ($this->meta_values as $key => $value) {
            $headers[$key] = $value;
        }
    }

    public function get_page_data(&$data, $page_meta) {

        foreach ($page_meta as $key => $value) {
            $data[$key] = $value ;
        }
    }

}
