@extends('layouts.admin')

@section('content')

<div class="container p-5">

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <h1 class="text-secondary mb-4">Gestione Technology</h1>

    <div class="w-50">

        <form action="{{route('admin.types.store')}}" method="POST" >
            <div class="input-group mb-3 nv_search_type">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="Nuova categoria" aria-label="Nuova categoria" aria-describedby="button-addon2">
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

                @foreach ($types as $type)
                    <tr>
                        <td>
                            <form
                            action="{{route('admin.types.update', $type)}}"
                            method="POST"
                            id="edit_form"
                            >
                                @csrf
                                @method('PUT')
                                <input class="border-0" name="name" type="text" value="{{  $type->name  }}">
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
                                'title' => 'Eliminazione Tipo',
                                'id' => $type->id,
                                'message' => "Confermi l'eliminazione della categoria $type->name ?",
                                'route' => route('admin.types.destroy', $type)
                            ])

                        </td>
                        <td class="text-center">{{ count($type->works) }}</td>
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
