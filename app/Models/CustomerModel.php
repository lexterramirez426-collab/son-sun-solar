<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'fname',
        'mname',
        'lname',
        'bday',
        'gender',
        'address',
        'username',
        'email',
        'phone',
        'password',
    ];
    protected $useTimestamps = false;

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function emailExists(string $email): bool
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    public function usernameExists(string $username): bool
    {
        return $this->where('username', $username)->countAllResults() > 0;
    }
}
