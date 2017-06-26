<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    const TABLE = 'articles';

    public $id;
    public $title;
    public $text;
    public $created_at;
}