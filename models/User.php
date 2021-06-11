<?php
    
    //ユーザの設計図を作成
    class User{
        //プロパティ
        public $id; //id
        public $name; //名前
        public $email; //Address
        public $password; //Password
        public $created_at; //登録日時
        
        //コンストラクタ
        public function __construct($name="", $email="", $password="") {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        //入力チェックメソッド
        public function validate(){
            $errors = array();
            
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            if($this->email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $this->email)){
                $errors[] = '正しい形式のメールアドレスを入力してください';
            }
            if($this->password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            return $errors;
        }
    }
    