<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ClientesInterface;
use App\Http\Interfaces\VendasInterface as InterfacesVendasInterface;
use App\Http\Requests\VendasRequest;
use Illuminate\Http\Request;

class VendasController extends Controller
{

    public function __construct(
        public InterfacesVendasInterface $venda_repository,
        public ClientesInterface $ciente_repository
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vendas = $this->venda_repository->getAllVendas(request:$request);

        $dados = [
            'vendas'=>$vendas
        ];

        return view('vendas.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendas.formVendas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendasRequest $request)
    {
        $venda = $this->venda_repository->insertVenda(request:$request);

        if(!empty($venda->id)){
            session()->flash('success', 'Venda cadastrado com sucesso');

            return redirect(route('vendas.edit', $venda->id));
        }

        return back()->withErrors(['error'=>'Erro ao incluir o venda']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venda = $this->venda_repository->getVendaById(id:$id);
        $clientes = $this->ciente_repository->getAllClientes(nao_paginar:1);

        $dados = [
            'venda'=>$venda
        ];

        return view('vendas.formVendas', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venda = $this->venda_repository->updateVenda(request:$request, id:$id);

        if(!empty($venda->id)){
            session()->flash('success', 'Venda alterado com sucesso');

            return redirect(route('vendas.edit', $venda->id));
        }

        return back()->withErrors(['error'=>'Erro ao alterar o venda']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $return = $this->venda_repository->deleteVenda(id:$id);

        if(!empty($return['deletado'])){
            session()->flash('success', 'Venda excluído com sucesso');

            return back();
        }

        return back()->withErrors(['error'=>'Erro ao excluir o venda']);
    }
}
