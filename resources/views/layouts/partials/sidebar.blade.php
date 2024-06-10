<!--  BEGIN MODERN  -->
<div class="modernSidebar-nav header navbar">
    <div class="">
        <nav id="modernSidebar">
            <ul class="menu-categories pl-0 m-0" id="topAccordion">
                <li class="menu">
                    <a href="{{ route('dashboard') }}">
                        <div class="">
                            <i class="flaticon-computer-6"></i>
                            <span>DASHBOARD</span>
                        </div>
                    </a>                   
                </li>

                <li class="menu">
                    <a href="#uiAndComponents" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle collapsed">
                        <div class="">
                            <i class="flaticon-3d-cube"></i>
                            <span>MASTER</span>
                        </div>
                    </a>
                    <div class="submenu list-unstyled collapse eq-animated eq-fadeInUp" id="uiAndComponents"
                        data-parent="#topAccordion">
                        <div class="submenu-scroll">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#ui-features" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">Kebutuhan</span> 
                                    </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="ui-features">
                                        <li>
                                            <a href="{{ route('category.index') }}"> Kategori </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product.index') }}"> Produk </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('member.index') }}"> Member </a>
                                        </li>
                                        <li>
                                            <a href="ui_typography.html"> Supllier </a>
                                        </li>                                        
                                    </ul>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                </li>

                <li class="menu">
                    <a href="#tables-forms" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle collapsed">
                        <div class="">
                            <i class="flaticon-table"></i>
                            <span>TRANSAKSI</span>
                        </div>
                    </a>
                    <div class="submenu list-unstyled collapse eq-animated eq-fadeInUp" id="tables-forms"
                        data-parent="#topAccordion">
                        <div class="submenu-scroll">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#tables" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">Jual &amp; Beli</span> </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="tables">
                                        <li>
                                            <a href="table_basic.html"> Pengeluaran </a>
                                        </li>
                                        <li>
                                            <a href="table_tablesaw.html"> Pembelian </a>
                                        </li>
                                        <li>
                                            <a href="table_sticky_table_header.html"> Penjualan </a>
                                        </li>
                                        <li>
                                            <a href="table_sticky_table_header.html"> Transaksi Lama </a>
                                        </li>
                                        <li>
                                            <a href="table_sticky_table_header.html"> Transaksi Baru </a>
                                        </li>
                                        {{-- <li class="sub-sub-submenu-list">
                                            <a href="#tables-editable" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Editable <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="tables-editable" data-parent="#tables">
                                                <li>
                                                    <a href="table_jq_spreadsheet.html"> Spreadsheet </a>
                                                </li>
                                                <li>
                                                    <a href="table_jquery_tabledit.html"> TableEdit </a>
                                                </li>
                                                <li>
                                                    <a href="table_editablegrid.html"> Editable Grid </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#tables-data-tables" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> DataTables <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="tables-data-tables" data-parent="#tables">
                                                <li>
                                                    <a href="table_dt_zero_configuration.html"> Basic </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_ordering_sorting.html"> Order Sorting </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_multi-column_ordering.html"> Multi-Column </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_multiple_tables.html"> Multiple Tables</a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_alternative_pagination.html"> Alternative
                                                        Pagination</a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_miscellaneous.html"> Miscellaneous </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_custom.html"> Custom </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_scrollable.html"> Scrollable </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_range_search.html"> Range Search </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_html5.html"> HTML5 Export </a>
                                                </li>
                                                <li>
                                                    <a href="table_dt_live_dom_ordering.html"> Live DOM ordering </a>
                                                </li>

                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                            </ul>
                            {{-- <ul class="list-unstyled">
                                <li>
                                    <a href="#forms" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">FORMS</span> </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="forms" style="">
                                        <li class="sub-sub-submenu-list">
                                            <a href="#forms-bootstrap" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Bootstrap <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="forms-bootstrap" data-parent="#forms">
                                                <li>
                                                    <a href="form_bootstrap_basic.html"> Basic </a>
                                                </li>
                                                <li>
                                                    <a href="form_bootstrap_rounded.html"> Rounded </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#forms-input-group" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Input Group <i
                                                    class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="forms-input-group" data-parent="#forms">
                                                <li>
                                                    <a href="form_input_group_basic.html"> Basic </a>
                                                </li>
                                                <li>
                                                    <a href="form_input_group_rounded.html"> Rounded </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="form_bootstrap_material.html"> Material </a>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#forms-layout" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Layouts <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="forms-layout" data-parent="#forms">
                                                <li>
                                                    <a href="form_layouts.html"> Basic </a>
                                                </li>
                                                <li>
                                                    <a href="form_layouts_rounded.html"> Rounded </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#forms-validation" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Validation <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="forms-validation" data-parent="#forms">
                                                <li>
                                                    <a href="form_validation.html"> Bootstrap </a>
                                                </li>
                                                <li>
                                                    <a href="form_jqvalidation.html"> jQuery </a>
                                                </li>
                                                <li>
                                                    <a href="form_validation_material.html"> Custom </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="form_input_mask.html"> Input Mask </a>
                                        </li>
                                        <li>
                                            <a href="form_bootstrap_select.html"> Bootstrap Select </a>
                                        </li>
                                        <li>
                                            <a href="form_select2.html"> Select2 </a>
                                        </li>
                                        <li>
                                            <a href="form_bootstrap_touchspin.html"> TouchSpin </a>
                                        </li>
                                        <li>
                                            <a href="form_multiselect.html"> Multi Select </a>
                                        </li>
                                        <li>
                                            <a href="form_maxlength.html"> Maxlength </a>
                                        </li>
                                        <li>
                                            <a href="form_repeater.html"> Repeater </a>
                                        </li>
                                        <li>
                                            <a href="form_checkbox_radio.html"> Checkbox and Radio </a>
                                        </li>

                                        <li class="sub-sub-submenu-list">
                                            <a href="#forms-wizard" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Wizards <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="forms-wizard" data-parent="#forms">
                                                <li>
                                                    <a href="form_bs_wizard.html"> Bootstrap </a>
                                                </li>
                                                <li>
                                                    <a href="form_wizard.html"> jQuery Steps </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="form_fileupload.html"> File Upload </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </li>

                <li class="menu">
                    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                        <div class="">
                            <i class="flaticon-copy"></i>
                            <span>REPORT</span>
                        </div>
                    </a>
                    <div class="submenu list-unstyled collapse eq-animated eq-fadeInUp" id="pages"
                        data-parent="#topAccordion">
                        <div class="submenu-scroll">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#ecommerce" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">Data</span> </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="ecommerce">
                                        <li>
                                            <a href="ecommerce_orders.html"> Laporan </a>
                                        </li>
                                        {{-- <li>
                                            <a href="ecommerce_product.html"> Products </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_product_catalog.html"> Product Catalog </a>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#product-details" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle" data-parent="#ecommerce"> Product Details <i
                                                    class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="product-details">
                                                <li>
                                                    <a href="ecommerce_product_details_1.html"> Product Details 1 </a>
                                                </li>
                                                <li>
                                                    <a href="ecommerce_product_details_2.html"> Product Details 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="ecommerce_addedit_product.html"> Add/Edit Products </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_addedit_categories.html"> Add/Edit Categories </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_view_cart.html"> View Cart </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_view_payments.html"> View Payments </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_view_customers.html"> View Customers </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_checkout.html"> Checkout </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_invoices.html"> Invoice </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_shipments.html"> Shipments </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_products_cart.html"> Products in Cart </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_coupons.html"> Coupons </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_low_stock.html"> Low Stock </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_best_sellers.html"> Best Sellers </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_refunds.html"> Refunds </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_search_terms.html"> Search Terms </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_newsletters.html"> Newsletters </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_wizards.html"> Payment Wizard </a>
                                        </li>
                                        <li>
                                            <a href="ecommerce_reviews.html"> Reviews </a>
                                        </li> --}}
                                    </ul>
                                </li>
                            </ul>
                            {{-- <ul class="list-unstyled">
                                <li>
                                    <a href="#page" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                        <span class="">PAGES</span> </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="page">
                                        <li>
                                            <a href="pages_blank_page.html"> Blank Page</a>
                                        </li>
                                        <li>
                                            <a href="pages_helpdesk.html"> Helpdesk </a>
                                        </li>
                                        <li>
                                            <a href="pages_contact_us.html"> Contact Form </a>
                                        </li>
                                        <li>
                                            <a href="pages_faq.html"> FAQ </a>
                                        </li>
                                        <li>
                                            <a href="pages_blog.html"> Blog </a>
                                        </li>
                                        <li>
                                            <a href="pages_privacy.html"> Privacy Policy </a>
                                        </li>
                                        <li>
                                            <a href="pages_cookie_consent.html"> Cookie Consent </a>
                                        </li>
                                        <li>
                                            <a href="pages_landing_page.html" target="_blank"> Landing Page </a>
                                        </li>
                                        <li>
                                            <a href="pages_coming_soon.html"> Coming Soon </a>
                                        </li>

                                        <li class="sub-sub-submenu-list">
                                            <a href="#pages-error" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Error <i class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="pages-error" data-parent="#pages">
                                                <li>
                                                    <a href="pages_error404.html"> 404 1 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_error404-2.html"> 404 2 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_error500.html"> 500 1 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_error500-2.html"> 500 2 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_error503.html"> 503 1 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_error503-2.html"> 503 2 </a>
                                                </li>
                                                <li>
                                                    <a href="pages_maintenence.html"> Maintanence </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#users" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">USERS</span> </a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="users">
                                        <li>
                                            <a href="user_profile.html"> Profile </a>
                                        </li>
                                        <li>
                                            <a href="user_account_setting.html"> Account Settings </a>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#user-login" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Login <i class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="user-login" data-parent="#users">
                                                <li>
                                                    <a href="user_login_1.html"> Login 1 </a>
                                                </li>
                                                <li>
                                                    <a href="user_login_2.html"> Login 2 </a>
                                                </li>
                                                <li>
                                                    <a href="user_login_3.html"> Login 3 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#user-register" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Register <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="user-register" data-parent="#users">
                                                <li>
                                                    <a href="user_register_1.html"> Register 1 </a>
                                                </li>
                                                <li>
                                                    <a href="user_register_2.html"> Register 2 </a>
                                                </li>
                                                <li>
                                                    <a href="user_register_3.html"> Register 3 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#user-passRecovery" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Password Recovery <i
                                                    class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="user-passRecovery" data-parent="#users">
                                                <li>
                                                    <a href="user_pass_recovery_1.html"> Password Recovery 1 </a>
                                                </li>
                                                <li>
                                                    <a href="user_pass_recovery_2.html"> Password Recovery 2 </a>
                                                </li>
                                                <li>
                                                    <a href="user_pass_recovery_3.html"> Password Recovery 3 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#user-lockscreen" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Lockscreen <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="user-lockscreen" data-parent="#users">
                                                <li>
                                                    <a href="user_lockscreen_1.html"> Lockscreen 1 </a>
                                                </li>
                                                <li>
                                                    <a href="user_lockscreen_2.html"> Lockscreen 2 </a>
                                                </li>
                                                <li>
                                                    <a href="user_lockscreen_3.html"> Lockscreen 3 </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </li>

                <li class="menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                        <div class="">
                            <i class="flaticon-mail-19"></i>
                            <span>SISTEM</span>
                        </div>
                    </a>
                    <div class="collapse submenu list-unstyled eq-animated eq-fadeInUp" id="app"
                        data-parent="#topAccordion">
                        <ul class="submenu-scroll">
                            <li>
                                <ul class="list-unstyled mt-4">
                                    <li>
                                        <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                            id="apps">
                                            <li>
                                                <a href="apps_chat.html"> User </a>
                                            </li>
                                            <li>
                                                <a href="apps_mailbox.html"> Pengaturan </a>
                                            </li>                                
                                            {{-- <li>
                                                <a href="apps_newsletter.html"> Newsletter </a>
                                            </li>
                                            <li>
                                                <a href="apps_scheduler.html"> Scheduler </a>
                                            </li>
                                            <li class="sub-sub-submenu-list">
                                                <a href="#apps-calendars" data-toggle="collapse" aria-expanded="false"
                                                    class="dropdown-toggle"> Calendar <i
                                                        class="flaticon-right-arrow"></i> </a>
                                                <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                    id="apps-calendars" data-parent="#apps-calendars">
                                                    <li>
                                                        <a href="apps_basic_calendar.html"> Basic </a>
                                                    </li>
                                                    <li>
                                                        <a href="apps_full_calendar.html"> Full Calendar </a>
                                                    </li>
                                                    <li>
                                                        <a href="apps_drag_n_drop_calendar.html"> Drag n Drop </a>
                                                    </li>
                                                </ul>
                                            </li> --}}
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="menu">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-plus"></i>
                            <span class="">More</span>
                        </div>
                    </a>
                    <div class="collapse submenu list-unstyled eq-animated eq-fadeInUp" id="more"
                        data-parent="#topAccordion">
                        <div class="submenu-scroll">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#modules" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">MODULES</span></a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="modules">
                                        <li>
                                            <a href="modules_widgets.html"> Widgets </a>
                                        </li>
                                        <li>
                                            <a href="modules_table_and_event.html"> Tables &amp; Events </a>
                                        </li>
                                        <li>
                                            <a href="modules_charts_and_maps.html"> Charts &amp; Maps </a>
                                        </li>
                                        <li>
                                            <a href="modules_weather_and_calendar.html"> Weather &amp; Calendar </a>
                                        </li>
                                        <li>
                                            <a href="modules_cards.html"> Cards </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#dragndrop" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">DRAG AND DROP</span></a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="dragndrop">
                                        <li>
                                            <a href="dragndrop_gridstack.html"> Grid Stack</a>
                                        </li>
                                        <li>
                                            <a href="dragndrop_dragula.html"> Dragula</a>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#dragndrop-jqueryui" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> jQuery UI <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="dragndrop-jqueryui" data-parent="#dragndrop">
                                                <li>
                                                    <a href="dragndrop_ui_product_cart.html"> Shopping Cart </a>
                                                </li>
                                                <li>
                                                    <a href="dragndrop_scrumboard.html"> Scrum Task Board</a>
                                                </li>
                                                <li>
                                                    <a href="dragndrop_scroll_bars.html"> Scrollbar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#charts" data-toggle="collapse" aria-expanded="true"
                                        class="dropdown-toggle"> <span class="">CHARTS</span></a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="charts">
                                        <li class="sub-sub-submenu-list">
                                            <a href="#chart-amcharts" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> amCharts <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="chart-amcharts" data-parent="#charts">
                                                <li>
                                                    <a href="am_column_and_barchart.html"> Column &amp; Bar </a>
                                                </li>
                                                <li>
                                                    <a href="am_line_and_areachart.html"> Line &amp; Area </a>
                                                </li>
                                                <li>
                                                    <a href="am_pie_and_donutchart.html"> Pie &amp; Donut </a>
                                                </li>
                                                <li>
                                                    <a href="am_gauge_and_otherchart.html"> Gauges &amp; Other </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#chart-c3chart" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> C3 <i class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="chart-c3chart" data-parent="#charts">
                                                <li>
                                                    <a href="charts_c3_chart.html"> Simple</a>
                                                </li>
                                                <li>
                                                    <a href="charts_c3_api.html"> Api </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="charts_cssplot.html"> CSS Plot </a>
                                        </li>
                                        <li>
                                            <a href="charts_morris.html"> Morris </a>
                                        </li>
                                        <li>
                                            <a href="charts_jQuery_sparklines.html"> jQuery Sparklines </a>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#chart-chartist" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Chartist <i class="flaticon-right-arrow"></i>
                                            </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="chart-chartist" data-parent="#charts">
                                                <li>
                                                    <a href="charts_chartist_bar.html"> Bar </a>
                                                </li>
                                                <li>
                                                    <a href="charts_chartist_line.html"> Line &amp; Area </a>
                                                </li>
                                                <li>
                                                    <a href="charts_chartist_pie.html"> Pie </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#maps" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                        <span class="">MAPS</span></a>
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp"
                                        id="maps">
                                        <li class="sub-sub-submenu-list">
                                            <a href="#map-jqMapael" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> jquery Mapael <i
                                                    class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="map-jqMapael" data-parent="#maps">
                                                <li>
                                                    <a href="map_jquerymapael_basic.html"> Basic </a>
                                                </li>
                                                <li>
                                                    <a href="map_jquerymapael_advanced.html"> Advanced </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-sub-submenu-list">
                                            <a href="#map-vMaps" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle"> Vector Maps <i
                                                    class="flaticon-right-arrow"></i> </a>
                                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp"
                                                id="map-vMaps" data-parent="#maps">
                                                <li>
                                                    <a href="map_amvector.html"> amVector</a>
                                                </li>
                                                <li>
                                                    <a href="map_jvector.html"> jVector</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li> --}}

            </ul>
        </nav>
    </div>
</div>
<!--  END MODERN  -->