@extends("layout")

@section("app-title", "Реєстрація")

@section("page-title", "Реєстрація гравця")


@section("page-content")
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Ім'я</label>
    
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Адреса ел. пошти</label>
    
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
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
            <label for="password-confirm" class="col-md-4 col-form-label 
                text-md-right">Підтвердження пароля</label>
            <div class="col-md-6">
                 <input id="password-confirm" type="password" 
                    class="form-control" name="password_confirmation" 
                    required autocomplete="new-password">
            </div>
        </div>

       <div class="row form-group">
           <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Реєстрація
                </button>
            </div>
        </div>
    </form>        
@endsection