@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1 class="text-secondary mb-4">
        Home Dashboard
    </h1>
    <h6>Sono presenti <strong>{{$n_works}} </strong> lavori!</h6>

    @if ($last_work)
        <div class="pt-2">
            <h4 class="py-3"><strong>Ultimo Lavoro inserito: </strong>"{{ $last_work?->title }}"

                <a class="btn btn-primary nv_save_info ms-3" href="{{route('admin.works.show', $last_work)}}">
                    <i class="fa-solid fa-info p-1"></i>
                </a>

                <a class="btn btn-warning nv_edit" href="{{route('admin.works.edit', $last_work)}}">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </h4>

            <div>
                <img class="w-50" src="{{ asset('storage/' . $last_work?->image) }}" alt="{{ $last_work?->title }}"  onerror="this.src='/img/noimage.jpg'">
            </div>
            <p class="pt-3"><strong>Descrizione:</strong><br>
                {!! $last_work?->text !!}
            </p>
        </div>

    @endif

</div>
@endsection
