<?php namespace App\Models;

use CodeIgniter\Model;

class dosenModel extends Model
{
    //table name
    protected $table = "dosen";

    //allowed fields
    protected $allowedFields = 
    [
        'id',
        'nama_dosen',
        'nama_matkul'
    ];

    public function getdosen()
    {
        return $this->findAll();
    }


    public function getdosenById($id = false)
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
	
	public function updatedosen($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
	
	public function deletedosen($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function insertdosen($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>