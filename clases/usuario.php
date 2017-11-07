<?php

require_once 'DB.php';
require_once 'Model.php';

class Usuario extends Model {
    public $id;
    public $email;
    public $password;
    public $nombre;

    public $fillable = ['nombre', 'email', 'password'];
    public static $table = 'user';
}

/*require_once 'DB.php';

 class Usuario
{
    public $id;
	public $nombre;
	public $email;
	private $password;	
	
	public function __construct($nombre, $email, $password)
	{
		$this->nombre = $nombre;
		$this->email = $email;
		$this->password = $password;

	}

    public static function find($id)
    {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = DB::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario('', '', '',0);
        $usuario->toUser($result);
        return $usuario;
    }

    private function toUser($data)
    {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    

	public function save()
	{
        $sql = ($this->id)?$this->update():$this->insert();
        $stmt = DB::getConn()->prepare($sql);
        $stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        $stmt->execute();
	}
    private function insert()
    {
        return 'INSERT INTO user (nombre, email, password) VALUES (:nombre, :email, :password)';
    }

    private function update()
    {
        return 'UPDATE user SET nombre=:nombre, email=:email, password:password WHERE id = '.$this->id;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


   
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


 
    public function getPassword()
    {
        return $this->password;
    }

}
*/




