<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model 
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_fullname',
        'user_email',
        'user_password',
        'user_status'
    ];
    protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'user_created_at';
	protected $updatedField         = 'user_updated_at';

}

?>