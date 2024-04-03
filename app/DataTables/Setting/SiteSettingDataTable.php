<?php

namespace App\DataTables\Setting;

use App\Models\Setting\SiteSetting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SiteSettingDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'sitesetting.action')
            ->addIndexColumn()
            ->addColumn('action', function (SiteSetting $row) {
                return view('pages.admin.setting.site-settings.action', ['siteSetting' => $row]);
            })
            ->editColumn('type', function (SiteSetting $row) {
                if ($row->type == 'site-identity') {
                    return <<<'HTML'
                    <span class="badge bg-light-success">Site Identity</span>
                    HTML;
                } elseif ($row->type == 'hero') {
                    return <<<'HTML'
                    <span class="badge bg-light-primary">Hero</span>
                    HTML;
                } elseif ($row->type == 'profile') {
                    return <<<'HTML'
                    <span class="badge bg-light-info">Profile</span>
                    HTML;
                } else {
                    return <<<'HTML'
                    <span class="badge bg-light-dark">Unknown</span>
                    HTML;
                }
            })
            ->setRowId('id')
            ->rawColumns(['action', 'type']);
    }

    public function query(SiteSetting $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sitesetting-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '".csrf_token()."';
                        data._p = 'POST';
                    ")
            ->dom('rt'."<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
            ->orderBy(3)
            ->select(false)
            ->language(url('json/lang.json'))
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
            ->buttons([]);

    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
            Column::make('type'),
            Column::make('name'),
            Column::make('value'),
            Column::make('description'),
        ];
    }

    protected function filename(): string
    {
        return 'SiteSetting_'.date('YmdHis');
    }
}
