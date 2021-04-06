@extends('layouts.app')
@section('app_content')
@includeIf('backend.user.includes.extra')

    <div id="wrapper">
        <!-- Page top navbar -->
       @includeIf('backend.user.includes.header')

        <!-- Main left sidebar menu -->
        @includeIf('backend.user.includes.leftbar')

        <!-- Main body part  -->
        <div id="main-content">
            @yield('master_content')
        </div>

    </div>
@stop
