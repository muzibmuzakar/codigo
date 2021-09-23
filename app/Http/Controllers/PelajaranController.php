<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelajaran;
use App\Models\Materi;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $pelajaran = Pelajaran::latest()->paginate(5);

        return view('admin.pelajaran.pelajaran', $data,['pelajaran' => $pelajaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];

        return view('admin.pelajaran.addPelajaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $pelajaranImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $pelajaranImage);
            $input['image'] = "$pelajaranImage";
        }
    
        Pelajaran::create($input);
     
        return redirect()->route('pelajaran.index')
                        ->with('toast_success','Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $where = array('id' => $id);
        $pelajaran['pelajaran'] = Pelajaran::where($where)->first();
        $mat = array('id_pelajaran' => $id);
        $materi['materi'] = Materi::where($mat)->get();
        // $materi = DB::table('materis')->where('id_pelajaran',$id)->get();

        return view('admin.pelajaran.detailPelajaran', $data, $pelajaran)->with($materi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $where = array('id' => $id);
        $pelajaran['pelajaran'] = Pelajaran::where($where)->first();

        return view('admin.pelajaran.editPelajaran', $data, $pelajaran);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        $input = $request->except(['_token', '_method' ]);
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $pelajaranImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $pelajaranImage);
            $input['image'] = "$pelajaranImage";
        }else{
            unset($input['image']);
        }
          
        // $pelajaran->update($input);
        Pelajaran::where('id',$id)->update($input);
    
        return redirect()->route('pelajaran.index')
        ->with('toast_success', 'Pelajaran berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelajaran::where('id',$id)->delete();
        return redirect()->route('pelajaran.index')
                        ->with('toast_success','Pelajaran berhasil dihapus');
    }
}
