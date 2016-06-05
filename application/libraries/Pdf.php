<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
 class Pdf extends FPDF
{
    // Extend FPDF using this class
    // More at fpdf.org -> Tutorials
    function __construct($orientation='P', $unit='mm', $size='A4')
    {
        // Call parent constructor
        parent::__construct($orientation,$unit,$size);
    }


    

     
     
     
     
     
     
     
     
     
     
     function BasicTable($header, $data)
     {
         // Header
         foreach($header as $col)
             $this->Cell(40,7,$col,1);
         $this->Ln();
         // Data
         foreach($data as $row)
         {
             foreach($row as $col)
                 $this->Cell(40,6,$col,1);
             $this->Ln();
         }
     }
}
?>