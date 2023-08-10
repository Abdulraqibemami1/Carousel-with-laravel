@extends('carousel.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <a href="/create" class="btn btn-sm btn-primary m-3">Create Carousel</a>
                <table class="table table-hover table-info table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    @forelse ($carousels as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td> <img src="{{asset('carousel/images/'.$item->image)}}" alt="{{$item->title}}" width="100" height="100"></td>
                        <th><a href="/show/{{$item->id}}">View</a></th>
                    </tr>   
                    
                    
                        @empty
                            
                        <h2>empty</h2>
                        @endforelse
               
                </table>

            </div>
        </div>
    </div>
@endsection
