<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    public function storeArquivo($arquivo)
    {
        if ($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }

    public static function filter(array $filters)
    {
        $query = null;
        if ($titulo = $filters['titulo'] ?? false) {
            $query = self::where('titulo', $titulo);
        }

        if ($descricao = $filters['descricao'] ?? false) {

        }
        return $query;
    }

}
