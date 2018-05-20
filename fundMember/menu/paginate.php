<?php
/**
 * paginate.class.php - PHP 5 class for pagination of mysqli results
 *
 * 
 *
 * @version 1.0.4
 *
 * Changes:
 * 1.0.4:
 *   Added urlencoding to each get value when generating the links
 * 1.0.3:
 *   Added show_result_text() which displays a string like this: Showing __-__ of ___ total
 *   Changed show_pages() to return only the links without the containing div
 * 1.0.2:
 *   Added the ability to specify what $_GET variable is used to track the current page (allows for multiple instances on one webpage)
 *   Added "first" and "last" links to the page links
 * 1.0.1:
 *   Implemented more strict error checking on the page variable
 *   Changed PHP_SELF variables into SCRIPT_NAME to avoid vulnerabilities ( http://blog.phpdoc.info/archives/13-guid.html )
 * 1.0.0: original version
 */
class Paginate {
    //mysqli connection resource
    private $db;
    //MySQL query
    private $q;
    //number of rows per page.(default to 20)
    private $per_page = 20;
    //$_GET index to use for tracking page number
    private $page_var = 'page';
    //number of rows returned by the query.
    private $total_rows;
    //total number of pages.
    private $total_pages;
    //number of page links to show on either side of the current page.
    private $links_each_side = 3;
    //maximum number of pages to just show all, before using ellipses
    private $max_show_all = 10;
 
    /**
     * Set everything up.
     *
     * @param mysqli_resource    $db - mysqli connection resource
     * @param string $q - MySQL query
     * @param string[optional] $page_var - $_GET/$_SESSION['paginate_class'] index to use for "Current Page" defaults to 'page'
     *
     * @return void
     */
    public function __construct($db, $q, $page_var='page') {
        $this->db = $db;
        $this->q = $q;
        $this->page_var = $page_var;
        $this->check_page_var();
    }
 
    /**
     * Make sure that the current page is valid (whole number >= 1)
     */
    public function check_page_var() {
        /*
        * if no page is specified, set it to 1.  If it IS specified, force it to int, and make sure
        * it is >= 1
        */
        if (isset($_GET[$this->page_var]) && (int)$_GET[$this->page_var] > 0) {
            $_SESSION['paginate_class'][$this->page_var] = (int)$_GET[$this->page_var];
        } elseif (!isset($_SESSION['paginate_class'][$this->page_var])) {
            $_SESSION['paginate_class'][$this->page_var] = 1;
        }
 
        if ($this->per_page != 0) {
            $this->create_query();
        }
    }
 
    /**
     * Set the number of results returned per page.
     *
     * @param Unsigned Int $per_page
     */
    public function set_per_page($per_page) {
        $this->per_page = abs((int) $per_page);
    }
 
    /**
     * Set the number of page links to show on either side of the current page.
     *
     * @param Unsigned Int $links_each_side
     */
    public function set_links_each_side($links_each_side) {
        $this->links_each_side = abs((int) $links_each_side);
    }
 
    /**
     * Set maximum number of pages to just show all, before using ellipses
     * 0 will show all no matter what
     *
     * @param Unsigned Int $max_show_all
     */
    public function set_max_show_all($max_show_all) {
        $this->max_show_all = abs((int) $max_show_all);
    }
 
    /**
     * Used to get the result set, and set the Total rows.
     *
     * @return mysqli result object
     */
    public function get_results() {
        $return = $this->db->query($this->q);
        //get the number of rows that WOULD have been returned if there was no LIMIT
        //This is done by using FOUND_ROWS() after using SQL_CALC_FOUND_ROWS in the query
        $this->total_rows = array_pop($this->db->query('SELECT FOUND_ROWS()')->fetch_row());
        return $return;
    }
 
    /**
     * Show current results being viewed and total
     *
     * @return string - Showing __-__ of ___ total
     */
    public function show_result_text() {
        $start = (($_SESSION['paginate_class'][$this->page_var]-1) * $this->per_page)+1;
        $end = (($start-1+$this->per_page) >= $this->total_rows)? $this->total_rows:($start-1+$this->per_page);
        return "Showing {$start}-{$end} of {$this->total_rows} total";
    }
 
