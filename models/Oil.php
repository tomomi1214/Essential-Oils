<?php

    class Oil {
        public $id;     //オイルID
        public $name;   //名前
        public $scientific_name;//学名
        public $plant_name;     //科名
        public $extraction;     //抽出方法
        public $aroma;          //香り
        public $effect;         //効果
        public $caution;         //注意事項
        public $created_at;     //登録日時
        
        public function __construct($name="", $scientific_name="", $plant_name="", $ectraction="", $component="", $aroma="", $effect="", $caution=""){
            $this->name = $name;
            $this->scientific_name = $scientific_name;
            $this->plant_name = $plant_name;
            $this->extraction = $extraction;
            $this->aroma = $aroma;
            $this->effect = $effect;
            $this->caution = $caution;
        }
    }
