<?php

namespace App\Http\Controllers;

use App\ClubesAssociados\Repositories\ISocioRepository;
use App\Http\Requests\SocioRequest;


class SocioController extends Controller
{
    private $socioRepository;

    public function __construct(ISocioRepository $socioRepository)
    {
        $this->socioRepository = $socioRepository;
    }

    public function index()
    {
        $socios = $this->socioRepository->todosSocios();

        return view('socios.index', compact('socios'));
    }

    public function create()
    {
        $clubes = $this->socioRepository->listaTodosOsClubes();

        return view('socios.create', compact('clubes'));
    }

    public function store(SocioRequest $request)
    {
        $this->socioRepository->salvar($request);

        $request->session()->flash('flash_message', 'Registro inserido com sucesso!');

        return redirect('socios');
    }

    public function destroy($id)
    {
        $this->socioRepository->deletar($id);

        \Session::flash('flash_message_delete','Registro excluido com sucesso!');

        return redirect('socios');
    }
}
