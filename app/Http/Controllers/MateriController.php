<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use App\Models\Pelajaran;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $materi = Materi::latest();

        if(request('search')) {
            $materi->where('judul', 'like', '%' . request('search') . '%');
        }

        return view('admin.materi.materi', $data,['materi' => $materi->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $pelajaran = Pelajaran::all();

        return view('admin.materi.addMateri', $data, ['pelajaran' => $pelajaran]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post =new Materi([
            "judul" =>$request->judul,
            "id_pelajaran" =>$request->id_pelajaran,
            "video" =>$request->video,
            "game" =>$request->game,
            "detail" =>$request->detail,
        ]);
        $post->save();

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=$file->getClientOriginalName();
                $request['materi_id']=$post->id;
                $request['slide']=$imageName;
                $file->move(\public_path("/slide"),$imageName);
                Slide::create($request->all());

            }
        }

        return redirect()->route('materi.index')
                        ->with('toast_success','Materi berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $materi['materi'] = Materi::where($where)->first();

        return view('admin.materi.editMateri', $data, $materi);
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
        $post=Materi::findOrFail($id);
        $post->update([
            "judul" =>$request->judul,
            "detail"=>$request->detail,
            "video" =>$request->video,
            "game" =>$request->game,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=$file->getClientOriginalName();
                $request["materi_id"]=$id;
                $request["slide"]=$imageName;
                $file->move(\public_path("/slide"),$imageName);
                Slide::create($request->all());

            }
        }
        return redirect()->route('pelajaran.index')->with('toast_success', 'Materi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Materi::findOrFail($id);

        $slides=Slide::where("materi_id",$posts->id)->get();
        foreach($slides as $slide){
            if (File::exists("slide/".$slide->slide)) {
                File::delete("slide/".$slide->slide);
            }
        }
        $posts->delete();
        return back()->with('toast_warning', 'Materi berhasil dihapus');
    }

    public function addMateri($id_pelajaran)
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $where = array('id' => $id_pelajaran);
        $pelajaran['pelajaran'] = Pelajaran::where($where)->first();

        return view('admin.materi.addMateri', $data, $pelajaran);
    }

    public function deleteSlide($id){
        $slide=Slide::findOrFail($id);
        if (File::exists("slide/".$slide->slide)) {
           File::delete("slide/".$slide->slide);
       }

       Slide::find($id)->delete();
       return back();
    }
}
