@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h1 class="text-secondary mb-4">Elenco Types e Works</h1>

        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('deleted')}}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="col-1">Nome</th>
                    <th scope="col" >Works</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr class=" bg-white border border-bottom-1">
                        <td class="border border-0">{{$type->name}}</td>
                        <td class="w-25 border border-0">
                            <ul>
                                @foreach ($type->works as $work)
                                <li>
                                    <a href="{{route('admin.works.show', $work)}}" class=" nv_a_special">{{$work->title}}</a>
                                </li>

                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
