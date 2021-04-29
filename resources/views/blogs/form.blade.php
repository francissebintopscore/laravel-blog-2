<div class="form-group">
                <label for="uname">Blog title:</label>
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
                <label for="pwd">Content</label>
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