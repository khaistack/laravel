<?php

namespace App\Http\Controllers;

// use App\Http\Requests\formValidation;

use App\Http\Requests\createRole;
use App\Models\Permission;
use App\Models\Roles;
use App\Models\User;
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
        $Role = Roles::get();
        return view("admin.role.role-list", ['data' => $Role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create-role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRole $request)
    {
        $param = $this->paramAdd;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $aryPermission = $request->ary;
            $Role =  $request->input('role');
            $idRole = Roles::insertGetId(['name' => $Role]);
            foreach ($aryPermission as $value) {
                $permission = Permission::create([
                    'role_id' => $idRole,
                    'action' => $value,
                ]);
            }
            return redirect()->route('list');
        }
        return back()->with('err', 'Bạn không có quyền.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showListUser()
    {
        $data = User::all();
        $role = Roles::get();
        return view('admin.acount.list-acount', ['data' => $data, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $param = $this->paramAdd;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $roleCurrent = Roles::find($id);
            foreach ($roleCurrent->getPermission as $value) {
                $dataPermissionUser[]  = $value;
            }
            foreach ($dataPermissionUser as $per) {
                $permissionCurrent[] =  $per->action;
            }
            return view(
                'admin.role.edit-role',
                [
                    'permission' => $permissionCurrent,
                    'data' => $dataPermissionUser,
                    'roleCurrent' => $roleCurrent
                ]
            );
        }
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
        dump($id);die;
        $permissionOfUser = $this->isRoleId($id);

        // foreach ($request->ary as $key => $value) {
        //     $permissionOfUser->action = $value;
        // }
        $permissionOfUser->save($request->ary);
        return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = \request('id', 0);
        Permission::where('role_id', $id)->delete();
        $user = User::where('roles_id', $id)->first();
        if ($user !== null) {
            $user->update(['roles_id' => null]);
        }
        Roles::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
