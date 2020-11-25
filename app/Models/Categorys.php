<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;

    protected $table = 'Categorys';

    protected $fillable = [
        'name',
    ];

    static public function getMenusTotal()
    {
        $data = Categorys::count();
        return $data;
    }
}
