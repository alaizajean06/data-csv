<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportUsers extends Controller
{
    public static function import(Request $request){
       if(($open = fopen ('C:\Users\asus\Documents\Users.csv', 'r')) !==false) {
            while(($data = fgetcsv($open, 1000, ","))  !== false) {
                DB::table("users")->insert([
                    "fname" => $data[0],
                    "lname" => $data[1],
                    "age"   => $data[2]

                ]);
            }
            return [
                "Success" => true,
                "message" => "import successfully"
            ];

        }
        else{
            return [
                "Success" => false,
                "message" => "file doesnt exist"
            ];
        }

    }
}
