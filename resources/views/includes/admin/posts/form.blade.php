

@if($post->exists) 
<form action="{{ route('admin.posts.update', $post) }}" method="POST">
@method('PUT')
@else
<form action="{{ route('admin.posts.store') }}" method="POST">
    @endif
    @csrf
        <div class="row">

            <div class="col-8">
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required minlength="5" maxlength="50" value="{{  $post->title, old('title') }}">
                </div>

                @if(count($tags))
                <div class="col-12">
                    <h4>Tags</h4>
                    <div class="d-flex py-4">
                       @foreach ($tags as $tag)
                          <div class="form-check form-check-inline">
                            <input class="mx-1 form-check-input"
                             type="checkbox" 
                             id="tag-{{ $tag->label }}"
                             value="{{ $tag->id }}"
                             name="tags[]"
                              @if(in_array($tag->id, old('tags', $prev_tags ))) checked @endif >
                            <label class="form-check-label mr-5 mb-0" for="tag-{{ $tag->label }}">{{ $tag->label }}</label>
                          </div>
                       @endforeach
                    </div>
                </div>
                @endif

            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select  class="form-control" id="category_id" name="category_id">
                      <option value="">Nessuna categoria</option>
                      @foreach ($categories as $category)
                          
                      <option
                       @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->label }}
                       </option>
                       @endforeach
                     
                    </select>
                    
                  </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea type="text" class="form-control" id="content" name="text"  cols="30" rows="10">{{  $post->text, old('text') }}</textarea>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input
                     type="url"
                     class="form-control"
                     id="image"
                     name="image"
                     value="{{ $post->image, old('image') }}">
                </div>
            </div>
            <div class="col-2">
            <img class="img-fluid" src="{{ $post->image ?? 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png' }}" alt="preview" id="preview">
        </div>
                                
        </div>

        <footer class="d-flex justify-content-between my-5">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary p-3 d-flex"><i class="fa-solid fa-rotate-left fa-2x mr-2"></i><h3>Indietro</h3></a>
            <button class="btn btn-success p-3 d-flex" type="submit"><i class="fa-regular fa-floppy-disk mr-2 fa-2x"></i><h3>Salva</h3></button>
        </footer>

</form>