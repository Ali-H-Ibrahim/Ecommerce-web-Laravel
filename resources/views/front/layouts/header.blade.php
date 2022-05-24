<!-- start header Lab -->
<section class="header-laptop">

    <div class="container-header row">

        <div class="logo col-md-2">

            <i class='bx bx-menu' onclick="openSideNav()"></i>
            <a href="#" class="backTop"> <img src="{{asset('frontend/images/new logo light.jpg')}}" alt=""></a>
        </div>

        <div class="categories col-md-4">

            @foreach(getAllCategories() as $Category )
                <div class="dropdown">
                    <button class="btn-default " type="button" data-toggle="dropdown">
                        {{$Category->name}}<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($Category->subCategories as $subCategory )
                            <li><a tabindex="-1"
                                   href="{{ route('show.products.subCategory',$subCategory->id)}}">{{$subCategory->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            @endforeach

        </div>

        <div class="search col-md-3">
            <input type="search" placeholder="Search" class="SearchValue">
            <i class='bx bx-search search-field' id="search-icon"></i>
        </div>


        <div class="icons col-md-3">
            @auth('web')
                <div class="sub-icons">
                    <div class="person dropdown">
                        <button class="btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            <img @if( Auth::user()->image )  src="{{asset(Auth::user()->image)}}"
                                 @else src="{{asset('frontend/images/personal img.jpg')}}" @endif  alt=""
                                 title="Hello {{Auth::user()->name}}">
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('personal.page')}}">My
                                    Account</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('settings')}}">Settings</a>
                            </li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('Logout')}}">Log
                                    Out</a></li>
                        </ul>
                    </div>
                </div>
            @endauth

            <div class="sub-icons" onclick="window.location=`{{ route('show.wish.list') }}`; ">
                <i class='bx bxs-heart'></i>
            </div>

            <div class="sub-icons" onclick="window.location=`{{ route('show.shopping.cart') }}`; ">
                <i class='bx bxs-cart'></i>
            </div>
            @auth('web')
                <div class="sub-icons notifications">
                    <div class="icon_wrap note">
                        <i class='bx bxs-bell'></i>
                        <span
                            class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow count_new">
                            @if(getNotificationsNew()->count() > 0) {{ getNotificationsNew()->count() }} @endif
                        </span>
                    </div>

                    <div class="notification_dd">

                        <ul class="notification_ul coten_not">

                            @foreach(getNotifications() as $not)
                                {!!  $not->messages !!}
                            @endforeach


                            <li class="show_all">
                                <p class="link">Show All Activities</p>


                            </li>
                            <li>
                                <p class="lead"> new</p>
                            </li>
                        </ul>
                    </div>


                </div>


                <div class="popup" id="popup-id">
                    <div class="shadow"></div>
                    <div class="inner_popup">
                        <div class="notification_dd">
                            <ul class="notification_ul">
                                <li class="title">
                                    <p>All Notifications</p>
                                    <p class="close"><i class="bx bx-x" aria-hidden="true"></i></p>
                                </li>
                                @foreach(getNotificationsall() as $not)
                                    {!!  $not->messages !!}
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            @endauth

        </div>


    </div>


</section>
<!-- end header Lab -->


<!-- start header mobile -->
<div class="topnav">
    <i class='bx bx-menu' onclick="openSideNav()"></i>
    <img src="{{asset('frontend/images/new logo light.jpg')}}" class="backTop">

    <div class="button search-m" onclick="openSearchNav()">
        <i class="bx bx-search"></i>
    </div>

    <!-- <button class="category">
        <i class='bx bxs-bell'></i>
    </button> -->

    @auth('web')
        <div class="button notifications">
            <div class="icon_wrap note">
                <i class='bx bxs-bell'></i>
                <span
                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow count_new">@if(getNotificationsNew()->count()>0) {{getNotificationsNew()->count()}}@endif</span>
            </div>

            <div class="notification_dd">

                <ul class="notification_ul coten_not">

                    @foreach(getNotifications() as $not)
                        {!!  $not->messages !!}
                    @endforeach


                    <li class="show_all">
                        <p class="link">Show All Activities</p>
                    </li>
                    <li>
                        <p class="lead"> new</p>
                    </li>
                </ul>
            </div>

        </div>


        <div class="popup" id="popup-id">
            <div class="shadow"></div>
            <div class="inner_popup">
                <div class="notification_dd">
                    <ul class="notification_ul">
                        <li class="title">
                            <p>All Notifications</p>
                            <p class="close"><i class="bx bx-x" aria-hidden="true"></i></p>
                        </li>
                        @foreach(getNotificationsall() as $not)
                            {!!  $not->messages !!}
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endauth

</div>
<!-- end header mobile -->

