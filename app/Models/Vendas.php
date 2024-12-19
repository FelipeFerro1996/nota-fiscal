<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';

    protected $fillable = ['cliente_id', 'numero', 'data_emissao', 'valor'];   

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function getValorAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = str_replace(['.', ','], ['', '.'], $value);
    }
}
