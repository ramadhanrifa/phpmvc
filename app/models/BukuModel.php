<?php

class BukuModel {

    private $table = 'tb_buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getBukuById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahBuku($data){
        $query = "INSERT INTO " . $this->table . " (judul, penulis, tgl_selesai) VALUES(:judul, :penulis, :tgl_selesai)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penulis', $data['penulis']);
        $this->db->bind('tgl_selesai', $data['tgl_selesai']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function updateDataBuku($data)
    {
        $query = "UPDATE " . $this->table ." SET judul=:judul, penulis=:penulis, tgl_selesai=:tgl_selesai WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penulis', $data['penulis']);
        $this->db->bind('tgl_selesai', $data['tgl_selesai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBuku($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function SearchItem($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE nama_peminjam LIKE %$keyword% OR jenis_barang LIKE %$keyword%";
        $this->db->query($query);

        return $this->db->rowCount();
    }
}