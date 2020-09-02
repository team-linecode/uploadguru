<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'file', 'judul', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
