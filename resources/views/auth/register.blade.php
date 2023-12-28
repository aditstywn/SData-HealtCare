@extends('layouts.auth')

@section('title', 'Register CBT')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group ">
                    <label for="name">Name</label>
                    <input id="name" type="text" :value="old('name')"
                        class="form-control @error('name')
                                is-invalid
                            @enderror"
                        name="name" autofocus required autocomplete="name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" :value="old('email')"
                        class="form-control @error('email')
                            is-invalid
                        @enderror"
                        name="email" autocomplete="username" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password')
                                is-invalid
                            @enderror"
                        name="password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif

                </div>

                <div class="form-group ">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password"
                        class="form-control @error('password_confirmation')
                        is-invalid
                    @enderror"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Ready have an account? <a href="{{ route('login') }}"> Login</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
