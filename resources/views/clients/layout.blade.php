<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>e-Wallet - Your convenient Wallet</title>
	<meta name="description" content="MY-WALLET online wallet system" />
	<meta name="keywords" content="wallet, money, paypl,card,deposits, withdrawal, e-wallet system" />
	<meta name="author" content="Vincent Koech"/>
	<link rel="shortcut icon" href="../favicon.html">
	<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/bootstrap-reset.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset ('client/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    
    <!-- css for this page -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="{{asset('client/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/owl.transitions.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- start:wrapper -->
    <div id="wrapper">
        <div class="header-top">
            <!-- start:navbar -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="container">
                    <!-- start:navbar-header -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('home') }}"><i class="fa fa-cash"></i> <strong>e-</strong><strong>Wallet</strong></a>
                    </div>
                    <!-- end:navbar-header -->
                    <ul class="nav navbar-nav navbar-left top-menu">
                        <!-- start dropdown 3 -->
                        <li id="header_notification_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-inbox"></i>
                                <span class="badge bg-warning">0</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <div class="notify-arrow notify-arrow-yellow"></div>
                                <li>
                                    <p class="yellow">Messages</p>
                                </li>
                            </ul>
                        </li>
                        <!-- end dropdown 3 -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="img/avatar1_small.jpg">
                                <span class="username">Account</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="log-arrow-up"></div>
                                @if(Auth::guard('client')->check())
                                <li><a href="{{ route('profile')}}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                <li><a href="{{ route('client.logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                                @else
                                <li><a href="{{ route('login')}}"><i class=" fa fa-sign-in"></i>Log In</a></li>
                                <li><a href="{{ route('register')}}"><i class=" fa fa-sign-up"></i>Register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end:navbar -->
        </div>
        <!-- start:header -->
        <div id="header">
            <div class="overlay">
                <nav class="navbar" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <strong>MENU</strong>
                            </button>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        @if(Auth::guard('client')->check())
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="{{ route('home') }}">
                                        <div class="text-center">
                                            <i class="fa fa-dashboard fa-3x"></i><br>
                                            Dashboard
                                        </div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('send') }}">
                                        <div class="text-center">
                                            <i class="fa fa-3x fa-send"></i><br>
                                            Send Money
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-laptop fa-3x"></i><br>
                                            Deposit<span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('paywithpaypal') }}"><i class="fa fa-money"></i>From Paypal</a></li>
                                        <li><a href="{{ route('cardview') }}"><i class="fa fa-credit-card"></i>From Card</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                             <i class="fa fa-database fa-3x"></i><br>
                                            Transactions <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('transaction')}}"><i class="fa fa-list-alt"></i> Transaction History</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-folder-open fa-3x"></i><br>
                                            Withdraw Money <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="basic-table.html"><i class="fa fa-table"></i>Withdraw to Paypal</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-info-circle fa-3x"></i><br>
                                            Help Centre <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('help')}}"><i class="fa fa-question-circle"></i> Help & Support</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-3x"></i><br>
                                            Account Settings <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Profile</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-unlock fa-3x"></i><br>
                                            Actions <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('client.logout') }}"><i class="fa fa-unlock-alt"></i> LogOut</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- end:header -->

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <!-- <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol> -->
                <!-- end:breadcrumb -->   
        @yield('content')

            </div>
        </div>
        <!-- end:main -->

        <!-- start:footer -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-widget">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                            <span class="sosmed-footer">
                                <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                            
                            </span>
                            &copy; 2018 <strong>e</strong>-Wallet<strong>.</strong></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="footer-bottom-links">
                                <a href="#">About <strong>e</strong>-Wallet<strong>.</strong></a>
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms & Conditions</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:footer -->

    </div>
    <!-- end:wrapper -->

	<!-- start:javascript -->
	<!-- javascript default for all pages-->
	<script src="{{ asset('client/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{asset('client/js/bootstrap.min.js')}}"></script>


    <!-- javascript for Srikandi admin -->
    <script src="{{ asset('client/js/themes.js') }}"></script>
    <script src="{{ asset('client/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('client/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="{{ asset('client/js/jquery.dcjqaccordion.2.7.min.js') }}"></script>
    <script src="{{ asset('client/js/respond.min.js') }}" ></script>
	<!-- end:javascript -->

    <!-- start:javascript for this page -->
    <script src="{{ asset('client/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{ asset('client/js/owl.carousel.js')}}" ></script>
    <script src="{{ asset('client/js/jquery.customSelect.min.js')}}" ></script>
    <script src="{{ asset('clientjs/sparkline-chart.js')}}"></script>
    <script src="{{ asset('client/js/easy-pie-chart.js')}}"></script>
    <script src="{{ asset('client/js/count.js')}}"></script>
    
    
    <script>
        //owl carousel
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
                autoPlay:true
            });
        });

        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

        if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }
    </script>
    <!-- end:javascript for this page -->
    @yield('scripts')

</body>

<!-- Mirrored from bootemplates.com/themes/srikandi/v2/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Dec 2017 16:15:27 GMT -->
</html>	