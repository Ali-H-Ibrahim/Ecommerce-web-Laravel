@extends('front.layouts.front_layouts')

@section('front_content')

    <!-- start order page laptop -->
    <div class="order-page">
        <div class="container-order-page">

            <table class="table1">
                <tr>
                    <td class="td1">
                        <div class="types">
                            <div class="title-page">Order</div>
                            <div class="order all-order active" onclick="openOrderAll()">All Orders</div>
                            <div class="order recived-order" onclick="openOrderReceived()">Delivered Orders</div>
                            <div class="order shipping-order" onclick="openOrderShipping()">Pending Orders</div>
                            <div class="order return-order" onclick="openOrderReturn()">Cancelled Orders</div>
                        </div>
                    </td>

                    <td class="td2">
                        <table class="table2">
                            <tr class="title-table">
                                <td>
                                    <div class="contain">
                                        <table>
                                            <tr>
                                                <td>Number</td>
                                                <td>Address</td>
                                                <td>Total Price</td>
                                                <td>Delivery Date</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr class="tables">
                                <td>
                                    <div class="contain">
                                        <table class="table-orders-all">
                                            @if( isset($orders) && $orders -> count() > 0)
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order -> order_number}}</td>
                                                        <td>{{$order -> address}}</td>
                                                        <td>{{$order -> grand_total}}</td>
                                                        <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                                        <td @if($order->status == "completed") style="color: green;" @elseif($order->status == "pending") style="color: orange;"  @elseif($order->status == "decline") style="color: red;" @endif> {{ $order->status }}</td>
                                                        <td><i class='bx bxs-cog'></i></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>

                                        <table class="table-orders-received">
                                            @if( isset($orders) && $orders -> count() > 0)
                                                @foreach($orders as $order)
                                                    @if($order->status == "completed")
                                                        <tr>
                                                            <td>{{$order -> order_number}}</td>
                                                            <td>{{$order -> address}}</td>
                                                            <td>{{$order -> grand_total}}</td>
                                                            <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                                            <td style="color: green;">{{ $order->status }}</td>
                                                            <td><i class='bx bxs-cog'></i></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </table>
                                            
                                        <table class="table-orders-shipping">
                                            @if( isset($orders) && $orders -> count() > 0)
                                                @foreach($orders as $order)
                                                    @if($order->status == "pending")
                                                        <tr>
                                                            <td>{{$order -> order_number}}</td>
                                                            <td>{{$order -> address}}</td>
                                                            <td>{{$order -> grand_total}}</td>
                                                            <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                                            <td style="color: orange;">{{ $order->status }}</td>
                                                            <td><i class='bx bxs-cog'></i></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </table>

                                        <table class="table-orders-return">
                                            @if( isset($orders) && $orders -> count() > 0)
                                                @foreach($orders as $order)
                                                    @if($order->status == "decline")
                                                        <tr>
                                                            <td>{{$order -> order_number}}</td>
                                                            <td>{{$order -> address}}</td>
                                                            <td>{{$order -> grand_total}}</td>
                                                            <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                                            <td style="color: red;">{{ $order->status }}</td>
                                                            <td><i class='bx bxs-cog'></i></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- end order page laptop -->


    <!-- start order page mobile -->
    <div class="order-page-mobile">
        <div class="container-order-page-mobile">

            <div class="top-order-page">
                <img src="{{ asset('frontend/images/background order mob 1.jpg')}}" alt="">
            </div>
            <div class="title-page-mobile">Orders</div>


            <div class="type-order all-order" onclick="openOrderAllMobile()">
                All Orders
                <div class="open-close-order-all">
                    <span class="open-order-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>

                    <span class="close-order-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                </div>
            </div>
            <table class="table-mobile-orders-all">
                <tr class="title-table">
                    <td>Number</td>
                    <td>Address</td>
                    <td>Total Price</td>
                    <td>Delivery Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                @if( isset($orders) && $orders -> count() > 0)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order -> order_number}}</td>
                            <td>{{$order -> address}}</td>
                            <td>{{$order -> grand_total}}</td>
                            <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                            <td @if($order->status == "completed") style="color: green;" @elseif($order->status == "pending") style="color: orange;"  @elseif($order->status == "decline") style="color: red;" @endif> {{ $order->status }}</td>
                            <td><i class='bx bxs-cog'></i></td>
                        </tr>
                    @endforeach
                @endif
            </table>


            <div class="type-order recived-order" onclick="openOrderReceivedMobile()">
                Delivered Orders
                <div class="open-close-recived-order">
                    <span class="open-recived-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>

                    <span class="close-recived-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                </div>
            </div>
            <table class="table-mobile-orders-received">
                <tr class="title-table">
                    <td>Number</td>
                    <td>Address</td>
                    <td>Total Price</td>
                    <td>Delivery Date</td>
                    <td>Status</td>
                    <td>Action</td>                
                </tr>
                @if( isset($orders) && $orders -> count() > 0)
                    @foreach($orders as $order)
                        @if($order->status == "completed")
                            <tr>
                                <td>{{$order -> order_number}}</td>
                                <td>{{$order -> address}}</td>
                                <td>{{$order -> grand_total}}</td>
                                <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                <td style="color: green;">{{ $order->status }}</td>
                                <td><i class='bx bxs-cog'></i></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </table>

            <div class="type-order shipping-order" onclick="openOrderShippingMobile()">
                Pending Orders
                <div class="open-close-shipping-order">
                    <span class="open-shipping-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>

                    <span class="close-shipping-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                </div>
            </div>
            <table class="table-mobile-orders-shipping">
                <tr class="title-table">
                    <td>Number</td>
                    <td>Address</td>
                    <td>Total Price</td>
                    <td>Delivery Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                @if( isset($orders) && $orders -> count() > 0)
                    @foreach($orders as $order)
                        @if($order->status == "pending")
                            <tr>
                                <td>{{$order -> order_number}}</td>
                                <td>{{$order -> address}}</td>
                                <td>{{$order -> grand_total}}</td>
                                <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                <td style="color: orange;">{{ $order->status }}</td>
                                <td><i class='bx bxs-cog'></i></td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                
            </table>

            <div class="type-order return-order" onclick="openOrderReturnMobile()">
                Cancelled Orders
                <div class="open-close-return-order">
                    <span class="open-return-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>

                    <span class="close-return-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                             class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                </div>
            </div>
            <table class="table-mobile-orders-return">
                <tr class="title-table">
                    <td>Number</td>
                    <td>Address</td>
                    <td>Total Price</td>
                    <td>Delivery Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                @if( isset($orders) && $orders -> count() > 0)
                    @foreach($orders as $order)
                        @if($order->status == "decline")
                            <tr>
                                <td>{{$order -> order_number}}</td>
                                <td>{{$order -> address}}</td>
                                <td>{{$order -> grand_total}}</td>
                                <td>{{ Carbon\Carbon::parse($order -> required_date)->toFormattedDateString() }}</td>
                                <td style="color: red;">{{ $order->status }}</td>
                                <td><i class='bx bxs-cog'></i></td>
                            </tr>
                        @endif
                    @endforeach
                @endif  
            </table>
        </div>
    </div>
    <!-- end order page mobile -->

@endsection
