
    @csrf
    <div class="form-group mb-4">
        <label for="title">Title of Project</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $portfolio->title}}"
               placeholder="Project Title">
        <div class="text-danger">
            @error('title')
            {{$message}}
            @enderror
        </div>
    </div>
    <div>
        <div>
            <label for="tags">Select Category</label>
            <select class="form-control  basic" name="category">
                <option value="{{$portfolio->category}} {{$portfolio->category ?? 'selected'}} ">{{$portfolio->category}}</option>
                <option {{$portfolio->category ?  '' : 'selected'}} >Select Option</option>
                <option value="Web Development">Web Development</option>
                <option value="Mobile App Development">Mobile App Development</option>
                <option value="Web Design">Web Design</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Seo">Seo</option>
                <option value="Desktop Application Development">Desktop Application Development</option>

            </select>
            <div class="text-danger">
                @error('category')
                {{$message}}
                @enderror
            </div>
        </div>
        <label for="tags">Project Technologies</label>
        <select class="form-control tagging" multiple="multiple" name="tags[]">
            <option>Laravel</option>
            <option>Bootstrap</option>
            <option>TailwindCss</option>
            <option>JavaScript</option>
        </select>
        <div class="text-danger">
            @error('tags')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="description">Project Description</label>
        <textarea class="form-control" id="description" name="description"

                  rows="3"></textarea>
        <div class="text-danger">
            @error('description')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="custom-file-container" data-upload-id="myFirstImage">
        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                       title="Clear Image">x</a></label>
        <label class="custom-file-container__custom-file">
            <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input"
                   accept="image/*">
            <input type="hidden" name="image"/>
            <span class="custom-file-container__custom-file__custom-file-control"></span>
        </label>
        <div class="custom-file-container__image-preview"></div>
        <div class="text-danger">
            @error('image')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="n-chk">
        <label class="new-control new-checkbox checkbox-success">
            <input type="checkbox" class="new-control-input" name="featured" value="1">
            <span class="new-control-indicator"></span>Featured
        </label>
        <div class="text-danger">
            @error('feature')
            {{$message}}
            @enderror
        </div>
    </div>
    <input type="submit" name="time" class="mt-4 mb-4 btn btn-success">

