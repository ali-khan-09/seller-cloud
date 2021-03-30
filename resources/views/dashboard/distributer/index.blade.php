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
                                        <th>First Name</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>state</th>
                                        <th>city</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($distributer as $item)
                                    <tr id="row{{$item->id}}">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->state}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->status}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#edit_modal"
                                            onclick="editDistricbuter({{$item->id}})">Edit</button>
                                            <button type="button" class="btn btn-danger mb-2 mr-2"
                                            onclick="deleteDistributer({{$item->id}})">Del</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>state</th>
                                        <th>city</th>
                                        <th>Status</th>
                                        <th class="invisible"></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Modal -->
                <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                    <div class="col-lg-12 m-auto col-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4 class="p-2">Distributer Edit</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="alert text-danger" id="error"></div>
                                                <form  method="post" id="distributer_form" >
                                                    @csrf
                                                    <input type="hidden" name="d_id" id="d_id">
                                                    <div class="row mb-4">
                                                        <div class="col-lg-6">
                                                            <label>Name</label>
                                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter distributer name" id="name">
                                                            <div><p class="text-danger text-sm">
                                                                 @error('name')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Username</label>
                                                            <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Enter ditributer username" id="username">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('username')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-6">
                                                            <label>E-mail</label>
                                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter you E-mail" id="email">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('email')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>Phone Number</label>
                                                            <input id="tel-text" type="tel" value="{{ old('phone') }}" name="phone" placeholder="6-(666)-111-7777" class="form-control"\ >
                                                            <div><p class="text-danger text-sm">
                                                                    @error('phone')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                          <div class="col-12">
                                                            <label>Address</label>
                                                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="address" id="address">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('address')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-row mb-4">
                                                      <div class="col-7">
                                                            <label>City</label>
                                                            <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City" id="city">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('city')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <label>State</label>
                                                            <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State" id="state">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('state')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <label>Postal Code</label>
                                                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" placeholder="Zip" id="postal_code">
                                                            <div><p class="text-danger text-sm">
                                                                    @error('postal_code')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="form-row mb-4 mt-2">
                                                        <div class="col-6">
                                                            <label>Password</label>
                                                            <input id="p-text" type="password" name="password" placeholder="Password" class="form-control" required >
                                                            <div><p class="text-danger text-sm">
                                                                    @error('password')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>Confirm Password</label>
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" class="form-control" required>
                                                            <div><p class="text-danger text-sm">
                                                                    @error('password_confirmation')
                                                                    {{$message}}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <input type="submit" class="btn btn-primary">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!--  END CONTENT AREA  -->
                            </div>
                          <!--   <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            <div class="footer-wrapper">
                <!-- END Modal -->
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
