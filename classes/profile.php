<?php
class Profile{
	public $id;
	public $categoryId;
	public $userId;
	public $title;
	public $subtitle;
	public $text;
	public $image;
    
	public function __construct($Uid='', $UcategoryId='', $UuserId='', $Utitle='', $Usubtitle='', $Utext=0, $Uimage=''){
		if( (int)$Uid === $Uid && $Uid > 0 ){
			$this->id = $Uid;
		}
		$this->categoryId = $UcategoryId;
		$this->userId = $UuserId;
		$this->title = $Utitle;
		$this->subtitle = $Usubtitle;
		$this->text = $Utext;
		$this->image = $Uimage;
		if( $this->id > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT `id`, `text`, categoryId, `userId`, `title`, `subtitle`, `image` FROM `profile` WHERE `id`=".$this->id.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->categoryId = $row['categoryId'];
			$this->userId = $row['userId'];
			$this->title = $row['title'];
			$this->subtitle = $row['subtitle'];
			$this->image = $row['image'];
			$this->text = $row['text'];
		}
	}
	public function insert(){
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->id ) ){
			$this->id = 'NULL';
		}
		$sql = "INSERT INTO `profile`(`id`, categoryId, `userId`, `text`, `title`, `subtitle`, `image`) VALUES ("
						.mysqli_real_escape_string($con, $this->id) .", "
						.mysqli_real_escape_string($con, $this->categoryId) .", "
						.mysqli_real_escape_string($con, $this->userId) .", '"
						.mysqli_real_escape_string($con, $this->text) ."', '"
						.mysqli_real_escape_string($con, $this->title) ."', '"
						.mysqli_real_escape_string($con, $this->subtitle) ."', '"
						.mysqli_real_escape_string($con, $this->image)
					."');";
		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->id ) ){
			$this->id = $con->insert_id;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `profile` WHERE id=". $this->id .";";
		$con = $GLOBALS['SQL'];
		mysqli_query($con, $sql);
	}
	public function update(){
		if( (int)$this->id === $this->id && $this->id > 0 ){
			$this->delete();
		}
		$this->insert();
	}

}