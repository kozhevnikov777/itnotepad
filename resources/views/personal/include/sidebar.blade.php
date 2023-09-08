  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->
      <div class="pt-2 form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('personal.main.main') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Главная
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('personal.post.main') }}" class="nav-link">
            <i class="nav-icon far fa-clipboard"></i>
            <p>
              Мои заявки
            </p>
          </a>
        </li>
        <!--
        <li class="nav-item">
          <a href="{{ route('personal.liked.main') }}" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Уведомления
            </p>
          </a>
        </li>
        -->
        <li class="nav-item">
          <a href="{{ route('personal.comment.main') }}" class="nav-link">
            <i class="nav-icon far fa-comment"></i>
            <p>
              Комментарии
            </p>
          </a>
        </li>
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
