<?php

namespace App\Http\Controllers\Dashboard;

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
    protected $exist;   // Have The Count of Users
    protected $trash;   // Have The Count of Trashed Users
    protected $columns; // Have The Columns Name

    public function __construct()
    {
        $this->exist   = User::withoutTrashed()->count();
        $this->trash   = User::onlyTrashed()->count();
        $this->columns = ['id' => 'ID', 'username' => __('users.username'), 'email' => __('users.email')];
    } // End of Construct Method

    private function rows($request, $trashed = null)
    {
        $paginate = $request['record'] ?? PAGINATE_NUMBERT;
        $type     = $trashed == null ? 'withoutTrashed' : 'onlyTrashed';
        $sort     = $request['sort'] ?? 'id';
        $order    = $request['order'] ?? 'desc';

        $rows = User::$type()->search($request)->orderBy($sort, $order)->paginate($paginate);
        return response()->json(view('dashboard.users.rows', compact('rows'))->render());
    } // End of Rows Show

    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->rows($request);
        } // end of if
        $exist   = $this->exist;
        $trash   = $this->trash;
        $columns = $this->columns;
        return view('dashboard.users.index', compact('exist', 'trash', 'columns'));
    } // End of Index Show Users

    public function trashed(Request $request)
    {
        if($request->ajax()) {
            return $this->rows($request, 'trash');
        } // end of if
        $exist   = $this->exist;
        $trash   = $this->trash;
        $columns = $this->columns;
        return view('dashboard.users.trashed', compact('exist', 'trash', 'columns'));
    } // End of Show Trashed Users

    public function create()
    {
        return response()->json(view('dashboard.users.create')->render());
    } // End of Create New User

    public function store(UsersRequest $request)
    {
        try {
            DB::beginTransaction();
                $row = User::create($request->all());
            DB::commit();
            if($row) {
                $view = view('dashboard.users.row', compact('row'))->render();
                return response()->json(['view' => $view, 'message' => __('alerts.record_created'), 'title' => __('alerts.created'), 'id' => $row->id]);
            }
        }catch(\Exception $e) {
            // return response()->json(__('alerts.something_error'), 404);
            return response()->json($e->getMessage(), 404);
        }
    } // End of Store User

    public function show(User $user)
    {
        dd($user);
    } // End of Show User

    public function edit(User $user)
    {
        return response()->json(view('dashboard.users.edit', ['row' => $user])->render());
    } // End of Edit User

    public function update(UsersRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
                $oldImage = $user->image;
                $user->update($request->all());
                if($request->has('image')) { removeImage($oldImage, 'users'); }
                $view = view('dashboard.users.row', ['row' => $user])->render();
            DB::commit();
            return response()->json(['view' => $view, 'message' => __('alerts.record_updated'), 'title' => __('alerts.updated'), 'id' => $user->id, 'type' => 'update']);
        } catch (\Exception $e) {
            // return response()->json(__('alerts.something_error'), 404);
            return response()->json($e->getMessage(), 404);
        }
    } // End of Update User

    public function destroy(Request $request)
    {
        try {
            $users = User::withoutTrashed()->whereIn('id', (array )$request['id'])->get();
            if($users) {
                DB::beginTransaction();
                    foreach($users as $user) {
                        $user->delete();
                        $this->exist -= 1;
                        $this->trash += 1;
                    } // end of foreach
                DB::commit();
                return response()->json($this->sucss('destroy_successfully', 'destroyed'));
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Soft Delete Users [ Single & Multi ]

    public function delete(Request $request)
    {
        try {
            $users = User::onlyTrashed()->whereIn('id', (array) $request['id'])->get();
            if($users) {
                DB::beginTransaction();
                foreach($users as $user) {
                    $user->forceDelete();
                    $this->trash -= 1;
                } // end of foreach
                DB::commit();
                return response()->json($this->sucss('destroy_successfully', 'deleted'));
            } // end of if statement
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Hard Delete User

    public function restore(Request $request)
    {
        try {
            $users = User::onlyTrashed()->whereIn('id', (array) $request['id'])->get();
            if($users) {
                DB::beginTransaction();
                foreach($users as $user) {
                    $user->restore();
                    $this->exist += 1;
                    $this->trash -= 1;
                } // end of foreach
                DB::commit();
                return response()->json($this->sucss('restored_successfully', 'restored'));
            } // end of if statement
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    } // End of Restore Users [ Single & Multi ]

    public function export($file)
    {
        if($file === 'excel')
            return Excel::download(new UsersExport, 'users.xlsx');

        if($file === 'csv')
            return Excel::download(new UsersExport, 'users.csv');
    } // End of Export Files

    public function getImport()
    {
        return view('dashboard.includes.forms._import');
    } // End of Load The Form

    public function import(ImportRequest $request)
    {
        Excel::queueImport(new UsersImport, $request->file('file'));
        return response()->json('Importing The File...');
    } // End of Import Files

    public function sucss ($msg, $title)
    {
        return [
            'exist' => $this->exist,
            'trash' => $this->trash,
            'msg' => __('alerts.' . $msg),
            'title' => __('alerts.' . $title),
        ];
    } // end of success function to return array of values

} // END OF USERS CONTROLLER
