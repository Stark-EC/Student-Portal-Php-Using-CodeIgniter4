<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'username', 'password', 'phone', 'profile_picture', 'date_of_birth', 'address', 'gender', 'bio', 'social_links'];
    protected $useTimestamps = true;
}
