@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

{{--@section('title','Creat_Category')--}}
@section('admin_content')
    <div class="app-content content">
        <div class="container-fluid">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-bar-chart"></i>Order</h1>
                    <p>customers orders list</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Placed By</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Items Qty</th>
                                    <th class="text-center">Payment Status</th>
                                    <th class="text-center">Status</th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i
                                            class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($orders) && $orders -> count())
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->user->fullName }}</td>
                                            <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                            <td class="text-center">{{ $order->item_count }}</td>
                                            <td class="text-center">
                                                @if ($order->payment_status == 1)
                                                    <span class="badge badge-success">Completed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Completed</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-success">{{ $order->status }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <a href="{{ route('admin.orders.show', $order->order_number) }}"
                                                       class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                </div>
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
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection
