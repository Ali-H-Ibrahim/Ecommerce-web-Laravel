<!-- start navbar bottom mobile -->
<nav class="navbar-bottom-mob">

    <div onclick="location.href='{{ route('main_page')}}'">
        <i class='bx bxs-home'></i>
    </div>
    <div onclick="location.href='{{ route('show.shopping.cart')}}'">
        <i class='bx bxs-cart-alt'></i>
    </div>
    <div>
        <i class='bx bxs-gift'></i>
    </div>
    <div onclick="openCategoryNav()">
        <i class='bx bxs-category'></i>
    </div>
    <div onclick="location.href='{{ route('show.wish.list')}}'">
        <i class='bx bxs-heart'></i>
    </div>

</nav>
<!-- end navpar bottom mobile -->


<!-- start side nav -->
<div class="sidenav" id="mySidenav">

    <div class="button-close">
        <i class='bx bx-x' onclick="closeSideNav()"></i>
    </div>

    <div class="profile">
        <div class="img">
            <img   @if( Auth::user() && Auth::user()->image )  src="{{asset(Auth::user()->image)}}"   @else src="{{asset('frontend/images/personProfile.png')}}" @endif   alt=""
            onclick="location.href='{{ route('personal.page')}}'" >
        </div>
        <div class="name">
            @if(Auth::check())
            {{ Auth::user() -> first_name . ' ' . Auth::user() -> last_name }}
            @endif
        </div>
    </div>

    <div class="hr"></div>

    <div class="menu">
        <div class="contain" onclick="location.href='{{ route('main_page')}}'">
            <i class='bx bxs-home'></i>
            Home
        </div>
        <div class="contain"   onclick="location.href='{{ route('show.wish.list')}}'">
            <i class='bx bxs-heart'></i>
            Wish List
        </div>
        <div class="contain" onclick="location.href='{{ route('show.client.services')}}'">

            <i class='bx bxs-truck'></i>
            Customers service
        </div>
        <div class="contain" onclick="location.href='{{ route('show.about.us')}}'">
            <i class='bx bxl-microsoft-teams'></i>
            About us
        </div>
        <div class="contain" onclick="location.href='{{ route('Logout')}}'">
            <i class='bx bxs-log-out' ></i>
            Log Out
        </div>
    </div>

    <div class="hr"></div>

    <a href="#" class="language">

        <div class="select">
            <ul class="default_option">
                <li>
                    <div class="option arabic">
                        <p>Arabic</p>
                    </div>
                </li>
            </ul>
            <ul class="select_ul">
                <li>
                    <div class="option arabic">
                        <p>Arabic</p>
                    </div>
                </li>
                <li>
                    <div class="option english">
                        <p>English</p>
                    </div>
                </li>

            </ul>
        </div>


    </a>

    <a class="mode" onclick="toggleColors()">
        <input class="l" type="checkbox">
        <div class="light">Light Mode </div>
        <div class="dark">Dark Mode </div>
    </a>
</div>
<!-- end side nav -->

<!-- start side search mobile -->
<div class="searchnav" id="mySearchnav">
    <a href="#" class="closebtn" onclick="closeSearchNav()">&times;</a>
    <div class="search-mobile">
        <form action="action_page.php">
            <input type="search" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<!-- end side search mobile -->

<!-- start side category mobile -->
<div class="category-nav">
        <a href="#" class="closebtn" onclick="closeCategoryNav()">&times;</a>
        <div class="title">Categories</div>
        <div class="category-mobile">
            <ul>
            @foreach(getAllCategories() as $Category )
                <li>
                    <input type="checkbox" name="name" id="{{$Category->id}}" />
                    <label for="{{$Category->id}}">{{$Category->name}}</label>
                    
                    <div class="check"></div>

                    <div class="sub-cat">
                        <ul>
                            @foreach($Category->subCategories as $subCategory )
                                <li onclick="window.location=`{{ route('show.products.subCategory',$subCategory->id) }}`; ">{{$subCategory->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
<!-- end side category mobile -->
