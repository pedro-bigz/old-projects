<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',
        'bol_parcelado',
        'num_parcelas',
        'valor_parcela',
        'valor_total',
        'prazo_entrega',
        'tipo_pagamento_id',
        'activated',
        'bol_pago',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['cliente', 'tipo_pagamento'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos/'.$this->getKey());
    }

    public function cliente ()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function tipo_pagamento ()
    {
        return $this->belongsTo(TipoPagamento::class, 'tipo_pagamento_id', 'id');
    }
}
