<?php


class Pagination {
	var $php_self;
	var $rows_per_page; //Number of records to display per page
	var $total_rows; //Total number of rows returned by the query
	var $links_per_page=4; //Number of links to display per page
	var $sql;
	var $debug = false;
	var $conn;
	var $page;
	var $max_pages;
	var $offset;
	
	/**
	 * Constructor
	 *
	 * @param resource $connection Mysql connection link
	 * @param string $sql SQL query to paginate. Example : SELECT * FROM users
	 * @param integer $rows_per_page Number of records to display per page. Defaults to 10
	 * @param integer $links_per_page Number of links to display per page. Defaults to 5
	 */
	 
	function Pagination($connection, $sql, $rows_per_page = 10) {
		$this->conn = $connection;
		$this->sql = $sql;
		$this->rows_per_page = $rows_per_page;
		//$this->links_per_page = $links_per_page;
		$this->php_self = htmlspecialchars($_SERVER['PHP_SELF']);
		if(isset($_GET['page'])) {
			$this->page = intval($_GET['page']);
		}
	}
	
	/**
	 * Executes the SQL query and initializes internal variables
	 */
	function paginate() {
		$all_rs = @mysql_query($this->sql);
		$this->total_rows = mysql_num_rows($all_rs);
		@mysql_close($all_rs);
		
		$this->max_pages = ceil($this->total_rows/$this->rows_per_page);
		//Check the page value just in case someone is trying to input an aribitrary value
		if($this->page > $this->max_pages || $this->page <= 0) {
			$this->page = 1;
		}
		
		//Calculate Offset
		$this->offset = $this->rows_per_page * ($this->page-1);
		
		//Fetch the required result set
		$rs = @mysql_query($this->sql." LIMIT {$this->offset}, {$this->rows_per_page}");
		if(!$rs) {
			if($this->debug) echo "Pagination query failed. Check your query.<br />";
			return false;
		}
		return $rs;
	}
	
	/**
	 * Display the link to the first page
	 */
	function renderFirst($tag='First') {
		if($this->page == 1) {
			return $tag;
		}
		else {
			return '<a href="'.$this->php_self.'?page=1">'.$tag.'</a>';
		}
	}
	
	/**
	 * Display the link to the last page
	 */
	function renderLast($tag='Last') {
		if($this->page == $this->max_pages) {
			return $tag;
		}
		else {
			return '<a href="'.$this->php_self.'?page='.$this->max_pages.'">'.$tag.'</a>';
		}
	}
	
	/**
	 * Display the next link
	 */
	function renderNext($tag=' &gt;&gt;') {
		if($this->page < $this->max_pages) {
			return '<a href="'.$this->php_self.'?page='.($this->page+1).'">'.$tag.'</a>';
		}
		else {
			return $tag;
		}
	}
	
	/**
	 * Display the previous link
	 */
	function renderPrev($tag='&lt;&lt;') {
		if($this->page > 1) {
			return '<a href="'.$this->php_self.'?page='.($this->page-1).'">'.$tag.'</a>';
		}
		else {
			return $tag;
		}
	}
	
	/**
	 * Display the page links
	 */
	function renderNav() {
		for($i=1;$i<=$this->max_pages;$i+=$this->links_per_page) {
			if($this->page >= $i) {
				$start = $i;
			}
		}
		
		if($this->max_pages > $this->links_per_page) {
			$end = $start+$this->links_per_page;
			if($end > $this->max_pages) $end = $this->max_pages+1;
		}
		else {
			$end = $this->max_pages;
		}
			
		$links = '';
		
		for( $i=$start ; $i<$end ; $i++) {
			if($i == $this->page) {
				$links .= " $i ";
			}
			else {
				$links .= ' <a href="'.$this->php_self.'?page='.$i.'">'.$i.'</a> ';
			}
		}
		
		return $links;
	}
	
	function FullNavigate() {
		return $this->renderFirst().'&nbsp;'.$this->renderPrev().'&nbsp;'.$this->renderNav().'&nbsp;'.$this->renderNext().'&nbsp;'.$this->renderLast();	
	}
	
}
?>
