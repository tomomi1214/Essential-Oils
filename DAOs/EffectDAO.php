<?php
    //外部ファイルの読み込み
    require_once 'models/Effect.php';
    require_once 'models/Relation.php';
    require_once 'DAOs/DAO.php';
    //DAO
    class EffectDAO extends DAO{
       
        //DBから全オイル情報を取得するメソッド
        public static function get_all_effects(){
            try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->query('SELECT * FROM effects');
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                $effects = $stmt->fetchAll();
                
            }catch(PDOException $e){
                }finally{
                    self::close_connection($pdo, $stmt);
                }
                return $effects;    
        }
        
        //$idを指定して1つのオイル情報を取得するメソッド
        public static function get_effect($id){
             try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM effects WHERE id=:id');
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                $effect = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $effect;  
        }
        
        // user_idからデータを抜き出すメソッド
        public static function get_all_effects_by_user_id($user_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM effects WHERE user_id = :user_id');
                
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                $effects = $stmt->fetchAll();
                
                self::close_connection($pdo, $stmt);
                
                return $effects;
            } catch (PDOException $e) {
                return null;
            }
        }
        
        //oil_idとEffect_idを指定して情報取得する
        public static function get_relation_detail_by_oil_id($id){
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT relations.id, relations.howto, essential_oils.name AS essential_oil_name, effects.id AS effect_id, effects.effect AS effect FROM relations JOIN essential_oils ON relations.oil_id = essential_oils.id JOIN effects ON relations.effect_id = effects.id WHERE relations.oil_id=:id');
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Effect');
                $effects = $stmt->fetchAll();
                
                self::close_connection($pdo, $stmt);
                return $effects;
                
            }catch(PDOException $e){
                return null;
            }
        }   
        
        //新規登録メソッド
        public static function insert($effect) {
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('INSERT INTO effects(effect, content, caution, user_id) VALUES(:effect, :content, :caution, :user_id)');
                
                $stmt->bindValue(':effect', $effect->effect, PDO::PARAM_STR);
                $stmt->bindValue(':content', $effect->content, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $effect->caution, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $effect->user_id, PDO::PARAM_INT);
                
                $stmt->execute();
                
                self::close_connection($pdo, $stmt);
                return "新規効能登録が成功しました！";
            }catch(PDOException $e){
                return $effect->effect . 'は既に登録されています。';
            }
        }
        
        // データを更新するメソッド
        public static function update($effect, $id){ 
             try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('UPDATE effects SET effect=:effect, content=:content, caution=:caution, user_id=:user_id WHERE id = :id');
                
                $stmt->bindParam(':effect', $effect->effect, PDO::PARAM_STR);
                $stmt->bindParam(':content', $effect->content, PDO::PARAM_STR);
                $stmt->bindParam(':caution', $effect->caution, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $effect->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

                $stmt->execute();
                self::close_connection($pdo, $stmt);

                return '情報が更新されました！';
            }catch(PDOException $e){
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //$idの効能情報を削除する
        public static function delete($id){
             try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('DELETE FROM effects WHERE id=:id');
                
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                return '効能情報を削除しました！';
                
            }catch(PDOException $e){
                
            }finally{
                self::close_connection($pdo, $stmt);
            }
        }
        
    }