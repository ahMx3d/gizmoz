<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Categories Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during categories for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    ############################# START CATEGORIES TITLES ########################
    'index_title'           => ucfirst('categories'),
    'index_main_heading'    => ucfirst('categories'),
    'index_card_title'      => ucfirst('all categories'),
    ############################# START CATEGORIES TITLES ########################
    
    ############################# START CATEGORIES FILTER ########################
    'index_card_filter_by'              => ucfirst('filter by'),
    'index_card_filter_by_name_asc'     => ucfirst('ascending'),
    'index_card_filter_by_name_desc'    => ucfirst('descending'),
    'index_card_filter_by_type'         => ucfirst('type'),
    'index_card_filter_by_oldest'       => ucfirst('oldest'),
    'index_card_filter_by_newest'       => ucfirst('newest'),
    'index_card_filter_by_status'       => ucfirst('status'),
    'index_card_filter_by_active'       => ucfirst('active'),
    'index_card_filter_by_pending'      => ucfirst('pending'),
    ############################## END CATEGORIES FILTER #########################

    ############################# START BREADCRUMB ########################
    'dashboard'                 => ucfirst('dashboard'),
    'breadcrumb_index_title'    => ucfirst('all categories'),
    'breadcrumb_index_add_new'  => ucfirst('create new'),
    'breadcrumb_index_dropdown_main'  => ucfirst('main category'),
    'breadcrumb_index_dropdown_sub'   => ucfirst('subcategory'),
    'breadcrumb_index_dropdown_all'   => ucfirst('all categories'),
    'breadcrumb_index_dropdown_all_main'   => ucfirst('main categories'),
    'breadcrumb_index_dropdown_all_sub'    => ucfirst('subcategories'),
    ############################# END BREADCRUMB ##########################

    ############################# START PAGE TITLES ########################
    'index_page_title'  => ucfirst('main categories'),
    'edit_page_title'   => ucfirst('edit main category'),
    'create_page_title' => ucfirst('create main category'),
    'show_page_title'   => ucfirst('show main category'),
    #####################################################
    'subcates_index_page_title'     => ucfirst('subcategories'),
    'subcates_create_page_title'    => ucfirst('create subcategory'),
    'subcates_edit_page_title'      => ucfirst('edit subcategory'),
    'subcates_show_page_title'      => ucfirst('show subcategory'),
    ############################# END PAGE TITLES ##########################

    ############################# START BREADCRUMB ########################
    'main_cates'    => ucfirst('main categories'),
    'main_page'     => ucfirst('dashboard'),
    'add_new'       => ucfirst('add new'),
    'edit_cate'     => ucfirst('edit category'),
    'show_cate'     => ucfirst('show category'),
    #############################
    'subcates'      => ucfirst('subcategories'),
    ############################# END BREADCRUMB ##########################

    ############################# START CARD HEADER ########################
    'index_header_title'  => ucfirst('website main categories'),
    'edit_header_title'   => ucfirst('edit main category'),
    'create_header_title' => ucfirst('create main category'),
    'show_header_title'   => ucfirst('show main category'),
    #######################################################
    'subcates_index_header_title'       => ucfirst('website subcategories'),
    'subcates_create_header_title'      => ucfirst('create subcategory'),
    'subcates_edit_header_title'        => ucfirst('edit subcategory'),
    'subcates_show_header_title'        => ucfirst('show subcategory'),
    ############################# END CARD HEADER ##########################

    ############################# START CARD CONTENT ########################
    
        ############################# START TABLE HEADERS ########################
        'th_name'       => ucfirst('name'),
        'th_sub_cates'  => ucfirst('subcategories'),
        'th_main_cate'  => ucfirst('main category'),
        'th_seo'        => ucfirst('slug'),
        'th_image'      => ucfirst('image'),
        'th_status'     => ucfirst('status'),
        'th_type'       => ucfirst('category type'),
        'th_actions'    => ucfirst('actions'),
        'th_updated_at' => ucfirst('update date'),
        ############################# END TABLE HEADERS ##########################
        
        ############################# START TABLE DATA ########################
        'td_img_alt'    => ucfirst('category image'),
        'td_no_main'    => ucfirst('No main categories yet'),
        'td_no_sub'     => ucfirst('No subcategories yet'),
        ############################# END TABLE DATA ##########################
        
        ############################# START TABLE ACTIONS ########################
        'td_edit'           => ucfirst('edit'),
        'show_main_cate'    => ucfirst('show main category'),
        'show_sub_cate'     => ucfirst('show subcategories'),
        'td_add_sub'        => ucfirst('add subcategory'),
        'td_add_main'       => ucfirst('add main category'),
        'td_activate'       => ucfirst('activate'),
        'td_deactivate'     => ucfirst('deactivate'),
        'td_destroy'        => ucfirst('delete'),
        ############################# END TABLE ACTIONS ##########################
        
        ############################# START TABLE MODEL DATA ########################
        'model_active'      => ucfirst('active'),
        'model_pending'     => ucfirst('pending'),
        'model_type_main'   => ucfirst('main category'),
        'model_type_sub'    => ucfirst('subcategory'),
        ############################# END TABLE MODEL DATA ##########################
        
        ############################# START FORM LAYOUT ########################
        'edit_details'      => ucfirst('details'),
        'create_details'    => ucfirst('details'),
        ############################# END FORM LAYOUT ##########################

        ############################# START FORM LABELS ########################
        'cate_name'  => ucfirst('name'),
        'cate_slug'  => ucfirst('slug'),
        'cate_stat'  => ucfirst('status'),
        'cate_imag'  => ucfirst('photo'),
        'cate_main'  => ucfirst('main category'),
        ############################# END FORM LABELS ##########################

        ############################# START FORM PLACEHOLDERS ########################
        'cate_name_placeholder' => ucfirst('enter category name'),
        'cate_slug_placeholder' => ucfirst('enter category SEO name'),
        'cate_main_placeholder' => ucfirst('select main category'),
        ############################# END FORM PLACEHOLDERS ##########################
        
        ############################# START FORM ACTIONS ########################
        'cate_update_action' => ucfirst('update'),
        'cate_create_action' => ucfirst('save'),
        'cate_cancel_action' => ucfirst('cancel'),
        ############################# END FORM ACTIONS ##########################

    
    ############################# END CARD CONTENT ##########################

];
