<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'roles'       
    ];
    #____________________________ Relationships ____________________________

    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id');
        // 'role' is the foreign key in the users table
        // 'id' is the primary key in the roles table
    }
}
 