<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PelaporanPemantauanDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'userlist.action')
            ->addIndexColumn()
            ->addColumn('action', function (User $val) {
                return view('pages.admin.user.user-list.action', ['user' => $val]);
            })
            ->editColumn('email_verified_at', function (User $val) {
                return $val->email_verified_at->format('d, M Y H:i');
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('name');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('userlist-table')
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
            Column::computed('action')->title('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name')->title('nama')->addClass('text-capitalize'),
            Column::make('email')->addClass('text-capitalize'),
            Column::make('email_verified_at')->title('tanggal verifikasi')->addClass('text-capitalize'),
        ];
    }

    protected function filename(): string
    {
        return 'UserList_'.date('YmdHis');
    }
}