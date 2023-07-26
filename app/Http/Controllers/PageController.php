<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\HandleUpload;
use App\Models\Category;
use App\Services\PageService;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService){
        $this->pageService = $pageService;
    }
    
    public function index () {
        $pages = $this->pageService->getAllPages();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function create () {
        return view('admin.pages.create');        
    }

    public function store (Request $request) {
        if ($this->pageService->createPage($request)) {
            return redirect('/admin/pages')->with('success', 'Page created');
        } else {
            return back()->with('error', 'Error creating page');
        }
    }

    public function show ($id) {
        $page = $this->pageService->getOnePageById($id);
        return view('admin.pages.show')->with(['page' => $page, 'categories' => Category::all()]);
    }

    public function edit ($id) {
        $page = $this->pageService->getOnePageById($id);
        return view('admin.pages.edit')->with('page', $page);
    }

    public function update (Request $request, $id) {
        if ($this->pageService->updatePage($request, $id)) {
            return redirect('/admin/pages')->with('success', 'Page updated');
        } else {
            return back()->with('error', 'Error updating page');
        }
    }

    public function destroy ($id) {
        if ($this->pageService->deletePage($id)) {
            return redirect('/admin/pages')->with('success', 'Page removed');
        } else {
            return back()->with('error', 'Error removing page');
        }
    }

    public function uploadImage (Request $request) {
        if ($request->hasFile('upload')) {
            
            $paths = HandleUpload::uploadImage($request);

            return response()->json(['file_name' => $paths['file_name'], 'uploaded' => 1, 'url' =>$paths['url']]);
        }
    }
}
