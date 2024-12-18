<?php

namespace App\Http\Interfaces;

use App\Models\Clientes;

interface ClientesInterface
{
    public function getAllClientes($request = NULL);

    public function insertCliente($request = NULL): Clientes;

    public function getClienteById($id = NULL): Clientes;

    public function updateCliente($request = NULL, $id = NULL): Clientes;

    public function deleteCliente($id = NULL);
}
