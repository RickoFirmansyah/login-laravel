<?php

namespace App\DataTables\Setting;

use App\Models\Setting\SystemSettingModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SystemSettingDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
            ->addColumn('action', 'systemSetting.action')
            ->addIndexColumn()
            ->addColumn('action', function (SystemSettingModel $row) {
                return view('pages.admin.setting.system-setting.action', ['systemSetting' => $row]);
            })
            ->editColumn('is_active', function (SystemSettingModel $val) {
                return '<span class="badge bg-' . ($val->is_active == "1" ? "success" : 'danger') . '">' . ($val->is_active == "1" ? 'Active' : 'Inactive') . '</span>';
            })
            ->editColumn('icon', function (SystemSettingModel $val) {
                return '<span class="menu-icon"><i class="' . $val->icon . '"></i> ' . $val->icon . '</span>';
            })
            ->rawColumns(['action', 'is_active', 'icon'])
            ->setRowId('id');

        return $dataTable;
    }

    public function query(SystemSettingModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('system-setting-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '" . csrf_token() . "';
                        data._p = 'POST';
                    ")
            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::computed('action')->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('is_active')
                ->title('Status'),
            Column::make('type')->title('tipe'),
            Column::make('value')->title('isi'),
            Column::make('description')->title('deskripsi'),
        ];
    }

    protected function filename(): string
    {
        return 'SystemSettingModel_' . date('YmdHis');
    }
}
