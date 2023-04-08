<?php
    namespace App\Controllers;
    use App\Models\dosenModel;

    class dosen extends BaseController
    {
        public function index()
        {
            $dosens = new dosenModel();
            $pager = \Config\Services::pager();

            $data = array (
                'dosens' => $dosens->paginate(10, 'dosen'),
                'pager' => $dosens->pager
            );

            return view('viewdosen', $data);
        }

        public function update($id)
        {
            $model = new dosenModel();   
            $data['dosen'] = $model->getdosenById($id)->getRow();
            echo view('dosenedit', $data);
        }

        public function edit()
        {
            $model = new dosenModel();
            $id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'nama_matkul' => $this->request->getPost('nama_matkul'),
            );
            $model->updatedosen($data, $id);
            return redirect()->to('/dosen');

        }

        public function delete($id)
        {
            $model = new dosenModel();
            $model->deletedosen($id);
            return redirect()->to('/dosen');
        }

        public function input()
        {
            echo view('doseninput');
        }

        public function insert()
        {
            $model = new dosenModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'nama_matkul' => $this->request->getPost('nama_matkul'),
            );
            $model->insertdosen($data);
            return redirect()->to('/dosen');   
        }

    }
    

?>