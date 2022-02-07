<?php

class  QueryBuilder{
    protected $pdo;


        public function __construct($pdo){

                $this->pdo =$pdo;
            }
        /* string $table -> name of the necessary table in the database
        * return array
        */
        public function getAll($table){

            $sql ="SELECT * FROM {$table}";
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        /*string $table -> name of the necessary table in the database
        * integer $id -> id of the necessary position
        * return string
        */
        public function getOne($table, $id){

             $sql ="SELECT * FROM posts WHERE id=:id";
             $statement=$this->pdo->prepare($sql);
             $statement->bindValue(':id',$id);
             $statement->execute();
             $result=$statement->fetch(PDO::FETCH_ASSOC);
             return $result;
            }

        /*$table -> name of the necessary table in the database
        * $data -> array of keys
        * return array
        */
        public function create($table,$data){

            $keys = implode(',',array_keys($data));
            $tags = ":".implode(', :',array_keys($data));

            $sql ="INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
            $statement= $this->pdo->prepare($sql);
            $statement->execute($data);
            }

        /*$table -> name of the necessary table in the database
        * $data -> array of keys
        * $id -> id of the necessary position
        * return string
        */
        public function update($table,$data, $id){
             $keys = array_keys($data);
             $string = '';
            foreach ($keys as $key) {
                $string .= $key .'=:' . $key . ',';
            }
            $keys = rtrim($string,',');
            $data['id'] =$id;
            $sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
            $statement =$this->pdo->prepare($sql);
            return ($statement->execute($data));
        }


        /*$table -> name of the necessary table in the database
        * $id -> id of the necessary position
        */
        public function delete($table, $id){
            $sql = "DELETE FROM {$table} WHERE id=:id";
            $statement=$this->pdo->prepare($sql);
            $statement->execute(['id'=>$id]);

        }


}
