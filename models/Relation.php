<?php

    class Relation {
        public $id;     //ID
        public $oil_id;   //名前
        public $effect_id;   //名前
        public $howto; 
        public $caution;         //注意事項
        public $user_id;
        public $created_at;     //登録日時
        
        public function __construct($oil_id="", $effect_id="", $howto="",$caution="", $user_id=""){
            $this->oil_id = $oil_id;
            $this->effect_id = $effect_id;
            $this->howto = $howto;
            $this->caution = $caution;
            $this->user_id = $user_id;
        }
        
        public function validate(){
            
            $errors = array();
            
            if($this->oil_id === ''){
                $errors[] = 'エッセンシャルオイルを選択してください';
            }else if($this->oil_id === null){
                $errors[] = 'エッセンシャルオイルを選択してください';
            }            
            
            if($this->effect_id === ''){
                $errors[] = '効能を選択してください';
            }else if($this->effect_id === null){
                $errors[] = '効能を選択してください';
            }
            
            if($this->howto === ''){
                $errors[] = '使用方法を入力してください';
            }
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            return $errors;
        }
    }
