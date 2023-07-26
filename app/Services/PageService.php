<?php

namespace App\Services;

use App\Actions\UploadToS3;
use App\Actions\HandleUploadToAzure;
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
        $path = 'category_images';

        $image_path = UploadToS3::imageToS3($path, $request->image);

        $data = [
            'name' => $request->name,
            'image' => $image_path
        ];

        return $this->crudInterface->store($this->categoryModel, $data);
    }


    public function updateCategory($request)
    {
        $data = [
            'name' => $request->name,
            'updated_at' => now()
        ];

        $id = $request->id;

        return $this->crudInterface->update($this->categoryModel, $id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->crudInterface->destroy($this->categoryModel, $id);
    }
}
