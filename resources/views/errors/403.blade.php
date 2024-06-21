<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> خطأ بالتصفح | 403 </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dashboard') }}/assets/img/brand/favicon.png" type="image/x-icon" />

    <!--- Internal Fontawesome css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!---Ionicons css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!---Internal Typicons css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

    <!---Internal Feather css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/feather/feather.css" rel="stylesheet">

    <!---Internal Falg-icons css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('dashboard') }}/assets/css-rtl/style.css" rel="stylesheet">

    <!-- Dark-mode css -->
    <link href="{{ asset('dashboard') }}/assets/css-rtl/style-dark.css" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('dashboard') }}/assets/css-rtl/skin-modes.css" rel="stylesheet" />

</head>

<body class="main-body bg-primary-transparent">

    <!-- Page -->
    <div class="page">

        <!-- Main-error-wrapper -->
        <div class="main-error-wrapper  page page-h ">
            <img src="{{ asset('dashboard') }}/assets/img/media/403.png" class="error-page" alt="error">
            <h2>لا يوجد صلاحية لعرض الصفحه</h2>
            <h6>ربما أخطأت في كتابة العنوان أو ربما تم نقل الصفحة.</h6><a class="btn btn-outline-danger"
                href="{{ route('dashboard.user') }}">الرجوع إلى لوحة التحكم</a>
        </div>
        <!-- /Main-error-wrapper -->

    </div>
    <!-- End Page -->

    <!-- JQuery min js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/ionicons/ionicons.js"></script>

    <!-- Moment js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/moment/moment.js"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('dashboard') }}/assets/js/eva-icons.min.js"></script>

    <!-- Rating js-->
    <script src="{{ asset('dashboard') }}/assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/rating/jquery.barrating.js"></script>

    <!-- custom js -->
    <script src="{{ asset('dashboard') }}/assets/js/custom.js"></script>

</body>

</html>
