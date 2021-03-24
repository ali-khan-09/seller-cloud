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
        <div class=" mt-4">
            <div class="col-lg-10 m-auto col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="p-2">Distributer Registration</h4>
                                <a href="/dashboard/distributers" class="btn btn-primary float-right">Distributer List</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('distributer.register')}}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter distributer name">
                                    <div><p class="text-danger text-sm">
                                         @error('name')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Enter your Last name">
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
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter you E-mail">
                                    <div><p class="text-danger text-sm">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input id="tel-text" type="tel" value="{{ old('phone') }}" name="phone" placeholder="6-(666)-111-7777" class="form-control" >
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
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="address">
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
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City">
                                    <div><p class="text-danger text-sm">
                                            @error('city')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label>State</label>
                                    <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State">
                                    <div><p class="text-danger text-sm">
                                            @error('state')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" placeholder="Zip">
                                    <div><p class="text-danger text-sm">
                                            @error('postal_code')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-4 mt-2">
                                <div class="col-6">
                                    <label>Password</label>
                                    <input id="p-text" type="password" name="password" placeholder="Password" class="form-control" required>
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
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                        <div class="code-section-container">
                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
@endsection