<?php
namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory(Category $category)
    {
        // TODO: Implement createCategory() method.
    }

    public function updateCategory(Category $category)
    {
        // TODO: Implement updateCategory() method.
    }

    public function deleteCategory(Category $category)
    {
        // TODO: Implement deleteCategory() method.
    }

    public function getCategory(Category $category)
    {
        // TODO: Implement getCategory() method.
    }
}
