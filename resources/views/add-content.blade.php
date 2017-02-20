@extends('layouts.app')

@section('content')

    @if( count($errors) > 0 )
        <div class="alert alert-danger">
            
            <ul>
                
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif


    <div class="form">
        <form method="POST" action="{{ route('articleStore') }}">
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title"></input>
            </div>
            <div class="form-group">
                <label for="alias">Псевдоним</label>
                <input type="text" class="form-control" id="alias" name="alias"></input>
            </div>
            <div class="form-group">
                <label for="body">Текст</label>
                <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Сохранить</button>
            {{ csrf_field() }}
        </form>
    </div>  

@endsection
@section('footer')
    {!! view('footer') !!}
@endsection