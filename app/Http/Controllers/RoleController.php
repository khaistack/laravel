<?php

namespace App\Http\Controllers;

use App\Http\Requests\formValidation;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_roles_in_database = Role::all()->pluck('name');
        $all_users_with_all_direct_permissions = Role::with('permissions')->get();
        return view("admin.role.role-list",['aaa'=>$all_users_with_all_direct_permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isPermission = $this->isPermission();
        // dump($isPermission);die;
        return view('admin.role.create-role', ['isPermission' => $isPermission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formValidation $request)
    {
        $permission = $request->ary;
        $nameRole =  $request->input('role');
        // dump(  $nameRole);die;

        $role = $this->isCreateRole($nameRole);
        $role->givePermissionTo($permission);
        return redirect()->route('roles.index');
    }

    public function isCreateRole($nameRole)
    {
        return $role = Role::create(['name' => $nameRole]);
    }

    public function isPermission()
    {
        return $isPermission = Permission::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
