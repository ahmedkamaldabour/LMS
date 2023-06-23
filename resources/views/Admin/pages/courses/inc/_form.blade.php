@csrf
<div class="row m-auto">
    @foreach(\App\Models\Course::$translatableData as $item => $lang)
        @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key_of_lang)
            @if($lang['type'] == 'text')
                <div class="col-md-8 mx-auto">
                    <label class="form-label">{{__('courses.'.$item.'_'.$key_of_lang)}}</label>
                    <input type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key_of_lang}}"
                           value="{{old($item.'_'.$key_of_lang, isset($course) ? $course->getTranslation($item, $key_of_lang) : null)}}"
                           placeholder="{{__('courses'.$item.'_'. $key_of_lang)}}">
                    @error($item.'_'.$key_of_lang)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <div class="col-md-8 mx-auto">
                    <label class="form-label"> {{__('courses.'.$item.'_'.$key_of_lang)}}</label>
                    <textarea @if($item == 'requirements') id="requirements_{{$key_of_lang}}" @endif
                    name="{{$item}}_{{$key_of_lang}}" class="form-control my-2" rows="6"
                              placeholder="{{__('courses.'.$item.'_'.$key_of_lang)}}"
                    >{{old($item.'_'.$key_of_lang, isset($course) ? $course->getTranslation($item, $key_of_lang) : null)}}</textarea>
                    @error($item.'_'.$key_of_lang)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endif
        @endforeach
    @endforeach
</div>
<div class="row">
    <div class="col-md-8 mx-auto">
        <label for="price" class="form-label">{{__('courses.price')}}</label>
        <input type="text" class="form-control my-2" id="price" name="price"
               value="{{old('price', isset($course) ? $course->price : null)}}"
               placeholder="{{__('courses.price')}}">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-8 mx-auto">
        <label for="category_id" class="form-label">{{__('courses.category_id')}}</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">{{__('courses.category_id')}}</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{ old('category_id', isset($course) ? $course->category_id : null) == $category->id ? 'selected' : '' }}
                >{{$category->name}}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8 mx-auto">
        <label for="image" class="form-label">{{__('courses.image')}}</label>
        <input type="file" class="form-control my-2" id="image" name="image"
               value="{{old('image', isset($course) ? $course->image : null)}}"
               placeholder="{{__('courses.image')}}">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-8 mx-auto">
        <label for="intro" class="form-label">{{__('courses.intro')}}</label>
        <input type="file" class="form-control my-2" name="intro" id="intro"
               value="{{old('intro', isset($course) ? $course->intro : null)}}"
               placeholder="{{__('courses.intro')}}">
        @error('intro')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

