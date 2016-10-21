<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables extends CI_Controller {
   
   public function index() {


		$aColumns = array('CountryID', 'CountryName');
		$sIndexColumn = "CountryID";
		$sTable = "L_CountryMst";     

    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
            intval( $_GET['iDisplayLength'] );
    }
     

    /*
     * Ordering
     */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {

        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
     

    /*
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
     */
    $sWhere = "";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }


     
    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }
     
     
    /*
     * SQL queries
     * Get data to display
     */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
        $sWhere
        $sOrder
        $sLimit
    ";



    $rResult =  $this->db->query($sQuery)->result() or die( 'MySQL Error: ' . mysql_errno() );

    $sQuery = "
        SELECT FOUND_ROWS() as test
    ";
    $rResultFilterTotal =  $this->db->query($sQuery)->row() or die( 'MySQL Error: ' . mysql_errno() );
    $iFilteredTotal = $rResultFilterTotal->test;
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(".$sIndexColumn.") as test
        FROM   $sTable
    ";

    $rResultTotal =  $this->db->query($sQuery)->row() or die( 'MySQL Error: ' . mysql_errno() );
    $iTotal = $rResultTotal->test;
     
     $sechosr = "";
    if ( isset( $_GET['sEcho'] ) )
    {         
       $sechosr = intval($_GET['sEcho']);
    }else{
       $sechosr = intval("");


	}
  
    $output = array(
        "sEcho" => $sechosr,
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );



     foreach($rResult as $aRow) {
$row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow -> $aColumns[$i] =="0") ? '-' : $aRow -> $aColumns[$i];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $aRow -> $aColumns[$i];
            }
        }
        $output['aaData'][] = $row;
	}

     
    echo json_encode( $output );


    }


	
}
?>
	
