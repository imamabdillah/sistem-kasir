 <!--begin::Wrapper-->
 <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
     <!--begin::Sidebar-->
     <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
         data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
         data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
         <!--begin::Logo-->
         <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
             <!--begin::Logo image-->
             <a href="../../demo1/dist/index.html">
                 <img alt="Logo" src="assets/media/logos/default-dark.svg"
                     class="h-25px app-sidebar-logo-default" />
                 <img alt="Logo" src="assets/media/logos/default-small.svg"
                     class="h-20px app-sidebar-logo-minimize" />
             </a>
             <!--end::Logo image-->
             <!--begin::Sidebar toggle-->
             <div id="kt_app_sidebar_toggle"
                 class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                 data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                 data-kt-toggle-name="app-sidebar-minimize">
                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                 <span class="svg-icon svg-icon-2 rotate-180">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="lucide lucide-chevrons-left">
                         <path d="m11 17-5-5 5-5" />
                         <path d="m18 17-5-5 5-5" />
                     </svg>
                 </span>
                 <!--end::Svg Icon-->
             </div>
             <!--end::Sidebar toggle-->
         </div>
         <!--end::Logo-->
         <!--begin::sidebar menu-->
         <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
             <!--begin::Menu wrapper-->
             <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                 data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">
                 <!--begin::Menu-->
                 <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                     data-kt-menu="true" data-kt-menu-expand="false">
                     <!--begin:Menu item-->
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                 <span class="svg-icon svg-icon-2">

                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">Dashboards</span>

                         </span>
                         <!--end:Menu link-->
                     </div>
                     <!--end:Menu item-->
                     <!--begin:Menu item-->
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                                 <span class="svg-icon svg-icon-2">

                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">User Management</span>
                         </span>
                         <!--end:Menu link-->

                     </div>
                     <!--end:Menu item-->
                     <!--begin:Menu item-->
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                 <span class="svg-icon svg-icon-2">

                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">Invoice Manager</span>

                         </span>
                         <!--end:Menu link-->

                     </div>
                     <!--end:Menu item-->
                 </div>
                 <!--end::Menu-->
             </div>
             <!--end::Menu wrapper-->
         </div>
         <!--end::sidebar menu-->
         <!--begin::Footer-->
         <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
             <form id="logout-form" method="POST" action="{{ route('logout') }}">
                 @csrf
                 <button type="submit" form="logout-form"
                     class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100">
                     <span class="btn-label">Logout</span>
                     <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                     <span class="svg-icon btn-icon svg-icon-2 m-0"></span>
                     <!--end::Svg Icon-->
                 </button>
             </form>
         </div>
         <!--end::Footer-->
     </div>
     <!--end::Sidebar-->
 </div>
 <!--end::Wrapper-->
