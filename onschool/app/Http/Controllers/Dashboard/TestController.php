<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\UsersRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index(UsersDataTable $datatable)
    {
        $exist   = $this->exist;
        $trash   = $this->trash;
        return $datatable->render('dashboard.users.index', compact('exist', 'trash'));
    } // End of Index Show Users
} // END OF USERS CONTROLLER
