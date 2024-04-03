<?php

namespace App\Http\Controllers\Setting;

use App\DataTables\Setting\FileManagerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\FileManagement\StoreFileManagementRequest;
use App\Models\Setting\FileManagement;
use App\Models\User;
use ResponseFormatter;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the files.
     */
    public function index(FileManagerDataTable $dataTable)
    {
        $users = User::all();
        return $dataTable->render('pages.admin.setting.file-manager.index', [
            'users' => $users
        ]);
    }
    /**
     * Store a file in storage.
     *
     * Dynamic validation for allowed file types and max file size from SystemSettingModel.
     * max_file_size is in KB. Example: 1024
     * allowed_file_types is a comma separated string. Example: jpg,png,pdf
     *
     * @param  \App\Http\Requests\FileManagement\StoreFileManagementRequest  $request
     */
    public function store(StoreFileManagementRequest $request)
    {
        $fileManagement = FileManagement::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );

        if($fileManagement){
            return ResponseFormatter::created("File has been created succesfully", $fileManagement);
        }else{
            return ResponseFormatter::error("Failed to add the file, server error",code:500);
        }

    }

    /**
     * Display the specified file.
     */
    public function edit(FileManagement $file_manager)
    {
        return response()->json([
            ...collect($file_manager->toArray())->except('file'),
            'file' => getFileInfo($file_manager->file)
        ]);
    }

    public function update(StoreFileManagementRequest $request, FileManagement $file_manager)
    {
        if ($file_manager->update($request->validated())) {;
            return ResponseFormatter::success("File has been updated successfully", $file_manager);
        } else {
            return ResponseFormatter::error("Failed to update the file, server error",code:500);
        }
    }

    /**
     * Remove the specified file from storage.
     */
    public function destroy($id)
    {
        $fileManagement = FileManagement::find($id);
        if ($fileManagement->delete()) {
            return ResponseFormatter::success("File has been deleted successfully");
        }
        return ResponseFormatter::error("Failed to delete the file, server error",code:500);
    }




    /**
     * Download the specified file.
     */
    public function download($id)
    {
        $fileManagement = FileManagement::find($id);
        return $fileManagement->download();
    }
}
