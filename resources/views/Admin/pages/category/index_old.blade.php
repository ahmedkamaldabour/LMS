@extends('Admin/inc/master')
@section('title')
    Category
@endsection

@section('content')
<div class="container" style="margin-top: 150px">
    <div class="row">
        <h2 class="text-center"> {{__('category.all_categories')}} </h2>
        <style>
            h2{
                font-family: "Arabic Typesetting";
                font-style: italic;
                font-size: 50px;
                background-image: linear-gradient(102deg , #ff5959 ,#000000);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
        <div class="col-md-6 m-auto">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('category.name')}}</th>
                    <th scope="col">{{__('category.edit')}}</th>
                    <th scope="col">{{__('category.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    <td><a href="{{ route("admin.category.edit",$category)  }}" class="btn btn-primary">{{__('category.edit')}}</a></td>
                    <td>
                        <form action="{{route("admin.category.delete",$category)}}" method="post" >
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">{{__('category.delete')}}</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <h2> {{__('category.not_found')}} </h2>
                @endforelse
                </tbody>
                {{$categories->links()}}
            </table>
        </div>
    </div>
</div>
@endsection
