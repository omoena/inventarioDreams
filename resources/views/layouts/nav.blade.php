@section('content')
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">Inventario Dreams</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        
        
        
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->fullname }}</a></li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i>
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('product.index') }}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                </li>
                <!-- MÓDULO ADMIN -->
                @role('admin')
                <li class="active">
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Administración<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @permission('admin_usuarios_read')
                        <li>
                            <a href="{{ route('user.index') }}">Usuarios</a>
                        </li>
                        @endpermission
                        @permission('admin_roles_read')
                        <li>
                            <a href="{{ route('admin.role.index') }}">Roles/Permisos</a>
                        </li>
                        @endpermission
                    </ul>
                </li>
                @endrole
                <!-- MÓDULO BODEGA -->

                <li class="active">
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Bodega<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @permission('bodega_productos_read')
                        <li>
                            <!-- <a href="{{ route('product.create') }}">Productos</a> -->
                            <a href="{{ route('product.show') }}">Productos</a>
                        </li>
                        @endpermission
                        @permission('bodega_disponibles_read')
                        <li>
                            <a href="{{ route('output.index') }}">Disponibles</a>
                        </li>
                        @endpermission
                        @permission('bodega_prestados_read')
                        <li>
                            <a href="{{ route('input.index') }}">Prestados</a>
                        </li>
                        @endpermission
                        @permission('bodega_reportes_read')
                        <li>
                            <a href="{{ route('product.reportever')}}">Reportes</a>
                        </li>
                        @endpermission
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
