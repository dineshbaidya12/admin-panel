@include('admin.includes.head')
<style>
    .pcr-app {
        display: none;
    }

    .simplebar-placeholder {
        display: none;
    }

    #awn-toast-container {
        z-index: 9999 !important;
        top: 50px !important;
    }
</style>
@yield('custom-styles')
@include('admin.includes.top-bar')

<div class="page">
    @include('admin.includes.sidebar')

    @include('admin.includes.header')

    <div class="content">
        <!-- Start::main-content -->
        <div class="main-content">
            <!-- Page Header -->
            <div class="block justify-between page-header md:flex">
                <div>
                    <h3
                        class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                        @yield('pagename')
                    </h3>
                </div>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-sm">
                        <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate"
                            href="{{ route('dashboard') }}">
                            Admin
                            <i
                                class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70" aria-current="page">
                        @yield('pagename')
                    </li>
                </ol>
            </div>
            <!-- Page Header Close -->
            <div class="page-content-start">
                @yield('content')
            </div>
        </div>
    </div>


    @include('admin.includes.footer')

</div>

@yield('modals')
@include('admin.includes.foot')
@yield('custom-scripts')
</body>

</html>
