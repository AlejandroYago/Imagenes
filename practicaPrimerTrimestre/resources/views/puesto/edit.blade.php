@extends('admin.base')
@section('contentnavbar')

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="{{url('puesto')}}">Puesto </a>
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

@section('sidebar')
<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
            <li><a href="{{url('puesto')}}"><i class="menu-icon icon-bullhorn"></i>Tabla Puestos </a>
            </li>
            <li><a href="{{url('puesto/create')}}"><i class="menu-icon icon-bullhorn"></i>Añadir Puestos </a>
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
@endsection
@endsection
@section('content')

@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert" style="text-align:center;">
        {{ session()->get('message') }}
    </div>
@endif
    @if ($errors->any())
     <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)<!--Esto es por si al introducirlo, he introducido varias cosas mal, pues que me alerte de todas-->
     <li>{{ $error }}</li>
     @endforeach
     </ul>
     </div>
    @endif

       <div class="module">
                        <div class="module-head">
                            <h3>
                                DataTables
                            </h3>
                        </div>


 <form class="form-horizontal row-fluid" action="{{ url('puesto/' . $puesto->id) }}" method="post" > <!--Aqui le especificamos el puesto que va a editar-->
     @csrf
     @method('put')<!--Y cambiamos el metodo 'post' por 'put'-->
	<div class="control-group">
	    <br>
		<label class="control-label" for="basicinput" >Editar Nombre Puesto:</label>
		<div class="controls">
			<input type="text" id="basicinput" name="nombre" value="{{ old('nombre', $puesto->nombre)}}" class="span8" style="margin-left:30px;">
		</div>
		<br>
		<label class="control-label" for="basicinput">Editar Sueldo Minimo:</label>
		<div class="controls">
			<input type="number" step="0.01" id="basicinput" name="minimo" value="{{ old('minimo', $puesto->minimo) }}" class="span8" style="margin-left:30px">
		</div>
		<br>
	    <label class="control-label" for="basicinput">Editar Sueldo Maximo:</label>
		<div class="controls">
			<input type="number" step="0.01" id="basicinput" name="maximo" value="{{ old('maximo', $puesto->maximo) }}" class="span8" style="margin-left:30px">
		</div>
		<br>
		<br>
	    <label class="control-label" for="basicinput"></label>
		<div class="controls">
			<input type="submit" class="btn"  value="Editar" style="margin-left:30px; width:66%">
		</div>
	</div>
</form>
@endsection