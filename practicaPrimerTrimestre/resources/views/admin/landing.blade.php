@extends('admin.base')

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Alejandro Jimenez Yago </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav nav-icons">
                    <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                    <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                </ul>
                <form class="navbar-search pull-left input-append" action="#">
                <input type="text" class="span3">
                <button class="btn" type="button">
                    <i class="icon-search"></i>
                </button>
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item No. 1</a></li>
                            <li><a href="#">Don't Click</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Example Header</li>
                            <li><a href="#">A Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Support </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{url('assets/admin/images/user.png') }}" class="nav-avatar" />
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                            <div class="span3">
                                <div class="sidebar">
                                    <ul class="widget widget-menu unstyled">
                                        <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                        </a></li>
                                        <li><a href="{{url('puesto')}}"><i class="menu-icon icon-bullhorn"></i>Tabla Puestos </a>
                                        </li>
                                        <li><a href="{{url('departamento')}}"><i class="menu-icon icon-bullhorn"></i>Tabla Departamentos </a>
                                        </li>
                                        <li><a href="{{url('empleado')}}"><i class="menu-icon icon-bullhorn"></i>Tabla Empleados </a>
                                        </li>
                                        <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                            11</b> </a></li>
                                        <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                            19</b> </a></li>
                                    </ul>
                                    <!--/.widget-nav-->
                                    
                                    
                                    <ul class="widget widget-menu unstyled">
                                        <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                        <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                                    </ul>
                                    <!--/.widget-nav-->
                                    <ul class="widget widget-menu unstyled">
                                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                        </i>More Pages </a>
                                            <ul id="togglePages" class="collapse unstyled">
                                                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                    </ul>
                                </div>
                                <!--/.sidebar-->
                            </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="{{url('departamento')}}" class="btn-box big span4"><i class="icon-group"></i><b>{{ $contador1 }}</b>
                                        <p class="text-muted">
                                            Departamentos</p>
                                    </a><a href="{{url('puesto')}}" class="btn-box big span4"><i class="menu-icon icon-book"></i><b>{{ $contador2 }}</b>
                                        <p class="text-muted">
                                            Puestos</p>
                                    </a><a href="{{url('empleado')}}" class="btn-box big span4"><i class="icon-user"></i><b>{{ $contador3 }}</b>
                                        <p class="text-muted">
                                            Empleados</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Clients</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
                                                    Rate</b> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                            <p>
                                                <strong>Windows 8</strong> <span class="pull-right small muted">78%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: 78%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Mac</strong> <span class="pull-right small muted">56%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: 56%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>Linux</strong> <span class="pull-right small muted">44%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: 44%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>iPhone</strong> <span class="pull-right small muted">67%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: 67%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            
                            <!--/.module-->
                            <div class="module hide">
                                <div class="module-head">
                                    <h3>
                                        Adjust Budget Range</h3>
                                </div>
                                <div class="module-body">
                                    <div class="form-inline clearfix">
                                        <a href="#" class="btn pull-right">Update</a>
                                        <label for="amount">
                                            Price range:</label>
                                        &nbsp;
                                        <input type="text" id="amount" class="input-" />
                                    </div>
                                    <hr />
                                    <div class="slider-range">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>