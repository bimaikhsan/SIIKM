<?php
class fungsi {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }
    function proses_login($user,$pass,$level)
    {
        $row = $this->db->prepare('SELECT * FROM user WHERE email=? AND password=md5(?) AND level=?');
        $row->execute(array($user,$pass,$level));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $hasil = $row->fetch();
        }else{
            return 'gagal';
        }
    }
    function tampil($tabel)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel ORDER BY id DESC");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function tampil_data($tabel,$level)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE level=?");
        $row->execute(array($level));
        return $hasil = $row->fetchAll();
    }

    function tampil_informasi($tabel,$kategori)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE kategori=?");
        $row->execute(array($kategori));
        return $hasil = $row->fetchAll();
    }

    function tampil_data_id($tabel,$where,$id)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
        $row->execute(array($id));
        return $hasil = $row->fetch();
    }
    function getLevel($user,$pass) {
    $row = $this->db->prepare('SELECT level FROM user WHERE email=? AND password=md5(?)');
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $hasil = $row->fetch()[0];
        }else{
            return 'gagal';
        }
    }
    function tambah_data($tabel,$data)
    {
        $rowsSQL = array();
        $toBind = array();
        $columnNames = array_keys($data[0]);
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
        $sql = "INSERT INTO $tabel (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
        $row = $this->db->prepare($sql);
        foreach($toBind as $param => $val){
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }
    function edit_data($tabel,$data,$where,$id)
    {
        $setPart = array();
        foreach ($data as $key => $value)
        {
            $setPart[] = $key."=:".$key;
        }
        $sql = "UPDATE $tabel SET ".implode(', ', $setPart)." WHERE $where = :id";
        $row = $this->db->prepare($sql);
        $row ->bindValue(':id',$id); 
        foreach($data as $param => $val)
        {
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }

    function hapus_data($tabel,$where,$id)
    {
        $sql = "DELETE FROM $tabel WHERE $where = ?";
        $row = $this->db->prepare($sql);
        return $row ->execute(array($id));
    }
}
?>