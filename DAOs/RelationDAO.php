<?php
    //外部ファイルの読み込み
    require_once'models/Relation.php';
    require_once 'DAOs/DAO.php';
    //DAO: DBを扱う専門家
    class RelationDAO extends DAO{
    
        //DBから全オイル情報を取得する
        public static function get_all_relations(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM relations');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $relations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $relations;    
        }
        //DBからidを指定して情報を取得する
        public static function get_relation($id){
        // 例外処理
           try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $relation = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した投稿一覧、はいあげる
            return $relation;       
        }
                //DBからidを指定して情報を取得する
        public static function get_relation_by_id($id){
        // 例外処理
           try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $relation = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した投稿一覧、はいあげる
            return $relation;       
        }
/*
        //DBからeffect_idに対するオイル情報取得する
        public static function get_all_relations_by_effect_id($effect_id){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE effect_id=:effect_id');
                $stmt->bindValue(':effect_id', $effect_id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $relations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した投稿一覧、はいあげる
            return $relations;    
        }
        //DBからoil_idに対するeffect情報取得する
        public static function get_all_relations_by_oil_id($oil_id){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE oil_id=:oil_id');
                $stmt->bindValue(':oil_id', $oil_id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した投稿一覧、はいあげる
            return $oils;    
        }
    */
        //user_idを指定して情報取得する
        public static function get_all_relations_by_user_id($user_id){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT relations.id, essential_oils.name AS essential_oil_name, effects.effect AS effect FROM relations JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.user_id=:user_id');
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $relations = $stmt->fetchAll();
                self::close_connection($pdo, $stmt);
                return $relations;
                
            }catch(PDOException $e){
                return null;
            }
        }
        
        //oil_idとEffect_idを指定して情報取得する
        public static function get_relation_detail_by_oil_and_effect($oil_id){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                $stmt = $pdo->prepare('SELECT relations.id, relations.howto, essential_oils.name AS essential_oil_name, effects.effect AS effect FROM relations JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.oil_id=:oil_id');
                $stmt->bindValue(':oil_id', $oil_id, PDO::PARAM_INT);
                //$stmt->bindValue(':effect_id', $effect_id, PDO::PARAM_INT);
                // INSERT文本番実行
                $stmt->execute();
                // Fetch ModeをRelationクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を Relationクラスのインスタンス配列に格納
                $relations = $stmt->fetchAll();
                self::close_connection($pdo, $stmt);
                return $relations;

            }catch(PDOException $e){
                return null;
            }
        }
        
        //新規関連登録をするメソッド
        public static function insert($relation) {
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO relations(oil_id, effect_id, howto, caution, user_id) VALUES(:oil_id, :effect_id, :howto, :caution, :user_id)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                //文字列　‗STR　　整数‗INT
                $stmt->bindValue(':oil_id', $relation->oil_id, PDO::PARAM_INT);
                $stmt->bindValue(':effect_id', $relation->effect_id, PDO::PARAM_INT);
                $stmt->bindValue(':howto', $relation->howto, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $relation->caution, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $relation->user_id, PDO::PARAM_INT);

                // INSERT文本番実行
                $stmt->execute();
                // 後処理
                self::close_connection($pdo, $stmt);
                return "新規関連登録が成功しました！";                
            }catch(PDOException $e){
                //return 'PDO exception: ' . $e->getMessage();
                return 'この関連は既に登録されています。';
            }
        }
        
        //$effect_idを指定して、該当するオイル情報を取得する
        /*
        public static function get_relation($effect_id){
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
        } */
        //$idのユーザを削除する
        public static function delete($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // DELETE文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('DELETE FROM relations WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // DELETE文本番実行
                $stmt->execute();
                // 後処理
                self::close_connection($pdo, $stmt);

            }catch(PDOException $e){
                
            }finally{
                return '削除対象が選択されていません。';
            }
        }
    }