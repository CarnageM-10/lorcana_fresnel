<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'set_id',
        'name',
        'number',
        'version',
        'cardIdentifier',
        'description',
        'image',
        'thumbnail',
        'rarity',
        'story',
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    /**
     * Define the relationship with users who have this card in their wishlist.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }

    public function collectionUsers()
    {
        return $this->belongsToMany(User::class, 'collections');
    }
    

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return CardFactory::new();
    }

    
}