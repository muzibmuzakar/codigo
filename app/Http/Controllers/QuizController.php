<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Pelajaran;
use App\Models\Materi;
use App\Models\Soal;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $quiz = Quiz::latest()->paginate(5);

        return view('admin.quiz.quiz', $data, ['quiz' => $quiz]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['loggedUserInfo' =>User::where('id', '=', session('LoggedUser'))->first()];
        $pelajaran['pelajaran'] = Pelajaran::get();
        $materi['materi'] = Materi::get();

        return view('admin.quiz.addQuiz', $data)->with($pelajaran, $materi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz =Quiz :: create([
            "judul" => $request->judul,
            "pelajaran_id" =>$request->pelajaran_id,
            "materi_id" =>$request->materi_id,
        ]);

        $jumlah = count($request->question);
        $soals = [];
        for ($i =0; $i < $jumlah; $i++){
            $soal= Soal :: create([
                'quiz_id' => $quiz->id,
                'materi_id' => $request->materi_id,
                'question' => $request->question[$i],
                'choice1' => $request->choice1[$i],
                'choice2' => $request->choice2[$i],
                'choice3' => $request->choice3[$i],
                'choice4' => $request->choice4[$i],
                'answer' => $request->answer[$i],
            ]);
            array_push($soals, $soal->toArray());
        }

        $fileName = $soal->materi_id;
        Storage::disk('public')->put($fileName.'.json', json_encode($soals));
        return redirect()->route('quiz.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function materiQuiz(Request $request)
    {
        $materi = Materi::where('id_pelajaran', $request->get('id'))
            ->pluck('judul', 'id');
    
        return response()->json($materi);
    }

    public function quizJson($id)
    {
        $mat = array('materi_id' => $id);
        $soal['soal'] = Soal::where($mat)->get();
    
        return response()->json($soal);
    }
}
