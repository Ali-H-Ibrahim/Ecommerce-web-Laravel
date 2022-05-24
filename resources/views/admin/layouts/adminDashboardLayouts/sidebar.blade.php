<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('adminDashboard')}}"><i
                        class="la la-mouse-pointer ft-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-dashboard"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الاقسام</span>
                    <span
                        class="badge badge badge-dark badge-pill float-right mr-2">{{App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="act ive"><a class="menu-item" href="{{route('view.category')}}"
                                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('add.category') }}" data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-subscript"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\SubCategory::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.subCategory')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('add.subCategory') }}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-briefcase"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الماركات  </span>
                    <span
                        class="badge badge badge-dark badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.brands')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('add.brand') }}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-camera"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات  </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.products')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('add.product') }}" data-i18n="nav.dash.crypto">أضافة
                            منتج </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-camera"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الطلبات</span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Order::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('show.all.orders')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href=""><i class="la la-save"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> السمات </span>
                    <span
                        class="badge badge badge-dark  badge-pill float-right mr-2">{{App\Models\Attribute::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.attribute')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('add.attribute') }}" data-i18n="nav.dash.crypto">أضافة
                            سمة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-caret-square-o-up"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> العروض </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Coupon::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('show.coupon')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المستخدمون </span>
                    <span
                        class="badge badge badge-dark  badge-pill float-right mr-2">{{App\Models\User::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('show.normal.users')}}"
                           data-i18n="nav.dash.ecommerce"> عرض المستخدمين العاديين </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('show.all.admin') }}" data-i18n="nav.dash.crypto"> عرض كل
                            الادمن
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-gears"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الاعدادات </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href=""><i class="la la-adn"></i>السلايدر </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('add.slider')}}"
                                   data-i18n="nav.dash.ecommerce"> اضافة صور </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('site.settings')}}"><i class="la la-gears"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">إعدادات الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('Chats.admin')}}"><i class="la la-gears"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Chats.admin </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-briefcase"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاستبيانات  </span>
                    <span
                        class="badge badge badge-dark badge-pill float-right mr-2">{{App\Models\Questionnaire::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.questionnaires')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-briefcase"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الشكاوي والمقترحات  </span>
                    <span
                        class="badge badge badge-dark badge-pill float-right mr-2">{{App\Models\Complaint::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('view.complaints')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>

<!--End Sidebare-->
