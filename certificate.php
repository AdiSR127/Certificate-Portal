<?php
 session_start();

 if(!isset($_SESSION['name'])){
     header('Location:index.php');
 }
 else{
    $name = $_SESSION['name'];
    $images = './images/cer.png';
    $var = 75;

    require('./fpdf/fpdf.php');

    class PDF extends FPDF
    {
        public $name;
        public $image_var;
        public $coordinates;


        // Page header
        function Header()
        {
            // Logo
            $this->Image($this->image_var,0,0,300);
            $this->SetFont('arimo','-Bold',48);
            $this->SetTextColor(31,108,176);
            // Move to the right
            $this->Cell(100);
            // Title
            $this->Cell($this->coordinates,158,$this->name,0,1,'C');
            // Line break
            $this->Ln(20);
        }

        public function setData($input,$images,$var){
            $this->name = $input;
            $this->image_var = $images;
            $this->coordinates = $var;
        }

    }

    // Instanciation of inherited class
    $pdf = new PDF('L','mm','A4');
    $set = 0;
    $pdf->setData($name,$images,$var);
    $pdf->Output('I','Certificate.pdf');
    session_destroy();
 }


?>
