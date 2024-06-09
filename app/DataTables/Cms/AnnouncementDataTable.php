<?php

namespace App\DataTables\Cms;

use App\Models\Cms\Announcement;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AnnouncementDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'Announcement.action')
            ->addIndexColumn()
            ->addColumn('action', function (Announcement $row) {
                return view('pages.admin.cms.pengumuman.action', ['Announcement' => $row]);
            })
            ->editColumn('title', function (Announcement $Announcement) {
                return substr($Announcement->title, 0, 30) . '...';
            })
            ->editColumn('description', function (Announcement $Announcement) {
                return substr($Announcement->description, 0, 50) . '...';
            })
            ->editColumn('created_by', function (Announcement $Announcement) {
                return User::find($Announcement->created_by)->name;
            })
            ->editColumn('updated_by', function (Announcement $Announcement) {
                return User::find($Announcement->updated_by)->name;
            })
            ->editColumn('created_at', function (Announcement $Announcement) {
                return $Announcement->created_at->format('d, M Y');
            })
            ->editColumn('updated_at', function (Announcement $Announcement) {
                return $Announcement->updated_at->format('d, M Y');
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Announcement $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('announcement-table')
        ->columns($this->getColumns())
        ->minifiedAjax(script: "
                    data._token = '".csrf_token()."';
                    data._p = 'POST';
                ")
        ->dom('rt'."<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
        ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
        ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
        ->language(url('json/lang.json'))
        ->drawCallbackWithLivewire(file_get_contents(public_path('assets/js/dataTables/drawCallback.js')))
        ->orderBy(2)
        ->select(false)
        ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')->title('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('title')->title('pengumuman'),
            // Column::make('description')->title('Deskripsi'),
            Column::make('created_at')->title('Dibuat pada'),
            Column::make('updated_at')->title('Diedit pada'),
            Column::make('created_by')->title('Dibuat oleh'),
            Column::make('updated_by')->title('Diedit oleh'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Announcement_' . date('YmdHis');
    }
}
