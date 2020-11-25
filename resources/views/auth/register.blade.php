@extends('layouts.app-root-admin')
@section('body')
    <div class="authincation mt-5 h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Tạo Tài Khoản</h4>
                                    <form action="{{ route('register') }}" accept-charset="UTF-8" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong> Username </strong></label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password"  id="user_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>password_confirmation</strong></label>
                                            <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Bạn đã có tài khoản? <a class="text-primary" href="page-login.html">Sign
                                                in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
