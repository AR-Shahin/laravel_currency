@extends('backend.admin.layouts.master')
@section('title')
    {{ $user->name }}'s History
@stop
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="text-primary d-inline">
                    View {{ $user->name }}'s History
                </h3>
                <a href="{{ route('get-all-users') }}" class="btn btn-sm btn-info ml-5">Back</a>
            </div>
            <div class="card-body">
                <label for="">Select a Transaction : </label>
                <select name="" id="transaction" class="form-control">
                    <option value="">Selete An Option</option>
                    <option value="send">Send Request</option>
                    <option value="receive">Receive Request</option>
                </select>
                <hr>
                <div id="sendRequest">
                    <h4 class="text-info">Request Send</h4>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-hover dataTable js-exportable">
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            <tbody>
                            @forelse ($send_requests as $request)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->amount }}</td>
                                <th>
                                    @if($request->status == 0)
                                        <button type="button" class="btn btn-warning">Pending</button>
                                        @elseif ($request->status == 1)
                                        <button type="button" class="btn btn-success">Approve</button>
                                         @elseif ($request->status == 2)
                                         <button type="button" class="btn btn-danger">Insufficiant</button>
                                    @endif
                                 </th>
                            </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
                   <div id="receiveRequest">
                    <h4 class="text-info">Request Receive</h4>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-hover dataTable js-exportable">
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            <tbody>
                            @forelse ($receive_requests as $request)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->authUser->name }}</td>
                                <td>{{ $request->amount }}</td>
                                <th>
                                    @if($request->status == 0)
                                        <button type="button" class="btn btn-warning">Pending</button>
                                        @elseif ($request->status == 1)
                                        <button type="button" class="btn btn-success">Approve</button>
                                         @elseif ($request->status == 2)
                                         <button type="button" class="btn btn-danger">Insufficiant</button>
                                    @endif
                                 </th>
                            </tr>
                            @empty

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
    $('#sendRequest').show()
    $('#receiveRequest').hide()
    $('body').on('change','#transaction',function(){
        let trans = $(this).val()
        if(trans === '' || trans === 'send'){
            $('#sendRequest').show()
            $('#receiveRequest').hide()
        }else if (trans === 'receive'){
            $('#sendRequest').hide()
            $('#receiveRequest').show()
        }
    })
</script>
@endpush
