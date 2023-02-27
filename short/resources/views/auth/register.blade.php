@extends('index')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">İsim Soyisim</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">E-Posta</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Şifre</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="8">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Şifre Tekrar</label>
        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" minlength="8">
    </div>
    <button type="submit" class="btn btn-primary">Kayıt Ol</button>
</form>
@endsection