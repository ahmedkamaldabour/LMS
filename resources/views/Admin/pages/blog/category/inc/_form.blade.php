<div class="row">

@csrf

@foreach(\App\Models\BlogCategory::$translatableData as $item => $lang)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $key)
        @if($lang['type'] == 'text')
                <div class="col-md-6 m-auto">
                    <label for="name_en" class="form-label">{{__('blog_category.' . $item .'_' . $key)}}</label>
                    <input type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key}}" value="{{old($item .'_' . $key, isset($category) ? $category->getTranslation($item, $key) : null)}}"
                           placeholder="{{__('blog_category.' . $item . '_' . $key)}}" required>
                    @error($item.'_'.$key)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <div class="col-md-6 m-auto">
                    <label for="name_en" class="form-label">{{__('blog_category.' . $item .'_' . $key)}}</label>
                    <textarea type="{{$lang['type']}}" class="form-control my-2" name="{{$item}}_{{$key}}" value=""
                              placeholder="{{__('blog_category.' . $item . '_' . $key)}}" required>{{old($item .'_' . $key, isset($category) ? $category->getTranslation($item, $key) : null)}}</textarea>
                    @error($item.'_'.$key)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        @endif

    @endforeach
@endforeach

</div>


