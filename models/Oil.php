<?php
    
    require_once 'DAOs/UserDAO.php';
    
    class Oil {
        public $id;     //オイルID
        public $name;   //名前
        public $scientific_name;//学名
        public $plant_name;     //科名
        public $extraction;     //抽出方法
        public $aroma;          //香り
        public $caution;         //注意事項
        public $english_name;
        public $user_id;
        public $image;
        public $created_at;     //登録日時
        
        public function __construct($name="", $scientific_name="", $plant_name="", $extraction="", $aroma="", $caution="", $english_name="", $user_id="", $image=""){
            $this->name = $name;
            $this->scientific_name = $scientific_name;
            $this->plant_name = $plant_name;
            $this->extraction = $extraction;
            $this->aroma = $aroma;
            $this->caution = $caution;
            $this->english_name = $english_name;
            $this->user_id = $user_id;
            $this->image = $image;
        }
        //登録したユーザのインスタンスを取得メソッド
        public function user(){
            //UserDaoを使用してユーザインスタンスを取得
            $user = UserDAO::get_user($this->user_id);
            return $user;
        }

    }
