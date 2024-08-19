<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;

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

    public static function scopeFilter(Builder $query, array $filters)
    {
        if ($titulo = $filters['titulo'] ?? false) {
            $query->where('titulo', 'like', '%'.$titulo.'%');
        }

        if ($descricao = $filters['descricao'] ?? false) {
            $query->where('descricao', 'like', '%'.$descricao.'%');
        }
    }

    // laravel/scout
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
        ];
    }

    public function descricaoAbreviada(int $max = 250): string
    {
        $descricaoAbreviada = substr($this->descricao, 0, $max);
        if (strlen($this->descricao) > $max) {
            $descricaoAbreviada .= '...';
        }

        return $descricaoAbreviada;
    }
}
