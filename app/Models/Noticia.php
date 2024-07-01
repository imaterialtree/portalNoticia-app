<?php

namespace App\Models;

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

    public function storeFile($file) {
        if ($file) {
            $path = $file->store('files', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }
}
