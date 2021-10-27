<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucSach extends Model
{
    use HasFactory;

    public $timestamps = false; //set time creat/update k có
    protected $fillable = [
        'tendanhmuc' , 'mota' , 'kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc'; // tên table db
}
