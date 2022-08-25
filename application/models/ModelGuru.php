<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGuru extends CI_Model{

  public function LihatGuru($nip)
  {
    $this->db->where('NIP',$nip);
    return $this->db->get('guru');
  }

  public function TampilMateri($id)
  {
    $this->db->where('idGuru',$id);
    return $this->db->get('materi');
  }

  public function UbahNilai($data,$id)
  {
    $this->db->where('idNilai',$id);
    $this->db->update('nilai',$data);
  }

  public function HapusNilai($id)
  {
    $this->db->where('idNilai',$id);
    $this->db->delete('nilai');
  }

  public function TampilNilai($id)
  {
    $this->db->where('idNilai',$id);
    return $this->db->get('nilai');
  }

  public function TampilDataMapel()
  {
    return $this->db->get('mapel');
  }

  public function TampilDataSiswa($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.idKelas = siswa.idKelas');
    $this->db->join('kontrak', 'kontrak.idKelas = kelas.idKelas');
    $this->db->join('guru', 'guru.idMapel = kontrak.idMapel');
    $this->db->where('guru.NIP',$id);
    return $this->db->get();
  }

  public function TampilGuru()
  {
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('mapel', 'mapel.idMapel = guru.idMapel');
    return $this->db->get();
  }

  public function TampilKontrak($nip)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('guru', 'guru.idMapel = kontrak.idMapel');
    $this->db->where('guru.NIP',$nip);
    return $this->db->get();
  }

  public function TampilDataKelas()
  {
    return $this->db->get('kelas');
  }

  public function InsertNilai($data)
  {
    $this->db->insert('nilai',$data);
  }

  public function LihatNilaiHarian($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->where('guru.NIP',$nip);
    $this->db->where('jenis','Harian');
    return $this->db->get();
  }

  public function LihatNilaiUlangan($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->where('guru.NIP',$nip);
    $this->db->where('jenis','Ulangan');
    return $this->db->get();
  }

  public function LihatNilaiUAS($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.idSiswa = nilai.idSiswa');
    $this->db->join('guru', 'guru.idGuru = nilai.idGuru');
    $this->db->where('guru.NIP',$nip);
    $this->db->where('jenis','UAS');
    return $this->db->get();
  }

  public function CountAllMateri($id)
  {
    return $this->db->where('idGuru',$id)->from('materi')->count_all_results();
  }

  function fetch_document($path)
  {
    return get_filenames($path);
  }

  public function InsertFilename($filename)
  {
    $this->db->insert('materi',$filename);
  }

  public function HapusMateri($id)
  {
    $this->db->where('idMateri',$id);
    $this->db->delete('materi');
  }

}
