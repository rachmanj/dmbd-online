<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakdownAction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function breakdown()
    {
        return $this->belongsTo(Breakdown::class);
    }
}
