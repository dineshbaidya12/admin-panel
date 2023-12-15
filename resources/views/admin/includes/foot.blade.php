<!-- Apex Charts JS -->
<script src="{{ asset('admin/js/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Chartjs Chart JS -->
<script src="{{ asset('admin/js/libs/chart.js/chart.min.js') }}"></script>

<!-- Index JS -->
<script src="{{ asset('admin/js/index.js') }}"></script>

<!-- Back To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
</div>

<div id="responsive-overlay"></div>

<!-- popperjs -->
<script src="{{ asset('admin/js/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('admin/js/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- sidebar JS -->
<script src="{{ asset('admin/js/defaultmenu.js') }}"></script>

<!-- sticky JS -->
<script src="{{ asset('admin/js/sticky.js') }}"></script>

<!-- Switch JS -->
<script src="{{ asset('admin/js/switch.js') }}"></script>

<!-- Preline JS -->
<script src="{{ asset('admin/js/libs/preline/preline.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('admin/js/libs/simplebar/simplebar.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('admin/js/custom.js') }}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('admin/js/custom-switcher.js') }}"></script>

<!-- Notofication JS -->
<script src="{{ asset('admin/js/libs/awesome-notifications/index.var.js') }}"></script>
<link rel="stylesheet" href="{{ asset('admin/js/libs/awesome-notifications/style.css') }}">
<script src="{{ asset('admin/js/notifications.js') }}"></script>
<script src="{{ asset('admin/js/libs/tabulator-tables/js/tabulator.min.js') }}"></script>
{{-- <script src="{{ asset('admin/js/datatable.js') }}"></script> --}}
<script src="{{ asset('admin/js/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('admin/js/flatpickr.js') }}"></script>

<!-- Notofication JS -->

@if (session('error'))
    <script>
        var notifier = new AWN({
            position: 'top-right',
        });
        notifier.alert('{!! session('error') !!}')
    </script>
@endif

@if (session('success'))
    {{-- <script>
        Swal.fire({
            title: 'Success!',
            html: `{!! session('error') !!}`,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script> --}}
    <script>
        var notifier = new AWN({
            position: 'top-right',
        });
        notifier.success('{!! session('success') !!}')
    </script>
@endif

@if ($errors->any())
    <script>
        var notifier = new AWN({
            position: 'top-right',
        });
        var errorMessage = '<ul>';
        @foreach ($errors->all() as $error)
            errorMessage += '<li>{{ $error }}</li>';
        @endforeach
        errorMessage += '</ul>';
        notifier.alert(errorMessage);
    </script>
@endif
