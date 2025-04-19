<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="{{asset('assets/img/cart.png')}}" class="header-logo" /> <span
                class="logo-name">My Shop</span>
            </a>
          </div>
          <hr>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="/dashboard" class="nav-link"><i data-feather="skip-back"></i><span>Change Shop</span></a>
            </li>
            <hr>
            <li class="dropdown">
              <a href="/shophome/{{Auth::user()->shopcode }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <!-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Shops</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="/addshop">Add Shop</a></li>
              <li><a class="nav-link" href="/viewshop">View Shop</a></li>
              </ul>
            </li> -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Category</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="/addcategory">Add Category</a></li>
              <li><a class="nav-link" href="/viewcategory">View Category</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Item</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="/additem">Add Item</a></li>
              <li><a class="nav-link" href="/remitem">Remove Item</a></li>
              <li><a class="nav-link" href="/viewstock">View Item</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>