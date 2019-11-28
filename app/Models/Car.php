<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Car
{
    public $id;
    public $brand;
    public $model;
    public $color;
    public $statenum;
    public $isparked;
    public $user_id;

    public static function get_all_records($number)
    {
        return DB::table('car')
            ->join('user', 'user.id', '=', 'car.user_id')
            ->select(
                'user.name',
                'car.brand',
                'car.model',
                'car.color',
                'car.statenum',
                'car.id',
                'car.isparked'
            )
            ->paginate($number);
    }

    public function get_join_cars_by_car_id()
    {
        return DB::table('car')
            ->join('user', 'user.id', '=', 'car.user_id')
            ->select(
                'car.id',
                'car.brand',
                'car.model',
                'car.color',
                'car.statenum',
                'car.user_id',
                'car.isparked',
                'user.name',
                'user.sex',
                'user.phone',
                'user.address'
            )
            ->whereRaw(
                'user_id = (select car.user_id from car where car.id=?) and user_id=user.id',
                [$this->id]
            )
            ->get();
    }

    public function create_car()
    {
        DB::table('car')
            ->insert([
                'brand' => $this->brand,
                'model' => $this->model,
                'color' => $this->color,
                'statenum' => $this->statenum,
                'user_id' => $this->id
            ]);
    }

    public function update_car()
    {
        DB::table('car')->where('id', $this->id)->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'statenum' => $this->statenum
        ]);
    }

    public function delete_car()
    {
        DB::table('car')->where('id', '=', $this->id)->delete();
    }

    public function update_status_car()
    {
        DB::table('car')
            ->where('id', $this->id)
            ->update([
                'isparked' => $this->isparked
            ]);
    }

    public static function get_all_cars()
    {
        return DB::table('car')->select('id', 'user_id', 'isparked', 'statenum')->get();
    }
}
