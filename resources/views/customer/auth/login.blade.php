@extends('layout.customer')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(array('route' => 'postAuth', 'class' => 'form')) !!}

            <div class="form-group">
                {!! Form::label('email', 'E-Mail Address') !!}
                {!!  Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!!  Form::password('password', ['class' => 'form-control']) !!}
            </div>

            {!!  Form::submit('Log In', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
</section>
@endsection