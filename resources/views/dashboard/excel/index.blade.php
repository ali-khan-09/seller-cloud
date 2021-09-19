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
                   <div class="col-md-8">
                       <h2>Forget password</h2>
                       <form action="{{route('upload.file')}}" method="post" enctype="multipart/form-data">
                           @csrf
                           <label for="file">FIle:</label>
                           <input type="file" name="file"><br><br>
                           <input type="submit" value="Submit">
                       </form>

                   </div>
                </div>
            </div>

        </div>
    </div>


@endsection
