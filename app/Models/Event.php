<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [ 'image',
                            'title',
                            'text',
                            'short_text',
                            'organizer',
                            'date_start',
                            'date_end',
                            'value',
                            'cord0',
                            'cord1',
                            'publish',
                            'user_id',
                            'count',
                            'confirm'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function someFunction()
    {
        return 'events';
    }
}
