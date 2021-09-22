<nav class="top-nav">
  <div class="flex">
    <div class="n6 text-left left">

      <label>Currency</label>
      <select class="from-input" name="currency">
        <option value="USD">USD</option>
        <option value="SGD">SGD</option>
      </select>

      <a href="{{ url('cart') }}" class="icon-label">
        <i class="fas fa-shopping-cart icon"></i>
        <label>Shopping Cart</label>
      </a>

    </div>
    <div class="n6 text-right right">

      <div class="search-block">
        <input type="search" name="search" placeholder="Search flowers, cakes...">
        <i class="fas fa-search icon"></i>
      </div>

      <div class="icon-labels relative">

        <a href="#" class="icon-label">
          <i class="fas fa-truck-moving icon icon-reverse"></i>
          <label>Track Order</label>
        </a>

        <a href="#" class="icon-label">
          <i class="fas fa-phone icon icon-reverse"></i>
          <label>Support</label>
        </a>

        @if( Auth::check() )
        <a href="" id="dropdown1" class="icon-label" target="sublist1">
          <i class="fas fa-user icon"></i>
          <label>Account</label>
        </a>
        <ul class="dropdown-sublist hide" id="sublist1">
          <li>
            @if ( Auth::user()->hasRoles(['Admin', 'Supplier']) )
            <a href="{{ route('dashboard') }}" class="icon-label">Dashboard</a>
            @else
            <a href="{{ url('user/profile') }}" class="icon-label">Profile</a>
            @endif
          </li>
          <li>
            <a href="{{ route('logout') }}" class="icon-label font-dark" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{__('Logout')}}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{csrf_field()}}
            </form>
          </li>
        </ul>
        @else
        <a href="login.php" class="icon-label" id="loginBtn">
          <i class="fas fa-user-plus icon"></i>
          <label>Login In / Register</label>
        </a>
        @endif

      </div>

    </div>
  </div>
</nav>