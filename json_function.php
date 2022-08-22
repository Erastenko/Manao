<?php
include 'user.php';
class JSON
{

    public function  read_json()
    {
        $data = file_get_contents('bd.json');
        $data = json_decode($data);
        return $data;
    }
    
    public function  write_json($data)
    {
        $data = json_encode($data);
        file_put_contents('bd.json', $data);
    }
}
