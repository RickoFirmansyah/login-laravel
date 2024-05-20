<?php

namespace App\DataTables\LaporanStatistik;

use App\Models\QurbanData;
use App\Models\QurbanReport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class QurbanDataDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query = QurbanData::select([
            'qurban_data.qurban_report_id',
            'qurban_reports.slaughtering_place_id',
            'slaughtering_places.cutting_place',
            'ref_kelurahan.nama as village_name',
            'ref_kecamatan.nama as district_name',
            'type_of_qurbans.type_of_animal',
            'qurban_data.disease',
            'qurban_data.id'
        ])
            ->join('qurban_reports', 'qurban_data.qurban_report_id', '=', 'qurban_reports.id')
            ->join('slaughtering_places', 'qurban_reports.slaughtering_place_id', '=', 'slaughtering_places.id')
            ->join('ref_kelurahan', 'slaughtering_places.kelurahan_id', '=', 'ref_kelurahan.id')
            ->join('ref_kecamatan', 'slaughtering_places.kecamatan_id', '=', 'ref_kecamatan.id')
            ->join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->groupBy([
                'qurban_report_id',
                'qurban_reports.slaughtering_place_id',
                'qurban_data.type_of_qurban_id',
                'qurban_data.id',
                'slaughtering_places.cutting_place',
                'ref_kelurahan.nama',
                'ref_kecamatan.nama',
                'type_of_qurbans.type_of_animal',
                'qurban_data.disease'
            ])
            ->selectRaw('COUNT(qurban_data.id) as count');

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            // ->editColumn('slaughtering_place_id', function ($qurbanData) {
            //     return $qurbanData->cutting_place;
            // })
            ->editColumn('kelurahan_id', function ($qurbanData) {
                return $qurbanData->village_name;
            })
            ->editColumn('kecamatan_id', function ($qurbanData) {
                return $qurbanData->district_name;
            })
            ->editColumn('sapi', function ($qurbanData) {
                return $this->getAnimalDiseaseCount($qurbanData, 'Sapi');
            })
            ->editColumn('kerbau', function ($qurbanData) {
                return $this->getAnimalDiseaseCount($qurbanData, 'Kerbau');
            })
            ->editColumn('kambing', function ($qurbanData) {
                return $this->getAnimalDiseaseCount($qurbanData, 'Kambing');
            })
            ->editColumn('domba', function ($qurbanData) {
                return $this->getAnimalDiseaseCount($qurbanData, 'Domba');
            })
            ->editColumn('total', function ($qurbanData) {
                return $this->getTotalDiseases($qurbanData);
            })
            ->rawColumns(['total'])
            ->setRowId('id');
    }

    private function getAnimalDiseaseCount($qurbanData, $animalType)
    {
        return QurbanData::join('type_of_qurbans', 'qurban_data.type_of_qurban_id', '=', 'type_of_qurbans.id')
            ->where('qurban_data.qurban_report_id', $qurbanData->qurban_report_id)
            ->where('type_of_qurbans.type_of_animal', $animalType)
            ->whereNotNull('qurban_data.disease')
            ->count();
    }

    private function getTotalDiseases($qurbanData)
    {
        return QurbanData::where('qurban_data.qurban_report_id', $qurbanData->qurban_report_id)
            ->whereNotNull('qurban_data.disease')
            ->count();
    }

    public function query(QurbanData $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('qurbandata-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->orderBy(0)
            ->select(false)
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::make('disease')->title('Penyakit'),
            Column::make('kelurahan_id')->title('Desa/Kelurahan'),
            Column::make('kecamatan_id')->title('Kecamatan'),
            Column::make('sapi')->title('Sapi'),
            Column::make('kerbau')->title('Kerbau'),
            Column::make('kambing')->title('Kambing'),
            Column::make('domba')->title('Domba'),
            Column::make('total')->title('Total Penyakit'),
        ];
    }

    protected function filename(): string
    {
        return 'QurbanData_' . date('YmdHis');
    }
}
