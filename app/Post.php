<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Таблица, связанная с моделью.
    protected $table = 'posts';

    // Определяет необходимость отметок времени для модели.
    public $timestamps = false;

    // Формат хранения отметок времени модели.
    protected $dateFormat = 'U';


}
