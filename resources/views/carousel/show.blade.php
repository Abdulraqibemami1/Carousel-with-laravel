@extends('carousel.master')
@section('content')
<div class="row mt-3">
    <div class="col-md-10 mx-auto d-flex justify-conten-between">

    <div class="col-md-6">
        <img src="{{asset('carousel/images/'.$carousel->image)}}" alt="" width="100%" height="100%">
    </div>
    <div class="col-md-6">
        <h2 class="text-center">
            {{$carousel->title}}
        </h2>
        <p class="text-center">{{$carousel->description}}</p>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <a href="/dashboard" class="btn btn-default btn-sm btn-outline-primary mr-5">Back</a>
                <a href="/edit/{{$carousel->id}}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        
            {!! Form::open(['route'=>['remove',$carousel->id],'method'=>'delete','enctype'=>'multipart/form-data','files'=>true]) !!}
            {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
            {!! Form::close()!!}
        </div>
    </div>
    </div>
</div>

@endsection




