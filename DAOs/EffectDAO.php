<?php
    //外部ファイルの読み込み
    require_once 'models/Effect.php';
    require_once 'models/Relation.php';

    //DAO: DBを扱う専門家
    class EffectDAO {
        //データベースと接続するめぞっド
        //private ここでしか使わないメソッド
        // static ::を示す
        private static function get_connection(){
            // 接続オプション設定
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );
            // データベースを操作する万能の神様誕生
            $pdo = new PDO('mysql:host=localhost;dbname=Eoil_app', 'root', '', $options);
            // 神様、はいあげる
            return $pdo;
        }
        //DBと切断する
        private static function close_connection($pdo, $stmt){
            //万能の神様、さようなら
            $pdo = null;
            //結果、さようなら
            $stmt = null;
        }
        
        //DBから全オイル情報を取得する
        public static function get_all_effects(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM effects');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $effects = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $effects;    
        }
        //$idを指定して1つのオイル情報を取得する
        public static function get_effect($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM effects WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                $effect = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $effect;  
        }
        //$oil_idが与えられた時、それに与えられらeffect情報を取得する
        public static function get_all_effects_by_oil_id($oil_id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE oil_id=:oil_id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':oil_id', $oil_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                //すべてを格納するためにfetchAllにする。fechだと最初の一つだけ
                $relations = $stmt->fetchAll();
                //var_dump($relations);
                
                //$relationsから$effectsを求めたい
                $effects = array();
                foreach($relations as $relation){
                    $effect = self::get_effect($relation->effect_id);
                    $effects[] = $effect;  
                }
                //var_dump($effects);
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した効能一覧、はいあげる
            return $effects;  
        }
        //新規effect登録をするメソッド
        public static function insert($effect) {
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO effects(effect, content, caution, user_id) VALUES(:effect, :content, :caution, :user_id)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                //文字列　‗STR　　整数‗INT
                $stmt->bindValue(':effect', $effect->effect, PDO::PARAM_STR);
                $stmt->bindValue(':content', $effect->content, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $effect->caution, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $effect->user_id, PDO::PARAM_INT);

                // INSERT文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }

        public static function find($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM effects WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをPostクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                // SELECT文の結果を Postクラスのインスタンスに格納
                $effect = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した、はい投稿あげる
            return $effect;  
        }
        /*
        public static function get_oil($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをPostクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
                // SELECT文の結果を Postクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した、はい投稿あげる
            return $oil;  
        }
        */
        /*
        //入力されたメールアドレス、パスワードをもったユーザがいるかをチェック
        public static function login($email, $password){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをUserクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // SELECT文の結果を Userクラスのインスタンスに格納
                $user = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $user;
        }
        */
        /*
        //$idを指定して入力された情報に更新
        public static function update($user, $id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // UPDATE文の実行準備(:id, :name, :ageは適当、不明確)
                $stmt = $pdo->prepare('UPDATE users SET name=:name, age=:age WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':age', $user->age, PDO::PARAM_INT);
                
                // update文本番実行
                $stmt->execute();

            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        } 
        //$idのユーザを削除する
        public static function delete($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // DELETE文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('DELETE FROM users WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // DELETE文本番実行
                $stmt->execute();

            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }*/

    }