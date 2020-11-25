<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use View;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\Permission;
use App\Models\Roles;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $paramEdit = 'Sửa';
    protected $paramAdd = 'Thêm';
    protected $paramSave = 'Lưu';
    protected $paramView = 'View';
    protected $paramDelete = 'Xoá';


    // public function __construct($paramEdit, $paramAdd, $paramSave, $paramView, $paramDelete)
    // {
    //     $this->paramEdit = $paramEdit;
    //     $this->paramAdd = $paramAdd;
    //     $this->paramSave = $paramSave;
    //     $this->paramView = $paramView;
    //     $this->paramDelete = $paramDelete;
    // }

    public function getStatusUserCurrent()
    {
        $userCurrent = Auth::user();
        $userCurrent['status'];
        return  $userCurrent;
    }
    public function getOrderMonth()
    {
        $month = Carbon::now()->month;
        $listOrderMonth = Orders::whereMonth('created_at', $month)
            ->get();
        $CountOrderMonth =  $listOrderMonth;
        $CountOrderMonth = count($CountOrderMonth);
        $array = [
            [
                'dataCount' => $CountOrderMonth,
                'route' => 'Month',
                'data' => $listOrderMonth
            ]
        ];
        return  $array;
    }
    public function getOrderToday()
    {
        $today = Carbon::now()->day;
        $listOrderDay = Orders::whereDay('created_at', $today)
            ->get();
        $CountOrderDay =  $listOrderDay;
        $CountOrderDay = count($CountOrderDay);
        $array = [
            [
                'data' => $listOrderDay,
                'route' => 'Today',
                'dataCount' => $CountOrderDay
            ]
        ];
        return $array;
    }

    public function checkRoleUser($param)
    {
        $getRoleOfUser = Auth::user();
        $getRoleOfUser->getRole;
        if ($getRoleOfUser['roles_id'] !== null) {
            foreach ($getRoleOfUser->getRole->getRole as $value) {
                $per[] = $value->action;
            }
            $check = in_array($param, $per);
            return $check;
        }
        return false;
    }

    public function isRoleId($id)
    {
        $roleCurrent = Permission::where('role_id', $id)->first();
        return $roleCurrent;
    }

    public function isHandImage($isFileImage)
    {
        if ($isFileImage) {
            $imageName = time()  . '_' . rand(5, 2222) . '_' . $isFileImage->getClientOriginalExtension();
            $image =  $isFileImage->move(public_path('images'), $imageName);
            $path = $image->getRealPath();
            $exp = explode('public', $path);
            return $exp;
        }
    }
}
