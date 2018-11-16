<!doctype html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <!-- Tim kiếm tất cả <link rel="stylesheet" href=", thay thế bằng
        <link rel="stylesheet" href="theme/
        -->

    <link rel="stylesheet" href="public/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/theme/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="public/theme/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/theme/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="public/theme/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="public/theme/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="public/theme/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="public/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/theme/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="public/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- Google Font -->
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->

    <link rel="stylesheet" href="public/css/custom.css">
    <script src="public/theme/bower_components/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Quản lý</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Quản lý </b>phụ tùng ô tô</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

<!--            <p class="text-right admin-account">-->
<!--                --><?php //if (isLogin()):?>
<!--                    Xin chào <a href="#">--><?//= getLoginUsername() ?><!--</a>-->
<!--                --><?php //endif;?>
<!--            </p>-->
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Danh sách các danh mục</li>
                <li class="active">
                    <a href="index.php?c=hangxe&a=index">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Hãng xe</span>
                    </a>
                </li>
                <li class="active">
                    <a href="index.php?c=dongxe&a=index">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Dòng xe</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
