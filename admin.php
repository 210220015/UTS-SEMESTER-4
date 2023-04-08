<?php
    namespace App\Controllers;
    use App\Models\adminModel;

    class admin extends BaseController
    {
        public function index()
        {
            $admins = new adminModel();
            $pager = \Config\Services::pager();

            $data = array (
                'admins' => $admins->paginate(10, 'admin'),
                'pager' => $admins->pager
            );

            return view('viewadmin', $data);
        }

        public function update($id)
        {
            $model = new adminModel();   
            $data['admin'] = $model->getadminById($id)->getRow();
            echo view('adminedit', $data);
        }

        public function edit()
        {
            $model = new adminModel();
            $id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nama_admin' => $this->request->getPost('nama_admin'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->updateadmin($data, $id);
            return redirect()->to('/admin');

        }

        public function delete($id)
        {
            $model = new adminModel();
            $model->deleteadmin($id);
            return redirect()->to('/admin');
        }

        public function input()
        {
            echo view('admininput');
        }

        public function insert()
        {
            $model = new adminModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nama_admin' => $this->request->getPost('nama_admin'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $model->insertadmin($data);
            return redirect()->to('/admin');   
        }

    }
    

?>