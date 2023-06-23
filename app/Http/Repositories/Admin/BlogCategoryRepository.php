<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\BlogCategoryInterface;
use App\Http\Services\LocalizationService;
use App\Models\BlogCategory;

class BlogCategoryRepository implements BlogCategoryInterface
{
    public function index($dataTable)
    {
        return $dataTable->render('Admin.pages.blog.category.index');
    }

    public function create()
    {
        return view('Admin.pages.blog.category.create');
    }

    public function store($request)
    {
        $data = LocalizationService::getLocalizationDataAsArray(BlogCategory::$translatableData, $request);
        BlogCategory::create($data);
        toast(__('blog_category.add') , 'success');
        return redirect(route('admin.blog_category.index'));
    }

    public function edit($category){
        return view('Admin.pages.blog.category.edit',compact('category'));
    }

    public function update($request ,$category){
        $data = LocalizationService::getLocalizationDataAsArray(BlogCategory::$translatableData,$request);
        $category->update($data);
        toast(__('blog_category.update') , 'success');
        return redirect(route('admin.blog_category.index'));
    }

    public function delete($category){
        $category->delete();
        toast(__('blog_category.remove') , 'success');
        return redirect(route('admin.blog_category.index'));
    }



}
