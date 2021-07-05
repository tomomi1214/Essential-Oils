<?php
    //外部ファイルの読み込み
    require_once 'models/Effect.php';
    require_once 'models/Relation.php';
    require_once 'DAOs/DAO.php';
    //DAO: DBを扱う専門家
    class EffectDAO extends DAO{
       
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
        // id値からデータを抜き出すメソッド
        public static function get_effect_by_id($id){
        try {
            $pdo = self::get_connection();
            $stmt = $pdo->prepare('SELECT * FROM effects WHERE id = :id');
            // バインド処理
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、messageクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
            $effect = $stmt->fetch();
            self::close_connection($pdo, $stmt);
            // メッセージクラスのインスタンスを返す
            return $effect;
        } catch (PDOException $e) {
            return null;
        }
    }
        // user_idからデータを抜き出すメソッド
        public static function get_all_effects_by_user_id($user_id){
        try {
            $pdo = self::get_connection();
            $stmt = $pdo->prepare('SELECT * FROM effects WHERE user_id = :user_id');
            // バインド処理
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、messageクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
            $effects = $stmt->fetchAll();
            self::close_connection($pdo, $stmt);
            // メッセージクラスのインスタンスを返す
            return $effects;
        } catch (PDOException $e) {
            return null;
        }
    }
    
        //oil_idとEffect_idを指定して情報取得する
        public static function get_relation_detail_by_oil_id($id){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備 statement object
                //$stmt = $pdo->prepare('SELECT effect.id, effect.effect, relations.howto AS howto FROM relations, essential_oils.name AS essential_oil_name JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.oil_id=:id');
                $stmt = $pdo->prepare('SELECT relations.id, relations.howto, essential_oils.name AS essential_oil_name, effects.id AS effect_id, effects.effect AS effect FROM relations JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.oil_id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
        
        
        // user_idから効能名を抜き出すメソッド
        public static function get_all_effects_by_user_id_for_relations($user_id){
        try {
            $pdo = self::get_connection();
            $stmt = $pdo->prepare('SELECT * FROM relations WHERE user_id = :user_id');
            // バインド処理
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、messageクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
            $relations = $stmt->fetchAll();
            
            $effects = array();
            foreach($relations as $relation){
                $effect = self::get_effect($relation->effect_id);
                $effects[] = $effect;
            }
            
            
        } catch (PDOException $e) {
            self::close_connection($pdo, $stmt);
        }
        return $effects;
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
                // 後処理
                self::close_connection($pdo, $stmt);
                return "新規効能登録が成功しました！";
            }catch(PDOException $e){
                //return 'PDO exception: ' . $e->getMessage();
                return $effect->effect . 'は既に登録されています。';
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
            // データを更新するメソッド
    public static function update($effect, $id){ 
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // UPDATE文の実行準備(:effect....は適当、不明確)
                $stmt = $pdo->prepare('UPDATE effects SET effect=:effect, content=:content, caution=:caution, user_id=:user_id WHERE id = :id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindParam(':effect', $effect->effect, PDO::PARAM_STR);
                $stmt->bindParam(':content', $effect->content, PDO::PARAM_STR);
                $stmt->bindParam(':caution', $effect->caution, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $effect->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    
                // update文本番実行
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                return '情報が更新されました！';
            }catch(PDOException $e){
                return 'PDO exception: ' . $e->getMessage();
            }
        }

        
        
        
        /*
        //$idを指定して入力された情報に更新
        public static function update($effect){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // UPDATE文の実行準備(:id, :name, :ageは適当、不明確)
                $stmt = $pdo->prepare('UPDATE effects SET effect=:effect, content=:content, caution=:caution, user_id=:user_id WHERE id = :id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindParam(':effect', $effect->effect, PDO::PARAM_STR);
                $stmt->bindParam(':content', $effect->content, PDO::PARAM_STR);
                $stmt->bindParam(':caution', $effect->caution, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $effect->user_id, PDO::PARAM_INT);
    
                // update文本番実行
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                //return "情報を更新しました！";

            }catch(PDOException $e){

                return 'PDO exception: ' . $e->getMessage();
            }
        }*/
            
            /*    
             }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }*/
        
        //$idの効能情報を削除する
        public static function delete($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // DELETE文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('DELETE FROM effects WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // DELETE文本番実行
                $stmt->execute();
                
                return '情報を削除しました！';

            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }

    }