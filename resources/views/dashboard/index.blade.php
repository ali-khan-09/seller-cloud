@extends('dashboard.layouts.app')
@section('title')
    Client Project
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p>{{ \Session::get('message') }}</p>
            </div>
    @endif
            <div id="" class="">
                <div class="layout-px-spacing">
                    <div class="row layout-top-spacing" id="cancel-row" >
                        <div class="m-2">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Total Products</h5>
{{--                                            <p class="inv-balance">{{$totalProducts}}</p>--}}
                                        </div>
                                        <div>
                                            <h4 class="inv-balance text-center text-white">{{$totalProducts}}</h4>
                                        </div>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                            </div>
                                            <a href="javascript:void(0);">View Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Total Admins</h5>
                                            {{--                                            <p class="inv-balance">{{$totalProducts}}</p>--}}
                                        </div>
                                        <div>
                                            <h4 class="inv-balance text-center text-white">{{$totalAdmins}}</h4>
                                        </div>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                            </div>
                                            <a href="javascript:void(0);">View Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Total Distributors</h5>
                                            {{--                                            <p class="inv-balance">{{$totalProducts}}</p>--}}
                                        </div>
                                        <div>
                                            <h4 class="inv-balance text-center text-white">{{$totalDistributors}}</h4>
                                        </div>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                            </div>
                                            <a href="javascript:void(0);">View Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Total Orders</h5>
                                            {{--                                            <p class="inv-balance">{{$totalProducts}}</p>--}}
                                        </div>
                                        <div>
                                            <h4 class="inv-balance text-center text-white">{{$totalProducts}}</h4>
                                        </div>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                            </div>
                                            <a href="javascript:void(0);">View Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row sales layout-top-spacing">

                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-one">
                                <div class="widget-heading">
                                    <h5 class="">Revenue</h5>
                                    <ul class="tabs tab-pills">
                                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                    </ul>
                                </div>

                                <div class="widget-content">
                                    <div class="tabs tab-content">
                                        <div id="content_1" class="tabcontent">
                                            <div id="revenueMonthly"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <h5 class="">Sales by Category</h5>
                                </div>
                                <div class="widget-content">
                                    <div id="chart-2" class=""></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    </div>


@endsection
