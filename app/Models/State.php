<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        [
            'abbr' => 'NY',
            'name' => 'New York',
        ],
        [
            'abbr' => 'CA',
            'name' => 'California',
        ],
    ];
}
