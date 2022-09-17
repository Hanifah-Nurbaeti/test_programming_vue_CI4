<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Item extends ResourceController
{
    /*
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;

    public function index()
    {
        $model = new ItemModel();
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
        $model = new ItemModel();
        $data = $model->find(['id' => $id]);
        if (!$data) {
            return $this->failNotFound('Data Tidak Ditemukan');
        }

        return $this->respond($data[0]);
    }

    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'nama_item' => $json->nama_item,
            'unit' => $json->unit,
            'stok' => $json->stok,
            'harga_satuan' => $json->harga_satuan,
            'barang' => $json->barang,
        ];
        $model = new ItemModel();
        $item = $model->insert($data);
        if (!$item) {
            return $this->fail('Gagal tersimpan', 400);
        }

        return $this->respondCreated($item);
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
            'nama_item' => $json->nama_item,
            'unit' => $json->unit,
            'stok' => $json->stok,
            'harga_satuan' => $json->harga_satuan,
            'barang' => $json->barang,
        ];
        $model = new ItemModel();
        $cekId = $model->find(['id' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $item = $model->update($id, $data);
        if (!$item) {
            return $this->fail('Gagal terupdate', 400);
        }

        return $this->respond($item);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new ItemModel();
        $cekId = $model->find(['id' => $id]);
        if (!$cekId) {
            return $this->fail('DAta tidak ditemukan', 404);
        }
        $item = $model->delete($id);
        if (!$item) {
            return $this->fail('Gagal terhapus', 400);
        }

        return $this->respondDeleted('data terhapus');
    }
}
