<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables extends CI_Controller {
   
   public function index($aColumns,$sIndexColumn,$sTable,$sInnerjoin,$whereclause=null) {

    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
            intval( $_GET['iDisplayLength'] );
    }
     

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
     
    $sWhere = "WHERE (".$aColumns[0]."> 0)";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (".$aColumns[0]." > 0 AND (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= '))';
    }



   
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
            $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
        }
    }
if($whereclause)
    $sWhere .= $whereclause; //added by rajnish to add where clause


    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
	$sInnerjoin
        $sWhere
        $sOrder
        $sLimit
    ";



    $rResult =  $this->db->query($sQuery)->result() ;

    $sQuery = "
        SELECT FOUND_ROWS() as test
    ";
    $rResultFilterTotal =  $this->db->query($sQuery)->row();
    $iFilteredTotal = $rResultFilterTotal->test;
     
    $sQuery = "
        SELECT COUNT(".$sIndexColumn.") as test
        FROM   $sTable
    ";

    $rResultTotal =  $this->db->query($sQuery)->row();
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

            if ( $aColumns[$i] == "t0.Pincode" )
		$aColumns[$i] = "Pincode";
            if ( $aColumns[$i] != ' ' )
            {
                $row[] = $aRow -> $aColumns[$i];
            }
        }
        $output['aaData'][] = $row;
	}

     
    echo json_encode( $output );
    }

  public function country() {

		$aColumns = array('CountryID', 'CountryID','CountryName',);
		$sIndexColumn = "CountryID";
		$sTable = "L_CountryMst"; 
                $this->index($aColumns,$sIndexColumn,$sTable,"");

	}

  public function state() {
		$aColumns = array('StateID', 'StateID','StateName','CountryName');
		$sIndexColumn = "StateID";
		$sTable = "L_StateMst";
  		$sInnerjoin = "t0 INNER JOIN L_CountryMst t1 ON t0.CountryID=t1.CountryID"; 
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin);
	}

 public function district() {
		$aColumns = array('DistrictID', 'DistrictID','DistrictName','StateName','CountryName');
		$sIndexColumn = "DistrictID";
		$sTable = "L_DistrictMst"; 
  		$sInnerjoin = "t0 INNER JOIN L_StateMst t1 on t0.StateId = t1.StateId INNER JOIN L_CountryMst t2 ON t0.CountryID=t2.CountryID";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin);
	}

public function subDistrict() {
		$aColumns = array('SubDistrictID', 'SubDistrictID','SubDistrictName','DistrictName','StateName','CountryName');
		$sIndexColumn = "SubDistrictID";
		$sTable = "L_SubDistrictMst"; 
  		$sInnerjoin = "t0 INNER JOIN L_DistrictMst t1 on t0.DistrictID = t1.DistrictID INNER JOIN L_StateMst t2 on t0.StateId = t2.StateId INNER JOIN L_CountryMst t3 ON t0.CountryID=t3.CountryID";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin);
	}

public function city() {
		$aColumns = array('CityID', 'CityID','CityName','SubDistrictName','DistrictName','StateName','CountryName','Pincode');
		$sIndexColumn = "CityID";
		$sTable = "L_CityMst"; 
  		$sInnerjoin = "t0 INNER JOIN L_SubDistrictMst t1 on t0.SubDistrictID = t1.SubDistrictID  INNER JOIN L_DistrictMst t2 on t0.DistrictID = t2.DistrictID INNER JOIN L_StateMst t3 on t0.StateId = t3.StateId INNER JOIN L_CountryMst t4 ON t0.CountryID=t4.CountryID";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin);
	}

public function area() {
		$aColumns = array('AreaID', 'AreaID','AreaName','CityName','SubDistrictName','DistrictName','StateName','CountryName','t0.Pincode');
		$sIndexColumn = "AreaID";
		$sTable = "L_AreaMst"; 
  		$sInnerjoin = "t0 INNER JOIN L_CityMst t1 on t0.CityID = t1.CityID INNER JOIN L_SubDistrictMst t2 on t0.SubDistrictID = t2.SubDistrictID  INNER JOIN L_DistrictMst t3 on t0.DistrictID = t3.DistrictID INNER JOIN L_StateMst t4 on t0.StateId = t4.StateId INNER JOIN L_CountryMst t5 ON t0.CountryID=t5.CountryID";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin);
	}

public function customer() {
		$aColumns = array('ID','CustomerID','UserName','CompanyName','Fname','Mobile','Email','Lname');
		$sIndexColumn = "ID";
		$sTable = "CustomerMaster"; 
  		$sInnerjoin = "";
		$whereclause = " AND UserType = 0 ";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin,$whereclause);
	}

public function reseller() {
		$aColumns = array('ID','CustomerID','UserName','CompanyName','Fname','Mobile','Email','Lname');
		$sIndexColumn = "ID";
		$sTable = "CustomerMaster"; 
  		$sInnerjoin = "";
		$whereclause = " AND UserType = 1 ";
                $this->index($aColumns,$sIndexColumn,$sTable,$sInnerjoin,$whereclause);
	}
	
}
?>
	
