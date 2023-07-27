<?php

namespace App\Services;

use App\Interfaces\CrudInterface;
use App\Models\Category;

class CategoryService {

    private $crudInterface;
    private $categoryModel;

    public function __construct(CrudInterface $crudInterface, Category $categoryModel)
    {
        $this->crudInterface = $crudInterface;
        $this->categoryModel = $categoryModel;
    }

    public function getAllCategories()
    {
        return $this->crudInterface->index($this->categoryModel);
    }

    public function getOneCategoryById($id)
    {
        return $this->crudInterface->show($this->categoryModel, $id);
    }

    public function createCategory($request)
    {
        $data = [
            'name' => strip_tags($request->name)
        ];

        return $this->crudInterface->store($this->categoryModel, $data);
    }


    public function updateCategory($request, $id)
    {
        $data = [
            'name' => $request->name,
            'updated_at' => now()
        ];

        return $this->crudInterface->update($this->categoryModel, $id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->crudInterface->destroy($this->categoryModel, $id);
    }
}
