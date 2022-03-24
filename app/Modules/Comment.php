<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['title', 'description', 'file', 'user_id'];
    protected $guarded = [];
    protected $with = ['user'];

    public function pathToFile()
    {
        return public_path('/unloads/') . $this->file;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