    /**
     * Creates links to other pages.
     *
     * @return string - page links
     */
    public function show_pages() {
        //If number of rows per page is 0 (unlimited), return an empty string.
        if ($this->per_page == 0) {
            return '';
        }
        /*
        * If the user did not run get_results, we run it.  We could modify the query
        * to remove the SQL_CALC_FOUND_ROWS, and the limit...and either make it into
        * a count() query, or check num_rows...but it's a lot easier to just call
        * get_results with the query as it is.
        */
        if (!isset($this->total_rows)) {
            $this->get_results();
        }
        //calculate the number of pages.
        $this->total_pages = ceil($this->total_rows/$this->per_page);
 
        //we use this array to store the page links that we want...so we can implode on |
        $page_array = array();
 
        $first = $this->get_page_link(1, '&lt;&lt; First');
        $last = ($this->total_pages > 1)? $this->total_pages:1;
        $last = $this->get_page_link($last, 'Last &gt;&gt;');
 
        //if the number of pages is not more than the max that was specified, add
        //all the pages.
        if ($this->total_pages <= $this->max_show_all || $this->max_show_all == 0) {
            for ($i=1; $i<=$this->total_pages; $i++) {
                $page_array[] = $this->get_page_link($i);
            }
        } else {
            /*
            * make sure that page one gets in...but only if it wouldn't make it on
            * it's own...we don't want it there twice.
            */
            if($_SESSION['paginate_class'][$this->page_var] >= $this->links_each_side+2) {
                $page_array[] = $this->get_page_link(1);
            }
            // If needed, add an ellipsis after page one.
            if($_SESSION['paginate_class'][$this->page_var] >= $this->links_each_side+3) {
                $page_array[] = '...';
            }
            //Set the first page to be added (for pages in the main group)
            if ($_SESSION['paginate_class'][$this->page_var]-$this->links_each_side <= 1) {
                $start = 1;
            } elseif ($_SESSION['paginate_class'][$this->page_var] > $this->total_pages-$this->links_each_side) {
                $start = $this->total_pages-(2*$this->links_each_side);
            } else {
                $start = $_SESSION['paginate_class'][$this->page_var]-$this->links_each_side;
            }
            //Set the last page to be added (for pages in the main group)
            if ($_SESSION['paginate_class'][$this->page_var]+$this->links_each_side >= $this->total_pages) {
                $end = $this->total_pages;
            } elseif ($_SESSION['paginate_class'][$this->page_var] < $this->links_each_side+1) {
                $end = (2*$this->links_each_side)+1;
            } else {
                $end = $_SESSION['paginate_class'][$this->page_var]+$this->links_each_side;
            }
            //add the pages for the main group.
            for ($i=$start; $i<=$end; $i++) {
                $page_array[] = $this->get_page_link($i);
            }
            // If needed, add an ellipsis before the last page.
            if($_SESSION['paginate_class'][$this->page_var] <= $this->total_pages-$this->links_each_side-2) {
                $page_array[] = '...';
            }
            /*
            * make sure that the last page gets in...but only if it wouldn't make it
            * on it's own...we don't want it there twice.
            */
            if($_SESSION['paginate_class'][$this->page_var] <= $this->total_pages-$this->links_each_side-1) {
                $page_array[] = $this->get_page_link($this->total_pages);
            }
        }
        //implode the links and ellipses into a | seperated string, and center in a div
        return "{$first}&nbsp;&nbsp;&nbsp;".implode(' | ',$page_array)."&nbsp;&nbsp;&nbsp;{$last}";
    }
 
    /**
     * Creates a page link, including the current $_GET string...updating only
     * $_SESSION['paginate_class'][$this->page_var].  It also returns only text (no link) if $p is the current
     * page.
     *
     * @param int $p - Page number to create link for
     * @return string - Link
     */
    private function get_page_link($p, $text=NULL) {
        if ($text === NULL) {
            $text = $p;
        }
        if ($p != $_SESSION['paginate_class'][$this->page_var]) {
            $_GET[$this->page_var] = $p;
            $get_string = array();
            foreach ($_GET as $k=>$v) {
                if (is_array($v)) {
                    foreach ($v as $cur_v) {
                        $cur_v = urlencode($cur_v);
                        $get_string[] = "{$k}[]={$cur_v}";
                    }
                } else {
                    $v = urlencode($v);
                    $get_string[] = "{$k}={$v}";
                }
            }
            $get_string = implode('&amp;',$get_string);
            return "<a href="{$_SERVER['SCRIPT_NAME']}?{$get_string}">{$text}</a>";
        } else {
            return $text;
        }
    }
 
    /**
     * Adds the proper LIMIT to the query, as well as adding SQL_CALC_FOUND_ROWS
     * which is used to get the total number of rows (ignoring LIMIT) without
     * doing a count() query
     */
    private function create_query() {
        //calculate the starting row
        $start = ($_SESSION['paginate_class'][$this->page_var]-1) * $this->per_page;
        //insert SQL_CALC_FOUND_ROWS and add the LIMIT
        $this->q = preg_replace('/^SELECTs/i', 'SELECT SQL_CALC_FOUND_ROWS ', $this->q)." LIMIT {$start},{$this->per_page}";
    }
}
?>