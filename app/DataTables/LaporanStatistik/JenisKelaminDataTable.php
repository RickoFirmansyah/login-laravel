<?php

namespace App\DataTables\LaporanStatistik;

use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JenisKelaminDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $searchValue = request('search')['value'];

        return (new EloquentDataTable($query))
            ->filter(function ($query) use ($searchValue) {
                $query->where(function($query) use ($searchValue) {
                    $query->where('slaughtering_places.cutting_place', 'like', '%' . $searchValue . '%')
                          ->orWhere('ref_kelurahan.nama', 'like', '%' . $searchValue . '%')
                          ->orWhere('ref_kecamatan.nama', 'like', '%' . $searchValue . '%')
                          ->havingRaw("jumlah_sapi_jantan LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_sapi_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kerbau_jantan LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kerbau_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kambing_jantan LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_kambing_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_domba_jantan LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("jumlah_domba_betina LIKE ?", ['%' . $searchValue . '%'])
                          ->orHavingRaw("total_hewan_qurban LIKE ?", ['%' . $searchValue . '%']);

                });

                // if ($searchValue) {
                //     $query->havingRaw("jumlah_sapi_jantan LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_sapi_betina LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_kerbau_jantan LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_kerbau_betina LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_kambing_jantan LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_kambing_betina LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_domba_jantan LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("jumlah_domba_betina LIKE ?", ['%' . $searchValue . '%'])
                //           ->orHavingRaw("total_hewan_qurban LIKE ?", ['%' . $searchValue . '%']);
                // }
            })
            ->addIndexColumn()
            ->editColumn('cutting_place', function ($query) {
                return $query->cutting_place;
            })
            ->editColumn('village_name', function ($query) {
                return $query->village_name;
            })
            ->editColumn('district_name', function ($query) {
                return $query->district_name;
            })
            ->editColumn('jumlah_sapi_jantan', function ($query) {
                return $query->jumlah_sapi_jantan;
            })
            ->editColumn('jumlah_sapi_betina', function ($query) {
                return $query->jumlah_sapi_betina;
            })
            ->editColumn('jumlah_kerbau_jantan', function ($query) {
                return $query->jumlah_kerbau_jantan;
            })
            ->editColumn('jumlah_kerbau_betina', function ($query) {
                return $query->jumlah_kerbau_betina;
            })
            ->editColumn('jumlah_kambing_jantan', function ($query) {
                return $query->jumlah_kambing_jantan;
            })
            ->editColumn('jumlah_kambing_betina', function ($query) {
                return $query->jumlah_kambing_betina;
            })
            ->editColumn('jumlah_domba_jantan', function ($query) {
                return $query->jumlah_domba_jantan;
            })
            ->editColumn('jumlah_domba_betina', function ($query) {
                return $query->jumlah_domba_betina;
            })
            ->editColumn('total_hewan_qurban', function ($query) {
                return $query->total_hewan_qurban;
            })
            ->setRowId('id');
    }

    public function query(SlaughteringPlace $model): QueryBuilder
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        return $model->newQuery()
            ->with(['qurbanReport.qurbanData.typeOfQurban', 'kelurahan', 'kecamatan'])
            ->select([
                'slaughtering_places.cutting_place',
                'ref_kelurahan.nama as village_name',
                'ref_kecamatan.nama as district_name',
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Sapi' AND qurban_data.gender = 'Jantan' THEN 1 END) AS jumlah_sapi_jantan"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Sapi' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_sapi_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kerbau' AND qurban_data.gender = 'Jantan' THEN 1 END) AS jumlah_kerbau_jantan"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kerbau' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_kerbau_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kambing' AND qurban_data.gender = 'Jantan' THEN 1 END) AS jumlah_kambing_jantan"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Kambing' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_kambing_betina"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Domba' AND qurban_data.gender = 'Jantan' THEN 1 END) AS jumlah_domba_jantan"),
                DB::raw("COUNT(CASE WHEN type_of_qurbans.type_of_animal = 'Domba' AND qurban_data.gender = 'Betina' THEN 1 END) AS jumlah_domba_betina"),
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
            ->groupBy('slaughtering_places.cutting_place', 'ref_kelurahan.nama', 'ref_kecamatan.nama')
            ->orderBy('slaughtering_places.cutting_place')
            ->orderBy('ref_kelurahan.nama')
            ->orderBy('ref_kecamatan.nama');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('qurbandata-table')
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

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::make('cutting_place')->title('Tempat Pemotongan'),
            Column::make('village_name')->title('Desa/Kelurahan'),
            Column::make('district_name')->title('Kecamatan'),
            Column::make('jumlah_sapi_jantan')->title('Sapi Jantan'),
            Column::make('jumlah_sapi_betina')->title('Sapi Betina'),
            Column::make('jumlah_kerbau_jantan')->title('Kerbau Jantan'),
            Column::make('jumlah_kerbau_betina')->title('Kerbau Betina'),
            Column::make('jumlah_kambing_jantan')->title('Kambing Jantan'),
            Column::make('jumlah_kambing_betina')->title('Kambing Betina'),
            Column::make('jumlah_domba_jantan')->title('Domba Jantan'),
            Column::make('jumlah_domba_betina')->title('Domba Betina'),
            Column::make('total_hewan_qurban')->title('Total Qurban'),
        ];
    }

    protected function filename(): string
    {
        return 'QurbanData_' . date('YmdHis');
    }
}
