<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';

    protected $filablle = ['cliente_id', 'numero', 'data_emissao', 'valor'];   

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }
}
