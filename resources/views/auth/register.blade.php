@extends('layouts.app')

@section('content')

<section class="guest-form">
    <div class="background" style="background-image: url({{ asset('images/backgrounds/gabinete-herramientas.jpg')  }});"></div>
    <div class="form-container">
        <form class="form" method="POST" action="{{ route('register') }}" role="form">
            {{ csrf_field() }}

            <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="label is-small">Nombre</label>

                <p class="control has-icons-left">
                    <input id="name" type="text" class="input is-small{{ $errors->has('name') ? ' is-danger' : ' is-primary' }}" name="name" value="{{ old('name') }}" required autofocus>
                    <span class="icon is-small is-left"><i class="fa fa-user"></i></span>

                    @if($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </p>
            </div>

            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="label is-small">E-Mail</label>

                <p class="control has-icons-left">
                    <input id="email" type="email" class="input is-small{{ $errors->has('email') ? ' is-danger' : ' is-primary' }}" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="icon is-small is-left"><i class="fa fa-at"></i></span>

                    @if($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </p>
            </div>

            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="label is-small">Contraseña</label>

                <p class="control has-icons-left">
                    <input id="password" type="password" class="input is-small{{ $errors->has('password') ? ' is-danger' : ' is-primary' }}" name="password" required>
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>

                    @if($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </p>
            </div>

            <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password_confirmation" class="label is-small">Confirmar contraseña</label>

                <p class="control has-icons-left">
                    <input id="password_confirmation" type="password" class="input is-small{{ $errors->has('password_confirmation') ? ' is-danger' : ' is-primary' }}" name="password_confirmation" required>
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>

                    @if($errors->has('password_confirmation'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </p>
            </div>

            <b-checkbox name="remember" class="label is-small">Recuérdame</b-checkbox>

            <div class="control">
                <button class="button is-primary is-small is-outlined m-t-10">Entrar</button>
            </div>

            <p class="content is-small is-pulled-right">
                <a class="is-muted" href="{{ route('login') }}">¿Ya estás registrado? ¡Entra!</a>
            </p>
        </form>
    </div>
</section>


{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
