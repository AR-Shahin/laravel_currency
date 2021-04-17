@extends('backend.user.layouts.master')
@section('title','Receive Requests')
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Receive Money Requests</h3>
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
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="receiveMoneyRequestTable"></tbody>
                        </table>
                    </div>
                </div>
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

                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.created_at+'</td>';
                rows = rows + '<td>'+value.auth_user.name+'</td>';
                rows = rows + '<td>'+value.auth_user.email+'</td>';
                rows = rows + '<td>'+value.amount+'</td>';
                  rows = rows + '<td>'+value.currency.country+'</td>';
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
                 if(value.status == 0 ) {
                rows = rows + '<a class="btn btn-sm btn-success text-light"  id="approveRow" data-id="'+value.id+'" >Approve</a> ';
                }
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#receiveMoneyRequestTable").html(rows);
    }

    //get-all-money-request
    function getAllReceiveMoneyRequest(){
        axios.get("{{ route('user.receive-all-money-request') }}")
        .then((res) => {
            table_data_row(res.data)
           // console.log(res.data);
             $('.dataTable').DataTable();
        })
    }
    getAllReceiveMoneyRequest()

    //approveRow request
     $('body').on('click','#approveRow',function (e) {
            e.preventDefault();
             let id = $(this).data('id')
             let url =  main_path + '/user/approve-money-request' + '/' + id
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

              axios.put(url).then(function(res){
                  if(res.data.flag === 'INSUFFICIENT_BALANCE'){
                    setSwalMessage('error','Error','Insufficiant Balance!!');
                  }else if(res.data.flag ==='APPROVED_REQUEST'){
                   setSwalMessage('success','Approved','Money Transfered Successfully!!');
                }
                getAllReceiveMoneyRequest();
                console.log(res.data);
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
