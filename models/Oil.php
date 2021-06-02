<?php

    class Oil {
        public $id;     //オイルID
        public $name;   //名前
        public $scientific_name;//学名
        public $plant_name;     //科名
        public $extraction;     //抽出方法
        public $aroma;          //香り
        public $caution;         //注意事項
        public $english_name;
        public $created_at;     //登録日時
        
        public function __construct($name="", $scientific_name="", $plant_name="", $extraction="", $component="", $aroma="", $english_name="", $caution=""){
            $this->name = $name;
            $this->scientific_name = $scientific_name;
            $this->plant_name = $plant_name;
            $this->extraction = $extraction;
            $this->aroma = $aroma;
            $this->english_name = $english_name;
            $this->caution = $caution;
        }
    }
