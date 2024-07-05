<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'is_active',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(Catalogue::class, "parent_id");
    }

    public function children(){
        return $this->hasMany(Catalogue::class, "parent_id");
    }
}
