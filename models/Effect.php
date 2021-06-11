<?php
    require_once 'DAOs/RelationDAO.php';
    
    class Effect {
        public $id;     //ID
        public $effect;   //名前
        public $content; //説明文
        public $caution;         //注意事項
        public $user_id;
        public $created_at;     //登録日時
        
        public function __construct($effect="", $content="",$caution="", $user_id=""){
            $this->effect = $effect;
            $this->content = $content;
            $this->caution = $caution;
            $this->user_id = $user_id;
        }
        public function validate(){
            
            $errors = array();
        
            if($this->effect === ''){
                $errors[] = '効能を入力してください';
            }
            if($this->content === ''){
                $errors[] = '詳細を入力してください';
            }
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            return $errors;
        }

    }
    
