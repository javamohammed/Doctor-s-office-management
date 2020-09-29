<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index(Request $request)
    {
        $permissions = Permission::where('guard_name', '<>', "admin")->orderBy('id','DESC')->paginate(5);
        //dd($permissions);
        return view('permissions.index',compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $migrations = \DB::table("migrations")->get();
        $models = array();
        $actions = ["list", "create", "edit", "delete"];
        $not_includes = ["password_resets", "failed_jobs", "password_resets" , "permission"];
        foreach ($migrations as  $migration) {
            preg_match('/(.*)_create_(.*)_table/', $migration->migration, $matches);
            if(!in_array($matches[2], $not_includes)){
                
                array_push($models, $matches[2]);
            }
        }

        //$permission = Permission::where('guard_name', '<>', "admin")->get();
        return view('permissions.create',compact('models', 'actions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'model' => 'required',
            'actions' => 'required',
        ]);

        $data = $request->all();
        $permissions = array();
        foreach ($data['actions'] as  $value) {
            # code...
            array_push($permissions, $data['model'].'-'.$value);

        }
        foreach ($permissions as $permission) {
            Permission::create(['name' => $data['name']]);
       }

        return redirect()->route('permissions.index')
                        ->with('permission','Permission created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);

        \DB::table("role_has_permissions")->where('permission_id',$permission->id)->delete();
        \DB::table("permissions")->where('id',$id)->delete();

        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }
}
