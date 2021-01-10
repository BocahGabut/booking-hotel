<?php

class Model extends CI_Model
{

     public function show_data($table, $where = null)
     {
          if ($where) {

               $this->db->where($where);
          }
          return $this->db->get($table);
     }

     public function save($table, $data)
     {
          $this->db->insert($table, $data);
     }

     public function join($table, $field, $data, $where = null, $order = null)
     {

          if ($where) {
               $this->db->where($where);
          }

          if ($order) {
               $this->db->order_by($order);
          }

          $this->db->join($field, $data);
          return $this->db->get($table);
     }

     public function repair()
     {

          $this->db->join('kamar', 'kamar.id_kamar = perbaikan_kamar.id_kamar');
          //$this->db->join('', 'kamar.id_kamar = perbaikan_kamar.id_kamar');
          return $this->db->get('perbaikan_kamar');
     }

     public function floor()
     {
          $this->db->group_by('lantai');
          return $this->db->get('kamar');
     }

     public function delete($table, $where = null)
     {
          $this->db->where($where);
          $this->db->delete($table);
     }

     public function update($table, $where, $data)
     {
          $this->db->where($where);
          $this->db->update($table, $data);
     }

     ///pengecekan
     public function cek_kamar($kode)
     {
          $this->db->join('perbaikan_kamar', 'perbaikan_kamar.id_kamar = kamar.id_kamar');
          $this->db->where('nomor_kamar', $kode);
          return $this->db->get('kamar');
     }

     public function delete_all($table)
     {
          $this->db->truncate($table);
     }

     public function cek_booking($kode)
     {
          $this->db->join('kamar', 'booking.id_kamar = kamar.id_kamar');
          $this->db->where('nomor_kamar', $kode);
          return $this->db->get('booking');
     }

     public function full_calender()
     {
          $this->db->like('status', 'B');
          $this->db->or_like('status', 'I');
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->join('penghuni', 'penghuni.id_penghuni = booking.id_penghuni');
          return $this->db->get('booking');
     }

     public function fasilitas($table)
     {
          $this->db->join('tipe_kamar', 'tipe_kamar.id_tipekamar = fasilitas_tipekamer.tipekamar');
          $this->db->group_by('tipekamar');
          return $this->db->get($table);
     }

     public function data_tamu($kode)
     {

          $this->db->like('no_ktp', $kode);
          $this->db->or_like('nama_penghuni', $kode);
          $this->db->limit('1');
          return $this->db->get('penghuni');
     }

     public function data_kamar($kode)
     {
          $this->db->join('fasilitas_tipekamer', 'fasilitas_tipekamer.tipekamar = kamar.tipekamar');
          $this->db->join('fasilitas', 'fasilitas.id_fasilitas = fasilitas_tipekamer.fasilitas');
          $this->db->join('harga_kamar', 'harga_kamar.id_tipekamar = kamar.tipekamar');
          $this->db->join('diskon', 'diskon.id_tipekamar = kamar.tipekamar');
          $this->db->where('nomor_kamar', $kode);
          return $this->db->get('kamar');
     }
     public function data_chekin()
     {
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->join('tipe_kamar', 'tipe_kamar.id_tipekamar = kamar.tipekamar');
          $this->db->join('harga_kamar', 'harga_kamar.id_tipekamar = kamar.tipekamar');
          $this->db->join('penghuni', 'penghuni.id_penghuni = booking.id_penghuni');
          return $this->db->get('booking');
     }

     public function check_pembayaran($kode)
     {
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->join('tipe_kamar', 'tipe_kamar.id_tipekamar = kamar.tipekamar');
          $this->db->join('harga_kamar', 'harga_kamar.id_tipekamar = kamar.tipekamar');
          $this->db->join('penghuni', 'penghuni.id_penghuni = booking.id_penghuni');
          $this->db->like('nama_penghuni', $kode);
          return $this->db->get('booking');
     }

     public function cek_login($where)
     {
          $this->db->where($where);
          return $this->db->get('karyawan');
     }


     function last_week()
     {
          $startDate = date('Y-m-d', strtotime("-1 week"));
          $endDate   = date('Y-m-d', strtotime("now"));
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->where("tgl_booking BETWEEN '" . $startDate . "' AND '" . $endDate . "' ");
          return $this->db->get('booking');
     }

     function last_month()
     {
          $startDate = date('Y-m-d', strtotime("-30 days"));
          $endDate   = date('Y-m-d', strtotime("now"));
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->where("tgl_booking BETWEEN '" . $startDate . "' AND '" . $endDate . "' ");
          return $this->db->get('booking');
     }

     function range($start, $end)
     {
          $this->db->join('kamar', 'kamar.id_kamar = booking.id_kamar');
          $this->db->where("tgl_booking BETWEEN '" . $start . "' AND '" . $end . "' ");
          return $this->db->get('booking');
     }

     //kode_otomatis
     public function no_faktur()
     {
          $this->db->select('RIGHT(booking.id_booking,2) as id_booking', FALSE);
          $this->db->order_by('id_booking', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('booking');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->id_booking) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $tgl = date('dmY');
          $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
          $kodetampil = "BK" . "5" . $tgl . $batas;  //format kode
          return $kodetampil;
     }

     public function edit_fasilitas($where)
     {
          $this->db->join('tipe_kamar', 'tipe_kamar.id_tipekamar = fasilitas_tipekamer.tipekamar');
          $this->db->where($where);
          $this->db->limit(1);
          return $this->db->get('fasilitas_tipekamer');
     }

     public function full_data($table, $field, $data, $where = null)
     {

          if ($where) {
               $this->db->where($where);
          }

          $this->db->join($field, $data);
          return $this->db->get($table);
     }

     public function getsum_data($where = null)
     {

          if ($where) {
               $this->db->where($where);
          }
          $this->db->select_sum('total_bayar');
          return $this->db->get('booking')->result();
     }
}
