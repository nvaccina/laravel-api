@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h2 class="text-secondary mb-4"><strong>Work: </strong>{{$work->title}}</h2>

        <div class="card-img-top d-block">
            <img class="nv_image" src="{{ asset('storage/' . $work->image) }}" alt="{{$work->image_original_name}}" onerror="this.src='/img/noimage.jpg'">

        </div>
        <p>{{$work->image_original_name}}</p>

        <div class="pt-2">
            <span>Tipo:</span>
            <span class="badge text-bg-primary">{{$work->type?->name}}</span>

        </div>

        <div class="pt-2">
            <span>Tecnologie: </span>
            @forelse ($work->technologies as $technology)
                <span class="badge text-bg-warning">{{ $technology->name}}</span>
            @empty
                <span>-nessuna tecnologia presente-</span>
            @endforelse

        </div>



        <p class="pt-2">{!!$work->text!!}</p>
        <p>{{$date_formatted}}</p>

        <a class="btn btn-warning nv_edit" href="{{route('admin.works.edit', $work)}}">
            <i class="fa-solid fa-pen"></i>
        </a>


    </div>
@endsection
