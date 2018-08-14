<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <!--Header-->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
             <a class="navbar-brand" href="./"><img src="images/face2.png" height="35px;" alt="Logo"></a>
            <a class="navbar-brand hidden" href=""><img src="images/face_tool.png" width="50px" height="30px" alt="Logo"></a>
        </div>
        <!--End head-->
        <!--Menu-->
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href=""> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-desktop"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-laptop"></i><a href="{{route('list')}}">List users</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{route('insert')}}">New user</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>