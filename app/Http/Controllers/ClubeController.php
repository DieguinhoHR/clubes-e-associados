<?php

namespace App\Http\Controllers;

use App\ClubesAssociados\Repositories\IClubeRepository;
use App\Http\Requests\ClubeRequest;

class ClubeController extends Controller
{
    private $clubeRepository;

    public function __construct(IClubeRepository $clubeRepository)
    {
        $this->clubeRepository = $clubeRepository;
    }

    public function index()
    {
        $clubes = $this->clubeRepository->listaClubesEmOrdemAlfabetica();

        return view('clubes.index', compact('clubes'));
    }

    public function search($nome)
    {
        $clube = $this->clubeRepository->search($nome);

        return response()->json(['model' => $clube]);
    }

    public function store(ClubeRequest $request)
    {
        $this->clubeRepository->salvar($request);

        return ['message' => 'Registro inserido com sucesso'];
    }

    public function destroy($id)
    {
        $clube = $this->clubeRepository->deletar($id);

        return response()->json($clube);
    }
}
