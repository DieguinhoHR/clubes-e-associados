<?php

namespace App\ClubesAssociados\Repositories;

use App\Clube;
use App\Http\Requests\ClubeRequest;

class ClubeRepository implements IClubeRepository
{
    public function listaClubesEmOrdemAlfabetica()
    {
        return Clube::orderBy('nome', 'ASC')->get();
    }

    public function salvar(ClubeRequest $request)
    {
        Clube::create($request->all());
    }

    public function deletar($id)
    {
        return Clube::find($id)->delete();
    }

    public function search($nome)
    {
        return Clube::where('nome', 'LIKE', "%$nome%")->paginate(5);
    }
}