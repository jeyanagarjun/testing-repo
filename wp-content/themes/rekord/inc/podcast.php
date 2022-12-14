<?php

function customRSSFunc(){
    get_template_part('rss', 'podcasts');
}

  add_action('init', 'customRSS');
  function customRSS(){
      add_feed('podcasts', 'customRSSFunc');
  }


  if( function_exists('acf_add_options_page') ) {
  
    acf_add_options_page(array(
      'page_title' 	=> 'Podcast RSS Settings',
      'menu_title'	=> 'Podcast RSS Settings',
      'menu_slug' 	=> 'podcast-rss-settings',
      'capability'	=> 'edit_posts',
      'parent_slug'	=> 'edit.php?post_type=podcast',
      'redirect'		=> false
    ));
  }


// Acf Options
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5e86578955203',
        'title' => 'Itunes RSS Feed Settings',
        'fields' => array(
            array(
                'key' => 'field_5e8659bcdce7d',
                'label' => 'Itunes Name',
                'name' => 'itunes_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5e8659ccdce7e',
                'label' => 'Itunes Email',
                'name' => 'itunes_email',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5e8657f1dce7b',
                'label' => 'Itunes Category',
                'name' => 'itunes_category',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5e86586bdce7c',
                'label' => 'Itunes Sub Category',
                'name' => 'itunes_sub_category',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5e86578edce7a',
                'label' => 'Itunes Cover',
                'name' => 'itunes_cover',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => 1400,
                'min_height' => 1400,
                'min_size' => '',
                'max_width' => 3000,
                'max_height' => 3000,
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'podcast-rss-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;  