<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ClientesInterface;
use App\Models\Clientes;
use Exception;

class ClientesRepository implements ClientesInterface
{
    public function getAllClientes($request = NULL, $nao_paginar = NULL){
        $clientes = new Clientes();

        if(!empty($nao_paginar)){
            $clientes = $clientes->get();
        }else{
            $clientes = $clientes->paginate(10);
        }
        return $clientes;
    }

    public function insertCliente($request = NULL): Clientes{

        $cliente = Clientes::create($request->all());
        return $cliente;

    }

    public function getClienteById($id = NULL): Clientes{
        $cliente = Clientes::find($id);

        return $cliente;
    }

    public function updateCliente($request = NULL, $id = NULL): Clientes{
        $cliente = Clientes::find($id);
        $cliente->update($request->all());
        return $cliente;
    } 

    public function deleteCliente($id = NULL){

        $return = [
            'message'=>'Erro ao deletar o cliente',
            'deletado'=>false
        ];

        try{

            $cliente = Clientes::find($id);

            if(empty($cliente->id)){
                throw new Exception('Cliente não existe');
            }

            $return['deletado'] = $cliente->delete();

        }catch(Exception $e){
            $return['message'] = $e;
        }

        return $return;

    }
}