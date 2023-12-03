<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
  

class PermissionController extends Controller

{
     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     function __construct()

     {
          $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
          $this->middleware('permission:permission-create', ['only' => ['create','store']]);
          $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $permissions = Permission::get();      
        return view('permissions.index',compact('permissions'))
            ->with('roles',$roles)
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
   
    public function create()
    {
        $roles  = Role::get();
        $permission = Permission::get();
        return view('permissions.create',compact('permission'))
               ->with('roles',$roles);
    } 

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            
        ]);
        $permissions = Permission::create(['name' => $request->input('name')]);
        //$permissions->syncPermissions($request->input('permission'));
        return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');

                        
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')

                        ->with('success','permission deleted successfully');
    }

}