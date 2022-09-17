<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Customer extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;

    public function index()
    {
        $model = new CustomerModel();
        $data = $model->findAll();
        if (!$data) {
            return $this->failNotFound('Data Tidak Ditemukan');
        }

        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new CustomerModel();
        $data = $model->find(['id_cust' => $id]);
        if (!$data) {
            return $this->failNotFound('Data Tidak Ditemukan');
        }

        return $this->respond($data[0]);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'nama' => $json->nama,
            'contact' => $json->contact,
            'email' => $json->email,
            'alamat' => $json->alamat,
            'diskon' => $json->diskon,
            'tipe_diskon' => $json->tipe_diskon,
            'ktp' => $json->ktp,
        ];
        $model = new CustomerModel();
        $customer = $model->insert($data);
        if (!$customer) {
            return $this->fail('Gagal tersimpan', 400);
        }

        return $this->respondCreated($customer);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @return mixed
     */
    public function edit($id = null)
    {
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
           'nama' => $json->nama,
            'contact' => $json->contact,
            'email' => $json->email,
            'alamat' => $json->alamat,
            'diskon' => $json->diskon,
            'tipe_diskon' => $json->tipe_diskon,
            'ktp' => $json->ktp,
        ];
        $model = new CustomerModel();
        $cekId = $model->find(['id_cust' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $customer = $model->update($id, $data);
        if (!$customer) {
            return $this->fail('Gagal terupdate', 400);
        }

        return $this->respond($customer);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new CustomerModel();
        $cekId = $model->find(['id_cust' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $customer = $model->delete($id);
        if (!$customer) {
            return $this->fail('Gagal terhapus', 400);
        }

        return $this->respondDeleted('data terhapus');
    }
}
