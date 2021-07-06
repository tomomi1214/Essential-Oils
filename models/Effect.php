<?php
    //外部ファイルの読み込み
    require_once 'DAOs/RelationDAO.php';
    
    class Effect {
        //プロパティ
        public $id;
        public $effect;
        public $content;
        public $caution;
        public $user_id;
        public $created_at;
        
        //コンストラクタ
        public function __construct($effect="", $content="",$caution="", $user_id=""){
            $this->effect = $effect;
            $this->content = $content;
            $this->caution = $caution;
            $this->user_id = $user_id;
        }
        
        //バリデーションチェック
        public function validate(){
            //エラー配列を作成
            $errors = array();
            
            //効能が入力されていない場合
            if($this->effect === ''){
                $errors[] = '効能を入力してください';
            }
            //詳細が登録されていない場合
            if($this->content === ''){
                $errors[] = '詳細を入力してください';
            }
            //注意事項が入力されていない場合
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            //エラー配列を返す
            return $errors;
        }

    }
    
