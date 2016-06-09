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
         $this->SetDrawColor(0,80,180);
         $this->SetFillColor(0,0,0);
         $this->SetTextColor(220,50,50);
         foreach($header as $col)
             $this->Cell(60,7,$col,1);
         $this->Ln();
         // Data
         $this->SetTextColor(0,0,0);
         foreach($data as $row)
         {
             foreach($row as $col)
                 $this->Cell(60,6,$col,1);
             $this->Ln();
         }
     }
}
?>