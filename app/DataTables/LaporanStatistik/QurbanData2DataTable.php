<?php

namespace App\DataTables\LaporanStatistik;

use App\Models\SlaughteringPlace; 
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class QurbanData2DataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $searchValue = request('search')['value'];

        return (new EloquentDataTable($query))
            ->filter(function ($query) use ($searchValue) {
                $query->where(function($query) use ($searchValue) {
                    $query->where('qurban_data.disease', 'like', '%' . $searchValue . '%')
                          ->orWhere('ref_kelurahan.nama', 'like', '%' . $searchValue . '%')
                          ->orWhere('ref_kecamatan.nama', 'like', '%' . $searchValue . '%')
                          ->havingRaw("jumlah_sapi LIKE ?", ['%' . $searchValue . '%'])
                        //   ->orHavingRaw("jumlah_sapi_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kerbau LIKE ?", ['%' . $searchValue . '%'])
                        //   ->orHavingRaw("jumlah_kerbau_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kambing LIKE ?", ['%' . $searchValue . '%'])
                        //   ->orHavingRaw("jumlah_kambing_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_domba LIKE ?", ['%' . $searchValue . '%'])
                        //   ->orHavingRaw("jumlah_domba_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("total_hewan_qurban LIKE ?", ['%' . $searchValue . '%']);

                });
            })
            ->addIndexColumn()
            ->editColumn('disease', function ($query) {
                return $query->disease;
            })
            ->editColumn('village_name', function ($query) {
                return $query->village_name;
            })
            ->editColumn('district_name', function ($query) {
                return $query->district_name;
            })
            ->editColumn('jumlah_sapi', function ($query) {
                return $query->jumlah_sapi;
            })
            ->editColumn('jumlah_kerbau', function ($query) {
                return $query->jumlah_kerbau;
            })
            ->editColumn('jumlah_kambing', function ($query) {
                return $query->jumlah_kambing;
            })
            ->editColumn('jumlah_domba', function ($query) {
                return $query->jumlah_domba;
            })
            ->editColumn('total_hewan_qurban', function ($query) {
                return $query->total_hewan_qurban;
            })
            ->setRowId('id');
    }   

    /**
     * Get the query source of dataTable.
     */
    public function query(SlaughteringPlace $model): QueryBuilder
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        return $model->newQuery()
            ->with(['qurbanReport.qurbanData.typeOfQurban', 'kelurahan', 'kecamatan'])
            ->select([
                'qurban_data.disease',
                'ref_kelurahan.nama as village_name',
                'ref_kecamatan.nama as district_name',
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Sapi' THEN 1 END) AS jumlah_sapi"),
                // DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Sapi' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_sapi_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kerbau' THEN 1 END) AS jumlah_kerbau"),
                // DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kerbau' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_kerbau_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kambing' THEN 1 END) AS jumlah_kambing"),
                // DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kambing' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_kambing_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Domba' THEN 1 END) AS jumlah_domba"),
                // DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Domba' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_domba_betina"),
                DB::raw("COUNT(*) AS total_hewan_qurban")
            ])
            ->join('qurban_reports', 'qurban_reports.slaughtering_place_id', '=', 'slaughtering_places.id')
            ->join('qurban_data', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->join('ref_kelurahan', 'slaughtering_places.kelurahan_id', '=', 'ref_kelurahan.id')
            ->join('ref_kecamatan', 'slaughtering_places.kecamatan_id', '=', 'ref_kecamatan.id')
            ->when($startDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('qurban_reports.date', [$startDate, $endDate]);
            })
            ->groupBy('qurban_data.disease', 'ref_kelurahan.nama', 'ref_kecamatan.nama')
            ->orderBy('qurban_data.disease')
            ->orderBy('ref_kelurahan.nama')
            ->orderBy('ref_kecamatan.nama');
    }
    

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('qurbandata2-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
                    ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
                    ->language(url('json/lang.json'))
                    ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
                    ->orderBy(0)
                    ->select(false)
                    ->buttons([
                        'excel',
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::make('disease')->title('Penyakit'),
            Column::make('village_name')->title('Desa/Kelurahan'),
            Column::make('district_name')->title('Kecamatan'),
            Column::make('jumlah_sapi')->title('Sapi'),
            Column::make('jumlah_kerbau')->title('Kerbau'),
            Column::make('jumlah_kambing')->title('Kambing'),
            Column::make('jumlah_domba')->title('Domba'),
            Column::make('total_hewan_qurban')->title('Total'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'QurbanData_' . date('YmdHis');
    }
}
