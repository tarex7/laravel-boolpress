@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <header class="d-flex justify-content-between mb-3">
        <h1>Lista post</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success p-3 d-flex"><i class="fa-solid fa-plus mx-3 fa-2x"></i><h3 class="mr-2">Crea post</h3></a>
    </header>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tag</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col">Creato</th>
            <th scope="col">Ultima modifica</th>
            <th  colspan="6" scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
              <th scope="row">{{ $post->id}}</th>

              <td>{{ $post->title}}</td>
              <td>
                @forelse ($post->tags as $tag)
                    <p style="background-color: {{ $tag->color }}" class="badge">{{$tag->label}}</p>
                @empty
                   - 
                @endforelse
              </td>
              <td>@if( $post->user){{ $post->user->name}} @else Anonimo @endif</td>
              <td>@if($post->category){{ $post->category->label }} @else Nessuna @endif</td>
              <td>{{ $post->created_at}}</td>
              <td>{{ $post->updated_at}}</td>
              <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary"><i class="fa-solid fa-eye mx-2"></i>Vedi</a></td>
              <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning"><i class="fa-solid fa-eye mx-2"></i>Modifica</a></td>
              <td><form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash mx-2"></i>Elimina</button>
            </form></td>
            </tr>
                
            @empty
                <tr><td colspan=6><h3 class="text-center">Nessun post da mostrare</h3></td></tr>
            @endforelse
         
        </tbody>
      </table>
</div>
@endsection