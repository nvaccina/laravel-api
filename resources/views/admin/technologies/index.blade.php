@extends('layouts.admin')

@section('content')

<div class="container p-5">

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <h1 class="text-secondary mb-4">Gestione Technologies</h1>

    <div class="w-50">

        <form action="{{route('admin.technology.store')}}" method="POST" >
            <div class="input-group mb-3 nv_search_type">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="Nuova Tecnologia" aria-label="Nuova Tecnologia" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary add_border" type="submit" id="button-addon2"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
        </form>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col" class="text-center">Azioni</th>

                <th scope="col" class="text-center">Num. Works</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($technologies as $technology)
                    <tr>
                        <td>
                            <form
                            action="{{route('admin.technology.update', $technology)}}"
                            method="POST"
                            id="edit_form"
                            >
                                @csrf
                                @method('PUT')
                                <input class="nv_edit_bar" name="name" type="text" value="{{  $technology->name  }}">
                            </form>

                        </td>
                        <td class="text-center">
                            <button
                            class="btn btn-primary nv_save_info"
                            onclick="submitEditForm()"
                            >
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                            @include('admin.partials.form-delete',[
                                'title' => 'Eliminazione Tecnologia',
                                'id' => $technology->id,
                                'message' => "Confermi l'eliminazione della tecnologia: $technology->name ?",
                                'route' => route('admin.technology.destroy', $technology)
                            ])

                        </td>
                        <td class="text-center">{{ count($technology->works) }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>




</div>

<script>
    function submitEditForm(){
        const form = document.getElementById('edit_form');
        form.submit();
    }
</script>

@endsection
