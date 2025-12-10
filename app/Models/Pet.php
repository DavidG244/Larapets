<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'active',
        'status'
    ];

    // RelationShips
    // Adoption hasone adoption
    public function adoption()
    {
        return $this->hasone(Adoption::class);
    }

    // Scopes Names - allow searching across several fields
    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            $query->where('name', 'LIKE', "%$q%")
                ->orWhere('kind', 'LIKE', "%$q%")
                ->orWhere('breed', 'LIKE', "%$q%")
                ->orWhere('location', 'LIKE', "%$q%");
        }
    }

    public function scopekinds($query, $q)
    {
        if (trim($q)) {
            $query->where('name', 'LIKE', "%$q%")
                ->where('status', 0)
                ->orWhere('kind', 'LIKE', "%$q%")
                ->where('status', 0);
        }
    }
}
