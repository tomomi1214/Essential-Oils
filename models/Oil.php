<?php
    //外部ファイルの読み込み
    require_once 'DAOs/UserDAO.php';
    
    class Oil {
    //プロパティ
        public $id;
        public $name;
        public $scientific_name;
        public $plant_name;
        public $extraction;
        public $aroma;
        public $caution;
        public $english_name;
        public $user_id;
        public $image;
        public $created_at;
        
        //コンストラクタ
        public function __construct($name="", $scientific_name="", $plant_name="", $extraction="", $aroma="", $caution="", $english_name="", $user_id="", $image=""){
            $this->name = $name;
            $this->scientific_name = $scientific_name;
            $this->plant_name = $plant_name;
            $this->extraction = $extraction;
            $this->aroma = $aroma;
            $this->caution = $caution;
            $this->english_name = $english_name;
            $this->user_id = $user_id;
            $this->image = $image;
        }
        // バリデーションチェック
        public function validate(){
            //エラー配列を作成
            $errors = array();
            
            //名前が入力されていない場合
            if($this->name === ''){
                $errors[] = 'エッセンシャルオイル名を入力してください';
            }
            //学名が入力されていない場合
            if($this->scientific_name === ''){
                $errors[] = '学名を入力してください';
            }
            //科名が入力されていない場合
            if($this->plant_name === ''){
                $errors[] = '科名を入力してください';
            }
            //抽出方法が入力されていない場合
            if($this->extraction === ''){
                $errors[] = '抽出方法を入力してください';
            }
            //香りが入力されていない場合
            if($this->aroma === ''){
                $errors[] = '香りを入力してください';
            }
            //注意事項が入力されていない場合
            if($this->caution === ''){
                $errors[] = '注意事項を入力してください';
            }
            //英名が入力されていない場合 / 英語で入力されていない場合
            if($this->english_name === ''){
                $errors[] = '英名を入力してください';
            }else if(!preg_match('/^[a-zA-Z 　]+$/', $this->english_name)){
                $errors[] = '英名をアルファベットで入力してください';
            }
            //画像が選択されていない場合
            if($this->image === ''){
                $errors[] = '画像を選択してください';
            }
            //エラー配列を返す
            return $errors;
        }
        

    }
