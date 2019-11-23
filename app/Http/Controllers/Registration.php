<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Registration extends Controller
{
    public function show()
    {
        // Отображение формы учёта авто

        $users = DB::table('user')->select('id', 'name')->get();
        $cars = DB::table('car')->select('id', 'user_id', 'isparked', 'statenum')->get();
        return view('registration', compact('users', 'cars'));
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
                redirect('/registration')
                ->withErrors($validator)
                ->withInput();
        }

        // Изменение информации об авто

        DB::table('car')
            ->where('id', $request->car)
            ->update([
                'isparked' => $request->isparked
            ]);

        return redirect('/registration');
    }
}
