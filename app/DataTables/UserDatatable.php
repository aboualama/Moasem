<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $query = User::query();
        
        return datatables($query)
            ->addColumn('edit', 'admin.user.btn.edit')
            ->addColumn('delete', 'admin.user.btn.delete')
            ->addColumn('checkbox', 'admin.user.btn.active') 
            
            ->rawColumns([
                'checkbox',
                'edit',
                'delete',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 
            'first_name', 'email', 'date', 'gender', 'status', 'bio' , 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    // ->parameters($this->getBuilderParameters());
                    ->parameters([
                        // 'dom'        => 'Blfrtip',
                        'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Record']],
                    //     'buttons'    => [
                    // [
                    //     'text'      => '<i class="fa fa-plus"></i> ' .'Create' ,
                    //     'className' => 'btn btn-info',
                    //     'action'    => 'function(){
                    //         window.location.href =  "/admin/add/user";
                    //     }',
                    // ],
                    // ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                    // ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '. 'Csv'],
                    // ['extend' => 'excel','className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '. 'Excel'],
                    // ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                    // ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'first_name',  
            'email', 
            'date', 
            'gender', 
            'status', 
            [
                'name'       => 'checkbox',
                'data'       => 'checkbox',
                'title'      => 'Activation',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
                'sortable'   => false,
            ],
            'bio',
            'created_at',
            'updated_at',
            // [
            //     'name'       => 'edit',
            //     'data'       => 'edit',
            //     'title'      => 'Edit',
            //     'exportable' => false,
            //     'printable'  => false,
            //     'orderable'  => false,
            //     'searchable' => false,
            // ], 
            [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'Delete',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
