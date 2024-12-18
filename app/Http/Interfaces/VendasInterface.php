<?php

namespace App\Http\Interfaces;

use App\Models\Vendas;

interface VendasInterface
{
    public function getAllVendas($request = NULL);

    public function insertVenda($request = NULL): Vendas;

    public function getVendaById($id = NULL): Vendas;

    public function updateVenda($request = NULL, $id = NULL): Vendas;

    public function deleteVenda($id = NULL);
}
