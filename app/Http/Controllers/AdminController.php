<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelajaran;
use App\Models\Materi;
use App\Models\Quiz;


class AdminController extends Controller
{
    public function index(){
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $pelajaran = Pelajaran::all()->count();
        $materi = materi::all()->count();
        $quiz = quiz::all()->count();
        $where = array('role' => 2);
        $user = user::where($where)->count();

        return view('admin.dashboard', $data, ['pelajaran' => $pelajaran])
        ->with(['materi' => $materi])
        ->with(['quiz' => $quiz])
        ->with(['user' => $user]);
    }
}
