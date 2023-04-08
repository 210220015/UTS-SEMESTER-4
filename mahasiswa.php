<?php
    namespace App\Controllers;
    use App\Models\mahasiswaModel;

    class mahasiswa extends BaseController
    {
        public function index()
        {
            $mahasiswas = new mahasiswaModel();
            $pager = \Config\Services::pager();

            $data = array (
                'mahasiswas' => $mahasiswas->paginate(10, 'mahasiswa'),
                'pager' => $mahasiswas->pager
            );

            return view('viewmahasiswa', $data);
        }

        public function update($id)
        {
            $model = new mahasiswaModel();   
            $data['mahasiswa'] = $model->getmahasiswaById($id)->getRow();
            echo view('mahasiswaedit', $data);
        }

        public function edit()
        {
            $model = new mahasiswaModel();
            $id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
            );
            $model->updatemahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new mahasiswaModel();
            $model->deletemahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

        public function input()
        {
            echo view('mahasiswainput');
        }

        public function insert()
        {
            $model = new mahasiswaModel();
            //$id = $this->request->getPost('id');
            $data = array (
                'id'  => $this->request->getPost('id'),
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
            );
            $model->insertmahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }

    }
    

?>