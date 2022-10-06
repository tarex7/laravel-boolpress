@extends('layouts.app')

@section('content')

<header>
    <h1 class="text-center">{{ $post->title }}</h1>
</header>
<div class="container-fluid">

        <div class="clearfix p-4">

            <img class="float-left mr-3" src="{{ $post->image }}" alt="image-preview">
            
            <p >{{ $post->text }}</p>
            <p ><strong>Creato il:</strong> {{ $post->created_at }}</p>
            <p ><strong>Modificato il:</strong> {{ $post->updated_at }}</p>
            <p ><strong>Tags:</strong>
                 @forelse ($tags as $tag)
                <p class="badge text-white p-2 mx-1" style="background-color: {{ $tag->color }}">{{ $tag->label }}</p>
            @empty
                Nessun Tag
            @endforelse</p>
            <p ><strong>Categoria: </strong>  @if($post->category){{ $post->category->label }} @else Nessuna @endif</p>
        </div>
        
        <footer class="d-flex align-items-center justify-content-end px-5">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mx-2">Indietro</a>
        <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning mx-3"><i class="fa-solid fa-eye mx-2"></i>Modifica</a></td>
        <td><form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash mx-2"></i>Elimina</button>
        </form></td>

        </footer>

</div>

@endsection