<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class User
{
    public $id;
    public $name;
    public $sex;
    public $phone;
    public $address;

    public static function get_all_users()
    {
        return DB::table('user')->select('id', 'name')->get();
    }

    public function create_user()
    {
        DB::table('user')
            ->insert([
                'name' => $this->name,
                'sex' => $this->sex,
                'phone' => $this->phone,
                'address' => $this->address
            ]);
    }

    public function update_user()
    {
        DB::table('user')
            ->where('id', $this->id)
            ->update([
                'name' => $this->name,
                'sex' => $this->sex,
                'phone' => $this->phone,
                'address' => $this->address
            ]);
    }

    public static function get_last_user_id()
    {
        return DB::table('user')->max('id');
    }
}
