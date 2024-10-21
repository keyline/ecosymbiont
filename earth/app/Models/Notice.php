<?php

namespace App\Models;

use App\Models\Admin\JournalFrequency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        'notices'
    ];
    #____________________________ Relationships ____________________________



    public function journalFrequency()
    {
        return $this->belongsTo(JournalFrequency::class, 'frequency', 'id');
    }
}
