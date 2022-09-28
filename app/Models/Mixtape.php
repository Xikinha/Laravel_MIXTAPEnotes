<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Mixtape extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'user_id',
        'track',
        'artist',
        'image_url',
        'track_uri',
        'notes',
        'soft_delete'
    ];
}