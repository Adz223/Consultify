<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%");
    }

    public function scopeActive($query){
        $query->where('is_active', true);
    }

    public function getPrice($curr){
        switch ($curr) {
            case 'EUR':
                return $this->eur_price;
                break;
            case 'MAD':
                return $this->mad_price;
                break;
            default:
                return $this->price;
                break;
        }
    }

    public function imageUrl(): Attribute
    {
        return new Attribute( 
            
            get: function () {
                if($this->name == 'Hospitality Business Consulting') return 'web2assets/images/business consult.png';
                else if($this->name == 'Lifelong Coaching') return 'web2assets/images/Lifelong Coaching.png';
                else if($this->name == 'Global Academic Partnership Development') return  "./web2assets/images/partnarship.PNG";
                return 'web2assets/images/International Students Enrollment.png';
            }
        );
    }
    
    public function price(): Attribute
    {
        return new Attribute(
            get: fn ($price) => round($price / 100, 2),
            set: fn ($price) => round($price * 100),
        );
    }

    public function eurPrice(): Attribute
    {
        return new Attribute(
            get: fn ($price) => round($price / 100, 2),
            set: fn ($price) => round($price * 100),
        );
    }

    public function matrrice(): Attribute
    {
        return new Attribute(
            get: fn ($price) => round($price / 100, 2),
            set: fn ($price) => round($price * 100),
        );
    }
}
