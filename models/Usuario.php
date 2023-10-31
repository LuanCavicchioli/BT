<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
    session_start();

    class Usuario{

        protected $db;
        protected $table = "usuarios";

        public function __construct()
        {
            $this->db = DBConexao::getConexao();
        }
    }
?>