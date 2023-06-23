<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\BlogCategoryInterface;
use App\Http\Requests\Admin\blog\category\storeRequest;
use App\Http\Requests\Admin\blog\category\updateRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    private $blogCategoryInterface;

    public function __construct(BlogCategoryInterface $category){
        $this->blogCategoryInterface = $category;
    }

    public function index(BlogCategoryDataTable $dataTable){
        return $this->blogCategoryInterface->index($dataTable);
    }

    public function create()
    {
        return $this->blogCategoryInterface->create();
    }

    public function store(storeRequest $request)
    {
        return $this->blogCategoryInterface->store($request);
    }

    public function edit(BlogCategory $category){
        return $this->blogCategoryInterface->edit($category);
    }
    public function update(updateRequest $request , BlogCategory $category){
        return $this->blogCategoryInterface->update($request,$category);
    }

    public function delete(BlogCategory $category){
        return $this->blogCategoryInterface->delete($category);
    }
}
