<?php

namespace App\Providers;

use App\Http\Interfaces\ClientesInterface;
use App\Http\Interfaces\VendasInterface as InterfacesVendasInterface;
use App\Http\Repositories\ClientesRepository;
use App\Http\Repositories\VendasRepository;
use Illuminate\Support\ServiceProvider;

class Repositoriesprovider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class => ClientesRepository::class,
        InterfacesVendasInterface::class => VendasRepository::class
    ];
}
