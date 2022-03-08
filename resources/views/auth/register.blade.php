@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<p>UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
<p>{{ $errors->first('username')}}
@endif

<p>MailAdress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
<p>{{ $errors->first('mail')}}
@endif

<p>Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))
<p>{{ $errors->first('password')}}
@endif

<p>Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

<!-- {{ Form::submit('Register') }} -->
<button type="submit">Register</button>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
