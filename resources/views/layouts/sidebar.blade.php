@include('layouts.toolbar')

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @include('layouts.menu')

            {{--Menu Expand--}}
            {{-------------------}}
            {{--<li class=" nav-item"><a href="index.html"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>--}}
                {{--<ul class="menu-content">--}}
                    {{--<li><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">eCommerce</a>--}}
                    {{--</li>--}}
                    {{--<li><a class="menu-item" href="dashboard-project.html" data-i18n="nav.dash.project">Project</a>--}}
                    {{--</li>--}}
                    {{--<li><a class="menu-item" href="dashboard-analytics.html" data-i18n="nav.dash.analytics">Analytics</a>--}}
                    {{--</li>--}}
                    {{--<li><a class="menu-item" href="dashboard-crm.html" data-i18n="nav.dash.crm">CRM</a>--}}
                    {{--</li>--}}
                    {{--<li><a class="menu-item" href="dashboard-fitness.html" data-i18n="nav.dash.fitness">Fitness</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>