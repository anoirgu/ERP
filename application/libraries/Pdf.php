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
      /*   $this->SetDrawColor(0,80,180);
         $this->SetFillColor(255,0,0);
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
         }*/
         $this->SetFillColor(84 ,114, 174);
         $this->SetTextColor(255);
         $this->SetDrawColor(128,0,0);
         $this->SetLineWidth(.3);
         $this->SetFont('','');
         // En-tête
         $w = array(25, 25, 25, 25,25,25,25);
         for($i=0;$i<count($header);$i++)
             $this->Cell($w[$i],7,$header[$i],0,0,'C',true);
         $this->Ln();
         // Restauration des couleurs et de la police
         $this->SetFillColor(224,235,255);
         $this->SetTextColor(0);
         $this->SetFont('');
         // Données
         $n = 100;
         foreach($data as $row)
         {
             foreach($row as $col)
                 if(strlen($col)>25){
                     $this->MultiCell(24,5,$col);
                     $this->SetXY(42,$n);
                     $n =$n+5 ;
                 }else {
                 $this->Cell(25,6,$col,0);}
             $this->Ln();
             $this->Ln();
             $n= $n + 10 ;
         }
         // Trait de terminaison



     }
     function RoundedRect($x, $y, $w, $h, $r, $style = '')
     {
         $k = $this->k;
         $hp = $this->h;
         if($style=='F')
             $op='f';
         elseif($style=='FD' || $style=='DF')
             $op='B';
         else
             $op='S';
         $MyArc = 4/3 * (sqrt(2) - 1);
         $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
         $xc = $x+$w-$r ;
         $yc = $y+$r;
         $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

         $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
         $xc = $x+$w-$r ;
         $yc = $y+$h-$r;
         $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
         $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
         $xc = $x+$r ;
         $yc = $y+$h-$r;
         $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
         $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
         $xc = $x+$r ;
         $yc = $y+$r;
         $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
         $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
         $this->_out($op);
     }

     function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
     {
         $h = $this->h;
         $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
             $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
     }
}
?>