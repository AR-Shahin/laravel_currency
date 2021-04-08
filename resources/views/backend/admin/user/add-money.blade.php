@extends('backend.admin.layouts.master')
@section('title')
    Add money to {{ $user->name }}
@stop

@section('master_content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary d-inline">Add Money in <b>{{ $user->name }}'s</b> account</h3>
                    <a href="{{ route('get-all-users') }}" class="btn btn-sm btn-info ml-5">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-money') }}" method="POST">
                        @csrf
                       <div class="row">
                           <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Amount : </label>
                                    <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                                      <span class="text-danger">{{($errors->has('amount'))? ($errors->first('amount')) : ''}}</span>
                                </div>
                           </div>
                           <div class="col-12 col-md-6 mt-2">
                               <input type="hidden" value="{{ $user->id }}" name="user_id">
                               <label for=""></label>
                               <div class="form-group">
                                   <button class="btn btn-sm btn-block btn-success">Add Money</button>
                               </div>
                           </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



