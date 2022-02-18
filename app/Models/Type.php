<?php

namespace App\Models;

use App\Traits\DatabaseCollections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Type extends Model
{
    use HasFactory;  
    
    use DatabaseCollections;

    use NodeTrait;

   
}
