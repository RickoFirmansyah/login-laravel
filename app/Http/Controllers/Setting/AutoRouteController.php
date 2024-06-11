<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Menus;
use Illuminate\Support\Facades\File;

class AutoRouteController extends Controller
{
    public function rewriteRouteFile($id = 1)
    {
        $filePath = base_path('routes/web.php');
        $fileContent = File::get($filePath);

        $newContent = $fileContent . "\n // Your new content here";

        File::put($filePath, $newContent);

        $this->prefillContent($id);

        return 'Route has been rewritten';
    }

    public function prefillContent($id)
    {
        $menu = Menus::find($id);

        $filePath = base_path('routes/web.php');
        $fileContent = File::get($filePath);

        $newContent = $fileContent . "\n // Your new content here\n";

        $view = str_replace('/', '', $menu->name);
        $newContent .= "Route::get('/admin/setting" . $menu->url . "', function () { return view('pages.admin." . $view . ".index'); });";

        File::put($filePath, $newContent);

        $directoryPath = base_path('resources/views/pages/admin' . $menu->url);
        File::makeDirectory($directoryPath, 0755, true, true);

        $viewPath = $directoryPath . '/index.blade.php';
        $content = <<<HTML
            @extends('layouts.app')

            @section('content')
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div class="app-toolbar py-3 py-lg-6">
                        <div class="app-container container-xxl d-flex flex-stack">
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    $menu->name
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="app-container container-xxl">
                        <h1>This is $menu->name page</h1>
                    </div>
                </div>
            @endsection
        HTML;

        File::put($viewPath, $content);
    }

    public function updateRouteFile($id, $newMenu)
    {
        $oldMenu = Menus::find($id);

        if (!$oldMenu) {
            return redirect()->back()->with('error', 'Menu not found.');
        }

        $oldPath = $oldMenu->url;
        $oldName = $oldMenu->name;
        $oldMenu->update($newMenu);
        $newPath = $oldMenu->url;

        $this->deleteOldRoute($oldPath);
        $this->createNewRoute($newPath, $oldMenu->name);

        $this->createNewViewFile($oldMenu->name);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate.');
    }

    protected function createNewRoute($newPath, $menuName)
    {
        $filePath = base_path('routes/web.php');
        $fileContent = File::get($filePath);
        $view = str_replace('/', '', $menuName);
        $newRoute = "Route::get('/admin/setting" . $newPath . "', function () { return view('pages.admin." . $view . ".index'); });";
        $newContent = $fileContent . "\n" . $newRoute;
        File::put($filePath, $newContent);
    }

    protected function deleteOldRoute($oldPath)
    {
        $filePath = base_path('routes/web.php');
        $fileContent = File::get($filePath);
        $oldRoute = "Route::get('/admin/setting" . $oldPath . "', function () { return view('pages.admin." . str_replace("/", "", $oldPath) . ".index'); });";
        $newContent = str_replace($oldRoute, '', $fileContent);
        File::put($filePath, $newContent);
    }

    protected function createNewViewFile($menuName)
    {
        $viewPath = resource_path('views/pages/admin/' . str_replace('/', '', $menuName) . '/index.blade.php');

        if (!File::exists($viewPath)) {
            File::makeDirectory(dirname($viewPath), 0755, true, true);

            $content = <<<HTML
    @extends('layouts.app')

    @section('content')
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            {$menuName}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="app-container container-xxl">
                <h1>This is {$menuName} page</h1>
            </div>
        </div>
    @endsection
    HTML;

            File::put($viewPath, $content);
        }
    }


}