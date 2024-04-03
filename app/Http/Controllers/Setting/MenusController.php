<?php

namespace App\Http\Controller\Setting;

use App\DataTables\MenusDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Models\Setting\Menus;
use App\Traits\HasReference;
use Illuminate\Http\Request;
use ResponseFormatter;

class MenusController extends Controller
{
    use HasReference;

    public function index(MenusDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.menus.index');
    }

    public function create()
    {
        $menus = Menus::all();
        return view('pages.admin.menus.create', compact('menus'));
    }

    public function store(StoreMenuRequest $request)
    {
        try {

            $newMenu = Menus::create($request->validated());
            // $rewriteRoute = new AutoRouteController();
            // $rewriteRoute->rewriteRouteFile($newMenu->id);

            if ($newMenu) {
                return ResponseFormatter::created("Menu created successfully", $newMenu);
            } else {
                return ResponseFormatter::error("Menu failed to create", code: 500);
            }
        } catch (\Exception $e) {
            return ResponseFormatter::error("Menu failed to create", [
                "message" => $e->getMessage()
            ], code: 500);
        }
    }

    public function destroy(Menus $menu)
    {
        try {
            $menu->deleteOrFail();
            return ResponseFormatter::success("Menu deleted successfully");
        } catch (\Exception $e) {
            return ResponseFormatter::error("Menu failed to delete", [
                "message" => $e->getMessage()
            ], code: 500);
        }
    }

    public function edit(Menus $menu)
    {
        $parents = Menus::where('id', '!=', $menu->id)->get();
        return view('pages.admin.menus.edit', compact('menu', 'parents'));
    }

    public function update(StoreMenuRequest $request, Menus $menu)
    {

        try {
            $payload = $request->validated();
            // $rewriteRoute = new AutoRouteController();
            $menu->updateOrFail($payload);
            // $rewriteRoute->updateRouteFile($menu->id, $payload);
            return ResponseFormatter::success("Menu updated successfully", $menu);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Menu failed to update", [
                "message" => $e->getMessage()
            ], code: 500);
        }

        return redirect()->route('menus.index');
    }

    public function iconsRef(Request $request)
    {
        $iconFile =  file_get_contents(public_path('assets/libs/fontawesome/css/all.css'));
        preg_match_all("/\.fa-[a-z A-Z]*:before/", $iconFile, $matches);
        $result = [];
        foreach ($matches[0] as $match) {
            $name = str_replace([":before", "."], "", $match);
            $result[] = [
                "id" => "fal $name",
                "name" => "fal $name"
            ];
        }
        if ($request->term) {
            $result = collect($result)->filter(function ($value, $key) use ($request) {
                return stripos($value['name'], $request->term);
            })->values()->toArray();
        }

        // $result = $this->generateReference($result);
        $result = $this->generateSelect2Reference($result);

        // dd($result);
        return ResponseFormatter::success("success get icons", $result);
    }
}
