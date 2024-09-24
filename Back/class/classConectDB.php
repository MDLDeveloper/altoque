<?php
class ConnectDB {
    private $conexion;
    public $error;

    // Constructor: Conecta a la base de datos usando PDO
    function __construct($servidor, $usuario, $clave, $base, $port) {
        if (!$this->_connect($servidor, $usuario, $clave, $base, $port)) {
            $this->error = $this->conexion->errorInfo()[2];
        }
    }

    // Destructor: Cierra la conexión
    function __destruct() {
        $this->conexion = null;
    }

    // Método privado para conectar usando PDO
    private function _connect($servidor, $usuario, $clave, $base, $port) {
        $dsn = "mysql:host=$servidor;dbname=$base;port=$port;charset=utf8";
        try {
            // Establecer conexión PDO
            $this->conexion = new PDO($dsn, $usuario, $clave);
            // Configurar el modo de error a excepción para capturar errores correctamente
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    // Iniciar una transacción
    public function beginTransaction() {
        $this->conexion->beginTransaction();
    }

    // Confirmar una transacción
    public function commit() {
        $this->conexion->commit();
    }

    // Revertir una transacción
    public function rollBack() {
        $this->conexion->rollBack();
    }

    // Método para preparar una consulta
    public function prepare($query) {
        return $this->conexion->prepare($query);
    }

    // Método para ejecutar consultas (INSERT, UPDATE, DELETE, SELECT)
    public function mdlquery($query, $params = []) {
        try {
            $stmt = $this->conexion->prepare($query);
            $stmt->execute($params);

            $tipo = strtoupper(substr($query, 0, 6));

            switch ($tipo) {
                case 'INSERT':
                    return $this->conexion->lastInsertId(); // Devuelve el último ID insertado
                case 'UPDATE':
                case 'DELETE':
                    return $stmt->rowCount(); // Devuelve el número de filas afectadas
                case 'SELECT':
                    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array con los resultados
                default:
                    return false;
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
?>
