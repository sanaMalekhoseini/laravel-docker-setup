<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface {
    public function createCategory(Category $category);
    public function updateCategory(Category $category);
    public function deleteCategory(Category $category);
    public function getCategory(Category $category);
}
