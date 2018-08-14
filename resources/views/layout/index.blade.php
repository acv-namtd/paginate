<!doctype html>
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="css/layout/css/normalize.css">
    <link rel="stylesheet" href="css/layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layout/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/layout/css/themify-icons.css">
    <link rel="stylesheet" href="css/layout/css/flag-icon.min.css">
    <link rel="stylesheet" href="css/layout/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="css/layout/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!--Index CSS-->
    <link rel="stylesheet" type="text/css" href="css/layout/index.css">

    <script src="js/jquery-3.2.1.min.js"></script>

    <!--DataTable-->
    <link rel="stylesheet" type="text/css" href="dataTable/dataTables.bootstrap.min.css">
    @stack("css")
</head>
<body>

    <!-- Left Panel -->

        @include("layout.left_panel")

    <!-- Left Panel -->

    <!-- Right Panel -->

        @include("layout.right_panel")

    <!-- Right Panel -->

</body>
</html>
<!--Datatables-->
<script src="dataTable/datatables.min.js"></script>
<script>
$("#dataTable").dataTable({
    "info": false,
    "paging" : false,
    searching:false,
    "order": [],
    "columnDefs": 
        [{ "orderable": false, "targets": [0,6,7] }]
});
</script>
<!--Alert-->
<script src="js/alert/alert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="js/layout/plugins.js"></script>
<script src="js/layout/main.js"></script>
<script src="js/layout/dashboard.js"></script>
<script src="js/layout/widgets.js"></script>
@stack("js")