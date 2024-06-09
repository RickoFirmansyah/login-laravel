<?php

namespace App\DataTables\Cms;

use App\Models\Cms\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->addColumn('action', 'news.action')
            ->addIndexColumn()
            ->addColumn('action', function (News $row) {
                return view('pages.admin.cms.news.action', ['news' => $row]);
            })
            ->editColumn('title', function (News $news) {
                return substr($news->title, 0, 30) . '...';
            })
            ->editColumn('description', function (News $news) {
                return substr($news->description, 0, 50) . '...';
            })
            ->editColumn('created_by', function (News $news) {
                return User::find($news->created_by)->name;
            })
            ->editColumn('updated_by', function (News $news) {
                return User::find($news->updated_by)->name;
            })
            ->editColumn('created_at', function (News $news) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($news->created_at),
                    'user' => $news->createddBy
                ]);
            })
            ->editColumn('updated_at', function (News $news) {
                return view('components.table-timestamp', [
                    'date' => formatDateFromDatabase($news->updated_at),
                    'user' => $news->updatedBy
                ]);
            })
            ->rawColumns(['action'])
            ->setRowId('id');

    }

    public function query(News $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('news-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '".csrf_token()."';
                        data._p = 'POST';
                    ")
            ->dom('rt'."<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->orderBy(2)
            ->select(false)
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('title')->title('Judul Berita'),
            // Column::make('description')->title('Deskripsi'),
            Column::make('created_at')->title('Dibuat pada'),
            Column::make('updated_at')->title('Diedit pada'),
            Column::make('created_by')->title('Dibuat oleh'),
            Column::make('updated_by')->title('Diedit oleh'),
        ];
    }

    protected function filename(): string
    {
        return 'News_'.date('YmdHis');
    }
}
