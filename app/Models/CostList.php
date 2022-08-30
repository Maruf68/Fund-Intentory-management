<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostList extends Model
{
    use HasFactory;
  
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function costcategory(){
        return $this->belongsTo(CostCategory::class,'cost_category_id','id');
    }
}
