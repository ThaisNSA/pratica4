<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'andar',
        'sala',
        'banheiro',
        'auditorio',
        'estvag',
        'preco',
        'descricao',
        'cidade_id'

    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
