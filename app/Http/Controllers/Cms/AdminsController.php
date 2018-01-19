<?php
namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminsRequest;
use App\Http\Requests\UpdateAdminsRequest;

use App\Admin;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
        // $this->middleware(function($request, $next) {
        //     if(!(\Auth::user())||(\Auth::user()->roles[0]->id != 1)){
        //         return abort(404);
        //     }
        //     return $next($request);
        // });
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.index');
    }
    
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        
        $admins = Admin::all();

        return view('cms.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::pluck('title', 'id');
        
        return view('cms.admins.create')->with('roles', $roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminsRequest $request)
    {
        
        $admin = Admin::create($request->all());

        $admin->roles()->sync($request->input('role_list'), false);

        return redirect()->route('admins.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $admin = Admin::findOrFail($id);
        $roles = \App\Role::pluck('title', 'id');
        return view('cms.admins.edit', compact('admin'))->with('roles', $roles);
        
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminsRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
        $admin->roles()->sync($request->input('role_list'));

        return redirect()->route('admins.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $admin = Admin::findOrFail($id);
        return view('cms.admins.show', compact('admin'));

    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Agmin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admins.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Admin::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}