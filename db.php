<?php

class Db
{
    private $user;
    private $password;
    private $dbName;
    private $host;
    private $dsn;

     public function __construct()
     {
        $this->user = 'testuser';
        $this->password = 'pw4testuser';
        $this->dbName = 'testdb';
        $this->host = 'localhost:8889';
        $this->dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";
    }

    public function conect_db()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "データベース{$this->dbName}に接続できました", "<br>";
        } catch (Exception $e){
            echo '<span class="error">エラーがありました。 </span><br>';
            echo $e->getMessage();
            exit();
        }
    }

    public function select_store()
    {
        $sql = "SELECT * FROM dtb_store";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert_store($id, $code, $pref, $name, $creat_date, $update_date)
    {
        $sql = "INSERT INTO dtb_store (id, code, pref, name, creat_date, update_date) 
                    VALUES (:id, :code, :pref, :name, :creat_date, :update_date)";
        $stm = $this->pdo->prepare($sql);

        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->bindValue(':code', $code, PDO::PARAM_INT);
            $stm->bindValue(':pref', $pref, PDO::PARAM_STR);
            $stm->bindValue(':name', $name, PDO::PARAM_STR);
            $stm->bindValue(':creat_date', $creat_date, PDO::PARAM_STR);
            $stm->bindValue(':update_date', $update_date, PDO::PARAM_STR);
            $stm->execute();
            return true;
        } catch (Exception $e){
            echo '<span class="error"> エラーがありました。 </span><br>';
        
            echo $e->getMessage();
            return false;
        }   
    } 
    
    public function delete_store($id)
    {
        $sql = "DELETE FROM dtb_store 
                WHERE id = :id";
        $stm = $this->pdo->prepare($sql);

        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return true;
        } catch (Exception $e){
            echo '<span class="error"> エラーがありました。 </span><br>';
        
            echo $e->getMessage();
            return false;
        }
    }

    public function update_store($id, $code, $pref, $name, $creat_date, $update_date)
    {
        $sql = "UPDATE dtb_store 
                SET code = :code, pref = :pref, name = :name, creat_date = :creat_date, update_date = :update_date
                WHERE id = :id";
        $stm = $this->pdo->prepare($sql);

        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            $stm->bindValue(':code', $code, PDO::PARAM_INT);
            $stm->bindValue(':pref', $pref, PDO::PARAM_STR);
            $stm->bindValue(':name', $name, PDO::PARAM_STR);
            $stm->bindValue(':creat_date', $creat_date, PDO::PARAM_STR);
            $stm->bindValue(':update_date', $update_date, PDO::PARAM_STR);
            $stm->execute();
            return true;
        } catch (Exception $e){
            echo '<span class="error"> エラーがありました。 </span><br>';
        
            echo $e->getMessage();
            return false;
        }   
    }
    

    // 配列の文字エンコードのチェックを行う
    public function cken(array $data)
    {
        $result = true;
        foreach ($data as $key => $value) 
        {
            if (is_array($value))
            {
            // 含まれている値が配列のとき文字列に連結する
            $value = implode("", $value);
            }
            if (!mb_check_encoding($value))
            {
            // 文字エンコードが一致しないとき
            $result = false;
            // foreachでの走査をブレイクする
            break;
            }
        }
        return $result;
    }

}
