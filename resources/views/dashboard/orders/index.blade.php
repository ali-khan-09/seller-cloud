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
                                        <th>Last Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>city</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                    <tr id="row{{$item->id}}">
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->state}}</td>
                                        <td>
                                         @if($item->order_status == 0)
                                            <span class="badge badge-primary">Processing</span>
                                            @php
                                               $disabled = '';
                                            @endphp
                                         @else
                                            <span class="badge badge-success">Processed</span>
                                            @php
                                               $disabled = 'disabled';
                                            @endphp
                                         @endif   
                                        </td>
                                        <td class="text-center">
                                             
                                            <button type="button" class="btn btn-primary mb-2 mr-2 {{$disabled}}" @if($item->order_status == 0)  data-toggle="modal" data-target="#status"@endif
                                            onclick="changeOrderStatus({{$item->id}},{{$item->order_status}})">Status</button>
                                            <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#showOrder"
                                            onclick="showOrder({{$item->id}})">Show</button>
                                           <!--  <button type="button" class="btn btn-danger mb-2 mr-2"
                                            onclick="deleteOrder({{$item->id}})">Del</button> -->

                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>city</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Modal -->
              
        </div>
        <!--  END Table AREA  -->



        <!-- Button to Open the Modal -->
            

            <!-- The Modal -->
            <div class="modal" id="showOrder">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h6 class="modal-title"><div class="alert bg-primary">Distributor Order View</div></h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                   <div class="review-content-section">
                    <div class="row">
                        
                    </div>
                    <!-- <div class="container"> -->
                   <h4>Basic Information</h4>
                    <div class="row" style="background-color: #ffe5e5;margin-left:30px;margin-right: 30px;">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                         <p><b>OrderID</b><br><span id="order_id"></span> </p>
                        </div>
                       </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                         <div class="address-hr biography">
                          <p><b>Name</b><br><span id="name"></span> </p>
                         </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                         <p><b>Phone</b><br><span id="phone"></span>  </p>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                          <p><b>Order Date</b><br><span id="date"></span>  </p>
                        </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                          <p><b>City</b><br><span id="city"></span>  </p>
                        </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                          <p><b>State</b><br><span id="state"></span>  </p>
                        </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                          <p><b>Zip</b><br><span id="zip"></span>  </p>
                        </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="address-hr biography">
                          <p><b>Company</b><br><span id="company"></span>  </p>
                        </div>
                       </div>
                     </div>
                    <div class="row" style="background-color: #ffe5e5;margin-left:30px;margin-right: 30px;">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="address-hr biography">
                                <p><b>Email</b><br><span id="email"></span>  </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="address-hr bi"> <p><b>Address</b><br><span id="address"></span>  </p>
                            </div>
                        </div>  
                    </div><br>

                    <div class="row mg-b-15">
                         <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-12">
                                     <div class="skill-title">
                                         <h4>Products</h4>
                                         <hr>
                                     </div>
                                 </div>
                             </div>
                            <div class="ex-pro">
                                <ul>
                                    <table class="table  table-bordered" >
                                         <thead>
                                             <th>Product Id</th>
                                             <th>Product Name</th>
                                             <th>Quantity</th>
                                             <th>Price</th>
                                             <th>Sub Total</th>
                                             <tbody id="products" >
                                                 
                                             </tbody>
                                         </thead>
                                    </table>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="row mg-b-15">
                       <div class="col-lg-12">
                        <div class="row">
                             <div class="col-lg-12">
                                 <div class="skill-title">
                                     <h4>Comments</h4>
                                     <p id="comments"></p>
                                     <hr>
                                 </div>
                             </div>
                         </div>
                    </div>
                    </div>
                     <div class="row mg-b-15">
                       <div class="col-lg-12">
                        <div class="row">
                             <div class="col-lg-12">
                                 <div class="skill-title">
                                     <h4>Order Status</h4>
                                     <p id="order_status"></p>
                                     <hr>
                                 </div>
                             </div>
                         </div>
                    </div>
                    </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
           </div>
          </div> 
            <!-- The Modal -->
            <div class="modal" id="status">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h6 class="modal-title"><div class="alert bg-primary">Distributor Order Status</div></h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div id="message">
                          
                      </div>
                      <form id="order_form"  method="post">
                            @csrf
                            <div class="row">
                              <div class="col-lg-6">
                                <label>Order Status</label>
                                <select class="form-control" name="status">
                                    <option value="0">Processing</option>
                                    <option value="1">Processed</option>
                                </select>
                                <input type="hidden" name="id" id="o_id">
                                <div><p class="text-danger text-sm">
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>&nbsp;</label>
                                <input type="submit" class="form-control btn btn-primary" name="submit" value="Save Changes" onclick="return confirm('Are you sure? you want to change the status');">
                            </div>
                            </div>
                      </form>     
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                  </div>

                </div>
              </div>
            </div>

@endsection
