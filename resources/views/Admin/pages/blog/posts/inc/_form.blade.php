@csrf
<div class="row m-auto">
    @foreach(\App\Models\Post::$translatableData as $item => $lang)
        @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key)
            @if($lang['type'] == 'text')
                <div class="col-md-6 m-auto">
                    <label class="form-label">{{__("posts.title_en").'_'.$key}}</label>
                    <input type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key}}"
                           value="{{old($item.'_'.$key, isset($post) ? $post->getTranslation($item, $key) : null)}}"
                           placeholder="{{__("posts.title_en").'_'.$key}}">
                    @error($item.'_'.$key)
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @else
                <div class="col-md-6 m-auto">
                    <label class="form-label"> {{__('posts.body_en').'_'.$key}}</label>
                    <textarea  id="post_{{$key}}" name="{{$item}}_{{$key}}" class="form-control"
                              rows="6" placeholder="{{__('posts.body_en').'_'.$key}}" id="demo1">
                        {{old($item.'_'.$key, isset($post) ? $post->getTranslation($item, $key) : null)}}</textarea>
                    @error($item.'_'.$key)
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        @endforeach
    @endforeach
</div>

<div class="row">

    <div class="col-md-6 m-auto">
        <label for="category_id" class="form-label">{{__("posts.select")}}</label>

        <select name="category_id"  class="form-control">
            <option value="">{{__("posts.select")}}</option>
            @foreach($blog_categories as $category)
                <option value="{{$category->id}}" @selected(old('category_id', isset($post) ? $post->category_id : '') == $category->id)>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-md-6 m-auto">

        <label for="image" class="form-label">{{__('posts.image')}}</label>
        <input type="file" class="form-control my-2" id="image" name="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

</div>

