<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroiController extends Controller
{
    // public function create()
    // {
    //     return "Criando o herói...";
    // }
    // public function read()
    // {
    //     return "Listando o herói...";
    // }

    public function index(Request $request)
    {
        if ($request->method() === 'GET'){
            return view('herois.index', ['herois' => Heroi::paginate(2)]);
        }

        //dd($request); //debug em tela

        $heroi                     = new Heroi();
        $heroi->name               = $request->nome;
        $heroi->identidade_secreta = $request->identidade;
        $heroi->origem             = $request->origem;

        // Gravando arquivo binário (imagem):
        $type = $request->file('foto')->extension(); // retorna a extensão do arquivo
        $data = file_get_contents($request->file('foto')->path()); // retorna o conteúdo do arquivo
        $heroi->foto = "data:image/$type;base64," . base64_encode($data);
        $heroi->save();

        return redirect('/herois');
    }

    public function mostra(Request $request)
    {
        if ($request->id) {
            $heroi = Heroi::find($request->id);
            return view('herois.details', compact('heroi'));
            ;
        }
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $heroi = Heroi::find($request->id);
            return view('herois.update', compact('heroi'));
        }
    }

    public function delete(Request $request)
    {
        //$heroi = Heroi::find($request->id);
        DB::table('herois')->where('id', $request->id)->delete();
        return redirect('/herois');
    }
}
