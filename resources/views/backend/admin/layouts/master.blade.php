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
            @yield('master_content')
        </div>

    </div>
@stop
