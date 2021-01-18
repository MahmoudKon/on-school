<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'dashboard.includes.table-btn._check-box')
            ->addColumn('action', 'dashboard.includes.table-btn._btn')
            ->rawColumns(['checkbox', 'action']);
    } // end of data table ajax

    public function query(User $model)
    {
        return $model->newQuery();
    } // end of query method

    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1, 'asc')
                    ->lengthMenu([10,25,50,100])
                    ->initComplete(self::searchField())
                    ->language(self::lang())
                    ->parameters([
                        'lengthMenu' => [[10,25,50], [10,25,50]],
                        'buttons' => [
                            ['text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger btn-sm multi-delete']
                        ],
                    ])
                    ->buttons(
                        Button::make('export')->className('btn btn-purple btn-sm')->text('<i class="fa fa-download"></i> ' . __('general.export')),
                        Button::make('excel')->className('btn btn-info btn-sm')->text('<i class="fa fa-file"></i> ' . __('general.excel')),
                        Button::make('print')->className('btn btn-primary btn-sm')->text('<i class="fa fa-print"></i> ' . __('general.print')),
                        Button::make('reset')->className('btn btn-warning btn-sm')->text('<i class="fa fa-undo"></i> ' . __('general.reset')),
                        Button::make('reload')->className('btn btn-danger btn-sm')->text('<i class="fa fa-sync"></i> ' . __('general.reload')),
                    );
    } // end of HTML table builder

    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' =>  '<input type="checkbox" name="id[]" class="check-all" onclick="checkAll()" id="input-5">',
                'exportable' => false,
                'orderable'  => false,
                'printable'  => false,
                'searchable' => false
            ],
            ['name' => 'id',         'data' => 'id',         'title' => __('general.id')],
            ['name' => 'username',   'data' => 'username',   'title' => __('users.username')],
            ['name' => 'email',      'data' => 'email',      'title' => __('users.email')],
            ['name' => 'phone',      'data' => 'phone',      'title' => __('users.phone')],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => __('general.created_at')],
            [
                'name'          => 'action',
                'data'          => 'action',
                'title'         => __('general.action'),
                'exportable'    => false,
                'orderable'     => false,
                'printable'     => false,
                'searchable'    => false
            ]
        ];
    } // end of columns name

    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    } // end of file name when export it

    public static function lang()
    {
        $lang = [
            'sProcessing'           => __('general.sProcessing') . ' ... ',
            'sLengthMenu'           => __('general.sLengthMenu'),
            'sZeroRecords'          => __('general.sZeroRecords'),
            'sEmptyTable'           => __('general.sEmptyTable'),
            'sInfo'                 => __('general.sInfo'),
            'sInfoEmpty'            => __('general.sInfoEmpty'),
            'sInfoFiltered'         => __('general.sInfoFiltered'),
            'sInfoPostFix'          => __('general.sInfoPostFix'),
            'sSearch'               => __('general.sSearch') . ' : ',
            'sUrl'                  => __('general.sUrl'),
            'sInfoThousands'        => __('general.sInfoThousands'),
            'sLoadingRecords'       => __('general.sLoadingRecords') . ' ... ',
            "oPaginate"     => [
                "sFirst"            => __('general.sFirst'),
                "sLast"             => __('general.sLast'),
                "sNext"             => __('general.sNext'),
                "sPrevious"         => __('general.sPrevious')
            ],
            "oAria"         => [
                "sSortAscending"    => __('general.sSortAscending') . ' : ',
                "sSortDescending"   => __('general.sSortDescending') . ' : ',
            ]
        ];
        return $lang;
    } // end of the translation the data table [ CUSTOM METHOD ]

    public static function searchField()
    {
        return 'function () {
            this.api().columns([1,2,3,4]).every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on(\'change\', function () {
                    column.search($(this).val(), false, false, true).draw();
                }).attr("class", "form-control form-control-success input-sm");
            });
        }';
    } // end of input field search [ CUSTOM METHOD ]
}
