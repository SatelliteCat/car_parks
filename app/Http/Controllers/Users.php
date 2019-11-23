<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
    public function create()
    {
        // Отображение формы создания записи

        return view('form_create');
    }

    public function edit($id)
    {
        // $id - car
        // Заполнение полей информацией из БД

        $data = DB::table('car')
            ->join('user', 'user.id', '=', 'car.user_id')
            ->select(
                'car.id',
                'car.brand',
                'car.model',
                'car.color',
                'car.statenum',
                'car.user_id',
                'user.name',
                'user.sex',
                'user.phone',
                'user.address'
            )
            ->whereRaw(
                'user_id = (select car.user_id from car where car.id=?) and user_id=user.id',
                [$id]
            )
            ->get();

        // echo "<script>console.log('".$data->first()."');</script>";

        return view('form_edit', compact('data'));
    }

    public function save($id, Request $request)
    {
        // $id - user
        // Сохранение данных
        // Проверка полей

        $validator = Validator::make($request->all(), [
            'name' => 'required_with:phone|between:3,100',
            'phone' => 'required_with:name|unique:user,phone,' . $id,
            'brand' => 'required_with:model',
            'model' => 'required_with:brand',
            'color' => 'required_with:brand',
            'statenum' => 'required_with:brand|unique:car,statenum,' . $request->id,
        ]);

        // Вывод ошибки

        if ($validator->fails()) {
            return
                // redirect('edit/'.$request->id)
                redirect('/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Изменение записи

        if ($id) {
            if ($request->name) {

                // Изменение информации о клиенте

                DB::table('user')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'sex' => $request->sex,
                        'phone' => $request->phone,
                        'address' => $request->address
                    ]);
            } elseif ($request->id == 0) {

                // Добавление нового авто

                DB::table('car')
                    ->insert([
                        'brand' => $request->brand,
                        'model' => $request->model,
                        'color' => $request->color,
                        'statenum' => $request->statenum,
                        'user_id' => $id
                    ]);
            } else {

                // Изменение информации об авто

                DB::table('car')->where('id', $request->id)->update([
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'statenum' => $request->statenum
                ]);
            }
        } else {

            // Создание новой записи

            DB::table('user')
                ->insert([
                    'name' => $request->name,
                    'sex' => $request->sex,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]);
            $user_id = DB::table('user')->max('id');
            DB::table('car')
                ->insert([
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'color' => $request->color,
                    'statenum' => $request->statenum,
                    'user_id' => $user_id
                ]);
        }
        return redirect('/');
    }

    public function delete($id)
    {
        // Удаление записи

        DB::table('car')->where('id', '=', $id)->delete();
        return redirect('/');
    }
}
