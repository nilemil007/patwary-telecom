@extends('layouts.login')
@push('title') Login @endpush

@section('login-page')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('dist/img/logo/EN.png') }}" height="36" alt="">
            </a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login to your account</h2>
                <div class="mb-3">
                    <label class="form-label">Login Id</label>
                    <input type="text" name="login" class="form-control" value="{{ old('login') }}"
                           placeholder="Enter login id" required autofocus>
                    @error('login')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description">
                  <a class="d-none" href="#">I forgot password</a>
                </span>
                    </label>

                    <div class="input-group input-group-flat">
                        <input id="showHidePassword" type="password" name="password" class="form-control"  placeholder="Password">
                        <span class="input-group-text">
                          <a href="javascript:void(0)" id="showHidePasswordBtn" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                          </a>
                        </span>
                    </div>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input"/>
                        <span class="form-check-label">Remember me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
    $(document).ready(function() {
        $(document).on('click','#showHidePasswordBtn', function(){

            const type = $('#showHidePassword').attr("type");

            if(type == "password"){
                $('#showHidePassword').attr("type","text");
            }
            else{
                $('#showHidePassword').attr("type","password");
            }
        })
    });
    </script>
    @endpush
@endsection
