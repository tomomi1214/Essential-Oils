<?php
    require_once 'DAOs/RelationDAO.php';
    
    class Effect {
        public $id;     //ID
        public $effect;   //名前
        public $content; //説明文
        public $caution;         //注意事項
        public $created_at;     //登録日時
        
        public function __construct($effect="", $content="",$caution=""){
            $this->effect = $effect;
            $this->content = $content;
            $this->caution = $caution;
        }
    }
    
