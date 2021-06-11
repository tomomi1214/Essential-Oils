<?php
    //外部ファイルの読み込み
    require_once 'models/Oil.php';
    require_once 'DAOs/DAO.php';
    //DAO: DBを扱う専門家
    class OilDAO extends DAO{

        //DBから全オイル情報を取得し、並べ替える
        public static function get_all_oils_sort(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM essential_oils ORDER BY english_name ASC');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $oils;    
        }
                //DBから全オイル情報を取得する
        public static function get_all_oils(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM essential_oils');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $oils;    
        }

        //$idを指定して1つのオイル情報を取得する
        public static function get_oil($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oil;  
        }
        /*
        //$name指定して1つのオイル情報を取得する
        public static function get_oil_id_by_name($name){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE name=:name');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $name, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oil;  
        }
        */
        //新規oil登録をするメソッド
        public static function insert($oil) {
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO essential_oils(name, scientific_name, plant_name, extraction, aroma, caution, english_name, user_id, image) VALUES(:name, :scientific_name, :plant_name, :extraction, :aroma, :caution, :english_name, :user_id, :image)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                //文字列　‗STR　　整数‗INT
                $stmt->bindValue(':name', $oil->name, PDO::PARAM_STR);
                $stmt->bindValue(':scientific_name', $oil->scientific_name, PDO::PARAM_STR);
                $stmt->bindValue(':plant_name', $oil->plant_name, PDO::PARAM_STR);
                $stmt->bindValue(':extraction', $oil->extraction, PDO::PARAM_STR);
                $stmt->bindValue(':aroma', $oil->aroma, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $oil->caution, PDO::PARAM_STR);
                $stmt->bindValue(':english_name', $oil->english_name, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $oil->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':image', $oil->image, PDO::PARAM_STR);

                // INSERT文本番実行
                $stmt->execute();
                // 後処理
                self::close_connection($pdo, $stmt);
                return "新規エッセンシャルオイル登録が成功しました！";
            }catch(PDOException $e){
                return 'PDO exception: ' . $e->getMessage();
            }
        }

        //効果IDが与えられた時、それに紐づいたオイル一覧を取得
        public static function get_all_oils_by_effect_id($effect_id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE effect_id=:effect_id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':effect_id', $effect_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を relationクラスのインスタンスに格納
                $relations = $stmt->fetchAll();
                //var_dump($relations);
                
                //RelationsからOilsに詰め替え
                $oils = array();
                foreach($relations as $relation){
                    $oil = self::get_oil($relation->oil_id);
                    $oils[] = $oil;
                }
                //var_dump($oils);
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oils;  
        }
        public static function find($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをPostクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
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