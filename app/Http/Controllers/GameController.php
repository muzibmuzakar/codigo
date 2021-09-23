<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;

class GameController extends Controller
{
    public function html1($id){
        $data = ['loginUserInfo' =>User::where('id', '=', session('LoginUser'))->first()];

        $where = array('id' => $id);
        $materi['materi'] = Materi::where($where)->first();
        
        return view('game.html-1.index', $data)->with($materi);
    }

    public function html1_lvl1($id){
        $data = ['loginUserInfo' =>User::where('id', '=', session('LoginUser'))->first()];

        $where = array('id' => $id);
        $materi['materi'] = Materi::where($where)->first();
        
        return view('game.html-1.lvl1', $data)->with($materi);
    }

    public function html1_lvl2($id){
        $data = ['loginUserInfo' =>User::where('id', '=', session('LoginUser'))->first()];

        $where = array('id' => $id);
        $materi['materi'] = Materi::where($where)->first();
        
        return view('game.html-1.lvl2', $data)->with($materi);
    }
    
    public function html1_lvl3($id){
        $data = ['loginUserInfo' =>User::where('id', '=', session('LoginUser'))->first()];

        $where = array('id' => $id);
        $materi['materi'] = Materi::where($where)->first();
        
        return view('game.html-1.lvl3', $data)->with($materi);
    }
    
    public function html1_end($id){
        $data = ['loginUserInfo' =>User::where('id', '=', session('LoginUser'))->first()];

        $where = array('id' => $id);
        $materi['materi'] = Materi::where($where)->first();
        
        return view('game.html-1.end', $data)->with($materi);
    }
}
