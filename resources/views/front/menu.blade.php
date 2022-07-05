    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('dist/img/ecom.png')}}" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/shop')}}">Shop</a>
          </li>




          
          <li class="nav-item">
            <a class="
            nav-link disabled" href="{{url('/contact')}}">Contact Us</a>
          </li>

          <li class="nav-item">
            <a href="{{url('/WishList')}}" class="fa fa fa-star">WishList <span style="color:green; font-weight:bold;">{{App\Models\wishlist::count()}}</span> </a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
            @if(Auth::check())
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item"  href="">{{Auth::user()->name}}</a>
            <a class="dropdown-item"  href="{{url('/logout')}}">Logout</a>
            <a class="dropdown-item"  href="{{url('/')}}/profile">Profile</a>
            @else
            <a class="dropdown-item" href="{{url('/login')}}">Login</a>
           
           @endif

            </div>
            </div>
  
          </li>
          
          
        </ul>
        
        <li class="list-inline-item"><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart">View Cart({{Cart::count()}}) रू({{Cart::total()}})</i> </a></li>

        <!-- Search Product -->
     


        <form action="{{('/search')}}" class="form-inline my-2 my-lg-0" method="post">
          @csrf
          <div class="d-flex justify-content-between align-items-center">
          <input class="form-control mr-sm-2" type="text" name="site_search" placeholder="Search" aria-label="Search" required>
          <input class="form-control mr-sm-2" type="hidden" name="_token" value="{{csrf_token()}}" placeholder="Search" aria-label="Search">
          
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
        </form>
      </div>
</nav>
    </header>