<?php

class Home extends Controller {
    public function index()
    {
        $data['nama'] = 'Rifa';
        $data['pekerjaan'] = 'Pelajar';
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] ='Page';
        $data['gambar'] = 'hq720.jpg';
        $data['nama'] = 'Lord Cilacap';
        $data['pekerjaan'] = 'Pembully handal';
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
}