<?php

namespace App\Controllers;

use App\Models\SalesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Sales extends ResourceController
{
    /*
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;

    public function index()
    {
        $model = new SalesModel();
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
        $model = new SalesModel();
        $data = $model->find(['id_sales' => $id]);
        if (!$data) {
            return $this->failNotFound('Data Tidak Ditemukan');
        }

        return $this->respond($data[0]);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'code_transaksi' => $json->code_transaksi,
            'tanggal_transaksi' => $json->tanggal_transaksi,
            'customer' => $json->customer,
            'item' => $json->item,
            'qty' => $json->qty,
            'total_diskon' => $json->total_diskon,
            'total_harga' => $json->total_harga,
            'total_bayar' => $json->total_bayar,
        ];
        $model = new SalesModel();
        $sales = $model->insert($data);
        if (!$sales) {
            return $this->fail('Gagal tersimpan', 400);
        }

        return $this->respondCreated($sales);
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
           'code_transaksi' => $json->code_transaksi,
            'tanggal_transaksi' => $json->tanggal_transaksi,
            'customer' => $json->customer,
            'item' => $json->item,
            'qty' => $json->qty,
            'total_diskon' => $json->total_diskon,
            'total_harga' => $json->total_harga,
            'total_bayar' => $json->total_bayar,
        ];
        $model = new SalesModel();
        $cekId = $model->find(['id_sales' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $sales = $model->update($id, $data);
        if (!$sales) {
            return $this->fail('Gagal terupdate', 400);
        }

        return $this->respond($sales);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new SalesModel();
        $cekId = $model->find(['id_sales' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $sales = $model->delete($id);
        if (!$sales) {
            return $this->fail('Gagal terhapus', 400);
        }

        return $this->respondDeleted('data terhapus');
    }
}
