<?php

namespace App\Http\Controllers;

use App\Models\Car;

class Home extends Controller
{
    public function show()
    {
        // Отображение всех клиентов и их автомобилей
        // $number - количество страниц

        $number = 5;

        $users = Car::get_all_records($number);
        return view('home', compact('users'));
    }
}
