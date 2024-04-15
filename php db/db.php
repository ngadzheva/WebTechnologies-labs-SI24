<?php
    class DB {
        private $connection;

        public function __construct() {
            $config = parse_ini_file('config.ini', true);
            $type = $config['db']['db_type'];
            $host = $config['db']['db_host'];
            $dbname = $config['db']['db_name'];

            $this->connection = new PDO("$type:host=$host;dbname=$dbname", $config['db']['db_user'], $config['db']['db_user_password']);
        }

        public function demo() {
            // $sql = "CREATE TABLE students(
            //     firstName VARCHAR(50) NOT NULL,
            //     lastName VARCHAR(50) NOT NULL,
            //     fn INT NOT NULL PRIMARY KEY,
            //     userID INT NOT NULL,
            //     FOREIGN KEY (userID) REFERENCES users(id)
            // )";

            // $sql = "INSERT INTO students(firstName, lastName, fn, userID) VALUES ('Ivan', 'Ivanov', 666666, 1)";
            // $this->connection->query($sql);
            
            $sql = "INSERT INTO users(username, password) VALUES(?, ?)";
            $prepared_insert_user_sql = $this->connection->prepare($sql);

            $sql = "INSERT INTO students(firstName, lastName, fn, userID) VALUES (:firstName, :lastName, :fn, :userID)";
            $prepared_insert_student_sql = $this->connection->prepare($sql);

            // $prepared_sql->execute(['user1', 'fkjdskljkdjgkfdlg']);
            // $prepared_sql->execute(['user2', 'ffl;afk;askdl;asfl;lsf']);
            // $prepared_sql->execute(['user3', 'saldkaoposkfoskflda']);

            // $sql = "UPDATE users SET email=:email WHERE id=:userID ";
            // $prepared_sql = $this->connection->prepare($sql);
            
            // $prepared_sql->execute(['email' => 'user2@gmail.com', 'userID' => 3]);

            $sql = 'SELECT * FROM users';
            $result = $this->connection->query($sql);

            // var_dump($result->fetch(PDO::FETCH_NUM));

            while($row = $result->fetch()) {
                echo $row['username'] . ': ' . $row['email'];
                echo '<br/>';
            }

            try {
                $this->connection->beginTransaction();

                $prepared_insert_user_sql->execute(['user4', 'dksfjdskfjdsfhjds']);
                $prepared_insert_user_sql->execute(['user5', 'dksfjdskfjdsfhjds']);

                $prepared_insert_student_sql->execute(['firstName' => 'fksdjfk', 'lastName' => 'dsfjkdsjfkds', 'fn' => 666988, 'userID' => 2]);
                $prepared_insert_student_sql->execute(['firstName' => 'klsfdmkfkds', 'lastName' => 'dslflkdsjfkjksd', 'fn' => 666888, 'userID' => 3]);

                $this->connection->commit();
            } catch(Exception $e) {
                $this->connection->rollBack();
                echo $e;
            }
        }
    }


    $db = new DB();

    $db->demo();
?>