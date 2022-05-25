@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class='container'>
  {{ Form::open(['url' => '/top']) }}
  {{ Form::text('posts','newPost',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
  <button type="submit" class="btn btn-success">投稿する</button>
  {!! Form::close() !!}
</div>
<table class='table table-hover'>
@foreach ($post as $post)
  <tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->post }}</td>
    <td>{{ $post->created_at }}</td>
  </tr>
@endforeach
</table>
@endsection