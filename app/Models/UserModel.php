<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table      = 'users';
	protected $primaryKey = 'id';

  protected $allowedFields = ['username', 'password', 'role_id', 'email', 'first_name', 'last_name', 'phone', 'status'];

	protected $useTimestamps = true;
	protected $createdField  = 'created';
	protected $updatedField  = 'modified';
	protected $dateFormat  	 = 'datetime';
}
