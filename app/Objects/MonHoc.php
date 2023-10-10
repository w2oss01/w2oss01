<?php 
    namespace App\Objects;
    
    class MonHoc{
        public $MaMonHoc;
        public $Ten;
        public $HocPhi;

        function set_MaMonHoc($MaMonHoc){
            $this->MaMonHoc = $MaMonHoc;
        }

        function set_Ten($Ten){
            $this->Ten = $Ten;
        }

        function set_HocPhi($HocPhi){
            $this->HocPhi = $HocPhi;
        }

        function get_MaMonHoc(){
            return $this->MaMonHoc;
        }

        function get_Ten(){
            return $this->Ten;
        }

        function get_HocPhi(){
            return $this->HocPhi;
        }
    }

?>
