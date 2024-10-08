<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Assuming your table name is 'users'
    protected $allowedFields = ['username', 'password', 'email']; // Define allowed fields
}
