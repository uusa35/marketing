<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hide">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-id-card"></i>
                    <span class="title">Qutation Section</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{ route('quotation.index') }}" class="nav-link ">
                            <i class="fa fa-fw fa-newspaper-o"></i>
                            <span class="title">Quotations</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('quotation.create') }}" class="nav-link ">
                            <i class="fa fa-fw fa-pencil-square"></i>
                            <span class="title">create new quotation</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->isAdmin)
                <li class="nav-item start">
                    <a href="{{ route('user.index') }}" class="nav-link ">
                        <i class="fa fa-fw fa-user-circle-o"></i>
                        <span class="title">users</span>
                    </a>
                </li>
                <li class="nav-item start">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-fw fa-id-card"></i>
                        <span class="title">Templates</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start">
                            <a href="{{ route('template.index') }}" class="nav-link ">
                                <i class="fa fa-fw fa-id-card"></i>
                                <span class="title">Templates</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('template.create') }}" class="nav-link ">
                                <i class="fa fa-fw fa-plus"></i>
                                <span class="title">create temp</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>