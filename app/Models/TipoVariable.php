<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVariable extends Model
{
    protected $table = 'tipo_variable';
    public $timestamps = true;

    protected $fillable = ['tipo'];

    public static $rules = [
        'tipo'                        => 'required',
        'descripcion'                   => ''
    ];

    // SAVE DATA ERROR MESSAGES
    public static $messages = [
        'tipo.required'           => 'Tipo is required'
    ];

    public function dataCalculadoras()
    {
        return $this->hasMany('App\Models\DataCalculadoras', 'tipo_id');
    }
}
