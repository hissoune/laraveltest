<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ecomerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @yield('products')" aria-current="page" href="{{ route('products.index')}}">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('category')" href="{{ route('category.index')}}">categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('xihaja')" href="#">xi haja</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>