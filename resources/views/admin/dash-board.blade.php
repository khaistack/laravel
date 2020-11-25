@extends('layouts.home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head d-flex mb-3 align-items-start">
                <div class="mr-auto d-none d-lg-block">
                    <h2 class="text-black font-w600 mb-0">Dashboard</h2>
                    <p class="mb-0">Chào mừng cậu chủ {{ Auth::user()->name }}!</p>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="mr-3 bgl-primary text-primary">
                                        {!! $item['icon'] !!}
                                    </span>
                                    <div class="media-body">
                                        <h3 class="mb-0 text-black">
                                            @if ($item['title'] == 'TotalRevenue')
                                                <span class="counter ml-0"> {!! number_format($item['total'])!!} vnđ </span>
                                            @else
                                                <span class="counter ml-0"> {!! $item['total'] !!} </span>
                                            @endif
                                        </h3>
                                        <p class="mb-0">{!! $item['title'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0 d-sm-flex d-block">
                            <div>
                                <h4 class="card-title mb-1">Orders Mới nhất Thống Kê</h4>
                            </div>
                            <div class="card-action card-tabs mt-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="OrdersMonthly" href="javascript:;" role="tab">
                                            Monthly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="OrdersToday" href="javascript:;" role="tab">
                                            Today
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body orders-summary" id="orders-summary">
                            @foreach ($orderToday as $item)
                                <div class="d-flex order-manage p-3 align-items-center mb-4">
                                    <a href="javascript:void(0);" class="btn fs-22 py-1 btn-success px-4 mr-3">{!!
                                        $item['dataCount'] !!}</a>
                                    <h4 class="mb-0">New Orders <i class="fa fa-circle text-success ml-1 fs-15"></i></h4>
                                    <a href="admin/orders/showListOrders"
                                        class="ml-auto text-primary font-w500">Quản Lí orders <i
                                            class="ti-angle-right ml-1"></i></a>
                                  </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0 d-sm-flex d-block">
                            <div>
                                <h4 class="card-title mb-1">Doanh Thu</h4>
                            </div>
                            <div class="dropdown mt-3 mt-sm-0">
                                <button type="button" class="btn btn-primary dropdown-toggle light fs-14"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Weekly
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id='daily' href="javascript:;">Daily</a>
                                    <a class="dropdown-item" id="test1" href="#">Weekly</a>
                                    <a class="dropdown-item" href="#">Monthly</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body revenue-chart px-3">
                            <div class="d-flex align-items-end pr-3 pull-right revenue-chart-bar">
                                <div class="d-flex align-items-end mr-4">
                                    <img src="images/svg/ic_stat2.svg" height="22" width="22" class="mr-2 mb-1" alt="" />
                                    <div>
                                        <small class="text-dark fs-14">Thu Nhập</small>
                                        <h3 class="font-w600 mb-0">$<span class="counter">41,512</span>k</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <img src="images/svg/ic_stat1.svg" height="22" width="22" class="mr-2 mb-1" alt="" />
                                    <div>
                                        <small class="text-dark fs-14">Lợi Nhuận</small>
                                        <h3 class="font-w600 mb-0">$<span class="counter">41,512</span>k</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="chartBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
