@extends('carousel.master')
@section('content')
    <div class="container">
        <div class="row">
            <div id="carouselId" class="carousel slide mt-1" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($posts as $item =>$image)
                        <li data-bs-target="#carouselId" class="{{$item==0 ? 'active' : '' }}" data-bs-slide-to="{{$item}}" aria-label="Second slide"></li>>
                    @endforeach

                </ol>
                <div class="carousel-inner" role="listbox">
                    @forelse ($posts as $item)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ asset('carousel/images/' . $item->image) }}" class="w-100 d-block {{ $item->id }}slide"
                                alt="First slide" height="500">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    @empty
                    <h2>There is no record to show</h2>
                    @endforelse

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endsection
