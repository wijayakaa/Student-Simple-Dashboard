<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    private static $students = [
        [
            "id"    => "1",
            "nis"   =>"329480",
            "nama"  =>"baratha",
            "kelas" =>"11 pplg 2",
            "alamat"=>"rembang",
        ],[
            "id"    => "2",
            "nis"   =>"3294802",
            "nama"  =>"Damar",
            "kelas" =>"11 pplg 2",
            "alamat"=>"depok",
        ],[
            "id"    => "3",
            "nis"   =>"329483",
            "nama"  =>"izal",
            "kelas" =>"11 pplg 2",
            "alamat"=>"jepara",
        ],[
            "id"    => "4",
            "nis"   =>"329484",
            "nama"  =>"fariz",
            "kelas" =>"11 pplg 2",
            "alamat"=>"rembang",
        ],
        [
            "id"    => "1",
            "nis"   =>"329489",
            "nama"  =>"dafa",
            "kelas" =>"11 pplg 2",
            "alamat"=>"kudus",
        ],
    ];
    public static function all(){
        return self::$students;
       
    }
}