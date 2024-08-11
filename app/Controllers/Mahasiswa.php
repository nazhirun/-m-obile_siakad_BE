<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Modelmahasiswa;

class Mahasiswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $ModelMhs = new Modelmahasiswa();
        $data = $ModelMhs->findAll();
        $response = [
            'status' => 200,
            'error' => "false",
            'message' => '',
            'totaldata' => count($data),
            'data' => $data
        ];

        return $this->respond($response ,200);

    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($cari = null)
    {
        $ModelMhs = new Modelmahasiswa();

        $data = $ModelMhs->orLike('mhsnobp',$cari)->orLike('mhsnama',$cari)->get()->getresult();

        if (count($data) > 1) {
            $response = [
                'status' => 200,
                'error' => "false",
                'message' => '',
                'totaldata' => count($data),
                'data' => $data  
            ];

            return $this->respond($response ,200);
        } else if (count($data)=== 1){
            $response = [
                'status' => 200,
                'error' => "false",
                'message' => '',
                'totaldata' => count($data),
                'data' => $data  
            ];

            return $this->respond($response ,200); 
        } else {
            return $this->failNotFound('maaf data '.$cari.' tidak ditemukan' );
        }
        
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $ModelMhs = new Modelmahasiswa();//
        $bkode = $this->request->getPost("kode");
        $bnama = $this->request->getPost("nama");
        $bharga = $this->request->getPost("harga");
        $bsatuan = $this->request->getPost("satuan");
        

        $ModelMhs->insert([
        'kode' => $bkode,
        'nama' => $bnama,
        'harga' => $bharga,
        'satuan' => $bsatuan,
        
        ]);

        $response = [
            'status' =>201,
            'error' => false,
            'message' => "data mahasiswa berhasil disimpan",
        ];

        return $this->respond($response,201);

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
