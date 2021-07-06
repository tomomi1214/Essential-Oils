<?php

    class Relation {
        //プロパティ
        public $id;
        public $oil_id;
        public $effect_id;
        public $howto;
        public $caution;
        public $user_id;
        public $created_at;
        
        //コンストラクタ
        public function __construct($oil_id="", $effect_id="", $howto="",$caution="", $user_id=""){
            $this->oil_id = $oil_id;
            $this->effect_id = $effect_id;
            $this->howto = $howto;
            $this->caution = $caution;
            $this->user_id = $user_id;
        }
        
        // バリデーションチェック
        public function validate(){
            //エラー配列を作成
            $errors = array();
            
            //オイルが選択されていない場合
            if($this->oil_id === null){
                $errors[] = 'エッセンシャルオイルを選択してください';
            }            
            //効能が選択されていない場合
            if($this->effect_id === null){
                $errors[] = '効能を選択してください';
            }
            //使用方法が入力されていない場合
            if($this->howto === ''){
                $errors[] = '使用方法を入力してください';
            }
            //注意事項が入力されていない場合
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            //エラー配列を返す
            return $errors;
        }
    }
