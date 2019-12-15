@extends("layout")

@section("app-title", "Вхід")

@section("page-title", "Логін")

@section("page-content")
  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Адреса ел. пошти</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Пароль</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запам'ятати Мене
                </label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Увійти
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                Забули пароль?
            </a>
        </div>
    </div>
</form>
@endsection