<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ClientesInterface as InterfacesClientesInterface;
use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function __construct(
        public InterfacesClientesInterface $cliente_repository 
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = $this->cliente_repository->getAllClientes(request:$request);

        $dados = [
            'clientes'=>$clientes
        ];

        return view('clientes.index', $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.formClientes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesRequest $request)
    {
        $cliente = $this->cliente_repository->insertCliente(request:$request);

        if(!empty($cliente->id)){
            session()->flash('success', 'Cliente cadastrado com sucesso');

            return redirect(route('clientes.edit', $cliente->id));
        }

        return back()->withErrors(['error'=>'Erro ao incluir o cliente']);
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
        $cliente = $this->cliente_repository->getClienteById(id:$id);

        $dados = [
            'cliente'=>$cliente
        ];

        return view('clientes.formClientes', $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = $this->cliente_repository->updateCliente(request:$request, id:$id);

        if(!empty($cliente->id)){
            session()->flash('success', 'Cliente alterado com sucesso');

            return redirect(route('clientes.edit', $cliente->id));
        }

        return back()->withErrors(['error'=>'Erro ao alterar o cliente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $return = $this->cliente_repository->deleteCliente(id:$id);

        if(!empty($return['deletado'])){
            session()->flash('success', 'Cliente excluído com sucesso');

            return back();
        }

        return back()->withErrors(['error'=>'Erro ao excluir o cliente']);
    }
}
