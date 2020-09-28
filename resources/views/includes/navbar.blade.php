<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>    
  </ul>

  <!-- SEARCH FORM -->
  @cannot('isAdmin')
  <form class="form-inline ml-3" action="/" method="POST" role="search">
    @csrf
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
@endcannot

  <!-- Right navbar links -->
  @can('isCustomer') 
  <ul class="navbar-nav ml-auto">    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" href="/cart">
        <i class="fa fa-shopping-cart"></i>
        @if (Auth::user()->cartItems->count() > 0)
      <span class="badge badge-warning navbar-badge">{{(Auth::user()->cartItems->count())}}</span> 
        @endif        
      </a>      
    </li>
    <li class="nav-item">      
    </li>
  </ul>
  @endcan
</nav>