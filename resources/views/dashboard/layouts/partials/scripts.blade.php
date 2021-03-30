
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('dashboard_assets/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('dashboard_assets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard_assets/assets/js/app.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('dashboard_assets/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('dashboard_assets/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/sweetalerts/promise-polyfill.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/table/datatable/datatables.js')}}"></script>
<!-- TABLES JS FILES -->
<script src="{{asset('dashboard_assets/plugins/table/datatable/datatables.js')}}"></script>

<script>
    $(document).ready(function() {
        App.init();
        $(".tagging").select2({
            tags: true
        });
        //File upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //sweet Alert
        $('.widget-content .message').on('click', function () {
            swal({
                title: 'Saved succesfully',
                padding: '2em'
            })
        })

        window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('simple-example');
        }, false);
// select dropdown
        var ss = $(".basic").select2({
            tags: true,
        });

    });
</script>
<!-- Table js -->
<script>
    // var e;
    c3 = $('#style-3').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c3);

    $('#default-ordering').DataTable( {
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "order": [[ 3, "desc" ]],
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
    } );
  function editDistricbuter(id) {
        $.ajax({
            url:'distributer-edit',
            type:'get',
            data: {distributer:id,_token: '{{csrf_token()}}' },
            success:function(data){
                console.log(data);
                $("#name").val(data.name);
                $("#username").val(data.username);
                $("#address").val(data.address);
                $("#city").val(data.city);
                $("#tel-text").val(data.phone);
                $("#email").val(data.email);
                $("#username").val(data.username);
                $("#state").val(data.state);
                $("#d_id").val(data.id);
                $("#postal_code").val(data.postal_code);
            },
            error:function(response){
                alert('Error Occured');
            }
        });
    }
  $('#distributer_form').click(function(e){
     e.preventDefault();
     var tr = '';
     $.ajax({
            url:'distributer-update',
            type:'post',
            data: $(this).serialize(),
            success:function(data){
                console.log(data.success.name);
                tr += '<td>'+data.success.name+'</td>';
                tr += '<td>'+data.success.username+'</td>';
                tr += '<td>'+data.success.email+'</td>';
                tr += '<td>'+data.success.phone+'</td>';
                tr += '<td>'+data.success.state+'</td>';
                tr += '<td>'+data.success.city+'</td>';
                tr += '<td>'+data.success.status+'</td>';
                tr += '<td><button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#edit_modal" onclick="editDistricbuter('+data.success.id+')">Edit</button> <button type="button" class="btn btn-danger mb-2 mr-2"  onclick="deleteDistributer('+data.success.id+')">Del</button> </td>';
                $('#row'+data.success.id).html(tr);
                $('#edit_modal').modal('toggle');

            },
            error:function(response){
                var error = response.responseJSON.errors;
                var response2 = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each( response2.errors, function( key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>'
                $('#error').html(errorString);
            }
        });
  });
    function deleteDistributer(id) {
     var conf =  confirm("Do you really want to delete this distributer?");
     if(conf == true)
      {
        $.ajax({
            url:'distributer-delete',
            type:'post',
            data: {id:id,_token: '{{csrf_token()}}' },
            success:function(data){
                console.log(data);
                alert(data.success);
                $("#row"+id).fadeOut();
            },
            error:function(response){
                alert('Error Occured');
            }
        });
      }
    }
  // ADMIN AJAX FUNCTIONALITY
    function adminEdit(id) {
        $.ajax({
            url:'admin/edit',
            type:'get',
            data: {id:id,_token: '{{csrf_token()}}' },
            success:function(data){
                console.log(data);
                $("#first_name").val(data.first_name);
                $("#last_name").val(data.last_name);
                $("#username").val(data.username);
                $("#email").val(data.email);
                $("#city").val(data.city);
                $("#phone").val(data.phone);
                $("#address").val(data.address);
                $("#username").val(data.username);
                $("#state").val(data.state);
                $("#admin_id").val(data.id);
                $("#postal_code").val(data.postal_code);
            },
            error:function(response){
                alert('Error Occured');
            }
        })
    }
    $("#admin_form").click(function(e){
        e.preventDefault()
        var tr = '';
        $.ajax({
            url:'admin-update',
            type:'post',
            data: $(this).serialize(),
            success:function(data){
                console.log(data)
                tr += '<td>'+data.success.first_name+'</td>';
                tr += '<td>'+data.success.last_name+'</td>';
                tr += '<td>'+data.success.username+'</td>';
                tr += '<td>'+data.success.email+'</td>';
                tr += '<td>'+data.success.phone+'</td>';
                tr += '<td>'+data.success.state+'</td>';
                tr += '<td>'+data.success.city+'</td>';
                tr += '<td>'+data.success.status+'</td>';
                tr += '<td><button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#edit_modal" onclick="editDistricbuter('+data.success.id+')">Edit</button> <button type="button" class="btn btn-danger mb-2 mr-2"  onclick="deleteDistributer('+data.success.id+')">Del</button> </td>';
                $('#row'+data.success.id).html(tr);
                // $('#edit_modal').modal('toggle');

            },
            error:function(response){
                var error = response.responseJSON.errors;
                var response2 = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each( response2.errors, function( key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>'
                $('#error').html(errorString);
            }
        });
    })
    function delete_admin(id) {
        var conf =  confirm("Do you really want to delete this distributer?");
        if(conf == true)
        {
            $.ajax({
                url:'admin-delete',
                type:'post',
                data: {id:id,_token: '{{csrf_token()}}' },
                success:function(data){
                    console.log(data);
                    alert(data.success);
                    $("#row"+id).fadeOut();
                },
                error:function(response){
                    alert('Error Occured');
                }
            });
        }
    }
</script>

<!-- Table js end-->
