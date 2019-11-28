<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Car;
use App\Models\User;

class Users extends Controller
{
    public function create()
    {
        // Отображение формы создания записи

        return view('form_create');
    }

    public function edit($id)
    {
        // Заполнение полей информацией из БД
        // $id - car

        $car_id = new Car;
        $car_id->id = $id;
        $data = $car_id->get_join_cars_by_car_id();

        return view('form_edit', compact('data'));
    }

    public function save($id, Request $request)
    {
        // Сохранение данных
        // Проверка полей
        // $id - user

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

        $user = new User;
        $user->id = $id;
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $car = new Car;
        $car->id = $request->id;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->color = $request->color;
        $car->statenum = $request->statenum;

        if ($id) {
            if ($request->name) {

                // Изменение информации о клиенте

                $user->update_user();
            } elseif ($request->id == 0) {

                // Добавление нового авто

                $car->create_car();
            } else {

                // Изменение информации об авто

                $car->update_car();
            }
        } else {

            // Создание новой записи

            $user->create_user();
            $car->user_id = User::get_last_user_id();
            $car->create_car();
        }

        return redirect('/');
    }

    public function delete($id)
    {
        // Удаление записи

        $car = new Car;
        $car->id = $id;
        $car->delete_car();

        return redirect('/');
    }
}
