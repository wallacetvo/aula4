<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;

class HeroiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() === 'GET'){
            return Heroi::all();
        }

        $heroi                     = new Heroi();
        $heroi->name               = $request->nome;
        $heroi->identidade_secreta = $request->identidade;
        $heroi->origem             = $request->origem;
        $heroi->foto               = $request->foto;
        $heroi->save();

        return redirect('/herois');
    }
    // public function create()
    // {
    //     return "Criando o herói...";
    // }
    // public function read()
    // {
    //     return "Listando o herói...";
    // }
    public function update()
    {
        return "Atualizando o herói...";
    }
    public function delete()
    {
        return "Removendo o herói...";
    }
}
