
<?php


class Error extends Controller {
    public function index(){
    http_response_code(404);
    $data['title'] = '404 - Halaman Tidak Ditemukan';
    $data['message'] = 'Maaf, halaman yang Anda cari tidak ditemukan.';
    $this->view('error/index', $data);
    }
}