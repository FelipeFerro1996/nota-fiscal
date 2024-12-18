<?php

namespace App\Providers;

use App\Http\Interfaces\ClientesInterface;
use App\Http\Repositories\ClientesRepository;
use Illuminate\Support\ServiceProvider;

class Repositoriesprovider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class => ClientesRepository::class
    ];
}
