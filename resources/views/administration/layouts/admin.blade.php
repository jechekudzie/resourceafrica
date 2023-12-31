<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('administration/dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAMPFIRE ASSOCIATION</title>
    <link rel="stylesheet" href="{{ asset('administration/dist/css/app.css') }}"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>

    <!-- DataTables JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>
<body class="py-5">
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="HTML Admin Section" class="w-6" src="{{ asset('administration/dist/images/logo.svg') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                                                               class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                                                               class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            <li>
                <a href="javascript:html" class="menu">
                    <div class="menu__icon"><i data-lucide="home"></i></div>
                    <div class="menu__title"> Dashboard <i data-lucide="chevron-down"
                                                           class="menu__sub-icon transform rotate-180"></i></div>
                </a>
                <ul class="menu__sub-open">
                    <li>
                        <a href="index.html" class="menu menu--active">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 1</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 2</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 3</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-4.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 4</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="box"></i></div>
                    <div class="menu__title"> Menu Layout <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="index.html" class="menu menu--active">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Side Menu</div>
                        </a>
                    </li>
                    <li>
                        <a href="simple-menu-light-dashboard-overview-1.html" class="menu menu--active">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Simple Menu</div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-1.html" class="menu menu--active">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Top Menu</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="shopping-bag"></i></div>
                    <div class="menu__title"> E-Commerce <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-categories.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Categories</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-add-product.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Add Product</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Products <i data-lucide="chevron-down"
                                                                  class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-product-list.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Product List</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-product-grid.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Product Grid</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Transactions <i data-lucide="chevron-down"
                                                                      class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-transaction-list.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Transaction List</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-transaction-detail.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Transaction Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Sellers <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-seller-list.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Seller List</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-seller-detail.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Seller Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="side-menu-light-reviews.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Reviews</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="side-menu-light-inbox.html" class="menu">
                    <div class="menu__icon"><i data-lucide="inbox"></i></div>
                    <div class="menu__title"> Inbox</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-file-manager.html" class="menu">
                    <div class="menu__icon"><i data-lucide="hard-drive"></i></div>
                    <div class="menu__title"> File Manager</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-point-of-sale.html" class="menu">
                    <div class="menu__icon"><i data-lucide="credit-card"></i></div>
                    <div class="menu__title"> Point of Sale</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-chat.html" class="menu">
                    <div class="menu__icon"><i data-lucide="message-square"></i></div>
                    <div class="menu__title"> Chat</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-post.html" class="menu">
                    <div class="menu__icon"><i data-lucide="file-text"></i></div>
                    <div class="menu__title"> Post</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-calendar.html" class="menu">
                    <div class="menu__icon"><i data-lucide="calendar"></i></div>
                    <div class="menu__title"> Calendar</div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="edit"></i></div>
                    <div class="menu__title"> Crud <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-crud-data-list.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Data List</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-crud-form.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Form</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="users"></i></div>
                    <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-users-layout-1.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Layout 1</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-users-layout-2.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Layout 2</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-users-layout-3.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Layout 3</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="trello"></i></div>
                    <div class="menu__title"> Profile <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-profile-overview-1.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 1</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-profile-overview-2.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 2</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-profile-overview-3.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overview 3</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="layout"></i></div>
                    <div class="menu__title"> Pages <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Wizards <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Blog <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-blog-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-blog-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-blog-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Pricing <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Invoice <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> FAQ <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-faq-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-faq-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-faq-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login-light-login.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Login</div>
                        </a>
                    </li>
                    <li>
                        <a href="login-light-register.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Register</div>
                        </a>
                    </li>
                    <li>
                        <a href="main-light-error-page.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Error Page</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-update-profile.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Update profile</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-change-password.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Change Password</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="inbox"></i></div>
                    <div class="menu__title"> Components <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Table <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-regular-table.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Regular Table</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-tabulator.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Tabulator</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Overlay <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-modal.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Modal</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-slide-over.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Slide Over</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-notification.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Notification</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="side-menu-light-tab.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Tab</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-accordion.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Accordion</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-button.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Button</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-alert.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Alert</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-progress-bar.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Progress Bar</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-tooltip.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Tooltip</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dropdown.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Dropdown</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-typography.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Typography</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-icon.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Icon</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-loading-icon.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Loading Icon</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="sidebar"></i></div>
                    <div class="menu__title"> Forms <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-regular-form.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Regular Form</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-datepicker.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Datepicker</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-tom-select.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Tom Select</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-file-upload.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> File Upload</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Wysiwyg Editor <i data-lucide="chevron-down"
                                                                        class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-wysiwyg-editor-classic.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Classic</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wysiwyg-editor-inline.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Inline</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wysiwyg-editor-balloon.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Balloon</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wysiwyg-editor-balloon-block.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Balloon Block</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wysiwyg-editor-document.html" class="menu">
                                    <div class="menu__icon"><i data-lucide="zap"></i></div>
                                    <div class="menu__title">Document</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="side-menu-light-validation.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Validation</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="hard-drive"></i></div>
                    <div class="menu__title"> Widgets <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-chart.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Chart</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-slider.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Slider</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-image-zoom.html" class="menu">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> Image Zoom</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="flex mt-[4.7rem] md:mt-0">

    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('/administration/dist/images/logo.svg')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> Regional CBNRM</span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <?php
            $menu = [
                [
                    'label' => 'Dashboard',
                    'icon' => 'home',  // Lucide icon for Dashboard
                    'route' => '/dashboard',
                    'submenu' => [
                        ['label' => 'Dashboard Overview', 'route' => 'administration.dashboard'],
                    ],
                ],
                [
                    'label' => 'Wildlife',
                    'icon' => 'feather',  // Lucide icon for Wildlife
                    'submenu' => [
                        ['label' => 'Manage Species', 'route' => 'wildlife.species'],
                        ['label' => 'Automated Allocation', 'route' => 'wildlife.automated-allocation'],
                        ['label' => 'Manual Allocation', 'route' => 'wildlife.manual-allocation'],
                    ],
                ],
                [
                    'label' => 'HWC',
                    'icon' => 'alert-triangle',  // Lucide icon for Conflict
                    'submenu' => [
                        ['label' => 'Record HWC Incidents', 'route' => 'human-wildlife-conflict.record-incident'],
                        ['label' => 'HWC Outcomes', 'route' => 'human-wildlife-conflict.outcomes'],
                        ['label' => 'HWC Types', 'route' => 'human-wildlife-conflict.types'],
                        ['label' => 'Territorial Marking', 'route' => 'human-wildlife-conflict.marking'],
                        ['label' => 'Security Measures', 'route' => 'human-wildlife-conflict.security'],
                        ['label' => 'Campaign Management', 'route' => 'human-wildlife-conflict.campaigns'],
                    ],
                ],
                [
                    'label' => 'PAC',
                    'icon' => 'shield',  // Lucide icon for Control
                    'submenu' => [
                        ['label' => 'Record PAC Incidents', 'route' => 'problematic-animal-control.incidents'],
                        ['label' => 'Mitigation Measures', 'route' => 'problematic-animal-control.mitigation-measures'],
                        ['label' => 'Control Measures', 'route' => 'problematic-animal-control.control-measures'],
                    ],
                ],
                [
                    'label' => 'Illegal Activities',
                    'icon' => 'thumbs-down',  // Lucide icon for Illegal Activities
                    'submenu' => [
                        ['label' => 'Incident Reports', 'route' => 'illegal-activities.incidents'],
                        ['label' => 'Investigations', 'route' => 'illegal-activities.illegal.investigations'],
                        ['label' => 'Case Management', 'route' => 'illegal-activities.illegal.case-management'],
                    ],
                ],
                [
                    'label' => 'Marketing',
                    'icon' => 'pie-chart',  // Lucide icon for Marketing
                    'submenu' => [
                        ['label' => 'Quotas', 'route' => 'marketing.rdcs'],
                        ['label' => 'Manage Quotas', 'route' => 'marketing.quotas'],
                        ['label' => 'Negotiate Trophies', 'route' => 'marketing.negotiate'],
                        ['label' => 'Contracts', 'route' => 'marketing.contracts'],
                        ['label' => 'Buyers', 'route' => 'marketing.buyers'],
                        ['label' => 'Trophy Fee Agreements', 'route' => 'marketing.trophy-fees'],
                    ],
                ],
                [
                    'label' => 'Hunting Activities',
                    'icon' => 'target',  // Lucide icon for Hunting
                    'submenu' => [
                        ['label' => 'Hunting Records', 'route' => 'hunting.records'],
                        ['label' => 'Record Activities', 'route' => 'hunting.activities'],
                        ['label' => 'Manage Income', 'route' => 'hunting.income'],
                        ['label' => 'Revenue Sources', 'route' => 'hunting.revenue-sources'],
                        ['label' => 'Trophy Fees', 'route' => 'hunting.trophy-fees'],
                        ['label' => 'Ivory Sales', 'route' => 'hunting.ivory-sales'],
                        ['label' => 'Meat Sales', 'route' => 'hunting.meat-sales'],
                        ['label' => 'Film/Photography Fees', 'route' => 'hunting.film-fees'],
                        ['label' => 'Hunting Concession Fees', 'route' => 'hunting.concession-fees'],
                        ['label' => 'Analytics', 'route' => 'hunting.analytics'],
                        ['label' => 'Activity Reports', 'route' => 'hunting.reports.activities'],
                        ['label' => 'Revenue Analysis', 'route' => 'hunting.reports.revenue'],
                    ],
                ],
                [
                    'label' => 'Projects',
                    'icon' => 'users',  // Lucide icon for Community
                    'submenu' => [
                        ['label' => 'Project Management', 'route' => 'community-projects.projects'],
                        ['label' => 'Project Participants', 'route' => 'community-projects.participants'],
                        ['label' => 'Funding Allocation', 'route' => 'community-projects.funding'],
                        ['label' => 'Progress Monitoring', 'route' => 'community-projects.progress'],
                        ['label' => 'Project Reports', 'route' => 'community-projects.reports'],
                    ],
                ],
                [
                    'label' => 'Organisations',
                    'icon' => 'building',
                    'submenu' => [
                        ['label' => 'Add New', 'route' => 'organizations.add'],
                        ['label' => 'Manage', 'route' => 'organizations.index'],
                        ['label' => 'Parameters', 'route' => 'organizations.parameters'],
                    ],
                ],
            ];
            ?>
            @foreach($menu as $menuItem)
                @php
                    $theseroutes = [];
                    foreach ($menuItem['submenu'] as $route) {
                        $theseroutes[] = $route['route'];
                    }
                @endphp
                <li>
                    <a href="javascript:;.html" class="side-menu
                       {{ Route::is($theseroutes) ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"><i data-lucide="{{ $menuItem['icon'] }}"></i></div>
                        <div class="side-menu__title">
                            {{ $menuItem['label'] }}
                            @if(isset($menuItem['submenu']) && count($menuItem['submenu']) > 0)
                                <div class="side-menu__sub-icon transform rotate-180"><i data-lucide="chevron-down"></i>
                                </div>
                            @endif
                        </div>
                    </a>
                    @if(isset($menuItem['submenu']) && count($menuItem['submenu']) > 0)
                        <ul class="{{ Route::is($theseroutes) ? 'side-menu__sub-open' : '' }}">
                            @foreach($menuItem['submenu'] as $submenuItem)
                                <li>
                                    <a href="{{ route($submenuItem['route']) }}"
                                       class="side-menu {{ Route::is($submenuItem['route']) ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon"></div>
                                        <div class="side-menu__title">{{ $submenuItem['label'] }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @if(!$loop->last)
                    <li class="side-nav__divider my-6"></li>
                @endif
            @endforeach
        </ul>

    </nav>
    <!-- END: Side Menu -->

    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-lucide="search"
                                                              class="notification__icon dark:text-slate-500"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                    </div>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                     role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img
                        src="{{ asset('administration/dist/images/profile-5.jpg') }}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">Super Admin</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Leading Digital</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                                                                  class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit"
                                                                                  class="w-4 h-4 mr-2"></i> Add Account
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                                                                  class="w-4 h-4 mr-2"></i> Reset
                                Password </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                                                                  class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        @auth
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item hover:bg-white/5">
                                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->

        @yield('content')

    </div>
</div>
<script src="{{ asset('administration/dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@stack('scripts')
</body>
</html>
