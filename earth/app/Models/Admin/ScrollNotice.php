<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrollNotice extends Model
{
    use HasFactory;

    protected $table = 'scroll_notice';

    protected $primaryKey = 'id';

    // protected $fillable = ['id', 'content'];

    // public $timestamps = false;

    #____________________________ Relationships ____________________________

}
