<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetRole;
use App\Http\Requests\UserInfo;
use App\Models\Permission;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Row;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $data = Auth::user();
        return view('admin.acount.profile', ['data' =>  $data]);
    }
    public function upInfo(UserInfo $request, $id)
    {
        $userCurrent = User::find($id);
        $imageNew = $this->isHandImage($request->fileToUpload);
        if ($imageNew == null) {
            $image = $userCurrent->image;
            $userCurrent->avatar = $image;
        } else {
            $userCurrent->avatar = $imageNew[1];
        }
        $userCurrent->name = $request->Name;
        $userCurrent->password = Hash::make($request->password);
        $userCurrent->Address = $request->Address;
        $userCurrent->City = $request->City;
        $userCurrent->State = $request->State;
        $userCurrent->Zip = $request->Zip;
        // $userCurrent->avatar = $image[1];
        $userCurrent->save();
        return redirect()->route('list-users');
    }
    public function edit($id)
    {
        $param = $this->paramEdit;
        $userCurrent = $this->getStatusUserCurrent();
        $check = $this->checkRoleUser($param);
        if ($check == true && $userCurrent) {
            $data = User::find($id);
            $role = Roles::get();
            return view('admin.acount.edit-form-acount', ['data' => $data, 'role' => $role]);
        }
        return back()->with('err', 'Bạn không có quyền.');
    }
    public function update(Request $request, $id)
    {
        $userCurrent = User::find($id);
        if ($request->ary === 'Xoá quyền') {
            $userCurrent->status = $request->aryStatus;
            $this->isDeleteRoleOfUser($id);
            $userCurrent->save();
            return redirect()->route('list-users');
        }
        $userCurrent->status = $request->aryStatus;
        $userCurrent->roles_id = $request->ary;
        $userCurrent->save();
        return redirect()->route('list-users');
    }

    public function isDeleteRoleOfUser($id)
    {
        $userCurrent = User::find($id);
        $idRole = $userCurrent['roles_id'];
        $user = User::where('roles_id', $idRole)->first();
        $user->update(['roles_id' => null]);
        return $user;
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
        DB::table('users')->where('id', $id)->delete();
        return response()->json([
            'sus' => 'xoá thành công!'
        ]);
    }
}
