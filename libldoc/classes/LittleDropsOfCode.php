<?php
class LittleDropsOfCode {
    private static $instance;
    private $page;

    private function __construct() {
	if (isset($_GET['page'])) {
	    $this->page = $_GET['page'];
	} else {
	    $this->page = 'home';
	}
    }

    public static function instance() {
	if (!isset(self::$instance)) {
	    $class = __CLASS__;
	    self::$instance = new $class();
	}

	return self::$instance;
    }

    public function getPage() {
	return $this->page;
    }

    public function setPage($page) {
	$this->page = $page;
    }

    public function action($action) {
	require(LIBLDOC_PATH . "/actions/$action.php");
    }

    public function page($page) {
	require(LIBLDOC_PATH . "/pages/$page.php");
    }

    public function snippet($snippet) {
	require(LIBLDOC_PATH . "/snippets/$snippet.php");
    }
}
