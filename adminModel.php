<?php namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    //table name
    protected $table = "admin";

    //allowed fields
    protected $allowedFields = 
    [
        'id',
        'nama_admin',
        'alamat'
    ];

    public function getadmin()
    {
        return $this->findAll();
    }


    public function getadminById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }   
    }
	
	public function updateadmin($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
	
	public function deleteadmin($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function insertadmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>