<?php

function shortcode_squraegallery($attr){
  $default = array(
    'id' => ''
  );
  $data = shortcode_atts($default, $attr);
  $imageids = explode(',', $data['id']);
  $gallery = "";
  foreach($imageids as $attachid):
      $attachment_source_array = wp_get_attachment_image_src($attachid, 'squarethumbs');
      $attachment_source = $attachment_source_array[0];
      $gallery .= sprintf('<img src="%s" />', $attachment_source);
  endforeach;

  return $gallery;
}

add_shortcode("squaregallery", "shortcode_squraegallery");


function shortcode_responsiveslider($attr){
    $default = array(
        'id' =>  '',
        'title' => 'Responsive Slider'
      );
    $slideid = "slider-".time();
    $data = shortcode_atts($default, $attr);
    $imageids = explode(',', $data['id']);
    $gallery = "";
    $gallery .= sprintf("<h3>%s</h3>", $data['title']);
    $gallery .= '<div class="callbacks_container"><ul class="rslides" id="'.$slideid.'">';
  foreach($imageids as $attachid):
      $attachment_source_array = wp_get_attachment_image_src($attachid, 'sliderimage');
      $attachment_source = $attachment_source_array[0];
      // $attachment = wp_prepare_attachment_for_js($attachid);
      
      $attachment = get_post($attachid);
      $icaption   = $attachment->post_excerpt;
      $ititle     = $attachment->post_title;
      $gallery   .= sprintf(' <li><img src="%s" alt="%s"><p class="caption">%s</p></li>', $attachment_source, $ititle, $icaption);
  endforeach;
      $gallery .=  '</ul></div>';

      //$gallery .= "<script> ;(function($){ $('#".$slideid."').responsiveSlides({ auto: true, pager: false, nav: true, speed: 500 }); })(jQuery);</script>";

  return $gallery;
}

add_shortcode("responsiveslider", "shortcode_responsiveslider");
