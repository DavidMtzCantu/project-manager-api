<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['bio','avatar'])]

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    //relacion 1:1 un perfil pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
