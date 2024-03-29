<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="utf-8" />
		<title>@yield("title")</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
        <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		<link href="{{ asset('metronic/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="{{ asset('metronic/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->
		<link href="{{ asset('metronic/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="{{ asset('metronic/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="{{ asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="{{ asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->

		<!--end::Page Vendors Styles -->
        <link rel="shortcut icon" href="{{ asset('metronic/assets/demo/default/media/img/logo/favicon.ico') }}" />
        @yield("css")
	</head>

	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop">

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body">							
                @include("_msg")
                @yield("content")
            </div>
        </div>
    </div>
</div>
</div>

		<script src="{{ asset('metronic/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('metronic/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

		<script src="{{ asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>

		<script src="{{ asset('metronic/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
        @yield("js")
		<script>
			$(function(){
				$(".confirm").click(function(){
					$("#confirmModal .btn-danger").attr("href", $(this).attr("href"));
					$("#confirmModal").modal("show");
					return false;
				});
			});
		</script>
	</body>
</html>