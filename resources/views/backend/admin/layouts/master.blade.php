@extends('layouts.app')
@section('app_content')
@includeIf('backend.admin.includes.extra')

    <div id="wrapper">
        <!-- Page top navbar -->
       @includeIf('backend.admin.includes.header')

        <!-- Main left sidebar menu -->
        @includeIf('backend.admin.includes.leftbar')

        <!-- Main body part  -->
        <div id="main-content">
            <div class="container message_container">
                 @if(session('dash_message'))
                    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                        {{ session('dash_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                @endif
            </div>
            @yield('master_content')
        </div>

    </div>
@stop
