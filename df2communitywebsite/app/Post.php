<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table Name
    protected $table = 'posts';

    public $pk = 'id';

    public $ts = true;
}

