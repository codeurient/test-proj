<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieGenre extends Pivot
{
    use HasFactory;

    public $timestamps = true;
}
