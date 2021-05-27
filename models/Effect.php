<?php

    class Effect {
        public $id;     //ID
        public $name;   //名前
        public $essential_oils;//学名
        public $how_to_use;     //科名
        public $caution;         //注意事項
        public $created_at;     //登録日時
        
        public function __construct($name="", $essential_oils="", $how_to_use="", $caution=""){
            $this->name = $name;
            $this->essential_oils = $essential_oils;
            $this->how_to_use = $how_to_use;
            $this->caution = $caution;
        }
    }
