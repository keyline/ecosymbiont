<?php

namespace App\Models;

use App\Models\Admin\JournalFrequency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;
    protected $table = 'news_category';
    public $timestamps = false;
    protected $fillable = [
        'news_category'
    ];
    #____________________________ Relationships ____________________________



    public function journalFrequency()
    {
        return $this->belongsTo(JournalFrequency::class, 'frequency', 'id');
    }
}
