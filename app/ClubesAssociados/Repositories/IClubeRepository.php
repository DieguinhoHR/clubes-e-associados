<?php

namespace App\ClubesAssociados\Repositories;

use App\Http\Requests\ClubeRequest;

interface IClubeRepository
{
    public function listaClubesEmOrdemAlfabetica();
    public function salvar(ClubeRequest $request);
    public function deletar($id);
}