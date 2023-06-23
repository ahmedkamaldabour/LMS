<?php

namespace App\Http\Traits\Admin;

trait BlogCategoryTrait
{
    private function getBlogCategories()
    {
        return $this->blogCategoryModel::get(['id', 'name']);
    }
}
