@extends('admin.admin')

@section('content')
    <h1>Изменение учетных данных</h1>
    <form action="{{ route('updateProfile') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <select name="user_id" class="form-select" aria-label="Default select example">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            @if($errors->has('name'))
                <div class="alert alert-danger">
                    @foreach($errors->get('name') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}"> <br>
        </div>
        <div class="form-group mb-3">
            @if($errors->has('email'))
                <div class="alert alert-danger">
                    @foreach($errors->get('email') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}"> <br>
        </div>
        <div class="form-group mb-3">
            @if($errors->has('password'))
                <div class="alert alert-danger">
                    @foreach($errors->get('password') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="password" type="password" placeholder="Текущий пароль"> <br>
        </div>
        <div class="form-group mb-3">
            @if($errors->has('newPassword'))
                <div class="alert alert-danger">
                    @foreach($errors->get('newPassword') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input class="form-control" name="newPassword" type="password" placeholder="Новый пароль"> <br>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" id="is_admin" name="is_admin" value="1">
            <label class="form-check-label" for="is_admin">Администратор</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" id="is_user" name="is_admin" value="0">
            <label class="form-check-label" for="is_user">Пользователь</label>
        </div>
        <button class="form-control" type="submit">Изменить</button>
    </form>
@endsection
