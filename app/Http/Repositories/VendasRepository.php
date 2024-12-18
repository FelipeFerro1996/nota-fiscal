<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\VendasInterface;
use App\Models\Vendas;
use Exception;

class VendasRepository implements VendasInterface
{
    public function getAllVendas($request = NULL){
        $vendas = new Vendas();
        $vendas = $vendas->paginate(10);
        return $vendas;
    }

    public function insertVenda($request = NULL): Vendas{

        $venda = Vendas::create($request->all());
        return $venda;

    }

    public function getVendaById($id = NULL): Vendas{
        $venda = Vendas::find($id);

        return $venda;
    }

    public function updateVenda($request = NULL, $id = NULL): Vendas{
        $venda = Vendas::find($id);
        $venda->update($request->all());
        return $venda;
    } 

    public function deleteVenda($id = NULL){

        $return = [
            'message'=>'Erro ao deletar o venda',
            'deletado'=>false
        ];

        try{

            $venda = Vendas::find($id);

            if(empty($venda->id)){
                throw new Exception('Venda não existe');
            }

            $return['deletado'] = $venda->delete();

        }catch(Exception $e){
            $return['message'] = $e;
        }

        return $return;

    }
}