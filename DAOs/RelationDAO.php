<?php
    //外部ファイルの読み込み
    require_once 'models/Relation.php';
    require_once 'DAOs/DAO.php';
    //DAO
    class RelationDAO extends DAO{
        
        //DBから全オイル情報を取得する
        public static function get_all_relations(){
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->query('SELECT * FROM relations');
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                $relations = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $relations;    
        }
    /*
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
        
        */
        /*
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
*/
        //user_idを指定して情報取得する
        public static function get_all_relations_by_user_id($user_id){
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT relations.id, essential_oils.name AS essential_oil_name, effects.effect AS effect FROM relations JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.user_id=:user_id');
                
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                $relations = $stmt->fetchAll();
                
                self::close_connection($pdo, $stmt);
                return $relations;
                
            }catch(PDOException $e){
                return null;
            }
        }
        //新規関連登録メソッド
        public static function insert($relation) {
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('INSERT INTO relations(oil_id, effect_id, howto, caution, user_id) VALUES(:oil_id, :effect_id, :howto, :caution, :user_id)');
                
                $stmt->bindValue(':oil_id', $relation->oil_id, PDO::PARAM_INT);
                $stmt->bindValue(':effect_id', $relation->effect_id, PDO::PARAM_INT);
                $stmt->bindValue(':howto', $relation->howto, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $relation->caution, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $relation->user_id, PDO::PARAM_INT);
                
                $stmt->execute();
                
                self::close_connection($pdo, $stmt);
                return "新規関連登録が成功しました！";                
            }catch(PDOException $e){
                return 'この関連は既に登録されています。';
            }
        }
        
        //削除メソッド
        public static function delete($id){
             try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('DELETE FROM relations WHERE id=:id');
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                self::close_connection($pdo, $stmt);
                
            }catch(PDOException $e){
                
            }finally{
                return '削除対象が選択されていません。';
            }
        }
    }