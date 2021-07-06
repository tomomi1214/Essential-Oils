<?php
    //外部ファイルの読み込み
    require_once 'models/Oil.php';
    require_once 'models/Relation.php';
    require_once 'DAOs/DAO.php';
    //DAO
    class OilDAO extends DAO{

        //DBから全オイル情報を取得し、並べ替えるメソッド
        public static function get_all_oils_sort(){
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->query('SELECT * FROM essential_oils ORDER BY english_name ASC');
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $oils;    
        }
        //user_idからoil情報抜き出すためのメソッド
        public static function get_all_oils_by_user_id($user_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE user_id = :user_id ORDER BY english_name ASC');
                
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                
                $oils = $stmt->fetchAll();
                return $oils;
                
            } catch (PDOException $e) {
                self::close_connection($pdo, $stmt);
            }
        }
        
        //新規oil登録をするメソッド
        public static function insert($oil) {
            try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('INSERT INTO essential_oils(name, scientific_name, plant_name, extraction, aroma, caution, english_name, user_id, image) VALUES(:name, :scientific_name, :plant_name, :extraction, :aroma, :caution, :english_name, :user_id, :image)');
                
                $stmt->bindValue(':name', $oil->name, PDO::PARAM_STR);
                $stmt->bindValue(':scientific_name', $oil->scientific_name, PDO::PARAM_STR);
                $stmt->bindValue(':plant_name', $oil->plant_name, PDO::PARAM_STR);
                $stmt->bindValue(':extraction', $oil->extraction, PDO::PARAM_STR);
                $stmt->bindValue(':aroma', $oil->aroma, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $oil->caution, PDO::PARAM_STR);
                $stmt->bindValue(':english_name', $oil->english_name, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $oil->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':image', $oil->image, PDO::PARAM_STR);
                
                $stmt->execute();
                
                self::close_connection($pdo, $stmt);
                return "新規エッセンシャルオイル登録が成功しました！";
                
            }catch(PDOException $e){
                
                return $oil->name . 'は既に登録されています。';
            }
        }
        
        //効果IDが与えられた時、それに紐づいたオイル一覧を取得するメソッド
        public static function get_all_oils_by_effect_id($effect_id){
             try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE effect_id=:effect_id');
                
                $stmt->bindValue(':effect_id', $effect_id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                $relations = $stmt->fetchAll();
                
                //RelationsからOilsに代入
                $oils = array();
                foreach($relations as $relation){
                    $oil = self::get_oil($relation->oil_id);
                    $oils[] = $oil;
                }
                
            }catch(PDOException $e){
                
            }finally{
                
                self::close_connection($pdo, $stmt);
            }
            return $oils;  
        }
        
        //$idを指定して1つのオイル情報を取得する
        public static function get_oil($id){
            try{
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id=:id');
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $oil;  
        }
        
        //$idを指定して入力された情報に更新するメソッド
        public static function update($oil, $id){
             try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('UPDATE essential_oils SET name=:name, scientific_name=:scientific_name, plant_name=:plant_name, extraction=:extraction, aroma=:aroma, caution=:caution, english_name=:english_name, user_id=:user_id, image=:image WHERE id = :id');
                
                $stmt->bindParam(':name', $oil->name, PDO::PARAM_STR);
                $stmt->bindParam(':scientific_name', $oil->scientific_name, PDO::PARAM_STR);
                $stmt->bindParam(':plant_name', $oil->plant_name, PDO::PARAM_STR);
                $stmt->bindParam(':extraction', $oil->extraction, PDO::PARAM_STR);
                $stmt->bindParam(':aroma', $oil->aroma, PDO::PARAM_STR);
                $stmt->bindParam(':caution', $oil->caution, PDO::PARAM_STR);
                $stmt->bindParam(':english_name', $oil->english_name, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $oil->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':image', $oil->image, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                
                return '情報が更新されました！';
                
            } catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        // ファイルをアップロードするメソッド
        public static function upload(){
            // ファイル名をランダムに作成
            $image = uniqid(mt_rand(), true); 
            $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
            
            // 画像のフルパスを設定
            $file = 'upload/'  . $image;
            
            // uploadディレクトリにファイル保存
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            return $image;
        }
        
        //$idのユーザを削除するメソッド
        public static function delete($id){
             try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('DELETE FROM essential_oils WHERE id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                
                unlink('upload/' . $image);
                
                return 'エッセンシャルオイル情報を削除しました。';
                
            }catch(PDOException $e){
                
            }finally{
            }
        }
        
        //オイルキーワード検索を行うメソッド
        public static function search($keyword){
             try{
                $pdo = self::get_connection();
                
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE name LIKE :name');
                
                $stmt->bindValue(':name', '%' . $keyword . '%', PDO::PARAM_STR);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
                
            }finally{
                self::close_connection($pdo, $stmt);
            }
            return $oils; 
        }
        
    }