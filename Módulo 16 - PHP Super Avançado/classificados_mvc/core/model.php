<?php
class model
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
}