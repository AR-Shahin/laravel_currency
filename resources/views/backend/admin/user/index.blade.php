@extends('backend.admin.layouts.master')
@section('title','User')
@push('css')
 <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush
@section('master_content')
<div class="containet mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Manage All Users</h3>
        </div>
        <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ $user->role == 'user' ? 'User' : 'Merchant' }}
                                        </td>
                                        <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary">View</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="" class="btn btn-sm btn-warning">Block</a>
                                            <a href="{{ url('add-money' . '/' .$user->email) }}" class="btn btn-sm btn-secondary">Add Money</a>
                                             <a href="{{ url('user-all-transaction' . '/' .$user->id) }}" class="btn btn-sm btn-info">History</a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Not Found!!</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </thead>
                    </table>
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


