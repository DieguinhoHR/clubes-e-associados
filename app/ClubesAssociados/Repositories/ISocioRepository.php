<?php

namespace App\ClubesAssociados\Repositories;

use App\Http\Requests\SocioRequest;

interface ISocioRepository
{
    public function listaTodosOsClubes();
    public function todosSocios();
    public function salvar(SocioRequest $request);
    public function deletar($id);
}