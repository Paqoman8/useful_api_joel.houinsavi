<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_module extends Model
{
    /** @use HasFactory<\Database\Factories\UserModuleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'active',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function module(){
        return $this->belongsTo(module::class);
    }
}
