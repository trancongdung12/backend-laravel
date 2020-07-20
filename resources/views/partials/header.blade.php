<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="/../../css/header.css">
    <title> @yield('title')</title>
</head>
<body>
        <nav class="nav">
            <div class="nav-header">
                <a href="/">Dash board</a>
            </div>
            <div class="nav-bar">
               <div class="nav-content">
                    <div class="nav-item">
                        <i class="far fa-bell"></i>
                    </div>
                    <div class="nav-item avatar dropdown">
                        <img src="https://cdn.icon-icons.com/icons2/1857/PNG/512/hacker_117746.png" alt="avatar"  width="100%" height="100%">
                        <span>Admin</span>
                        <i class="fa fa-caret-down"></i> 
                    </div>
               </div>
            </div>
        </nav>
        <div class="container">
            <div class="side-bar">
                <ul class="side-content">
                    <li class="side-item"><a href="/"> <i class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                    <li class="side-item"><a href="/admin/product"> <i class="far fa-keyboard"></i>Product</a></li>
                    <li class="side-item"><a href="/admin/category"> <i class="far fa-keyboard"></i>Category</a></li>
                    <li class="side-item"><a href="#"> <i class="fa fa-sign-out-alt"></i>Log out</a></li>
                </ul>
            </div>
            <div class="content">
                @yield('content')
            </div>  
        </div>
        @include('partials/footer')
</body>
</html>