<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pagination extends Controller
{
    public function users()
    {
        $users = DB::table('car')
            ->join('user', 'user.id', '=', 'car.user_id')
            ->select('car.brand', 'car.model', 'car.color', 'car.statenum', 'user.name', 'car.id')
            ->paginate(5);
        return view('users', compact('users'));
    }
}
