@php use Illuminate\Support\Facades\Storage; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$category->category_name}}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/home_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
</head>
<body style="background-color: rgba(107,162,146,0.1)">
<div class="header">
    <nav>
        <nav class="navbar">

            <div class="navbar__container">
                <a href="/" id="navbar__logo">Heaven Tastes</a>
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
                        <a href="/about.html" class="navbar__links" style=" " id="about-page">About</a>
                    </li>
                    <li class="navbar__item">
                        <a href="#services" class="navbar__links" id="services-page"
                        >Menu</a
                        >
                    </li>
                    <li class="navbar__item">
                        <a href="#services" class="navbar__links" id="services-page"
                        >Orders</a
                        >
                    </li>
                    <li class="navbar__btn">
                        <a href="/login" class="button" id="signup">Login </a>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
</div>
<div class="top__container">
    <div class="row">
        <div class="col-2">
            <h1 style="font-weight: normal;font-size: 60px;color: #ff7720">{{$category->category_name}}</h1>
            <p class="my-6 py-6">
                {{$category->description}}
            </p>
            <div class="m-6">
                <a class="menu-btn" href="#menu"> View Menu</a>

                <a class="order-btn"> Make an order</a>
            </div>

        </div>
        <div class="col-2">
            <img src="{{ Storage::url($category->image) }}" class="m-6"
                 style="border-radius: 9999px;width: 600px;height: 600px;object-fit: fill">
        </div>

    </div>

    <div id="menu" style="border-top: solid 2px rgba(0,0,0,0.05)">
        {{--        <h1 style="font-weight: normal;font-size: 60px;color: #ff7720;text-align: center">Menu</h1>--}}
        <div class="row">
            @foreach($menus as $menu)
                <div class="col-4">
                    <img src="{{Storage::url($menu->image)}}">
                    <h4 class="col-4-title">{{$menu->name}}</h4>
                    <h4 class="col-4-desc">{{$menu->description}}</h4>

                    <div style="display: flex;justify-content: space-between">
                        <p class="col-4-price">Ksh {{$menu->unit_price}} /=</p>
                        <a class="menu-order-btn"> Order now</a>
                    </div>
                    <p style="color: rgba(0,0,0,0.2);font-size: 13px">{{$menu->subcategory_name}}</p>

                </div>
            @endforeach
        </div>
    </div>
</div>
</div>


</body>
</html>
