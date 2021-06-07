<?php

    class Relation {
        public $id;     //ID
        public $oil_id;   //名前
        public $effect_id;   //名前
        public $howto; 
        public $content; //説明文
        public $caution;         //注意事項
        public $user_id;
        public $created_at;     //登録日時
        
        public function __construct($oil_id="", $effect_id="", $howto="", $content="",$caution="", $user_id=""){
            $this->oil_id = $oil_id;
            $this->effect_id = $effect_id;
            $this->howto = $howto;
            $this->content = $content;
            $this->caution = $caution;
            $this->user_id = $user_id;
        }
    }
