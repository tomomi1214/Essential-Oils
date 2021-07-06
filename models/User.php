<?php
    
    class User{
        //プロパティ
        public $id;
        public $name;
        public $email;
        public $password;
        public $created_at;
        
        //コンストラクタ
        public function __construct($name="", $email="", $password="") {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        //バリデーションチェック
        public function validate(){
            //エラー配列を作成
            $errors = array();
            //名前が入力されていない場合
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            //アドレスが入力されていない場合 / 正しい形式でない場合
            if($this->email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $this->email)){
                $errors[] = '正しい形式のメールアドレスを入力してください';
            }
            //パスワードが入力されていない場合
            if($this->password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            //エラー配列を返す
            return $errors;
        }
    }
    