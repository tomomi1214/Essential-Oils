<?php
    //外部ファイルの読み込み
    require_once 'models/User.php';
    require_once 'DAOs/DAO.php';
    //DAO
    class UserDAO extends DAO{
        
        //新規ユーザ登録をするメソッド
        public static function insert($user) {
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');
                
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $user->password, PDO::PARAM_STR);
                
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                
                return "新規ユーザ登録に成功しました!";
                
            }catch(PDOException $e){
                return 'このアドレスは既に登録されています。';
            }
        }
        //入力されたメールアドレス、パスワードをもったユーザがいるか確認するメソッド
        public static function login($email, $password){
             try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
                
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                
                $user = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $user;
        }
    }