<?php

namespace App\DataTables\Map;

use App\Models\Master\KabupatenKota;
use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SlaughteringPlaceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'slaughteringplace.action')
            ->addIndexColumn()
            ->editColumn('kelurahan_id', function (SlaughteringPlace $slaughteringPlace) {
                return $slaughteringPlace->kelurahan->nama;
            })
            ->editColumn('kecamatan_id', function (SlaughteringPlace $slaughteringPlace) {
                return $slaughteringPlace->kecamatan->nama;
            })
            ->editColumn('name', function (SlaughteringPlace $slaughteringPlace) {
                return $slaughteringPlace->user->name;
            })
            // ->editColumn('user_id', function (SlaughteringPlace $slaughteringPlace) {
            //     return $slaughteringPlace->user->no_tlp;
            // })
            ->editColumn('user_id', function (SlaughteringPlace $slaughteringPlace) {
                return $slaughteringPlace->user->email;
            })
            // ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SlaughteringPlace $model): QueryBuilder
    {
        $query = $model->newQuery()
        ->with(['kelurahan', 'kecamatan']);

        if ($this->request()->filled('kecamatan_id')) {
            $query->where('kecamatan_id', $this->request()->kecamatan_id);
        }

        if ($this->request()->filled('kelurahan_id')) {
            $query->where('kelurahan_id', $this->request()->kelurahan_id);
        }

        return $query;
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    
                    ->setTableId('slaughteringplace-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(script: "
                                data._token = '" . csrf_token() . "';
                                data._p = 'POST';
                            ")
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
                    ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
                    ->language(url('json/lang.json'))
                    ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
                    ->orderBy(0)
                    ->select(false)
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
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
            Column::make('cutting_place')->title('Tempat Pemotongan'),
            Column::make('kelurahan_id')->title('Desa/Kelurahan'),
            Column::make('kecamatan_id')->title('Kemacamatan'),
            Column::make('name')->title('Nama Petugas'),
            // Column::make('user_id')->title('No Telepon'),
            Column::make('user_id')->title('Email'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SlaughteringPlace_' . date('YmdHis');
    }
}
