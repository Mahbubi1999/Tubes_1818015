<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define RestController path

/**
 *
 * Controller Mahasiswa
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller REST
 * @author    Ahmad Faisol <mzfais@lecturer.itn.ac.id>
 * @link      https://github.com/mzfais/
 * @param     ...
 * @return    ...
 *
 */

use chriskacerguis\RestServer\RestController;

class Console extends RestController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Console_model', 'csl');
    $this->methods['index_get']['limit'] = 2;
  }

  public function index_get()
  {
    $id = $this->get('id', true);
    if ($id === null) {
      $p = $this->get('page', true);
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->csl->count();
      $total_page = ceil($total_data / 5);
      $start = ($p - 1) * 5;
      $list = $this->csl->get(null, 5, $start);
      if ($list) {
        $data = [
          'status' => true,
          'page' => $p,
          'total_data' => $total_data,
          'total_page' => $total_page,
          'data' => $list
        ];
      } else {
        $data = [
          'status' => false,
          'msg' => 'Data tidak ditemukan'
        ];
      }
      $this->response($data, RestController::HTTP_OK);
    } else {
      $data = $this->csl->get($id);
      if ($data) {
        $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
      } else {
        $this->response(['status' => false, 'msg' => $id . ' tidak ditemukan'], RestController::HTTP_NOT_FOUND);
      }
    }
  }

  public function index_post()
  {
    $data = [
      'Nama' => $this->post('Nama', true),
      'Pembuat' => $this->post('Pembuat', true),
      'Tahun_Produksi' => $this->post('Tahun_Produksi', true),
      'Harga_Sewa' => $this->post('Harga_Sewa', true),
      'Kapasitas' => $this->post('Kapasitas', true),
      'Gambar' => $this->post('Gambar', true)
    ];
    $simpan = $this->csl->add($data);
    if ($simpan['status']) {
      $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah ditambahkan'], RestController::HTTP_CREATED);
    } else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data = [
      'ID_console' => $this->put('ID_console', true),
      'Nama' => $this->put('Nama', true),
      'Pembuat' => $this->put('Pembuat', true),
      'Tahun_Produksi' => $this->put('Tahun_Produksi', true),
      'Harga_Sewa' => $this->put('Harga_Sewa', true),
      'Kapasitas' => $this->put('Kapasitas', true),
      'Gambar' => $this->put('Gambar', true)
    ];
    $id = $this->put('id', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukkan Nama yang akan dirubah'], RestController::HTTP_BAD_REQUEST);
    }
    $simpan = $this->csl->update($id, $data);
    if ($simpan['status']) {
      $status = (int)$simpan['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah dirubah'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukkan Nama yang akan dihapus'], RestController::HTTP_BAD_REQUEST);
    }
    $delete = $this->csl->delete($id);
    if ($delete['status']) {
      $status = (int)$delete['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $id . ' data telah dihapus'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }
}


/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */