<?php

namespace App\Models\Admin;

use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalFrequency extends Model
{
    use HasFactory;

    protected $table = 'journal_frequency';

    protected $primaryKey = 'id';

    #____________________________ Relationships ____________________________

    public function notices()
    {
        return $this->hasMany(Notice::class, 'frequency', 'id');
    }
}
