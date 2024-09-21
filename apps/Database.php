<?php
/**
 * @author      Jan Altensen (Stricted)
 * @copyright   2013-2014 Jan Altensen (Stricted)
 * @license     GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */

class DB {
    /**
     * PDO object
     * @var object
     */
    private $conn = NULL;

    /**
     * error string
     * @var string
     */
    private $error = '';

    /**
     * Connects to SQL Server
     *
     * @param string $driver
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @param integer $port
     * @param array $options
     * @return boolean
     */
    public function connect($driver, $host, $username, $password, $database, $port = 0, $options = array()) {
        if (!extension_loaded("pdo")) {
            die("Missing <a href=\"http://www.php.net/manual/en/book.pdo.php\">PDO</a> PHP extension.");
        }

        $driver = strtolower($driver);
        try {
            if ($driver == "mysql") {
                if (!extension_loaded("pdo_mysql")) {
                    die("Missing <a href=\"http://php.net/manual/de/ref.pdo-mysql.php\">pdo_mysql</a> PHP extension.");
                }
                if (empty($port)) {
                    $port = 3306;
                }
                $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password, $options);
            } elseif ($driver == "pgsql") {
                if (!extension_loaded("pdo_pgsql")) {
                    die("Missing <a href=\"http://php.net/manual/de/ref.pdo-pgsql.php\">pdo_pgsql</a> PHP extension.");
                }
                if (empty($port)) {
                    $port = 5432;
                }
                $this->conn = new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password, $options);
            } elseif ($driver == "sqlite") {
                if (!extension_loaded("pdo_sqlite")) {
                    die("Missing <a href=\"http://php.net/manual/de/ref.pdo-sqlite.php\">pdo_sqlite</a> PHP extension.");
                }
                if (!file_exists($database)) {
                    @touch($database);
                }
                if (file_exists($database) && is_readable($database) && is_writable($database)) {
                    $this->conn = new PDO("sqlite:$database", null, null, $options);
                } else {
                    $this->error = "Can't create/connect to the SQLite database";
                    return false;
                }
            } else {
                $this->error = "Not supported database type found";
                return false;
            }

            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * Close the database connection
     */
    public function close() {
        $this->conn = null;
    }

    /**
     * Sends a database query to SQL server.
     *
     * @param string $res
     * @param array $bind
     * @return PDOStatement|false
     */
    public function query($res, $bind = array()) {
        try {
            $query = $this->conn->prepare($res);
            if (is_array($bind) && !empty($bind)) {
                $query->execute($bind);
            } else {
                $query->execute();
            }
            return $query; // Mengembalikan objek PDOStatement
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false; // Mengembalikan false saat terjadi kesalahan
        }
    }

    /**
     * Gets a row from SQL database query result.
     *
     * @param PDOStatement $res
     * @return array|false
     */
    public function fetch_array($res) {
        if ($res) {
            return $res->fetch(PDO::FETCH_ASSOC);
        }
        return false; // Mengembalikan false jika $res tidak valid
    }

    /**
     * Return the last insert id
     *
     * @return integer
     */
    public function last_id() {
        return $this->conn ? $this->conn->lastInsertId() : null; // Mengembalikan null jika tidak ada koneksi
    }

    /**
     * Returns SQL last error.
     *
     * @return string
     */
    public function error() {
        return $this->error;
    }

    /**
     * Call PDO methods
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments) {
        if (!method_exists($this->conn, $name)) {
            throw new Exception("Unknown method '$name'");
        }
        return call_user_func_array([$this->conn, $name], $arguments);
    }
}
?>
