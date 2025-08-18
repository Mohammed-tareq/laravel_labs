<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use SoftDeletes, HasFactory , Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
