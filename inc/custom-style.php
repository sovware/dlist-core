<?php

//===========Dlist Color Control Customizer Panel=============

function dlist_custom_style()
{

    $primary = get_theme_mod('p_color', '#fd4956');
    $rgb_color = get_theme_mod('rgb_color', '#fd4956');
    $secondary = get_theme_mod('s_color', '#23c8b9');

    $success = get_theme_mod('su_color', '#32cc6f');
    $info = get_theme_mod('in_color', '#2c99ff');

    $danger = get_theme_mod('dn_color', '#f51957');
    $warning = get_theme_mod('wr_color', '#fa8b0c'); ?>

    <style>
        <?php if ('#fd4956' != $primary) { ?>

            /* Color: Primary */
            #directorist.atbd_wrapper .atbd_generic_header .atbd_listing_action_btn .view-as a.active, .color-primary,
            .atbd_content_active #directorist.atbd_wrapper .atbd_saved_items_wrapper .saved_item_category a span,
            .atbdp_make_str_green,
            .atbd_content_active #directorist.atbd_wrapper .atbd_single_listing .atbd_listing_info .atbd_content_upper .atbd_excerpt_content a,
            .atbd_content_active #directorist.atbd_wrapper .atbd_single_listing .atbd_listing_info .atbd_listing_title a:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_bottom_content .atbd_content_right .atbd_save:hover,
            #directorist.atbd_wrapper .atbdp-text-list .atbd_category_wrapper a:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_location_grid_wrap a.atbd_location_grid:hover,
            .post--card .card-body h4 a:hover,
            .post--card .card-body .post-meta li a:hover,
            .post--card2 .card-body h3 a,
            .post--card2 .card-body .post-meta li a:hover,
            .block-single__icon i,
            .testimonial-carousel .owl-nav button:hover,
            .widget.widget--links li a:hover,
            #directorist.atbd_wrapper .atbd_author_info_widget .atbd_widget_contact_info ul li span:first-child,
            .atbdp-widget-categories .atbdp_parent_category li>.cat-trigger:hover,
            .atbdp-widget-categories .atbdp_parent_category li a:hover,
            .atbd_categorized_listings .listings>li .listing_value span,
            .atbd_categorized_listings .listings>li .directory_tag span .atbd_cat_popup .atbd_cat_popup_wrapper span a:hover,
            .category-widget ul li a:hover,
            .sidebar-post .post-single .post-title:hover,
            .widget-wrapper.widget_archive ul li a:hover,
            .widget-wrapper.widget_categories ul li a:hover,
            .widget-wrapper.widget_pages ul li a:hover,
            .widget-wrapper.widget_meta ul li a:hover,
            .widget.widget_rss ul li .rsswidget,
            .widget_tag_cloud .tagcloud a:hover,
            .widget_nav_menu ul li.menu-item a:hover,
            .atbd_sidebar .atbd_widget #loginform+p a,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbd_author_info_widget .atbd_widget_contact_info ul li span.fa,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbdp-widget-categories>ul.atbdp_parent_category>li>a span,
            .subscribe-widget form .submit-btn,
            .footer-three .footer-bottom .footer-bottom--content p span,
            .footer-three .footer-bottom .footer-bottom--content p i,
            .listing-details-wrapper .listing_action_btns .atbd_listing_action_area .atbd_action:hover>a,
            .listing-details-wrapper .listing_action_btns .atbd_listing_action_area .atbd_action:hover>span,
            .listing-details-wrapper .listing_action_btns .atbd_listing_action_area .atbd_action .action_button>a:hover,
            .listing-details-wrapper .listing_action_btns .atbd_listing_action_area .atbd_share .atbd_director_social_wrap a:hover,
            .listing-info .listing-info--meta li ul li span.la,
            .listing-info .listing-info--meta li ul li span.fa,
            .listing-info .listing-info--meta .atbd_listing_category a:hover,
            #directorist.atbd_wrapper .atbdp-accordion .accordion-single h3 a:before,
            #directorist.atbd_wrapper .atbdp-accordion .dacc_single h3 a:before,
            .dlist_accordion .accordion-single h3 a:before,
            .dlist_accordion .dacc_single h3 a:before,
            .pricing.pricing--1.atbd_pricing_special .atbd_popular_badge,
            .menu-area .top-menu-area .logo-top a,
            .menu-area.menu--light .mainmenu__menu .navbar-nav>li.has_dropdown .dropdown-menu .dropdown-menu--inner>ul li a:hover,
            .cart_module .cart__items .items .item_info>a:hover,
            .cart_module .cart__items .items .item_remove span,
            .cart_module .cart__items .cart_info p span,
            .author__access_area ul li .access-link:hover,
            .mainmenu__menu .navbar-nav>li:hover>a,
            .mainmenu__menu .navbar-nav>li.menu-item .sub-menu a:hover,
            .btn-play .btn-icon,
            .review_btn,
            .place-list-wrapper ul li a:hover,
            .social-list li a:hover,
            .social-list li span.mail i,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .page-numbers:hover,
            .pagination .nav-links .page-numbers:hover,
            .price-range.rs-primary .amount,
            .price-range.rs-primary .amount-four,
            .range-slider.rs-primary .amount,
            .range-slider.rs-primary .amount-four,
            .contents-wrapper .contents h1 span,
            .list-features li .list-count span,
            .directory_content_area #directorist.atbd_wrapper .directory_home_category_area ul.categories li a span,
            .section-title h1 span,
            .section-title h2 span,
            .section-title h3 span,
            .section-title h4 span,
            .section-title h5 span,
            .section-title h6 span,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .btn:focus,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .btn:active,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .view-mode .action-btn.active,
            .atbd_location_grid_wrap .atbd_location_grid:hover,
            .author_profile_area .contact-box__info__list li span:first-child,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_user_dashboard_nav .atbdp_tab_nav--content .atbd_tn_link.tabItemActive,
            .atbd_saved_items_wrapper .atbdb_content_module_contents .table tr td a:hover,
            .atbd_saved_items_wrapper .atbdb_content_module_contents .table tr td>span,
            .atbd_saved_items_wrapper .atbdb_content_module_contents .table tr td .remove-favorite,
            .post-details .post-content .post-header ul li a:hover,
            .post-details .post-content ol>li:before,
            .post-author .author-info h5 span,
            .post-pagination .prev-post .title:hover,
            .post-pagination .next-post .title:hover,
            .related-post .single-post h6 a:hover,
            .related-post .single-post p a:hover,
            .woocommerce ul.products li.product .price,
            .woocommerce .woocommerce-pagination ul.page-numbers li .page-numbers:hover,
            .woocommerce table.shop_table .product-name a:hover,
            .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
            .dlist_product-details .product-info .price ins,
            .dlist_product-details .product-info .price .woocommerce-Price-amount,
            .woocommerce div.product .dlist_product-info-tab .woocommerce-tabs ul.tabs li.active a,
            .iborder-primary,
            .outline-primary,
            .circle-primary,
            .outline-lg-primary,
            #directorist.atbd_wrapper .directory_regi_btn a span,
            .atbdp_login_form_shortcode p a,
            #directorist.atbd_wrapper .atbd_notice a,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_data_list ul p span,
            #directorist.atbd_wrapper .atbd_author_info_widget .btn,
            .directory_open_hours ul li.atbd_closed span,
            #directorist.atbd_wrapper .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn,
            .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn,
            .widget_recent_comments ul li>a,
            .widget_recent_entries ul li a:hover,
            .pricing.pricing--1 .pricing__features .price_action .price_action--btn,
            .menu-area .mainmenu__menu .navbar-nav>li.current-menu-item>a,
            .menu-area .mainmenu__menu .navbar-nav>li.current-menu-parent>a,
            .menu-area .mainmenu__menu .navbar-nav>li.current-menu-item .current-menu-item>a,
            .menu-area .mainmenu__menu .navbar-nav>li.current-menu-parent .current-menu-item>a,
            .menu-area .mainmenu__menu .navbar-nav>li.menu-item-has-children .current-menu-item>a,
            .menu-area .mainmenu__menu .navbar-nav>li .current-menu-item>a,
            #listing-grid .action-btn.ab-grid,
            #listing-list .action-btn.ab-list,
            #listing-map .action-btn.ab-map,
            .atbd_google_map .map_info_window .miw-contents-footer a,
            .ads-advanced .more-less,
            .ads-advanced .more-or-less,
            .atbd_content_active #directorist.atbd_wrapper .atbd_contact_info ul li .atbd_info_title span,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_single_saved_item .action>p .btn a,
            .blog-posts__single__contents h4 a:hover,
            .blog-posts__single__contents ul li a:hover,
            #directorist.atbd_wrapper .atbd_listing_action_btn .dropdown .btn.dropdown-toggle:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header .atbd_generic_header_title .more-filter:hover,
            .footer-light .footer-bottom .footer-bottom--content p span,
            .footer-light .footer-bottom .footer-bottom--content p a,
            .listing-info .listing-info--meta li ul li a:hover,
            .atbdp-widget-categories ul li a:hover,
            .ads-advanced .bdas-filter-actions .btn-outline-primary:hover,
            .atbd_seach_fields_wrapper .atbdp-search-form .atbd_submit_btn .more-filter,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .view-mode-2 .action-btn-2.active,
            .map-icon-label i,
            #directorist.atbd_wrapper .submit_btn .btn-default[type="reset"]:hover,
            #directorist.atbd_wrapper .btn-bordered:hover,
            .atbd_seach_fields_wrapper .atbdp_map_address_field #address_result ul li:before,
            .atbd_seach_fields_wrapper .atbdp_map_address_field #address_result ul li:hover a,
            .map-icon-label i,
            .atbd_map_shape>span,
            .widget.woocommerce .product-title:hover,
            .widget.woocommerce span.woocommerce-Price-amount,
            .atbd_listting_category .atbd_cat_popup .atbd_cat_popup_wrapper span i,
            .atbd_listting_category .atbd_cat_popup .atbd_cat_popup_wrapper span a:hover,
            .atbd_content_active #directorist.atbd_wrapper #map.leaflet-container .leaflet-popup-content-wrapper .leaflet-popup-content .media-body h3 a:hover,
            #directorist.atbd_wrapper .dbh-tab__nav__item.active,
            .atbdb_content_module_contents .table-inner .table tbody tr td .atbd_listing_icon ul li span i,
            .btn-outline-primary,
            .page-template-dashboard footer .footer-bottom--content p a,
            .chiller-theme .sidebar-wrapper ul li:hover a i,
            .chiller-theme .sidebar-wrapper ul li:hover a span,
            .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover,
            .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
            .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li a .active,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li.active a i,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li.active a span:not(.badge),
            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li .active,
            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li .active:before,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li a#v-pills-packages-tab.active,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li a#v-pills-history-tab.active,
            #signup_modal .form-excerpts ul li a:hover,
            #login_modal .form-excerpts ul li a:hover,
            #login_modal .form-excerpts .recover-pass-link:hover,
            .atbdp_login_form_shortcode p a:hover,
            .atbdp_login_form_shortcode p a:hover,
            #directorist.atbd_wrapper .directory_regi_btn a,
            #listing-listings_with_map #directorist.atbd_wrapper .dlm_action_btns .view-as a.active span,
            #directorist.atbd_wrapper .bdb-tab__nav__item.active.active,
            .bdb-tab__nav__item.active,
            .atpp_change_plan,
            .atbdb_content_module_contents .table-inner .table tbody tr td h6 a:hover,
            .text-primary,
            a.text-primary:hover,
            a.text-primary:focus,
            .tab-content .atbd_listting_category>span,
            .atbdp_mark_as_fav.atbdp_fav_isActive .atbd_fav_icon::after,
            .atbd_manage_conversation .atbd-message-sidebar .atbd-message-tabs .atbd_tab-content ul li a:hover,
            .lc-all-users .atbd-dropdown-toggle:hover,
            .atbdp-universal-pagination ul li.atbd-selected,
            .atbdp__user__needs ul li.atbd-selected,
            .atbdp-universal-pagination ul li.atbd-active:hover,
            .atbd-listing-tags li a:hover,
            .atbd_contact_info li a:hover,
            .action-btn.active, .mainmenu__menu .navbar-nav .menu-item-has-children.current-menu-parent > a:after, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action .directorist-filter-btn, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action .directorist-filter-btn span.la, .directorist-advanced-filter .directorist-btn-ml, .directorist-listing-single .directorist-listing-single__info .directorist-listing-single__info--top .directorist-badge.directorist-badge-close, .directorist-listing-single .directorist-listing-single__info .directorist-listing-single__info--list ul li i.directorist-icon, .directorist-listing-single .directorist-listing-single__info .directorist-listing-title:hover a, .directorist-author-contact .directorist-card__body .directorist-author-info-list__item span.la, .directorist-pagination .page-numbers:hover, .atbd-wallet-title, .atbd_wallet-table__top h3, .directorist-content-active .directorist-type-nav__list li.current .directorist-type-nav__link, #directorist.directorist-wrapper .directorist-listing-actions-btn .view-as a.active, .directorist-wallet-title, .directorist-wallet-table__top h3 {
                color: <?php echo esc_attr($primary); ?> !important;
            }


            /* Background: Primary */
            .directorist-btn.directorist-btn-primary, .color-1, .color-4, .dlm-action-wrapper .directorist-btn-dark, #directorist .directorist-pagination .page-numbers.current, .directorist-archive-contents .directorist-pagination .page-numbers.current, .directorist-author-listing-wrap .directorist-pagination .page-numbers.current, .listing-details-contents .listing-info--meta .directorist-listing-price, .directorist-user-dashboard__nav .directorist-tab__nav__action .directorist-btn--add-listing, #directorist.atbd_wrapper .dlm-action-wrapper .btn-primary:hover, .directorist-checkbox.directorist-checkbox-primary input[type=checkbox]:checked + .directorist-checkbox__label:after, #directorist.atbd_wrapper .bdmv-pagination .page-numbers.current, .directorist-listing-single .directorist-listing-single__info .directorist-pricing-meta, .directorist-search-contents .directorist-checkbox.directorist-checkbox-primary input[type="checkbox"]:checked + .directorist-checkbox__label:after, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action__submit .directorist-btn-search:hover, .bg-primary, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action .directorist-filter-btn:hover, .atbdp_login_form_shortcode #loginform p input[type="submit"],
            .ads-advanced .price-frequency .pf-btn input:checked+span,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_meta .atbd_listing_price,
            .atbd_content_active #directorist.atbd_wrapper .atbd_category_single figure .cat-box .icon,
            .atbdp-widget-categories .atbdp_parent_category li a:hover span,
            .atbdp-widget-tags ul li a:hover,
            #directorist.atbd_wrapper .sort-rating .custom-control-label span,
            #directorist.atbd_wrapper .submit_btn .btn-primary,
            #directorist.atbd_wrapper .custom-control .custom-control-input:checked~.check--select,
            .tags-widget ul li a:hover,
            .widget_search .search-form .search-submit,
            .atbd_sidebar .atbd_widget #loginform .login-submit .button-primary,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbdp-widget-categories>ul.atbdp_parent_category>li:hover>a span,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbdp.atbdp-widget-tags ul li a:hover,
            .listing-info .listing-info--meta .atbd_listing_price,
            .listing-info .listing-info--meta .atbd_listing_category>span,
            #directorist.atbd_wrapper .atbd_directry_gallery_wrapper .atbd_big_gallery .prev:hover,
            #directorist.atbd_wrapper .atbd_directry_gallery_wrapper .atbd_big_gallery .next:hover,
            .atbd_review_module .review_pagination .pagination .page-item .page-link:hover,
            .atbd_review_module .review_pagination .pagination .page-item.active .page-link,
            .widget form .search-submit,
            .cart_module .cart__items .items .item_remove:hover span,
            .cart_module .cart__items .cart_info a.button.checkout,
            .review_btn:hover,
            .atbd_content_active #directorist.atbd_wrapper #addNewFAQS:hover,
            .atbd_content_active #directorist.atbd_wrapper #addNewSocial:hover,
            .social.social--small ul li a:hover,
            .select2-container--default .select2-results__option--highlighted[aria-selected],
            #directorist .select2-container--default .select2-selection--multiple .select2-selection__choice,
            .atbd_content_active #directorist.atbd_wrapper #atpp-plan-change-modal .modal-content .modal-footer .btn,
            .breadcrumb_quick_search .atbdp-search-form .more-filter:hover,
            .breadcrumb_quick_search .atbdp-search-form .more-filter:focus,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .page-numbers.current,
            .pagination .nav-links .page-numbers.current,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .post-page-numbers.current .page-numbers,
            .pagination .nav-links .post-page-numbers.current .page-numbers,
            .price-range.rs-primary .ui-slider-horizontal .ui-slider-range,
            .range-slider.rs-primary .ui-slider-horizontal .ui-slider-range,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_user_dashboard_nav .atbdp_tab_nav--content .atbd_tn_link.tabItemActive:before,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_user_dashboard_nav .nav_button .btn.btn-primary,
            .atbd_saved_items_wrapper .atbdb_content_module_contents .table tr td .remove-favorite:hover,
            .atbd_add_listing_wrapper input[type="checkbox"]:checked+label:before,
            .keep_signed input[type="checkbox"]:checked+label:before,
            .atbd_add_listing_wrapper label input[type="checkbox"]:checked+span:before,
            .keep_signed label input[type="checkbox"]:checked+span:before,
            .blog-single.sticky .card .card-body h3:before,
            .post-details .post-content .post-body p label+input[type="submit"],
            .post-bottom .tags ul li a:hover,
            .post-bottom .social-share ul li a:hover,
            .comments-area .comment-lists ul .depth-1 .media .media-body .media_top .reply:hover,
            .comments-area .comment-lists ul .depth-2 .media .media-body .media_top .reply:hover,
            .woocommerce ul.products li.product a.button:hover,
            .woocommerce ul.products li.product a.added_to_cart,
            .woocommerce ul.products li.product a.added_to_cart:hover,
            .woocommerce .woocommerce-pagination ul.page-numbers li .page-numbers.current,
            .woocommerce .woocommerce-pagination ul.page-numbers li .page-numbers.current:hover,
            .woocommerce table.shop_table td .button.view,
            .woocommerce table.shop_table td.actions .coupon button.button,
            .woocommerce .cart_totals .wc-proceed-to-checkout a.checkout-button,
            .woocommerce form.checkout .woocommerce-checkout-payment#payment .place-order button.button,
            .woocommerce .woocommerce-MyAccount-content .woocommerce-EditAccountForm .woocommerce-Button,
            .woocommerce .woocommerce-MyAccount-content .woocommerce-address-fields button[name="save_address"],
            .woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
            .dlist_product-details .product-info .cart .single_add_to_cart_button,
            .active-color-primary label input:checked+span,
            .checkbox-primary .custom-control-label::before,
            .checkbox-primary .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-primary .custom-control-input:checked~.custom-control-label::before,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbd_author_info_widget .atbd_social_wrap p a:hover,
            #directorist.atbd_wrapper .dropdown-item.active,
            .atbd_content_active #directorist.atbd_wrapper.dashboard_area .user_pro_img_area .user_img .choose_btn #upload_pro_pic,
            .custom-control .custom-control-input:checked~.check--select,
            .widget.atbd_widget .default-ad-search .submit_btn .btn,
            #directorist.atbd_wrapper .atbd_author_info_widget .btn:hover,
            #directorist.atbd_wrapper .atbdp-widget-listing-contact #atbdp-contact-form .btn-primary,
            .atbdp-widget-listing-contact #atbdp-contact-form .btn-primary,
            #directorist.atbd_wrapper .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn:hover,
            .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn:hover,
            .atbd_sidebar .widget.atbd_widget .atbd_widget_title span.atbd_badge_close,
            footer .widget .social-list li a:hover i,
            .pricing.pricing--1 .pricing__features .price_action .price_action--btn:hover,
            .pricing.pricing--1.atbd_pricing_special .pricing__features label .price_action--btn,
            .mobile-login a,
            .mobile-add-listing a,
            .atbd_content_active .widget.atbd_widget+#dcl-claim-modal .modal-footer .btn,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_single_saved_item .action>p .btn:hover,
            .woocommerce form.lost_reset_password button.woocommerce-Button,
            .woocommerce div.product .dlist_product-info-tab .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #review_form_wrapper .comment_form_wrapper .form-submit input.btn,
            #directorist.atbd_wrapper .btn-primary,
            .btn-primary,
            #directorist.atbd_wrapper .atbd_submit_btn .btn_search,
            #directorist.atbd_wrapper .atbd_submit_btn .btn_search:hover,
            .atbd_seach_fields_wrapper .atbdp-search-form .atbd_submit_btn .more-filter:hover,
            #directorist.atbd_wrapper #dropdownMenuLink2+.dropdown-menu-right .dropdown-item:hover,
            #directorist.atbd_wrapper #dropdownMenuLink+.dropdown-menu .dropdown-item:hover,
            .listing-carousel .owl-dots .owl-dot.active,
            .dlist-btn,
            .marker-cluster-shape,
            .atbd_map_shape,
            .atbdpr-range .ui-slider-horizontal .ui-slider-range,
            .breadcrumb-wrapper .breadcrumb_quick_search .atbd_seach_fields_wrapper .atbdp-search-form .atbd_submit_btn .btn_search,
            .ads-advanced .bdas-filter-actions .btn-outline-primary:hover,
            .leaflet-pane .marker-cluster-small>div,
            #directorist.atbd_wrapper .atbdp_mark_as_fav.atbdp_fav_isActive,
            .atbd_content_active #directorist.atbd_wrapper .atbd_single_listing.atbd_listing_list .atbdp_mark_as_fav.atbdp_fav_isActive,
            #atpp-plan-change-modal .atm-contents-inner .atbd_modal-footer .atbd_modal_btn,
            #dwpp-plan-renew-modal .atm-contents-inner .atbd_modal-footer .atbd_modal_btn,
            .widget.woocommerce .woocommerce-product-search button,
            #directorist.atbd_wrapper .ezmu__btn,
            .atbdp_float_active,
            #directorist.atbd_wrapper #atbdp-checkout-form #atbdp_checkout_submit_btn,
            #directorist.atbd_wrapper .atbd_payment_recipt+.atbd-text-center .btn-primary,
            .atbdp_login_form_shortcode #loginform p input[type="submit"],
            .atbd_manage_fees_wrapper table .btn:hover,
            .profile-img .choose_btn #upload_pro_pic,
            #login_modal .modal-header .close:hover,
            #signup_modal .modal-header .close:hover,
            #moda_claim_listing .modal-header .close:hover,
            .atbdp_login_form_shortcode #login p input[type="submit"],
            #atbdp-range-slider .atbd-child,
            .atbd_listing_type_list a.choose-type-btn.ctb--one,
            .atbdb-wrapper .bdb-select-hours--list span.button,
            #v-bookmark-tab .table td .atbdp_add_to_fav_listings .atbdp_mark_as_fav:hover,
            #adminChatForm button[type="submit"],
            #publicChatForm button[type="submit"],
            .atbd_manage_conversation .dlc-contents>p,
            .widget #form-booking .book-now,
            .widget #form-booking .login-booking,
            .atbdp-start-chat .atbdp-start-chat-btn,
            .single-at_biz_dir .dlc-contents>p,
            #ChatForm button[type="submit"],
            .daterangepicker td.active,
            .daterangepicker td.active:hover,
            .daterangepicker td.available:hover,
            .daterangepicker th.available:hover,
            .bdb-confirm-wrapper .db-confirm-contents .db-confirm-form-wrapper .booking-confirmation-btn, .bdb_widget #form-booking .book-now, .bdb_widget #form-booking .login-booking, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action__submit .directorist-btn-search, .directorist-search-field .directorist-price-ranges__price-frequency--btn input[type=radio]:checked + .directorist-pf-range, .btn-checkbox label input:checked + span, .directorist-advanced-filter__action .directorist-btn.directorist-btn-dark, .directorist-advanced-filter__action .directorist-btn#atbdp_reset:hover, .directorist-mark-as-favorite__btn.directorist-added-to-favorite, .atbd_category_single figure figcaption .cat-box .icon, .directorist-listing-single.directorist-listing-list .directorist-mark-as-favorite .directorist-mark-as-favorite__btn.directorist-added-to-favorite, .directorist-checkbox.directorist-checkbox-primary input[type=checkbox]:checked + .directorist-checkbox__label:after, .directorist-pagination .page-numbers.current, .directorist-add-listing-types .directorist-row .directorist-col-lg-6:nth-child(2n+1) .directorist-add-listing-types__single__link, .directorist-compare-btn.directorist-compare-added, .directorist-compare-listing-wrapper .directorist-compare-listing-collapse-btn, .directorist-compare-listing-wrapper .directorist-compare-listing-all__btn, .dlm-action-wrapper .directorist-btn-dark:hover, .category-slider .owl-dots .owl-dot.active, .directorist-btn.directorist-btn-primary:hover {
                background: <?php echo esc_attr($primary); ?> !important;
            }

            /* Border-color: Primary */
            .directorist-btn.directorist-btn-primary:hover, .directorist-btn.directorist-btn-primary, .directorist-map-search .directorist-advanced-filter__action .directorist-btn + .directorist-btn, .dlm-action-wrapper .directorist-btn-dark:hover, #directorist.directorist-wrapper .directorist-map-wrapper .dlm_filter-btn:hover, .dlm-action-wrapper .directorist-btn-dark, .directorist-type-nav.directorist-type-nav--listings-map .directorist-type-nav__list li.current .directorist-type-nav__link.directorist-type-nav__link, .directorist-content-active .directorist-type-nav__list li.current .directorist-type-nav__link, #directorist.atbd_wrapper .dlm-action-wrapper .btn-primary:hover, .directorist-pagination .page-numbers:hover, .directorist-pagination .page-numbers.current, .directorist-checkbox.directorist-checkbox-primary input[type=checkbox]:checked + .directorist-checkbox__label:after, .btn-checkbox label input:checked + span, .directorist-checkbox.directorist-checkbox-primary input[type=checkbox]:checked + .directorist-checkbox__label:after, .directorist-search-contents .directorist-checkbox.directorist-checkbox-primary input[type="checkbox"]:checked + .directorist-checkbox__label:after, .active-color-primary label input:checked+span,
            .atbd_content_active #directorist.atbd_wrapper.atbd_add_listing_wrapper .atbd_content_module .atbdb_content_module_contents .form-control:focus,
            .atbd_content_active #directorist.atbd_wrapper.atbd_add_listing_wrapper .atbd_content_module .atbdb_content_module_contents textarea:focus,
            .ads-advanced .price-frequency .pf-btn input:checked+span,
            .widget.atbd_widget .default-ad-search .submit_btn .btn,
            #directorist.atbd_wrapper .atbd_author_info_widget .btn:hover,
            #directorist.atbd_wrapper .atbdp-widget-listing-contact #atbdp-contact-form .btn-primary,
            .atbdp-widget-listing-contact #atbdp-contact-form .btn-primary,
            #directorist.atbd_wrapper .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn:hover,
            .atbdp-widget-listing-contact #atbdp-contact-form-widget .btn:hover,
            #directorist.atbd_wrapper .custom-control .custom-control-input:checked~.radio--select,
            #directorist.atbd_wrapper .custom-control .custom-control-input:checked~.check--select,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbdp.atbdp-widget-tags ul li a:hover,
            .tags-widget ul li a:hover,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .atbdp-widget-categories>ul.atbdp_parent_category>li:hover>a span,
            .review_btn:hover,
            #listing-grid .action-btn.ab-grid,
            #listing-list .action-btn.ab-list,
            #listing-map .action-btn.ab-map,
            .atbd_content_active #directorist.atbd_wrapper #atpp-plan-change-modal .modal-content .modal-footer .btn,
            .atbd_content_active .widget.atbd_widget+#dcl-claim-modal .modal-footer .btn:hover,
            .breadcrumb_quick_search .atbdp-search-form .more-filter:hover,
            .breadcrumb_quick_search .atbdp-search-form .more-filter:focus,
            .price-range.rs-primary .ui-slider-horizontal .ui-slider-handle,
            .range-slider.rs-primary .ui-slider-horizontal .ui-slider-handle,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .btn:focus,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .btn:active,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header_title .view-mode .action-btn.active,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_user_dashboard_nav .nav_button .btn.btn-primary,
            .atbd_add_listing_wrapper input[type="checkbox"]:checked+label:before,
            .keep_signed input[type="checkbox"]:checked+label:before,
            .atbd_add_listing_wrapper label input[type="checkbox"]:checked+span:before,
            .keep_signed label input[type="checkbox"]:checked+span:before,
            .atbd_add_listing_wrapper label input[type="radio"]:checked+span.cf-select:after,
            .atbd_add_listing_wrapper label input[type="radio"]:checked+.atbdp_make_str_green+.cf-select:after,
            .keep_signed label input[type="radio"]:checked+span.cf-select:after,
            .keep_signed label input[type="radio"]:checked+.atbdp_make_str_green+.cf-select:after,
            .post-bottom .tags ul li a:hover,
            .comments-area .comment-lists ul .depth-1 .media .media-body .media_top .reply:hover,
            .comments-area .comment-lists ul .depth-2 .media .media-body .media_top .reply:hover,
            .woocommerce .woocommerce-pagination ul.page-numbers li .page-numbers.current,
            .woocommerce .woocommerce-pagination ul.page-numbers li .page-numbers:hover,
            .woocommerce .woocommerce-MyAccount-navigation ul li.is-active,
            #directorist.atbd_wrapper .btn-primary,
            .btn-primary,
            .atbd_content_active #directorist.atbd_wrapper .atbd_generic_header .atbd_generic_header_title .more-filter:hover,
            .atbd_seach_fields_wrapper .atbdp-search-form .atbd_submit_btn .more-filter:hover,
            .ads-advanced .bdas-filter-actions .btn-outline-primary:hover,
            .atbdpr-range.rs-primary .ui-slider-horizontal .ui-slider-handle,
            #directorist.atbd_wrapper .submit_btn .btn-default[type="reset"]:hover,
            #directorist.atbd_wrapper .btn-bordered:hover,
            #directorist.atbd_wrapper .bdmv_wrapper .dlm_filter-btn:hover,
            #atpp-plan-change-modal .atm-contents-inner .dcl_pricing_plan input:checked+label:before,
            #dwpp-plan-renew-modal .atm-contents-inner .dcl_pricing_plan input:checked+label:before,
            #directorist.atbd_wrapper .dbh-tab__nav__item.active,
            #directorist.atbd_wrapper .atbd_payment_recipt+.atbd-text-center .btn-primary,
            .default-ad-search .submit_btn .btn-default,
            .atbdp_login_form_shortcode #loginform p input[type="submit"],
            .btn-outline-primary,
            .atbdp_login_form_shortcode #login p input[type="submit"],
            #atbdp-range-slider .atbd-slide1,
            #directorist.atbd_wrapper .bdb-tab__nav__item.active.active,
            .bdb-tab__nav__item.active,
            .atbdp-universal-pagination ul li.atbd-selected,
            .atbdp__user__needs ul li.atbd-selected,
            .atbdp-universal-pagination ul li.atbd-active:hover, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action .directorist-filter-btn, .directorist-search-contents .directorist-search-form-wrap .directorist-search-form-box .directorist-search-form-top .directorist-search-form-action__submit .directorist-btn-search {
                border-color: <?php echo esc_attr($primary); ?> !important;
            }

            .border-primary,
            .atbdp-widget-tags ul li a:hover,
            .listing-details-wrapper .listing_action_btns .atbd_listing_action_area .atbd_action:hover,
            .atbd_review_module .review_pagination .pagination .page-item .page-link:hover,
            .atbd_review_module .review_pagination .pagination .page-item.active .page-link,
            .select2-container--default .select2-selection--multiple .select2-selection__choice,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .page-numbers:hover,
            .pagination .nav-links .page-numbers:hover,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .page-numbers.current,
            .pagination .nav-links .page-numbers.current,
            .atbd_content_active #directorist.atbd_wrapper .pagination .nav-links .post-page-numbers.current .page-numbers,
            .pagination .nav-links .post-page-numbers.current .page-numbers,
            .outline-primary,
            .checkbox-primary .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-primary .custom-control-input:checked~.custom-control-label::before,
            .custom-control .custom-control-input:checked~.check--select,
            #directorist.atbd_wrapper .submit_btn .btn-primary,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_single_saved_item .action>p .btn,
            .post-details .post-content ul>li:before,
            .woocommerce ul.products li.product a.button:hover,
            .woocommerce ul.products li.product a.added_to_cart,
            .woocommerce ul.products li.product a.added_to_cart:hover,
            .atbd_seach_fields_wrapper .atbdp-search-form .atbd_submit_btn .more-filter,
            .change-pass .form-group input:focus {
                border: 1px solid <?php echo esc_attr($primary); ?> !important;
            }

            .atbd_map_shape:before {
                border-top: 15px solid <?php echo esc_attr($primary); ?> !important;
            }

            .atbdp_listings_map_page_loading:after{
                border-top-color: <?php echo esc_attr($primary); ?> !important;
            }

            .outline-lg-primary {
                border: 2px solid <?php echo esc_attr($primary); ?> !important;
            }

            .atbd_content_active #directorist.atbd_wrapper #atpp-plan-change-modal .modal-content .dcl_pricing_plan input:checked+label:before,
            .dbh-checkbox input[type='radio']:checked:after,
            .bdb-booking-type-select div input[type='radio']:checked:after, input[type="radio"].atbdp_radio_input:checked + label:before, .bdb-timing-type input[type="radio"]:checked + label:before {
                border: 5px solid <?php echo esc_attr($primary); ?> !important;
            }

            .media-body blockquote {
                border-left: 2px solid <?php echo esc_attr($primary); ?> !important;
            }

            .woocommerce div.product .dlist_product-info-tab .woocommerce-tabs ul.tabs li.active,
            #directorist.atbd_wrapper.atbd_add_listing_wrapper .select2-selection .select2-selection__rendered .select2-selection__choice {
                border-bottom: 1px solid <?php echo esc_attr($primary); ?> !important;
            }

            <?php }

            if ('#23c8b9' != $secondary) { ?>

            /* Color: Secondary */
            .color-secondary, .directorist-content-active .directorist-listing-category-top ul li a:hover, .directorist-content-active .directorist-listing-category-top ul li a:hover span.la, .directorist-content-active .directorist-listing-category-top ul li a:hover span.las, .directorist-content-active .directorist-listing-category-top ul li a:hover p,
            .post--card .card-body .post-meta li a,
            .post--card2 .card-body h3 a:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_category_single:hover figure .cat-box .icon,
            .atbd_content_active #directorist.atbd_wrapper .atbd_sidebar .atbd_widget .atbd_widget_title a,
            .atbd_content_active #directorist.atbd_wrapper .atbd_sidebar .atbd_widget .atbd_widget_title .atbd_widget_title a,
            .atbd_categorized_listings .listings>li .cate_title h4 a:hover,
            .atbd_categorized_listings .listings>li .directory_tag span a:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_contact_information_module .atbd_contact_info ul .atbd_info_title span,
            .atbd_review_module #client_review_list .atbd_single_review .review_content .reply,
            .atbd_review_form .atbd_give_review_area .atbd_notice a,
            #atbdp_review_form .atbd_upload_btn_wrap .atbd_upload_btn span,
            .default-ad-search .filter-checklist .show-link:hover,
            .price-range .amount,
            .price-range .amount-four,
            .atbd_content_active #directorist.atbd_wrapper .directory_home_category_area ul.categories li a:hover,
            .atbd_content_active #directorist.atbd_wrapper .directory_home_category_area ul.categories li a:hover p,
            .iborder-secondary,
            .outline-secondary,
            .circle-secondary,
            .outline-lg-secondary {
                color: <?php echo esc_attr($secondary); ?> !important;
            }

            /* Background: Secondary */
            .directorist-user-dashboard__nav .directorist-tab__nav__action .directorist-btn--logout, .directorist-add-listing-types .directorist-row .directorist-col-lg-6:nth-child(2n) .directorist-add-listing-types__single__link, .bg-secondary, .directorist-listing-single .directorist-listing-single__meta .directorist-listing-single__meta--left .directorist-listing-category a span.la, .directorist-listing-single .directorist-listing-single__meta .directorist-listing-single__meta--left .directorist-listing-category a span.las,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_bottom_content .atbd_content_left .atbd_listting_category a span,
            .atbd_content_active #directorist.atbd_wrapper .atbd_location_grid_wrap .atbd_location_grid figure figcaption:before,
            .listing-details-wrapper .listing_action_btns .atbd_go_back:hover,
            .listing-details-wrapper .listing_action_btns .edit-listing-btn:hover,
            #directorist.atbd_wrapper .atbdp-accordion .accordion-single h3 a.active:before,
            #directorist.atbd_wrapper .atbdp-accordion .dacc_single h3 a.active:before,
            .dlist_accordion .accordion-single h3 a.active:before,
            .dlist_accordion .dacc_single h3 a.active:before,
            .menu-area .author__notification_area ul li .notification_count.purch,
            .cart_module .cart__items .cart_info a.button,
            .cart_module .cart_count,
            .author__access_area ul li .author-info ul li a:hover,
            .offcanvas-menu .offcanvas-menu__contents ul li a.active,
            .offcanvas-menu .offcanvas-menu__contents ul li a:hover,
            .price-range .ui-slider-horizontal .ui-slider-range,
            .range-slider .ui-slider-horizontal .ui-slider-range,
            #directorist.atbd_wrapper .atbd_submit_btn .btn_search:hover:before,
            #atbdp_socialInFo .dashicons.adl-move-icon:before,
            .atbdp_faqs_wrapper .dashicons.adl-move-icon:before,
            .woocommerce .woocommerce-pagination .button,
            .woocommerce table.shop_table td.actions button[name="update_cart"],
            .woocommerce .woocommerce-shipping-calculator .shipping-calculator-form p button[name="calc_shipping"],
            .woocommerce form.checkout_coupon .form-row .button,
            .woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
            .woocommerce .return-to-shop a.wc-backward,
            .dlist_product-details .product-info form.variations_form .variations .reset_variations,
            .active-color-secondary label input:checked+span,
            .checkbox-secondary .custom-control-label::before,
            .checkbox-secondary .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-secondary .custom-control-input:checked~.custom-control-label::before,
            .atbd_content_active #directorist.atbd_wrapper .atbd_user_dashboard_nav .nav_button a.btn-secondary:hover,
            .atbd_content_active #directorist.atbd_wrapper .atbd_category_single figure figcaption:before,
            #directorist.atbd_wrapper .btn-secondary,
            .atbd_listing_type_list a.choose-type-btn.ctb--two {
                background: <?php echo esc_attr($secondary); ?> !important;
            }

            .outline-secondary, .directorist-user-dashboard__nav .directorist-tab__nav__action .directorist-btn--logout, .border-secondary, .checkbox-secondary .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-secondary .custom-control-input:checked~.custom-control-label::before {
                border: 1px solid <?php echo esc_attr($secondary); ?> !important;
            }

            .active-color-secondary label input:checked+span,
            .atbd_content_active #directorist.atbd_wrapper .atbd_user_dashboard_nav .nav_button a.btn-secondary:hover,
            .listing-details-wrapper .listing_action_btns .atbd_go_back:hover,
            .listing-details-wrapper .listing_action_btns .edit-listing-btn:hover,
            #directorist.atbd_wrapper .btn-secondary {
                border-color: <?php echo esc_attr($secondary); ?> !important;
            }

            .outline-lg-secondary {
                border: 2px solid <?php echo esc_attr($secondary); ?> !important;
            }

            .price-range .ui-slider-horizontal .ui-slider-handle {
                border: 0.25rem solid <?php echo esc_attr($secondary); ?> !important;
            }

            .range-slider .ui-slider-horizontal .ui-slider-handle {
                border: 0.3125rem solid <?php echo esc_attr($secondary); ?> !important;
            }

            <?php }

            if ('#32cc6f' != $success) { ?>

            /* Color: Success */
            .color-success,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_meta .atbd_badge_open,
            #directorist.atbd_wrapper .atbd_author_info_widget .atbd_avatar_wrapper .atbd_name_time .review_time,
            .pricing.pricing--1 .pricing__features ul li>span.available:first-child,
            .pricing.pricing--1 .pricing__features ul li .atbd_color-success,
            #directorist.atbd_wrapper.dashboard_area .atbd_dashboard_wrapper .atbd_listing_bottom_content .listing-meta #atpp_change_plan,
            #directorist.dashboard_area .tab-content .atbd_single_listing .atbd_listing_bottom_content .listing-meta p span .atpp_change_plan,
            .woocommerce .woocommerce-message:before,
            .woocommerce ul.products li.product a.button.added,
            .woocommerce .woocommerce-order .woocommerce-thankyou-order-received,
            .iborder-success,
            .outline-success,
            .circle-success,
            .outline-lg-success,
            .atbd_content_active #directorist.atbd_wrapper.dashboard_area #pro_notice p.alert-success,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .directorist .dcl_promo-item_group .btn,
            .directory_open_hours ul li.atbd_today span,
            #directorist.atbd_wrapper span a.atpp_change_plan, .directorist-listing-single .directorist-listing-single__info .directorist-listing-single__info--top .directorist-badge.directorist-badge-open {
                color: <?php echo esc_attr($success); ?> !important;
            }

            /* Background: Success */
            .directorist-author-profile-area .directorist-author-profile-wrap .directorist-card__body .directorist-author-meta-list__item .directorist-listing-rating-meta, .bg-success, .directorist-listing-single .directorist-listing-single__info .directorist-rating-meta,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_meta .atbd_listing_rating,
            .badge-verified:before,
            #directorist.atbd_wrapper .atbd_author_info_widget .atbd_avatar_wrapper .atbd_name_time h4 .verified,
            .listing-info .dlist_single_listing_title .dcl_claimed .dcl_claimed--badge span,
            .listing-info .listing-info--meta .atbd_listing_rating,
            .pricing.pricing--1 .pricing__title h4 .atbd_plan-active:before,
            #directorist.atbd_wrapper .btn-success,
            .author_banner_area .author-contents__excerpt__ratings__average,
            .woocommerce ul.products li.product .onsale,
            .dlist_product-details .gallery-image-view .onsale,
            .active-color-success label input:checked+span,
            .checkbox-success .custom-control-label::before,
            .checkbox-success .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-success .custom-control-input:checked~.custom-control-label::before,
            .atbd_sidebar .widget.atbd_widget .atbd_widget_title span.atbd_badge_open,
            .btn-outline-success:hover,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .directorist .dcl_promo-item_group .btn:hover, .color-3 {
                background: <?php echo esc_attr($success); ?> !important;
            }

            .outline-success,
            .border-success,
            .listing-info .listing-info--meta .atbd_listing_rating,
            .checkbox-success .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-success .custom-control-input:checked~.custom-control-label::before {
                border: 1px solid <?php echo esc_attr($success); ?> !important;
            }

            .active-color-success label input:checked+span,
            #directorist.atbd_wrapper .btn-success,
            .atbd_content_active #directorist.atbd_wrapper .widget.atbd_widget .directorist .dcl_promo-item_group .btn:hover {
                border-color: <?php echo esc_attr($success); ?> !important;
            }

            .woocommerce .woocommerce-message {
                border-top-color: <?php echo esc_attr($success); ?> !important;
            }

            .outline-lg-success {
                border: 2px solid <?php echo esc_attr($success); ?> !important;
            }

            <?php }

            if ('#2c99ff' != $info) { ?>

            /* Color: Info */
            .color-info,
            .post-pagination .prev-post p a,
            .post-pagination .next-post p a,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_edit_btn,
            .woocommerce .woocommerce-info:before,
            .iborder-info,
            .outline-info,
            .circle-info,
            .outline-lg-info,
            #directorist.atbd_wrapper.directorist-checkout-form .alert-info {
                color: <?php echo esc_attr($info); ?> !important;
            }

            /* Background: Info */
            .bg-info,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_thumbnail_area .atbd_upper_badge .atbd_badge.atbd_badge_new,
            .listing-info .listing-info--badges .atbd_badge.atbd_badge_new,
            .atbd_review_form .atbd_give_review_area .atbd_notice span,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_edit_btn:hover,
            .woocommerce .woocommerce-info .button,
            .woocommerce .woocommerce-order .woocommerce-thankyou-order-details+p:before,
            .active-color-info label input:checked+span,
            .checkbox-info .custom-control-label::before,
            .checkbox-info .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-info .custom-control-input:checked~.custom-control-label::before {
                background: <?php echo esc_attr($info); ?> !important;
            }

            .outline-info,
            .border-info,
            .checkbox-info .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-info .custom-control-input:checked~.custom-control-label::before,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_edit_btn {
                border: 1px solid <?php echo esc_attr($info); ?> !important;
            }

            .active-color-info label input:checked+span {
                border-color: <?php echo esc_attr($info); ?> !important;
            }

            .outline-lg-info {
                border: 2px solid <?php echo esc_attr($info); ?> !important;
            }

            .woocommerce .woocommerce-info {
                border-top-color: <?php echo esc_attr($info); ?> !important;
            }

            <?php }

            if ('#fa8b0c' != $warning) { ?>

            /* Color: Warning */
            .color-warning,
            .atbd_categorized_listings .listings>li .atbd_rated_stars ul li span.rate_active:before,
            .atbd_review_module #client_review_list .atbd_single_review .atbd_review_top .atbd_rated_stars ul li,
            .comments-area .comment-lists ul .depth-1 .media .media-body .comment-status-notice,
            .comments-area .comment-lists ul .depth-2 .media .media-body .comment-status-notice,
            .iborder-warning,
            .outline-warning,
            .circle-warning {
                color: <?php echo esc_attr($warning); ?> !important;
            }

            /* Background: Warning */
            .bg-warning, .directorist-listing-single .directorist-badge.directorist-badge-featured,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_thumbnail_area .atbd_upper_badge .atbd_badge.atbd_badge_featured,
            .listing-info .listing-info--badges .atbd_badge.atbd_badge_featured,
            .active-color-warning label input:checked+span,
            .checkbox-warning .custom-control-label::before,
            .checkbox-warning .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-warning .custom-control-input:checked~.custom-control-label::before,
            .atbd_content_active #directorist.atbd_wrapper .atbd_badge.atbd_badge_featured, .color-6 {
                background: <?php echo esc_attr($warning); ?> !important;
            }

            .outline-warning,
            .border-warning,
            .checkbox-warning .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-warning .custom-control-input:checked~.custom-control-label::before {
                border: 1px solid <?php echo esc_attr($warning); ?> !important;
            }

            .active-color-warning label input:checked+span {
                border-color: <?php echo esc_attr($warning); ?> !important;
            }

            .outline-lg-warning {
                border: 2px solid <?php echo esc_attr($warning); ?> !important;
                color: <?php echo esc_attr($warning); ?> !important;
            }

            <?php }

            if ('#f51957' != $danger) { ?>

            /* Color: Danger */
            .color-danger,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_meta .atbd_badge_close,
            .pricing.pricing--1 .pricing__features ul li>span.unavailable:first-child,
            #login_modal .status span,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_remove_btn,
            .woocommerce .woocommerce-error:before,
            .iborder-danger,
            .outline-danger,
            .circle-danger,
            .outline-lg-danger,
            .atbd_content_active #directorist.atbd_wrapper.dashboard_area #pro_notice p.alert-danger,
            #directorist.atbd_wrapper .btn-outline-danger,
            #directorist.atbd_wrapper #delete-custom-img,
            .btn-outline-danger,
            .text-danger,
            a.text-danger:hover,
            a.text-danger:focus {
                color: <?php echo esc_attr($danger); ?> !important;
            }

            /* Background: Danger */
            .bg-danger,
            .atbd_content_active #directorist.atbd_wrapper .atbd_listing_thumbnail_area .atbd_upper_badge .atbd_badge.atbd_badge_popular,
            .post--card2 figure figcaption a,
            .listing-info .listing-info--badges .atbd_badge.atbd_badge_popular,
            .play-btn,
            #atbdp_socialInFo .dashicons.removeSocialField:before,
            .atbdp_faqs_wrapper .dashicons.removeFAQSField:before,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_remove_btn:hover,
            .active-color-danger label input:checked+span,
            .checkbox-danger .custom-control-label::before,
            .checkbox-danger .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-danger .custom-control-input:checked~.custom-control-label::before,
            .atbd_content_active #directorist.atbd_wrapper .atbd_content_module .atbd_badge.atbd_badge_close,
            .dlist_product-details .product-info .cart .single_add_to_cart_button:hover,
            #directorist.atbd_wrapper .btn-danger,
            .atbd_content_active #directorist.atbd_wrapper .atbd_badge.atbd_badge_popular,
            #directorist.atbd_wrapper .btn-outline-danger:hover,
            #directorist.atbd_wrapper #delete-custom-img:hover,
            .profile-img #remove_pro_pic, .directorist-listing-single .directorist-badge.directorist-badge-popular, .color-5 {
                background: <?php echo esc_attr($danger); ?> !important;
            }

            .outline-danger,
            .border-danger,
            .checkbox-danger .custom-control-input:checked~.custom-control-label::before,
            .checkbox-outline-danger .custom-control-input:checked~.custom-control-label::before,
            #directorist.dashboard_area .tab-content .db_btn_area .directory_remove_btn {
                border: 1px solid <?php echo esc_attr($danger); ?> !important;
            }

            .active-color-danger label input:checked+span,
            #directorist.atbd_wrapper .btn-danger,
            #directorist.atbd_wrapper .btn-outline-danger,
            #directorist.atbd_wrapper #delete-custom-img:hover,
            .btn-outline-danger {
                border-color: <?php echo esc_attr($danger); ?> !important;
            }

            .outline-lg-danger {
                border: 2px solid <?php echo esc_attr($danger); ?> !important;
            }

            .woocommerce .woocommerce-error {
                border-top-color: <?php echo esc_attr($danger); ?> !important;
            }

        <?php } ?>

        .btn-gradient.btn-gradient-one, blockquote.wp-block-quote, blockquote {
            background: linear-gradient(to right, <?php echo esc_attr($primary) ?>, <?php echo esc_attr($secondary) ?>);
        }
        .atbd_category_single figure figcaption:before, .atbd_location_grid figure figcaption:before, .directorist-content-active .atbd_location_grid figure figcaption:before, .directorist-content-active .atbd_category_single figure figcaption:before{
            background: <?php echo esc_attr($rgb_color) ?> !important;
        }
    </style>

    <?php
}

add_action('wp_head', 'dlist_custom_style');
