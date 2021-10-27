<?php

namespace Nowyouwerkn\WeTask\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nowyouwerkn\WeTask\Models\Contacts;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable =[
        'nombre','telefono','correo','estado'];
    use HasFactory;
}