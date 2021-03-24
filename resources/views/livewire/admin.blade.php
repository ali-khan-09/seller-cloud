<div>
    <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg> ... </svg>
                    </button>
                </div>
                <div class="modal-body">
{{--                    <p class="modal-text">Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi. </p>--}}
               <!-- Form Start  -->
    <div id="content" class="main-content">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p>{{ \Session::get('message') }}</p>
            </div>
        @endif
        <div class="mt-4">
            <div class="col-lg-10 m-auto col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="p-2 text-primary">Edit Admin Registration</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @foreach($admin as $item)
                            <form action="{{route('dashboard.admin.update',$item->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="{{ old('first_name',$item->first_name) }}" class="form-control" placeholder="Enter your First name">
                                        <div><p class="text-danger text-sm">
                                                @error('first_name')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="{{ old('last_name' ,$item->last_name) }}" class="form-control" placeholder="Enter your Last name">
                                        <div><p class="text-danger text-sm">
                                                @error('last_name')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{ old('username', $item->username) }}"3 class="form-control" placeholder="Enter Your Username">
                                        <div><p class="text-danger text-sm">
                                                @error('username')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Phone Number</label>
                                        <input id="tel-text" type="tel" value="{{ old('phone' ,$item->phone) }}" name="phone" placeholder="6-(666)-111-7777" class="form-control" required>
                                        <div><p class="text-danger text-sm">
                                                @error('phone')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col-lg-5">
                                        <label>E-mail</label>
                                        <input type="email" name="email" value="{{ old('email',$item->email) }}" class="form-control" placeholder="Enter you E-mail">
                                        <div><p class="text-danger text-sm">
                                                @error('email')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <label>City</label>
                                        <input type="text" name="city" value="{{ old('city',$item->city) }}" class="form-control" placeholder="City">
                                        <div><p class="text-danger text-sm">
                                                @error('city')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col-7">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ old('address' , $item->address) }}" class="form-control" placeholder="address">
                                        <div><p class="text-danger text-sm">
                                                @error('address')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label>State</label>
                                        <input type="text" name="state" value="{{ old('state', $item->state) }}" class="form-control" placeholder="State">
                                        <div><p class="text-danger text-sm">
                                                @error('state')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" value="{{ old('postal_code', $item->postal_code) }}" class="form-control" placeholder="Zip">
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
                                        <input id="p-text" type="password" name="password" value="" placeholder="Password" class="form-control" >
                                        <div><p class="text-danger text-sm">
                                                @error('password')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" class="form-control" >
                                        <div><p class="text-danger text-sm">
                                                @error('password_confirmation')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" id="submit_btn">
                            </form>
                        @endforeach
                        <div class="code-section-container">
                            <button class="btn toggle-code-snippet"><span>Code</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               <!-- Form End  -->
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
