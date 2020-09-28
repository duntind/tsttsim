<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('assets/dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    
    <div class="info">
      @if (Auth::check())
      <a href="#" class="d-block">Hi, <strong> {{Auth::user()->name}}</strong></a>   
      @else
    <a href="{{Route('login')}}" class="d-block">Hi, <strong> Sign In </strong></a>  
      @endif
    
    </div>
   
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview menu-open">
        <a href="/" class="nav-link active">
          <i class="nav-icon fas fa-shopping-bag"></i>
          <p>
          @can('isAdmin')
            Products
          @else
            Shop
          @endcan   
               
          </p>
        </a>       
      </li>
      @can('isCustomer')
      <li class="nav-header">YOUR ACCOUNT</li>
      <li class="nav-item">
        <a href="/orders" class="nav-link">
          <i class="nav-icon fas fa-cart-arrow-down"></i>
          <p>
            Your Orders
          </p>
        </a>
      </li>
      @endcan
      @if(Auth::check())
      <li class="nav-item">
        <a href="/logout" class="nav-link">
          
          <p>
            Sign Out
          </p>
        </a>
      </li>
      @endif
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>