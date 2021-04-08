@extends('backend.user.layouts.master')
@section('title','Money Request')
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Manage Money Request</h3>
                    <button class="btn btn-secondary "  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Make a Request</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="currencyTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


 <div class="modal fade" id="addModal"  role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make a Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="" id="addMoneyRequestForm" autocomplete="false">
                        <div class="form-group">
                            <label for="">User : </label>
                            <select name="user" id="user" class="form-control">
                                <option value="">Select a User</option>
                                <option value="">Normal User</option>
                                <option value="">Marchent</option>
                            </select>
                            <span id="nameError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <label for="">Email : </label>
                            <input type="text" class="form-control" placeholder="Enter email" id="email">
                            <span id="emailError" class="text-danger"></span>
                            <span id="emailSuccess" class="text-success"></span>
                        </div>
                         <div class="row">
                             <div class="col-12 col-md-6">
                                 <div class="form-group">
                                    <label for="">Ammount : </label>
                                    <input type="text" class="form-control" placeholder="Enter Ammount" id="ammount">
                                    <span id="amntError" class="text-danger"></span>
                                </div>
                             </div>
                             <input type="hidden" id="user_id">
                             <div class="col-12 col-md-6">
                                     <div class="form-group">
                                    <label for="">Password : </label>
                                    <input type="password" class="form-control" placeholder="Enter Password" id="password">
                                    <span id="passwordError" class="text-danger"></span>
                                </div>
                             </div>
                         </div>
                         <div class="form-group">
                            <button class="btn btn-block btn-success" id="addButton">Post Request</button>
                        </div>
            </form>
      </div>
    </div>
  </div>
</div>

@stop

@push('script')
<script src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        //let base_path = window.location.origin
        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                value.id
                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>USD</td>';
                rows = rows + '<td>'+value.country+'</td>';
                rows = rows + '<td>'+value.ammount+'</td>';
                rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#currencyTable").html(rows);
    }
 $('#addButton').attr('disabled', true);
    //check email valid or not
    $('body').on('blur','#email',function(){
        let email = $(this).val();
        let url =  main_path + '/user/check-email' + '/' + email
        if(!email){
            return;
        }
      axios.get(url)
        .then(function (response) {
            // handle success
            if(response.data.flag === 'not_available'){
                $('#emailError').text('Invalid Email!')
                $('#emailSuccess').text('')
                $('#user_id').val('')
                 $('#addButton').attr('disabled', true);
            }else if(response.data.user_id){
                $('#emailError').text('')
                $('#emailSuccess').text('Valid Email')
                $('#user_id').val(response.data.user_id)
                 $('#addButton').attr('disabled', false);
            }
          //  console.log(response);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    })
//request form submit
    $('body').on('submit','#addMoneyRequestForm',function(e){
        e.preventDefault();
        let data = {
            user_id : $('#user_id').val(),
            amount : $('#ammount').val(),
            password : $('#password').val()
        }
    })
    </script>
@endpush
