@extends('layouts.app-login-resginter')

@section('content')
    <div class="container">
        <div class="devise-section">
            <h1>Log In</h1>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="">
                        <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
                            @csrf
                            <div class="mbm">
                                <label class="left" for="user_email">Email</label>
                                <input id="email" type="text" class="input_text @error('email') is-invalid @enderror"
                                    name="email">
                                    <p class="err">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="mbs mt-4">
                                <div class="row ptm-edit mt-2">
                                    <label class="left col-md-5" for="user_password">Password</label>
                                </div>
                                <input id="password" type="password"
                                    class="input_text  @error('password') is-invalid @enderror" name="password">
                                    <p class="err">{{ $errors->first('password') }}</p>
                            </div>
                            {{-- <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div> --}}
    
                            <div class="separated-block separated-block-login">
                                <div class="mt-2">
                                    <button class="singinwithemail edit-button-login col-md-4">
                                        <span class="text-normal"> Login </span>
                                    </button>
                                </div>
    
                                <p class="ptm-edit col-md-6">
                                    Không nhớ mật khẩu ?
                                    <a target="_blank" rel="noopener noreferrer" class="device__resend-link" href="/terms">Gửi
                                        lại Mật Khẩu</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="signup_oauth">
                        <div class="button--medsssium mt-">
                            <a href="{{ URL::route('social.oauth', 'google') }}" class="now edit-a button--medium">
                                <div class="col-2 icon icon--google">
                                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                                        <path fill="#FFC107"
                                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                                        <path fill="#FF3D00"
                                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                                        <path fill="#4CAF50"
                                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                                        <path fill="#1976D2"
                                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                                    </svg>
                                </div>
                                <span class="text-normal"> Login với google </span>
                            </a>
                        </div>
                        <div class="button--medsssium mt-3">
                            <a href="{{ URL::route('social.oauth', 'github') }}" class="now edit-a button--medium">
                                <div class="col-2 icon icon--google">
                                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"
                                        height="24px">
                                        <path
                                            d="M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6c0-0.4,0-0.9,0.2-1.3C7.2,6.1,7.4,6,7.5,6c0,0,0.1,0,0.1,0C8.1,6.1,9.1,6.4,10,7.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3c0.9-0.9,2-1.2,2.5-1.3c0,0,0.1,0,0.1,0c0.2,0,0.3,0.1,0.4,0.3C17,6.7,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3C22,6.1,16.9,1.4,10.9,2.1z" />
                                    </svg>
                                </div>
                                <span class="text-normal"> Login với github </span>
                            </a>
                        </div>
                        <div class="button--medsssium mt-3">
                            <a href="{{ URL::route('social.oauth', 'facebook') }}" class="now edit-a button--medium">
                                <div class="col-2 icon icon--google">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="24px" height="24px"><path fill="#8bb7f0" d="M15 1A14 14 0 1 0 15 29A14 14 0 1 0 15 1Z"/><path fill="#fff" d="M28.921 16.479c.002-.02.006-.039.008-.059C28.926 16.439 28.922 16.459 28.921 16.479zM1.071 16.415c.003.027.008.053.011.08C1.079 16.468 1.074 16.441 1.071 16.415zM16.996 18.71h3.623l.569-3.68h-4.192v-2.012c0-1.529.5-2.885 1.93-2.885h2.298V6.922c-.404-.054-1.257-.174-2.871-.174-3.37 0-5.345 1.78-5.345 5.834v2.449H9.544v3.68h3.464v9.92c.684.103 1.379.173 2.093.173.644 0 1.274-.059 1.895-.143V18.71z"/><g><path fill="#4e7ab5" d="M15,2c7.168,0,13,5.832,13,13s-5.832,13-13,13S2,22.168,2,15S7.832,2,15,2 M15,1 C7.268,1,1,7.268,1,15s6.268,14,14,14s14-6.268,14-14S22.732,1,15,1L15,1z"/></g></svg>
                                </div>
                                <span class="text-normal"> Login với Facebook </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-4">
                    <div class="featured-block mt-5">
                        <ul class="block">
                            <li>
                                <p>Điền đúng email và mật khẩu để đăng nhập</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection