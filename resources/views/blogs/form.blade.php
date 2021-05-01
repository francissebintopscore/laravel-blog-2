<div class="form-group">
                <label for="title">Blog title:</label>
                <input type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    id="title" 
                    placeholder="Enter username" 
                    name="title" 
                    value="{{ old('title', $blog->title )}}">

                @error('title')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="body">Content</label>
                <textarea 
                    class="form-control  @error('body') is-invalid @enderror" 
                    name="body" 
                    id="body" 
                    placeholder="Content">{{ old('body', $blog->body )}}</textarea>

                @error('body')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <!-- <div class="form-group">
                <label for="tags">Tags</label>
                @foreach ( $blog->tags as $tag )
                    <input class="" name="tags[]" value="{{ $tag->id }}" readonly>
                @endforeach
                <input class="" name="tags[]" value="">
            </div>

            <div class="form-group">
                <label for="pwd">Tags Search</label>
                <input type="text" 
                    id="tags-search" 
                    placeholder="Enter or search a Tag" 
                    name="tags" 
                    value="">
                    <br>
                    <select id="tag-selection" hidden>
                    </select>
            </div> -->