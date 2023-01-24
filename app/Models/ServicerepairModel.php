<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table      = 'servicerepair';
	protected $primaryKey = 'id';

  protected $allowedFields = ['customer_id', 'service_cat_id', 'complaint', 'technician_notes', 'delivery_date', 'est_amount', 'advance_paid', 'total_amount', 'status'];

	protected $useTimestamps = true;
	protected $createdField  = 'created';
	protected $updatedField  = 'modified';
	protected $dateFormat  	 = 'datetime';
}
