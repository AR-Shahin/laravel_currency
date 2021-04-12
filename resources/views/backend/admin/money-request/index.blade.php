@extends('backend.admin.layouts.master')
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
                    <h3 class="card-title">All Money Request</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="currencyTable">
                                @forelse ($money_requests as $money_request)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <th>{{ $money_request->created_at }}</th>
                                    <th>{{ $money_request->user->name }}</th>
                                    <th>{{ $money_request->authUser->name }}</th>
                                    <th>{{ $money_request->amount }}</th>
                                    <th>
                                        @if($money_request->status == 0)
                                        <button type="button" class="btn btn-warning">Pending</button>
                                        @elseif ($money_request->status == 1)
                                        <button type="button" class="btn btn-success">Approve</button>
                                         @elseif ($money_request->status == 2)
                                         <button type="button" class="btn btn-danger">Insufficiant</button>
                                         @endif
                                    </th>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="5">Empty</th>
                                </tr>
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
