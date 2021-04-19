@extends('backend.admin.layouts.master')
@section('title','Cashout')
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">CashOut History Admin</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Merchant</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                </tr>
                            </thead>
                            <tbody id="cashoutTable">
                                @forelse ($cashouts  as $cash)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $cash->created_at }}</td>
                                     <td>{{ $cash->merchant->name }}</td>
                                      <td>{{ $cash->user->name }}</td>
                                       <td>{{ $cash->amount }}</td>
                                       <td>{{ $cash->currency->country }}</td>
                                </tr>
                                @empty
                                <th colspan="5">Empty</th>
                                @endforelse
                            </tbody>
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
    $('.dataTable').DataTable();
</script>
@endpush
