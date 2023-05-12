<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Vote;



class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    protected function _addVote(User $user, $isUp = true) {
        return $this->votes()->create([
            'user_id' => $user->id,
            'is_up' => $isUp
        ]);
    }

    public function addUpVote($user) {
        return $this->_addVote($user, true);
    }

    public function addDownVote($user) {
        return $this->_addVote($user, false);
    }




    public function scopeWithVotes($query) {
        return $query->withCount([
            'votes AS up_votes' => function (Builder $query) {
                $query->where('is_up', true);
            },
            'votes AS down_votes' => function (Builder $query) {
                $query->where('is_up', false);
            }
        ]);
    }



    public function ratings() {
        return $this->hasMany(Rating::class);
      }

      protected function _addRating(User $user, $isUp = true) {
        return $this->ratings()->create([
          'user_id' => $user_id,
          'rate' => $rating,
          'comment' => $comment
        ]);
      }
      
      public function addRate($user) {
        return $this->_addRating($user, true);
      }
      
      public function addComment($user) {
        return $this->_addRating($user, false);
      }

      public function scopeWithRatings($query) {
        return $query->withRate([
          'ratings AS rates' => function (Builder $query) {
              $query->where('rate', true);
          },
          'ratings AS comments' => function (Builder $query) {
              $query->where('rate', false);
          }
        ]);
      }
      
}

