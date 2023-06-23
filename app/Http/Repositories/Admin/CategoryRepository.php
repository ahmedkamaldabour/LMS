<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Services\LocalizationService;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryRepository implements CategoryInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('Admin.pages.category.index');
    }

    public function create()
    {
        return view('Admin.pages.category.create');
    }

    public function store($request)
    {
        $data = LocalizationService::getLocalizationDataAsArray(Category::$translatableData, $request);
        Category::create($data);
        toast(__('category.add') , 'success');
        return redirect(route('admin.category.index'));
    }

    public function edit($category)
    {
        return view('Admin.pages.category.edit',compact('category'));
    }

    public function update($request, $category)
    {
        $data = LocalizationService::getLocalizationDataAsArray($category::$translatableData , $request);
        $category->update($data);
        toast(__('category.update') , 'success');
        return redirect()->route('admin.category.index');
    }

    public function delete($category)
    {
        $category->delete();
        toast(__('category.remove') , 'success');
        return back();
    }
}
