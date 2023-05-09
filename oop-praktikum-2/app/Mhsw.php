<?php
    abstract  class Peserta {
        abstract protected function tampil();
    }
 class mhsw extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=dbakademik1", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where mhsw_id='".$_GET['mhsw_id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$alamat)
    {
        $sql = "update mahasiswa set mhsw_nim='".$nim."', mhsw_nama='".$nama."', mhsw_alamat='".$alamat."' where mhsw_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM mahasiswa WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }

 class dosen extends Peserta {
    private $db;
    public function __construct()
        {
      try {
    $this->db = new PDO("mysql:host=localhost;dbname=dbakademik1", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
           }
       }
       public function tampil()
       {
           $sql = "SELECT * FROM dosen";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
   
       public function simpan()
       {
           $sql = "insert into dosen values ('','".$_GET['nip']."','".$_GET['nama']."','".$_GET['alamat']."')";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DISIMPAN !";
       } 
   
       public function hapus()
       {
           $sqls = "delete from dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmts = $this->db->prepare($sqls);
           $stmts->execute();
           echo "DATA BERHASIL DIHAPUS !";
       }      
       public function tampil_update()
       {
           $sql = "SELECT * FROM dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
       public function update($id,$nip,$nama,$alamat)
       {
           $sql = "update dosen set dosen_nim='".$nim."', dosen_nama='".$nama."', dosen_alamat='".$alamat."' where dosen_id='".$id."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DIUPDATE !";
       } 
       public function cari($alamat){
           $sql = "SELECT * FROM dosen WHERE dosen_almaat LIKE '%".$alamat."%'
           ";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }  
   
    }

 class fakultas extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=dbakademik1", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM fakultas where id_mahasiswa ='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function tampildosen()
    {
        $sql = "SELECT * FROM fakultas where id_dosen ='".$_GET['id_dosen']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into fakultas values ('','".$_GET['fakultas']."','".$_GET['id']."',null)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 
    public function simpandosen()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['fakultas']."',null,'".$_GET['id']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where id='".$_GET['id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where mhsw_id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($fakultas, $id)
    {
        $sql = "update fakultas set fakultas='".$fakultas."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM mahasiswa WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }