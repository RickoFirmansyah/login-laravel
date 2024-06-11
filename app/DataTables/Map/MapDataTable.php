<?php

namespace App\DataTables\Map;

use App\Models\SlaughteringPlace;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class MapDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->editColumn('kelurahan_id', function (SlaughteringPlace $slaughteringPlace) {
            return $slaughteringPlace->kelurahan ? $slaughteringPlace->kelurahan->nama : 'N/A';
        })
        ->editColumn('kecamatan_id', function (SlaughteringPlace $slaughteringPlace) {
            return $slaughteringPlace->kecamatan ? $slaughteringPlace->kecamatan->nama : 'N/A';
        })
        ->editColumn('user_id', function (SlaughteringPlace $slaughteringPlace) {
            return $slaughteringPlace->user ? $slaughteringPlace->user->name : 'N/A';
        })
        ->editColumn('user_email', function (SlaughteringPlace $slaughteringPlace) {
            return $slaughteringPlace->user ? $slaughteringPlace->user->email : 'N/A';
        })
        ->setRowId('id');
}


    /**
     * Get the query source of dataTable.
     */
    public function query(SlaughteringPlace $model): QueryBuilder
    {
        $query = $model->newQuery()->with(['kelurahan', 'kecamatan', 'user']);

        if ($this->request()->filled('kecamatan_id')) {
            $query->where('kecamatan_id', $this->request()->kecamatan_id);
        }

        if ($this->request()->filled('kelurahan_id')) {
            $query->where('kelurahan_id', $this->request()->kelurahan_id);
        }
        Log::info('Query Results:', $query->get()->toArray());

        return $query;
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('map-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt<"row"<"col-sm-12 col-md-5"l><"col-sm-12 col-md-7"p>>')
            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->orderBy(0)
            ->buttons([]);
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
            Column::make('cutting_place')->title('Tempat Pemotongan'),
            Column::make('kelurahan.nama')->title('Desa/Kelurahan'),
            Column::make('kecamatan.nama')->title('Kecamatan'),
            Column::make('user.name')->title('Nama Petugas'),
            Column::make('user.email')->title('Email')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Map_' . date('YmdHis');
    }
}
