<?php

namespace KSlider\Processor;

class SliderProcessor extends Processor
{

    /**
     * 
     * @action add_filter
     * @hook the_content
     * @priority 10
     * @args 1
     */
    public function advimage_processor($content)
    {
        $this->init();
        
        $this->getApp()->getAsm()->enqueue('slider-css');
        $this->getApp()->getScm()->enqueue('slider-js');
        $this->getApp()->getScm()->enqueue('custom-slider-js');
        
        $new_content = preg_replace_callback('/(<img\s+[^>]*class=[\'"])([^\'"]*)([\'"][^>]*>)/i', function($matches) {
            return $matches[1] . 'lightbox-trigger ' . $matches[2] . $matches[3];
        }, $content);

        return $new_content;
    }

    /**
     *
     * @hook post_gallery
     * @priority 10
     * @args 2
     */
    public function index_processor($output, $attr)
    {
        $this->init();
        
        $this->getApp()->getAsm()->enqueue('slider-css');
        $this->getApp()->getScm()->enqueue('slider-js');
        $this->getApp()->getScm()->enqueue('custom-slider-js');
        
        $images = [];
        // Vérifiez que le shortcode est pour une galerie WordPress

        $sliderId = \uniqid();

        if (isset($attr['ids'])) {
            // Récupérer les ID des images de la galerie
            $ids = explode(',', $attr['ids']);

            foreach ($ids as $id) {
                
                // Récupérer les informations de l'image
                $image = wp_get_attachment_image_src($id, 'full');
                $alt = get_post_meta($id, '_wp_attachment_image_alt', true);

                $images[$id] = [
                    'image' => $image[0],
                    'alt' => $alt
                ];
            }
        }

        // Renvoyer le code modifié
        $output =  $this->renderContent('index', [
            'slider_id' => $sliderId,
            'images' => $images
        ]);

        return $output;
    }

}