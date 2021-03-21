@extends('dashboard.layouts.app')
@section('title')
    Services Create
@endsection
@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @if (\Session::has('message'))
        <div class="alert alert-success">
            <p>{{ \Session::get('message') }}</p>
        </div>
    @endif
        <div class="row layout-top-spacing p-3">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Create Services</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('dashboard.services.store')}}" method="post" >

                            @csrf
                            <div class="form-group mb-4">
                                <label for="title">Service Name</label>
                                <input type="text" class="form-control" id="title" name="name" value="{{old('name')}}"
                                       placeholder="Enter Service Name">
                                <div class="text-danger">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" name="time" class="mt-4 mb-4 btn btn-success">


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--  END CONTENT AREA  -->


@endsection
