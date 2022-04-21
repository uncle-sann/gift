<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
  use HasFactory;

  public function parent()
  {
    return $this->belongsTo(self::class, 'id', 'parent_id');
  }

  public function children()
  {
    return $this->hasMany(self::class, 'parent_id');
  }
}
