<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/logohead.png') }}" />
        <title>Biro Jasa Ratu Lestari</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body {
              background-size: cover;
            }
            .bckg {
              margin: 0 auto;
            }
            .row {
              margin-left: 0;
              margin-right: 0;
            }
            .card {
              top:100px;
              box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
            }
            .btn-primary{
              background-color:#002060 !important;
              border-color:#002060 !important;
            }
        </style>
    </head>
    <body background="img/back4.jpg">
        <div class="row">
          <div class="col-6 col-md-4 bckg">
            <div class="card">
            <div class="card-header">
                <h2 align="center">Biro Jasa Ratu Lestari</h2>
            </div>
              <div class="card-body">
                <div class="text-center">
                  <img src="/img/logo.png" alt="" class="w-50"/>
                </div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <label for="username">{{ __('Username') }}</label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" id="username" required autocomplete="username" autofocus>
                      @error('username')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">{{ __('Password') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>
                    @if (Route::has('password.request'))
                    <p class="text-center mt-4">
                      <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </p>
                    @endif
                  </form>
                
              </div>
            </div>

          </div>
        
        </div>
    <body>
</html>
