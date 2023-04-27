<?php
class User{
	public $id;
	public $name;
	public $family;
	public $username;
	protected $email;
	protected $image;
	public $admin;
	protected $password;
    
	public function __construct($Uid='', $Uname='', $Ufamily='', $Uusername, $Uemail='', $Uimage='',  $Uadmin=0, $Upass=''){
		if( (int)$Uid === $Uid && $Uid > 0 ){
			$this->id = $Uid;
		}
		$this->name = $Uname;
		$this->family = $Ufamily;
		$this->username = $Uusername;
		$this->email = $Uemail;
		$this->image = $Uimage;
		$this->admin = $Uadmin;
		$this->password = $Upass;
		if( $this->id > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT `id`, `admin`, `name`, `family`,	`username` ,`email`, `image`, `password` FROM `users` WHERE `id`=".$this->id.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->name = $row['name'];
			$this->family = $row['family'];
			$this->family = $row['username'];
			$this->email = $row['email'];
			$this->email = $row['image'];
			$this->password = $row['password'];
			$this->admin = $row['admin'];
		}
	}
	public function insert(){
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->id ) ){
			$this->id = 'NULL';
		}
		$sql = "INSERT INTO `users`(`id`, `admin`, `name`, `family`, `username`, `email`, `image`, `password`) VALUES ("
						.mysqli_real_escape_string($con, $this->id) .", "
						.mysqli_real_escape_string($con, $this->admin) .", '"
						.mysqli_real_escape_string($con, $this->name) ."', '"
						.mysqli_real_escape_string($con, $this->family) ."', '"
						.mysqli_real_escape_string($con, $this->username) ."', '"
						.mysqli_real_escape_string($con, $this->email) ."', '"
						.mysqli_real_escape_string($con, $this->image) ."', '"
						.mysqli_real_escape_string($con, $this->password)
					."');";
		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->id ) ){
			$this->id = $con->insert_id;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `users` WHERE id=". $this->id .";";
		$con = $GLOBALS['SQL'];
		mysqli_query($con, $sql);
	}
	public function update(){
		if( (int)$this->id === $this->id && $this->id > 0 ){
			$this->delete();
		}
		$this->insert();
	}

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($Uemail){
        $this->email = $Uemail;
    }
	public function getPassword(){
        return $this->password;
    }
    public function setPassword($Upassword){
        $this->password = $Upassword;
    }
}