<?php

namespace App\Services;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashBoardServices
{

    public function getStudent()
    {
        return User::where('role', 'student')->get()->count();
    }
    public function getAdmin()
    {
        return User::where('role', 'admin')->get()->count();
    }
    public function getQuizzes()
    {
        return Quiz::all()->count();
    }
}
