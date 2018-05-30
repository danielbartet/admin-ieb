<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCalculadoras extends Model
{
    protected $table = 'data_calculadoras';
    public $timestamps = true;

    public static $rules = [
        'codigo'                        => 'required',
        'valor'                         => 'required',
        'descripcion'                   => ''
    ];

    // SAVE DATA ERROR MESSAGES
    public static $messages = [
        'valor.required'           => 'Valor is required'
    ];
}
