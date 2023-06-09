<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = ['user_id', 'rate', 'comment'];

    public function user() {
        return $this->belongsTo(User::class);
      }
      
      public function job() {
        return $this->belongsTo(Job::class);
      }
      
}
