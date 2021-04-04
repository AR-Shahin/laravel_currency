@extends('layouts.app')
@section('title' ,'Admin Login')

@push('css')
<style>
    #homePage{
    height : 100vh;
}
.login_form_wrapping{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);

}
</style>
@endpush

@section('app_content')
<div id="body" class="theme-cyan">

    <!-- Theme Setting -->
    <div class="themesetting">
        <a href="javascript:void(0);" class="theme_btn"><i class="fa fa-gear fa-spin"></i></a>
        <ul class="list-group">
            <li class="list-group-item">
                <ul class="choose-skin list-unstyled mb-0">
                    <li data-theme="green"><div class="green"></div></li>
                    <li data-theme="orange"><div class="orange"></div></li>
                    <li data-theme="blush"><div class="blush"></div></li>
                    <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                    <li data-theme="timber"><div class="timber"></div></li>
                    <li data-theme="blue"><div class="blue"></div></li>
                    <li data-theme="amethyst"><div class="amethyst"></div></li>
                </ul>
            </li>
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <span>Dark Mode</span>
                <label class="switch dark_mode">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </li>
        </ul>
        <hr>
        <div>
            <a href="javascript:void(0);" class="btn btn-dark btn-block" target="_blank">Buy this item</a>
            <a href="javascript:void(0);" target="_blank" class="btn btn-primary theme-bg gradient btn-block">View Portfolio</a>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth_div vivify fadeIn">
            <div class="auth_brand">
                <a class="navbar-brand" href="#"><img src="{{ asset('backend') }}/assets/images/icon.svg" width="50" class="d-inline-block align-top mr-2" alt="">Mooli</a>
            </div>
            <div class="card mt-0">
                <div class="header">
                    <p class="lead">Admin Login to your account</p>
                </div>
                <div class="body">
                    <form class="form-auth-small" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group c_form_group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                                <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                        </div>
                        <div class="form-group c_form_group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" name="password">
                                <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">LOGIN</button>
                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="animate_lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
</div>
@stop

