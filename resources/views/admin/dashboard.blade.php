@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4> عدد المبيعات </h4>
                                            <h6 class="text-muted"></h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h3>{{$num->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد المنتجات</h4>
                                            <h6 class="text-muted"></h6>
                                        </div>
                                        <div class="col-5 text-right">

                                            <h3 class="success darken-4"><i class="la la-arrow-up">{{$product->count()}}</i></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد المستخدمين</h4>
                                            <h6 class="text-muted">مع اسم افضل عميل</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{App\Models\User::count()}}</h4>
                                            <h6 class="danger"> علي ابراهيم<i class="la"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">اخر الطلبيات المباعة</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted"> الاحمالي $6533.56 </p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>اسم العميل</th>
                                            <th><i class="ft-home"> </i> الوجهة</th>
                                            <th>تكلفة الطلب</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($orders) && $orders->count() > 0)

                                            @foreach($orders as $order)
                                                <tr class="bg-success bg-lighten-5">
                                                    <td>{{$order->users->first_name}} {{$order->users->last_name}}</td>
                                                    <td> {{$order->users->address->address}} </td>
                                                    <td>5</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">افضل العملاء هذا الشهر</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total 9065930.43</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>اسم العميل</th>
                                            <th>عدد الطلبات الكلية</th>
                                            <th>تكلفة اجمالي الطلبات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-success bg-lighten-5">
                                            <td>سدره</td>
                                            <td> 10</td>
                                            <td>$ 4762.53</td>
                                        </tr>
                                        <tr>
                                            <td>هدى</td>
                                            <td> 200</td>
                                            <td>$ 4023.34</td>
                                        </tr>

                                        <tr class="bg-danger bg-lighten-5">
                                            <td>سمير</td>
                                            <td> 8</td>
                                            <td>$ 52.99</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Active Order</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <td>
                                        <button class="btn btn-sm round btn-danger btn-glow"><i
                                                class="la la-close font-medium-1"></i> Cancel all
                                        </button>
                                    </td>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>تاريخ الطلب</th>
                                            <th>حالة الطلب</th>
                                            <th>قيمة الطلب</th>
                                            <th>طريقة الدفع</th>
                                            <th>Cancel</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($pendingOrders) && $pendingOrders->count() > 0)

                                            @foreach($pendingOrders as $pendingOrder)
                                                <tr>
                                                    <td>{{ $pendingOrder -> created_at }}</td>
                                                    <td class="success">{{ $pendingOrder -> status }}</td>
                                                    <td><i class="cc"></i> ${{ $pendingOrder -> grand_total }}
                                                    </td>
                                                    <td><i class="cc "></i>{{ $pendingOrder -> payment_method }}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm round btn-outline-danger"> Cancel
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div><!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
