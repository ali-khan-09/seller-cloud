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
        <!--  BEGIN Table AREA  -->
            <div id="" class="">
                <div class="layout-px-spacing">

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="default-ordering" class="table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Weight</th>
                                            <th>Condition</th>
                                            <th>Cost Price</th>
                                            <th>MSRP price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                       @foreach($products as $items)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$items->product_name}}</td>--}}
{{--                                            <td>{{$items->product_short_desc}}</td>--}}
{{--                                            <td>{{$items->product_weight}}</td>--}}
{{--                                            <td>{{$items->product_condition}}</td>--}}
{{--                                            <td>{{$items->product_cost_price}}</td>--}}
{{--                                            <td>{{$items->product_image}}</td>--}}
{{--                                            <td class="text-center"><button class="btn btn-primary">View</button> </td>--}}
{{--                                        </tr>--}}
{{--                                       @endforeach--}}

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th class="invisible"></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                    </div>
                    <div class="footer-section f-section-2">
                        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                    </div>
                </div>
            </div>
            <!--  END Table AREA  -->
@endsection
