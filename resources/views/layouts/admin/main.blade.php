<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="/font/css/all.min.css">
    <link rel="icon" href="{{ url('/image/logo.png') }}">
    <title>@yield('title')</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />


    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('layouts.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.admin.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('components.footer')
                    <!-- / Footer -->

                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- jQuery Datatables -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- Datatables Bootstrap 4 -->
    <script src="/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Datatables Extensions -->
    <script src="/plugins/datatables/extensions/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables/extensions/buttons.flash.min.js"></script>
    <script src="/plugins/datatables/extensions/jszip.min.js"></script>
    <script src="/plugins/datatables/extensions/pdfmake.js"></script>
    <script src="/plugins/datatables/extensions/vfs_fonts.js"></script>
    <script src="/plugins/datatables/extensions/custom.datatables.js"></script>
    <script src="/plugins/datatables/extensions/jquery.formatNumber-0.1.1.min.js"></script>

    <script>
        let tbl_count = $("table").find("tr:first th").length;
        let column_show = []
        for (let i = 0; i < (tbl_count - 1); i++) {
            column_show.push(i)
        }
        $('.datatables').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: column_show
                    }
                },
            ]
        });

        $('.datatables-simple').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [5, 10, 20, 50, -1],
                [5, 10, 20, 50, "All"]
            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: column_show
                    }
                },
            ]
        });


        $('.datatables-not-order').DataTable({
            autoWidth: true,
            "ordering": false,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });

        let table_collapse = $('.datatables-collapse').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
        $('.datatables-collapse tbody').on('click', 'td:first-child.main', function() {
            var tr = $(this).closest('tr');
            var row = table_collapse.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it.
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open row.
                row.child('ok').show();
                tr.addClass('shown');
            }
        });
    </script>

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Code injected by live-server -->
</body>

</html>
