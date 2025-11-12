<?php 

class mahasiswa extends Controller {
  public function index() {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_Model')->getAllMahasiswa();

    // tampilkan view (perhatikan folder/view case-sensitive pada server)
    $this->view('templates/header', $data);
    $this->view('Mahasiswa/index', $data);
    $this->view('templates/footer');
  }

  public function detail($id) {
    $data['judul'] = 'Detail Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_Model')->getMahasiswaById($id);

    // tampilkan view (perhatikan folder/view case-sensitive pada server)
    $this->view('templates/header', $data);
    $this->view('Mahasiswa/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah() {
    if( $this->model('Mahasiswa_Model')->tambahDataMahasiswa($_POST) > 0 ) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/index.php?url=mahasiswa');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/index.php?url=mahasiswa');
      exit;
    }
  }
}