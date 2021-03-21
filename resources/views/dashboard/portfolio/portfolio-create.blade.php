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
        <div class="row layout-top-spacing p-3">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Create Portfolio</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('dashboard.portfolio.store')}}" method="post" enctype="multipart/form-data">

                            @csrf
                          <div class="row">
                              <div class="col-6"> <div class="form-group mb-4">
                                      <label for="title">Title of Project</label>
                                      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                                             placeholder="Project Title">
                                      <div class="text-danger">
                                          @error('title')
                                          {{$message}}
                                          @enderror
                                      </div>
                                  </div></div>
                              <div class="col-6">     <div>
                                      <label for="tags">Select Category</label>
                                      <select class="form-control  basic" name="services_id">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                          @endforeach
                                      </select>
                                      <div class="text-danger">
                                          @error('services_id')
                                          {{$message}}
                                          @enderror
                                      </div>
                                  </div>
                              </div>
                          </div>

                            <div class="row">

                                <div class="col-6">
                                        <label for="tags">Project Technologies</label>
                                        <select class="form-control tagging" multiple="multiple" name="tags[]">
                                        <option value="{{Arr::has($portfolio->tags,'Laravel')}}">Laravel</option>
                                            <option>Bootstrap</option>
                                            <option>TailwindCss</option>
                                            <option>JavaScript</option>
                                        </select>

                                        <div class="text-danger">
                                            @error('tags')
                                            {{$message}}
                                            @enderror
                                        </div>

                                </div>
                              

                                <div class="col-6">  <div class="form-group mb-4">
                                        <label for="description">Project Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                value="{{$portfolio->description}}"          rows="3">
                                        </textarea>
                                        <div class="text-danger">
                                            @error('description')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div> </div>
                            </div>



                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                               title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input"
                                           accept="image/*">
                                    <input type="hidden" name="image"/>
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                                <div class="text-danger">
                                    @error('image')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-success">
                                    <input type="checkbox" class="new-control-input" name="featured" value="1">
                                    <span class="new-control-indicator"></span>Featured
                                </label>
                                <div class="text-danger">
                                    @error('feature')
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
