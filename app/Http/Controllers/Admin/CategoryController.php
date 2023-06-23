<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Requests\Admin\category\storeRequest;
use App\Http\Requests\Admin\category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $category)
    {
        $this->categoryInterface = $category;
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $this->categoryInterface->index($dataTable);
    }

    public function create()
    {
        return $this->categoryInterface->create();
    }

    public function store(storeRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function edit(Category $category)
    {
        return $this->categoryInterface->edit($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        return $this->categoryInterface->update($request, $category);
    }

    public function delete(Category $category)
    {
        return $this->categoryInterface->delete($category);
    }
}
