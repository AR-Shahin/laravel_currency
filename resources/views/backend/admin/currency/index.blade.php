@extends('backend.admin.layouts.master')
@section('title','Currency')
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Manage Currency</h3>
                    <button class="btn btn-primary "  data-toggle="modal" data-target="#exampleModal">Add New Currency</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Currency</th>
                                    <th>Country</th>
                                    <th>Amount</th>
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


 <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Currency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="" id="addCurrencyForm">
                        <div class="form-group">
                            <label for="">Country Name : </label>
                            <input type="text" class="form-control" placeholder="Enter Country Name" id="country">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <label for="">Ammount : </label>
                            <input type="text" class="form-control" placeholder="Enter Ammount" id="ammount">
                            <span id="amntError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-block btn-success" id="addButton">Add New Currency</button>
                        </div>
            </form>
      </div>
    </div>
  </div>
</div>


 <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="updateCurrencyForm">
                        <div class="form-group">
                            <label for="">Country Name : </label>
                            <input type="text" class="form-control" placeholder="Enter Country Name" id="e_country">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <label for="">Ammount : </label>
                            <input type="text" class="form-control" placeholder="Enter Ammount" id="e_ammount">
                            <span id="amntError" class="text-danger"></span>
                            <input type="hidden" id="e_id">
                        </div>
                         <div class="form-group">
                            <button class="btn btn-block btn-success" id="addButton">Update Currency</button>
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
        function getAllCurrency(){
            axios.get("{{ route('get-all-currency') }}")
            .then(function(res){
               // console.log(res);
                table_data_row(res.data);
              $('.dataTable').DataTable();
            })
        }
        getAllCurrency();


        //delete currency
        $('body').on('click','#deleteRow',function (e) {
            e.preventDefault();
             let id = $(this).data('id')
            let url = base_path + '/currency/' + id  
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
                getAllCurrency();
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
        
        
        //store

        $('body').on('submit','#addCurrencyForm',function(e){
        e.preventDefault();
     
        let countryError = $('#nameError')
        let amountError = $('#amntError')
        countryError.text('')
        amountError.text('')
        
        axios.post("{{ route('currency.store') }}", {
            country: $('#country').val(),
            ammount : $('#ammount').val()
        })
        .then(function (response) {
            getAllCurrency();
             $('#country').val('')
             $('#ammount').val('')
             setSwalMessage()
          // console.log(response.data)
          $('.modal').modal('toggle')
           
        })
        .catch(function (error) {
            if(error.response.data.errors.country){
                countryError.text(error.response.data.errors.country[0]);
            }
            if(error.response.data.errors.ammount){
                amountError.text(error.response.data.errors.ammount[0]);
            }
            console.log(error);
        });
    });

    let editCurrencyCard = $('#editCurrencyCard')
    let addCurrencyCard = $('#addCurrencyCard')
    editCurrencyCard.hide()

    //edit
    $('body').on('click','#editRow',function(){
      
        let id = $(this).data('id')
        let url = base_path + '/currency' + '/'  + id + '/edit'
       // console.log(url);
        axios.get(url)
            .then(function(res){
                $('#e_country').val(res.data.country)
                $('#e_ammount').val(res.data.ammount)
                $('#e_id').val(res.data.id)

            })
    })

    //update
    $('body').on('submit','#updateCurrencyForm',function(e){
        e.preventDefault()
        let id = $('#e_id').val()
        let data = {
            id : id,
            country : $('#e_country').val(),
            ammount : $('#e_ammount').val()
        }
        let url = base_path + '/currency' + '/'  + id 

        axios.put(url,data)
        .then(function(res){
            getAllCurrency();
             $('#editModal').modal('toggle')
            setSwalMessage('success','Success','Data Update Successfully!');
           
            //console.log(res);
        })
    })


    </script>
@endpush