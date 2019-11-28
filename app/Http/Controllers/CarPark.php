<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarPark extends Controller
{
    public function show()
    {
        // Отображение формы учёта авто

        $users = User::get_all_users();
        $cars = Car::get_all_cars();
        return view('car_park', compact('users', 'cars'));
    }

    public function save(Request $request)
    {
        // Сохранение данных
        // Проверка полей

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'car' => 'required'
        ]);

        // Вывод ошибки

        if ($validator->fails()) {
            return
                // redirect('edit/'.$request->id)
                redirect('/carpark')
                ->withErrors($validator)
                ->withInput();
        }

        // Изменение информации об авто

        $car = new Car;
        $car->id = $request->car;
        $car->isparked = $request->isparked;
        $car->update_status_car();

        return redirect('/carpark');
    }
}
