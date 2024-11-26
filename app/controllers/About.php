<?php

class About extends Controller{

    public function index($nama="belum ada nama", $pekerjaan="belum ada pekerjaan") {

        $data['judul'] = 'about me || mvc-php';
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }
    public function page($halaman = 1) {
        $data['judul'] = 'pages || mvc-php';
        $data['halaman'] = $halaman;
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer', $data);
    }
}