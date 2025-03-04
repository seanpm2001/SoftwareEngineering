<div class="header">
    <nav class="navbar">
        <div class="navbar__container">

            <a href="/" id="navbar__logo">Heaven Taste</a>

            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="/" class="navbar__links" id="home-page" style="background: rgba(25,23,27,0.5);
    background: linear-gradient(to right, rgba(51,39,23,0.5), rgba(55,49,49,0.5), rgba(39,32,43,0.5));color: white">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="/about" class="navbar__links" id="about-page">About</a>
                </li>
                <li class="navbar__item">
                    <a href="/menu" class="navbar__links" id="services-page">Menu</a>
                </li>
                <li class="navbar__item">
                    <a href="" class="navbar__links" id="services-page">Orders</a>
                </li>

                @if(session()->has('email'))
                    <li class="navbar__item">
                        @if(session('userRole')=='admin')
                            <form action="users" method="post">
                                @csrf
                                <input type="hidden" name="userID" value="{{session('userID')}}">
                                <button type="submit" title="Customer View: {{session('userName')}}'s Dashboard">
                                    <i class="uil uil-user-circle"></i>
                                </button>
                            </form>
                            <a href="/admin" title="Admin: {{session('userName')}}">
                                <i class="uil uil-user-square"></i>
                            </a>
                        @else
                            <form action="users" method="post">
                                @csrf
                                <input type="hidden" name="userID" value="{{session('userID')}}">
                                <button type="submit" title="User: {{session('userName')}}">
                                    <i class="uil uil-user-circle"></i>
                                </button>
                            </form>
                        @endif
                    </li>
                    <li class="navbar__btn">
                        <a href="/logout" class="button" id="signup">Logout </a>
                    </li>
                @else
                    <li class="navbar__btn">
                        <a href="/login" class="button" id="signup">Login </a>
                    </li>
                    <li class="navbar__btn">
                        <a href="/registration" class="button" id="signup">Sign Up</a>
                    </li>
                @endif
            </ul>

        </div>
    </nav>
</div>
