  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="#" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset ('images/icon_avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">@if (Auth::user())
          <a href="#" class="d-block">Hi, {{ Auth::user()->name }}</a>
          @else
          <a href="#" class="d-block">Hi, User</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route ('landing') }}" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>Public Map</p>
            </a>
          </li>
            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              @if (Auth::user())
                <li class="nav-item">
                <a href="{{url ('myaccount')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url ('/logout')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
              @else
               <li class="nav-item">
                <a href="{{url ('login')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign in</p>
                </a>
              </li>
              @endif 
            </ul>
          </li>
          
          <li class="nav-header">PROJECT</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
         <i class="nav-icon fas fa-table"></i>
              <p>
                Project
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('project.form', false) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('project.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Project</p>
                </a>
              </li>
            </ul>
          </li> 
          @can('object-list')
          <li class="nav-header">OBJECT</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
         <i class="nav-icon fas fa-table"></i>
              <p>
                Object
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('object.form', false) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Object</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('object.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Object</p>
                </a>
              </li>
            </ul>
          </li> 
          @endcan

          <li class="nav-header">CONFIGURATION</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
         <i class="nav-icon fas fa-table"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('role-list')
              <li class="nav-item">
                <a href="{{route ('role.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              @endcan
              @can('permission-list')
              <li class="nav-item">
                <a href="{{route ('permission.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>
              @endcan

              <li class="nav-item">
                <a href="{{route ('bulk.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import CSV Public Map</p>
                </a>
              </li>

              @can('role-edit')
              <li class="nav-item">
                <a href="{{route ('configuration.form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>App Config</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
          @can('user-list')
          <li class="nav-header">USER MANAGEMENT</li>
          <li class="nav-item">
            <a href="{{route ('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>List User</p>
            </a>
          </li>
           @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>