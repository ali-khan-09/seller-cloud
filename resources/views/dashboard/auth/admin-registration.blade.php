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
        <div class="container mt-4">
            <div class="col-lg-10 m-auto col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="p-2">Admin Registration</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Enter your First name">
                                </div>
                                <div class="col-lg-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Enter your Last name">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter you E-mail">
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input id="tel-text" type="tel" name="phone" placeholder="6-(666)-111-7777" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-7">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" placeholder="City">
                                </div>
                                <div class="col-3">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control" placeholder="State">
                                </div>
                                <div class="col-2">
                                    <label>Zip</label>
                                    <input type="text" name="zip" class="form-control" placeholder="Zip">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-6">
                                    <label for="p-text" class="sr-only">Password</label>
                                    <input id="p-text" type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <label for="p-text" class="sr-only">Confirm Password</label>
                                    <input id="p-text" type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>
                            </div>
                            <input type="submit" name="time" class="btn btn-primary">
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
