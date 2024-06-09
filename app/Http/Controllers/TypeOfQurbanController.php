<?php

namespace App\Http\Controllers;

use App\DataTables\Master\JenisKurbanDataTable;
use App\Models\TypeOfQurban;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use ResponseFormatter;

class TypeOfQurbanController extends Controller
{
    function __construct()
    {
        $this->model = new TypeOfQurban();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(JenisKurbanDataTable $jenisKurbanDataTable)
    {
        return $jenisKurbanDataTable->render('pages.admin.master.jenis_kurbanv2.index');
    }

    public function export()
    {
        $data = $this->model->all();
        $position = 2;
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A1', 'ID');
        $activeWorksheet->setCellValue('B1', 'NAME');

        foreach ($data as $isi) {
            $activeWorksheet->setCellValue('A' . $position, $isi['id']);
            $activeWorksheet->setCellValue('B' . $position, $isi['type_of_animal']);
            $position++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('file/world.xlsx');
        return redirect('file/world.xlsx');
    }

    public function import()
    {

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setLoadSheetsOnly(["Sheet 1", "My special sheet"]);
        $spreadsheet = $reader->load("files/world.xlsx");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.master.jenis_kurbanv2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kurban' => 'required',
        ]);

        // dd($request->all());

        if ($request->id != null) {
            $data = TypeOfQurban::findOrFail($request->id);
            $data->update(
                array_merge(
                    ['type_of_animal' => $request->jenis_kurban],
                    ['update_by' => auth()->user()->id]
                )
            );

            return response()->json(['success' => ' updated successfully']);
        } else {
            TypeOfQurban::create(
                array_merge(
                    ['type_of_animal' => $request->jenis_kurban],
                    ['created_by' => auth()->user()->id],
                    ['update_by' => auth()->user()->id]
                )
            );

            return
                redirect()->route('jenis-kurban.index')->with('success', 'created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfQurban $typeOfQurban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = TypeOfQurban::findOrFail($id);
        return view('pages.admin.master.jenis_kurbanv2.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = TypeOfQurban::findOrFail($id);
        $user->type_of_animal = $request->name;
        $user->save();

        return redirect()->route('jenis-kurban.index')->with('success', 'Data Kurban Berhasil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = TypeOfQurban::find($id);
        $provinsi->delete();
        return ResponseFormatter::success('Deleted successfully');
    }
}
