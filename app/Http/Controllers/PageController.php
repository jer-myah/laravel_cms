<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\HandleUpload;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Category;
use App\Services\PageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService){
        $this->pageService = $pageService;
    }
    
    public function index (): View {
        $pages = $this->pageService->getAllPages(); 
        return view('admin.pages.index')->with(['pages' => $pages, 'categories' => Category::get()]);
    }

    public function create () : View {
        return view('admin.pages.create');        
    }

    public function store (StorePageRequest $request): RedirectResponse {
        if ($this->pageService->createPage($request)) {
            return redirect('/admin/pages')->with('success', 'Page created');
        } else {
            return back()->with('error', 'Error creating page');
        }
    }

    public function show ($id): View {
        $page = $this->pageService->getOnePageById($id);
        return view('admin.pages.show')->with(['page' => $page, 'categories' => Category::all()]);
    }

    public function edit ($id): View {
        $page = $this->pageService->getOnePageById($id);
        return view('admin.pages.edit')->with('page', $page);
    }

    public function update (UpdatePageRequest $request, $id): RedirectResponse {
        if ($this->pageService->updatePage($request, $id)) {
            return redirect('/admin/pages')->with('success', 'Page updated');
        } else {
            return back()->with('error', 'Error updating page');
        }
    }

    public function destroy ($id): RedirectResponse {
        if ($this->pageService->deletePage($id)) {
            return redirect('/admin/pages')->with('success', 'Page removed');
        } else {
            return back()->with('error', 'Error removing page');
        }
    }

    public function uploadImage (Request $request): JsonResponse {
        if ($request->hasFile('upload')) {
            
            $paths = HandleUpload::uploadImage($request);

            return response()->json(['file_name' => $paths['file_name'], 'uploaded' => 1, 'url' =>$paths['url']]);
        }
    }
}
