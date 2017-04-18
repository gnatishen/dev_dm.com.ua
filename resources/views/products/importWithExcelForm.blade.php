

@extends('layouts.app')

@section('content')
    <h2>Импорт товаров с Excel файла</h2>
    <div class="col-md-3"></div>
    <div class="admin-import col-md-1">

        {!! Form::open(
            array(
                'route' => 'importWithExcelPost', 
                'class' => 'form', 
                'novalidate' => 'novalidate', 
                'files' => true)) !!}

        <div class="form-group">
            {!! Form::label('Файл для импорта') !!}
            {!! Form::file('xls', null) !!}
        </div>

        <div class="form-group">
            {{Form::submit('Начать експорт файла', ['class' => 'btn btn-large btn-primary openbutton'])}}
        </div>
        {!! Form::close() !!}
</div>

    </div>

@endsection

@section('footer')

    {!! view('footer') !!}

@endsection
