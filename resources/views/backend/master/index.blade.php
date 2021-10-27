<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{{ URL::asset('backend/css/modern.css') }}}" rel="stylesheet">
    <script src="{{{ URL::asset('backend/js/settings.js') }}}"></script>

</head>
<body>
    <div class="wrapper">
        @include('backend.partial.sidebar')
        <div class="main">
            @include('backend.partial.header')
            <main class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            @include('backend.partial.footer')
        </div>
    </div>
    <script src="{{{ URL::asset('backend/js/app.js') }}}"></script>
    <script>
		$(function() {
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
	</script>
</body>
</html>