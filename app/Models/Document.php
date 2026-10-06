<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'member_id',
        'filename',
        'path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

}
