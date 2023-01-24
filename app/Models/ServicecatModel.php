<?php
namespace App\Models;

use CodeIgniter\Model;

class ServicecatModel extends Model
{
  protected $table      = 'servicecat';
	protected $primaryKey = 'id';

  protected $allowedFields = ['name'];

}
