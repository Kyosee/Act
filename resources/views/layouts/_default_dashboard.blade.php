<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>
    <!-- js-->
    <script src="/js/modernizr.custom.js"></script>
    <!--animate-->
    <link href="/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="/js/metisMenu.min.js"></script>
    <script src="/js/custom.js"></script>
    <link href="/css/custom.css" rel="stylesheet">
    @yield('head')
    <!-- js -->
    <!-- //js -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!-- header-starts -->
        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--logo -->
                <div class="logo">
                    <a href="index.html">
                        <ul>
                            <li>
                                <h1>控制台</h1>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </a>
                </div>
                <!--//logo-->
                <div class="header-right header-right-grid">
                    <div class="profile_details_left">
                        <!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope"></i>
                                    <span class="badge">3</span>
                                </a>
                                <ul class="dropdown-menu anti-dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 3 new messages</h3>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/1.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li class="odd">
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/2.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/3.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all messages</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge blue">3</span>
                                </a>
                                <ul class="dropdown-menu anti-dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 3 new notification</h3>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/2.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li class="odd">
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/1.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user_img">
                                                <img src="images/3.png" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p>
                                                    <span>1 hour ago</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all notifications</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tasks"></i>
                                    <span class="badge blue1">15</span>
                                </a>
                                <ul class="dropdown-menu anti-dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 8 pending task</h3>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Database update</span>
                                                <span class="percentage">40%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar yellow" style="width:40%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Dashboard done</span>
                                                <span class="percentage">90%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar green" style="width:90%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Mobile App</span>
                                                <span class="percentage">33%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar red" style="width: 33%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <span class="task-desc">Issues fixed</span>
                                                <span class="percentage">80%</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                <div class="bar  blue" style="width: 80%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all pending tasks</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--search-box-->
            <div class="search-box">
                <form class="input">
                    <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
                </form>
            </div>
            <!--//end-search-box-->
            <div class="header-right">

                <!--notification menu end -->
                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img">
                                        <img src="images/a.png" alt=""></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-sign-out"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--toggle button start-->
                <button id="showLeftPush">
                    <i class="fa fa-bars"></i>
                </button>
                <!--toggle button end-->
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //header-ends -->
        <!--left-fixed -navigation-->
        @include('layouts._menu_dashboard')
        <!--left-fixed -navigation-->
        @yield('content')
    </div>
    <script src="/js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
    showLeftPush = document.getElementById( 'showLeftPush' ),
    body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };


    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
    </script>
    <!--scrolling js-->
    <script src="/js/jquery.nicescroll.js"></script>
    <script src="/js/scripts.js"></script>

</body>
</html>
