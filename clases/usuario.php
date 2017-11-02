<?php
class Usuario
{
	private $nombre;
	private $email;
	private $password;	
	private $db;
	private $base = 'unify_db';
	private $host = 'localhost';

	public function __construct($nombre, $email, $password)
	{
		$this->nombre = $nombre;
		$this->email = $email;
		$this->setPassword($password);

		$this->db = new PDO("mysql:host={$this->host};dbname={$this->base};charset=utf8mb4;3306", 'root', '');
		//$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);
	}

	public function save()
	{
		$sql = "INSERT INTO user (nombre, email, password)VALUES (:nombre, :email, :password)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
		$stmt->execute();
	}

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($value)
    {
        $this->password = password_hash($value, PASSWORD_DEFAULT);

        return $this;
    }
}