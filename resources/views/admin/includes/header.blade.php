<!-- Start::Header -->
<header class="header custom-sticky !top-0 !w-full">
    <nav class="main-header" aria-label="Global">
        <div class="header-content">
            <div class="header-left">
                <!-- Navigation Toggle -->
                <div class="">
                    <button type="button" class="sidebar-toggle !w-100 !h-100">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="ri-arrow-right-circle-line header-icon"></i>
                    </button>
                </div>
                <!-- End Navigation Toggle -->
            </div>

            <div class="responsive-logo">
                <a class="responsive-logo-dark" href="index.html" aria-label="Brand"><img
                        src="{{ asset('admin/images/brand-logos/desktop-logo.png') }}" alt="logo"
                        class="mx-auto" /></a>
                <a class="responsive-logo-light" href="index.html" aria-label="Brand"><img
                        src="{{ asset('admin/images/brand-logos/desktop-dark.png') }}" alt="logo"
                        class="mx-auto" /></a>
            </div>

            {{-- Right nav bar  --}}
            @include('admin.includes.right-header')
            {{-- Right nav bar  --}}

        </div>
    </nav>
</header>
<!-- End::Header -->
