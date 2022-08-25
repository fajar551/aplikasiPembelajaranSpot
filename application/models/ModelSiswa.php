<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSiswa extends CI_Model{

  public function LihatNilaiHarian($nis)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    $this->db->where('siswa.idSiswa',$nis);
    $this->db->where('jenis','Harian');
    return $this->db->get();
  }

  public function LihatNilaiUlangan($nis)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    $this->db->where('siswa.idSiswa',$nis);
    $this->db->where('jenis','Ulangan');
    return $this->db->get();
  }

  public function LihatNilaiUAS($nis)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    $this->db->where('siswa.idSiswa',$nis);
    $this->db->where('jenis','UAS');
    return $this->db->get();
  }

  public function LihatSiswa($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.idKelas = siswa.idKelas');
    $this->db->where('NIS',$id);
    return $this->db->get();
  }

  public function TampilMapel()
  {
    return $this->db->get('mapel');
  }

  public function TampilKontrak($nis)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('siswa', 'siswa.idKelas = kelas.idKelas');
    $this->db->where('siswa.NIS',$nis);
    return $this->db->get();
  }

  public function TampilKelas()
  {
    return $this->db->get('kelas');
  }
  public function TampilMateri($nis)
  {
    $this->db->select('*');
    $this->db->from('materi');
    $this->db->join('guru', 'guru.idGuru = materi.idGuru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    $this->db->join('kontrak', 'kontrak.idMapel = mapel.idMapel');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('siswa', 'siswa.idKelas = kelas.idKelas');
    $this->db->where('siswa.idSiswa',$nis);
    return $this->db->get();

    $this->db->where('idGuru',$id);
    return $this->db->get('materi');
  }

}
