<?php
class Blog
{
	public $ids;
	public $userIds;
	public $usernames;
	public $titles;
	public $subtitles;
	public $texts;
	public $images;

	public function __construct($Uids = '', $UuserIds = '', $Uusernames = '', $Utitles = '', $Usubtitles = '', $Utexts = 0, $Uimages = '')
	{
		if ((int) $Uids == $Uids && $Uids > 0) {
			$this->ids = $Uids;
		}
		$this->userIds = $UuserIds;
		$this->usernames = $Uusernames;
		$this->titles = $Utitles;
		$this->subtitles = $Usubtitles;
		$this->texts = $Utexts;
		$this->images = $Uimages;
		if ($this->ids > 0) {
			$this->load();
		}
	}
	private function load()
	{
		$sql = "SELECT `id`, `text`,`userId`, `username`, `title`, `subtitle`, `image` FROM `blog` WHERE `id`=" . $this->ids . ";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
		if (!empty($result)) {
			$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->userIds = $row['userId'];
			$this->usernames = $row['username'];
			$this->titles = $row['title'];
			$this->subtitles = $row['subtitle'];
			$this->images = $row['image'];
			$this->texts = $row['text'];
		}
	}
	public function insert()
	{
		$con = $GLOBALS['SQL'];
		if (empty((int) $this->ids)) {
			$this->ids = 'NULL';
		}
		$sql = "INSERT INTO `blog`(`id`,  `userId`,`username`, `text`, `title`, `subtitle`, `image`) VALUES ("
			. mysqli_real_escape_string($con, $this->ids) . ", "
			. mysqli_real_escape_string($con, $this->userIds) . ", '"
			. mysqli_real_escape_string($con, $this->usernames) . "', '"
			. mysqli_real_escape_string($con, $this->texts) . "', '"
			. mysqli_real_escape_string($con, $this->titles) . "', '"
			. mysqli_real_escape_string($con, $this->subtitles) . "', '"
			. mysqli_real_escape_string($con, $this->images)
			. "');";
		$result = mysqli_query($con, $sql);
		if (!empty($result) && empty((int) $this->ids)) {
			$this->ids = $con->insert_id;
		}
	}


	public function delete()
	{
		$sql = "DELETE FROM `blog` WHERE id=" . $this->ids . ";";
		$con = $GLOBALS['SQL'];
		mysqli_query($con, $sql);
	}
	public function update()
	{
		if ((int) $this->ids == $this->ids && $this->ids > 0) {
			$this->delete();
		}
		$this->insert();
	}

}