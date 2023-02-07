<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'LIKE', '%' . request('search') . '%');
        }
    }

    public function employee() {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
