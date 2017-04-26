<?php

namespace App\ClubesAssociados\Repositories;

use App\Clube;
use App\Http\Requests\SocioRequest;
use App\Socio;
use Illuminate\Support\Facades\DB;

class SocioRepository implements ISocioRepository
{
    public function listaTodosOsClubes()
    {
        return Clube::pluck('nome', 'id');
    }

    public function salvar(SocioRequest $request)
    {
        Socio::create($request->all());
    }

    public function todosSocios()
    {
        return DB::table('socios')
            ->join('clubes', 'clubes.id', '=', 'socios.clube_id')
            ->select('socios.id', 'socios.nomeCompleto', 'clubes.nome')
            ->orderBy('clubes.nome', 'socios.nomeCompleto', 'ASC')
            ->get();
    }

    public function deletar($id)
    {
        return Socio::find($id)->delete();
    }
}