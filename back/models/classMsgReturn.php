<?php
// Clase para procesar los mensajes de validación.
class MsgReturn {
    private bool $status;
    private string $msg;

    function __construct(bool $status, string $msg) {
        $this->status = $status;
        $this->msg = $msg;
    }

    // Método para devolver el mensaje como JSON
    public function toJson(): string {
        return json_encode([
            'status' => $this->status,
            'msg' => $this->msg
        ]);
    }
    //Metodo getter para el estado
    public function getStatus(): bool {
        return $this->status;
    }
    //Metodo getter para el mensaje
    public function getMsg(): string {
        return $this->msg;
    }
}
?>