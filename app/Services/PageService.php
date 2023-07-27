<?php

namespace App\Services;

use App\Actions\UploadToS3;
use App\Actions\HandleUpload;
use App\Http\Controllers\CategoryController;
use App\Interfaces\CrudInterface;
use App\Models\Page;

class PageService {

    private $crudInterface;
    private $pageModel;

    public function __construct(CrudInterface $crudInterface, Page $pageModel)
    {
        $this->crudInterface = $crudInterface;
        $this->pageModel = $pageModel;
    }

    public function getAllPages()
    {
        return $this->crudInterface->index($this->pageModel->with('categories')->get());
    }

    public function getOnePageById($id)
    {
        return $this->crudInterface->show($this->pageModel->with('categories'), $id);
    }

    public function createPage($request)
    {
        $path = 'page_images';
        $image_path = UploadToS3::imageToS3($path, $request->image);

        $data = [
            'title' => strip_tags($request->title),
            'image' => $image_path,
            'content' => $request->content,
            'meta_title' => strip_tags($request->meta_title),
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => strip_tags($request->meta_keywords),
        ];

        return $this->crudInterface->store($this->pageModel, $data);
    }


    public function updatePage($request)
    {
        $data = [
            'title' => strip_tags($request->title),
            'content' => $request->content,
            'meta_title' => strip_tags($request->meta_title),
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => strip_tags($request->meta_keywords),
            'updated_at' => now()
        ];

        $id = $request->id;

        return $this->crudInterface->update($this->pageModel, $id, $data);
    }

    public function deletePage($id)
    {
        return $this->crudInterface->destroy($this->pageModel, $id);
    }
}
