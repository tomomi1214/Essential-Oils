<?php
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';

    class Relation {
        public $id;     //ID
        public $oil_id;   //名前
        public $effect_id;   //名前
        public $howto; 
        public $content; //説明文
        public $caution;         //注意事項
        public $created_at;     //登録日時
        
        public function __construct($oil_id="", $effect_id="", $howto="", $content="",$caution=""){
            $this->oil_id = $oil_id;
            $this->effect_id = $effect_id;
            $this->howto = $howto;
            $this->content = $content;
            $this->caution = $caution;
        }
        
        //効果に対するオイル取得メソッド
        public function oil(){
            $oil = OilDAO::get_oil($this->oil_id);
            return $oil;
        }
        
        //oilに対するeffect取得メソッド
        public function effect(){
            $effect = EffectDAO::get_effect($this->effect_id);
            return $effect;
        }
        


    }
