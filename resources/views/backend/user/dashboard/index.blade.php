@extends('backend.user.layouts.master')
@section('title','Dashboard')

@section('master_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Curreny Rate</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Rate</th>
                        </tr>
                        @forelse ($currencies as $currency)
                            <tr>
                                <td>USD</td>
                                <td>{{ $currency->country }}</td>
                                <td>{{ $currency->ammount }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Not Found!</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
