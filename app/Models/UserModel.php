<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id'; // à adapter selon votre table
    protected $allowedFields = ['name', 'email']; // champs autorisés à être modifiés
}
