<?php

namespace App\DataTables\Pokok;

use App\Models\PetugasPemantauan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PetugasPemantauanDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'petugas-pemantauan.action')
            ->addIndexColumn()
            ->addColumn('action', function (PetugasPemantauan $val) {
                return view('pages.admin.petugas-pemantauan.action',['petugas' => $val]);
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(PetugasPemantauan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('PetugasPemantauan-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '".csrf_token()."';
                        data._p = 'POST';
                    ")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->orderBy(2)
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::make('name')->title('nama'),
            Column::make('gender')->title('jenis kelamin'),
            Column::make('phone_number')->title('nomer telpon'),
            Column::make('address')->title('alamat'),
            Column::computed('action')->title('aksi')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'PetugasPemantauan_'.date('YmdHis');
    }
}
