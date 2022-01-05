<!DOCTYPE html>
<html lang="en">/

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Regal Admin</title>
    <!-- base:css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-bar-rating/fontawesome-stars-o.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-bar-rating/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    @if(Session::has('message'))
        <script>
            $(function(){
                toastr.info("{{ Session::get('message') }}");
            })
        </script>
    @endif
</head>
<body>
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <form action="{{route('posts.search')}}" method="post">
                @csrf
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                    </div>
                </li>
            </ul>
            </form>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-air-play mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-flex mr-4 ">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                        <a class="dropdown-item preview-item">
                            <i class="icon-head"></i> {{\Illuminate\Support\Facades\Auth::user()->name??""}}
                        </a>
                        <a href="{{route("admin.showFormLogin")}}" class="dropdown-item preview-item">
                            <i class="icon-inbox"></i> Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                    <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
                        <i class="icon-grid"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="user-profile">
                <div class="user-image">
                    <img src="{{asset('assets/images/faces/face28.png')}}">
                </div>
                <div class="user-name">
                    {{\Illuminate\Support\Facades\Auth::user()->name??""}}
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-disc menu-icon"></i>
                        <span class="menu-title">Post</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('posts.index')}}">Post List</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('posts.create')}}">Add New Post</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="icon-file menu-icon"></i>
                        <span class="menu-title">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <i class="icon-pie-graph menu-icon"></i>
                        <span class="menu-title">Charts</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12 mb-4 mb-xl-0">
                        <h4 class="font-weight-bold text-dark">Hi, welcome bro!</h4>
                    </div>
                </div>
                @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                </div>
            </footer>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>

<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- End custom js for this page-->
</body>

</html>

