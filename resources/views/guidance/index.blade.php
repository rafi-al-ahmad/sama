@include("guidance.layouts.header")
@include("guidance.layouts.navbar")
@include("guidance.layouts.sidebar")

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->
@include("guidance.layouts.footer")