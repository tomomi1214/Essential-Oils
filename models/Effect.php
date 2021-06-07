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
    }
    
