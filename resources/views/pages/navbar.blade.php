
        <nav class="navbar navbar-inverse" style="border:none;">
		  <div class="container-fluid">
			 <div class="navbar-header">
			 <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
			 
				<a class="navbar-brand" href="/">Laravel Blog</a>
			 </div>
			 
			 <div class="collapse navbar-collapse" id="app-navbar-collapse">
			 <ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? 'active' : "" }}"><a href="{{route('home')}}">Home<span class="sr-only">(current)</span></a></li>
				<li class="{{ Request::is('blog') ? 'active' : "" }}"><a href="{{route('blog')}}">Blog</a></li>
				<li class="{{ Request::is('about') ? 'active' : "" }}"><a href="{{route('about')}}">About</a></li>
				<li class="{{ Request::is('contact') ? 'active' : "" }}"><a href="{{route('contact')}}">Contact</a></li>
			 </ul>
			<!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="{{ Request::is('login') ? 'active' : "" }}"><a href="{{ route('login') }}">Login</a></li>
                            <li class="{{ Request::is('register') ? 'active' : "" }}"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Welcome  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{route('posts.index')}}">Posts</a></li>
                                  <li><a href="{{route('categories.index')}}">Categories</a></li>
                                   <li><a href="{{route('tags.index')}}">Tags</a></li>
                                    <li>  
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
			  </div>
			</div>
   		</nav>
