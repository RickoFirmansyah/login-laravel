<?php

namespace App\DataTables\Master;

use App\Models\Master\TypeOfDiseases;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class TypeOfDiseasesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (TypeOfDiseases $row) {
                return view('pages.admin.master.jenis_penyakit.action', ['agency' => $row]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TypeOfDiseases $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('diseases-table')
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
            // ->orderBy(2)
            ->select(false)
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('id'),
            Column::make('type_of_diseases'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TypeOfDiseases_' . date('YmdHis');
    }
}