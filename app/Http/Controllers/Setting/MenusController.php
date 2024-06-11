<?php

namespace App\Http\Controllers\Setting;

use ResponseFormatter;
use Illuminate\Support\Str;
use App\Traits\HasReference;
use Illuminate\Http\Request;
use App\Models\Setting\Menus;
use App\Models\Setting\Access;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;
use App\DataTables\Setting\MenusDataTable;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Controllers\Setting\AutoRouteController;

class MenusController extends Controller
{
    use HasReference;

    public function index(MenusDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.setting.menus.index');
    }

    public function create(Menus $menu)
    {
        $parents = Menus::where('id', '!=', $menu->id)->get();
        return view('pages.admin.setting.menus.create', compact('menu', 'parents'));
    }

    public function store(StoreMenuRequest $request)
    {

        $newMenu = Menus::create($request->validated());
        $rewriteRoute = new AutoRouteController();
        $rewriteRoute->rewriteRouteFile($newMenu->id);


        $addPermissions = new Permission();
        $addPermissions->name = $request->module;
        $addPermissions->guard_name = "web";
        $addPermissions->save();

        if ($newMenu) {
            return redirect()->route('menus.index')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->route('menus.index')->with('error', 'Gagal menambahkan data. Coba lagi !.');
        }
    }

    public function destroy(Menus $menu)
    {
        try {
            $menu->deleteOrFail();
            return ResponseFormatter::created('Menu berhasil dihapus.');
        } catch (\Exception $e) {
            return ResponseFormatter::error("Gagal menghapus menu. Coba lagi !", [
                "message" => $e->getMessage()
            ], code: 500);
        }
    }

    public function edit(Menus $menu)
    {
        $parents = Menus::where('id', '!=', $menu->id)->get();
        return view('pages.admin.setting.menus.edit', compact('menu', 'parents'));
    }

    public function update(StoreMenuRequest $request, Menus $menu)
    {
        try {
            $payload = $request->validated();
            $rewriteRoute = new AutoRouteController();
            $menu->update($payload);
            $rewriteRoute->updateRouteFile($menu->id, $payload);
            return ResponseFormatter::success("Menu berhasil diupdate", $menu);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Gagal mengupdate menu. Coba lagi !", [
                "message" => $e->getMessage()
            ], code: 500);
        }

        return redirect()->route('menus.index');
    }


    public function iconsRef(Request $request)
{
    $iconFile = file_get_contents(public_path('assets/libs/fontawesome/css/all.css'));
    preg_match_all("/\.fa-[a-zA-Z0-9\-]+:before/", $iconFile, $matches);
    $result = [];
    foreach ($matches[0] as $match) {
        $name = str_replace([":before", "."], "", $match);
        $result[] = [
            "id" => "fa $name",
            "text" => "fa $name"
        ];
    }
    if ($request->term) {
        $result = collect($result)->filter(function ($value) use ($request) {
            return stripos($value['text'], $request->term) !== false;
        })->values()->toArray();
    }

    return response()->json(['results' => $result]);
}

}
