<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Costlist(){
        return $this->hasOne(CostList::class);
    }

}
