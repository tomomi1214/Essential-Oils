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
        public $english_name;   //英名
        public $user_id;        //登録したUser
        public $image;          //画像
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
        public function validate(){
            
            $errors = array();
        
            if($this->name === ''){
                $errors[] = 'エッセンシャルオイル名を入力してください';
            }
            if($this->scientific_name === ''){
                $errors[] = '学名を入力してください';
            }
            if($this->plant_name === ''){
                $errors[] = '科名を入力してください';
            }
            if($this->extraction === ''){
                $errors[] = '抽出方法を入力してください';
            }
            if($this->aroma === ''){
                $errors[] = '香りを入力してください';
            }
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            if($this->english_name === ''){
                $errors[] = '英名を入力してください';
            }else if(!preg_match('/^[a-zA-Z 　]+$/', $this->english_name)){
                $errors[] = '英名をアルファベットで入力してください';
            }
            if($this->image === ''){
                $errors[] = '画像を選択してください';
            }
            return $errors;
        }
        

    }
