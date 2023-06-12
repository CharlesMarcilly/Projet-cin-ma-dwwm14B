    <?php
         /* Connexion à une base MySQL avec l'invocation de pilote */
        $dsn_db = 'mysql:dbname=Projet-cinema-dwwm14B;host=127.0.0.1;port3306';
        $user_db = 'root';
        $password_db = '';

        try {
            $db = new PDO($dsn_db, $user_db, $password_db);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(\PDOException $e)
        {
            die("Erreur de connexion à la base de donnée : " .$e->getMessage());
        }

    ?>