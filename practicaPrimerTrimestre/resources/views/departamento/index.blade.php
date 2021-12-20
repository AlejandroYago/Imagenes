@extends('admin.base')


@section('contentnavbar')


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Borrar Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ¿Esta seguro que desea borrar <span class="name"></span>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="form" action="" method="post">
                          @method('delete')
                          @csrf
                     <input type="submit" class="btn btn-primary" value="Borrar departamento"/>
                  </div>
                </div>
              </div>
            </div>



<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="{{url('departamento')}}">Departamento </a>
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
            <li><a href="{{url('departamento')}}"><i class="menu-icon icon-bullhorn"></i>Tabla Departamentos </a>
            </li>
            <li><a href="{{url('departamento/create')}}"><i class="menu-icon icon-bullhorn"></i>Añadir Departamentos </a>
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



       <div class="module">
                        <div class="module-head">
                            <h3>
                                DataTables
                            </h3>
                        </div>
<div class="module-body table">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
        width="100%">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Localizacion
                </th>
                <th>
                    IdempleadoJefe
                </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($departamentos as $departamento)
            <tr class="odd gradeX">
                <td>
                    {{ $departamento->nombre }}
                </td>
                <td class="center">
                    {{ $departamento->localizacion }}
                </td>
                <td class="center">
                    {{ $departamento->idempleadojefe }}
                </td>
                <td class="center" style="border:0px">
                    <a href="{{ url('departamento/' .$departamento->id .'/edit') }}">Editar</a>
                </td>
                <td class="center" style="border:0px">
                    <a href="{{ url('departamento/' .$departamento->id) }}">Mostrar</a>
                </td>
                <td class="center" style="border:0px">
                    <a href="#" data-name="{{ $departamento->nombre }}" data-url="{{ url('departamento/' . $departamento['id']) }}" data-toggle="modal" onclick="deleteElement({{$departamento->id}}, '{{$departamento->nombre}}','departamento')" data-target="#modalDelete">Borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection

@section('js')

<script src="{{ url('assets/js/borrarDepartamento.js') }}"></script>

@endsection