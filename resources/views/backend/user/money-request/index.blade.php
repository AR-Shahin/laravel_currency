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
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="moneyRequestTable"></tbody>
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
                           <input type="text" class="form-control" id="requestUserName" readonly>
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
        //initially add button is disable
         $('#addButton').attr('disabled', true);
        //let base_path = window.location.origin
        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {

                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.created_at+'</td>';
                rows = rows + '<td>'+value.user.name+'</td>';
                rows = rows + '<td>'+value.user.email+'</td>';
                rows = rows + '<td>'+value.amount+'</td>';
                rows += '<td>'
                    value.status
                if(value.status == 0) {
                    rows += '<span class="badge badge-warning">Unapproved</span>'
                }else if(value.status == 1){
                    rows += '<span class="badge badge-success">Approved</span>'
                }
                else if(value.status == 2){
                    rows += '<span class="badge badge-danger">Unsufficient</span>'
                }
                rows += '</td>'

                rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                 if(value.status == 0 || value.status == 2 ) {
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                }
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#moneyRequestTable").html(rows);
    }

    //get-all-money-request
    function getAllMoneyRequest(){
        axios.get("{{ route('user.get-all-money-request') }}")
        .then((res) => {
            table_data_row(res.data)
           // console.log(res.data);
             $('.dataTable').DataTable();
        })
    }
    getAllMoneyRequest()
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
                $('#requestUserName').val(response.data.name)
                $('#addButton').attr('disabled', false);
            }
            console.log(response);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    })
//request form submit
    $('body').on('submit','#addMoneyRequestForm',function(e){
        e.preventDefault();
        $('#amntError').text('');
        $('#passwordError').text('');
        $('#requestUserName').val('')
        let data = {
            user_id : $('#user_id').val(),
            amount : $('#ammount').val(),
            password : $('#password').val()
        }
        axios.post("{{ route('user.money-request') }}",data)
        .then(function(res){
            if(res.data.flag === 'INCORRECT_PASSWORD'){
                setSwalMessage(mode = 'error', title = 'Error', text = 'Invalid Password!')
            }
            if(res.data.flag === 'INSERTED'){
                getAllMoneyRequest();
                setSwalMessage(mode = 'success', title = 'success', text = 'Request Send Successfully!');
                $('#email').val('')
                $('#ammount').val('')
                $('#password').val('')
                $('#emailSuccess').text('')
                $('.modal').modal('toggle')
            }
          //  console.log(res);
        })
        .catch(function(error){
            if(error.response.data.errors.amount){
                $('#amntError').text(error.response.data.errors.amount[0]);
            }
            else if(error.response.data.errors.password){
                $('#passwordError').text(error.response.data.errors.password[0]);
            }
        })
    })


    //delete request
     $('body').on('click','#deleteRow',function (e) {
            e.preventDefault();
             let id = $(this).data('id')
             let url =  main_path + '/user/delete-money-request' + '/' + id
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

              axios.delete(url).then(function(r){
                getAllMoneyRequest();
                 swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
            });
            } else if (
                    /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        })
        });
    </script>
@endpush
