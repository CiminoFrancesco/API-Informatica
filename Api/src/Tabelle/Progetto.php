<?php 
    class Progetto{
        private $db=null;
        public function __construct($db)
        {
            $this->db=$db;
        }
        public function findAll()
        {
            $statement = "
                SELECT 
                id,nome, descrizione, data_inizio, data_fine,latitudine,longitudine,eta_minima
                FROM
                    progetto;
            ";
    
            try {
                $statement = $this->db->query($statement);
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }
        }
        public function find($id){
            $statement="
            SELECT 
                *
            FROM
            progetto
            WHERE ID=?;";

            try {
                $statement = $this->db->prepare($statement);
                $statement->execute(array($id));
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e) {
                exit($e->getMessage());
            } 

        } 
    
       
        public function insert(Array $input)
        {
            $statement = "
                INSERT INTO progetto
                    (nome, descrizione, data_inizio, data_fine,latitudine,longitudine,eta_minima) 
                VALUES
                    (:nome, :descrizione, :data_inizio, :data_fine,:latitudine,:longitudine,:eta_minima);
            ";
    
            try {
                $statement = $this->db->prepare($statement);
                $statement->execute(array(
                    'nome' => $input['nome'],
                    'descrizione'  => isset($input['descrizione']) ? $input['descrizione']:null,
                    'data_inizio'  => isset($input['data_inizio']) ? $input['data_inizio']:null,
                    'data_fine'  => isset($input['data_fine']) ? $input['data_inizio']:null,
                    'latitudine'  => isset($input['latitudine']) ? $input['latitudine']:null,
                    'longitudine'  => isset($input['longitudine']) ? $input['longitudine']:null,
                    'eta_minima'  => isset($input['eta_minima']) ? $input['eta_minima']:null,
                ));
                return $statement->rowCount();
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }    
        }
    
        public function update($id, Array $input)
        {
            $statement = "
                UPDATE progetto
                SET 
                    nome =:nome,
                    descrizione  = :descrizione,
                    data_inizio  =:data_inizio,
                    data_fine  =:data_fine,
                    latitudine  =:latitudine,
                    longitudine  =:longitudine,
                    eta_minima  =:eta_minima,
                WHERE ID = :id;
            ";
    
            try {
                $statement = $this->db->prepare($statement);
                $statement->execute(array(
                    'nome' => $input['nome'],
                    'descrizione'  => $input['descrizione'],
                    'data_inizio'  => $input['data_inizio'],
                    'data_fine'  => $input['data_fine'],
                    'latitudine'  => $input['latitudine'],
                    'longitudine'  => $input['longitudine'],
                    'eta_minima'  => $input['eta_minima'],
                ));
                return $statement->rowCount();
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }    
        }
    
        public function delete($id)
        {
            $statement1 = "
                DELETE FROM progetto_organizzazione
                WHERE ID_progetto = :id;
                DELETE FROM progetto
                WHERE ID = :id;
          ";
          try {
                $statement1 = $this->db->prepare($statement1);
                $statement1->execute(array(':id' => $id,':id'=>$id));
                return $statement1->rowCount();
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }  
        }
    }

?>
