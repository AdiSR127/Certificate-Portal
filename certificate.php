<?php
 require_once('./dbDet/db.php');
 date_default_timezone_set("Asia/Kolkata");
 if(!isset($_POST['name'])){
     header('Location:index.php?msg= Login First!');
 }
 else{
    
    $name = $_POST['name'];
    $post = $_POST['post'];
    $event = $_POST['event'];
    $id = $_POST['id'];
    $time = date("Y-m-d H:i:s");
    $query = "UPDATE nprint SET printed=printed+1, time='$time' WHERE id='$id';";
        $L0 = 'This is to appreciate that';
        $L1 = 'has fully participated in '.$event.' 2021'; 
        $L2 = 'as a '.$post.' at Aditya Corporation,';
        $L3 = 'during the session 2021 - 2022.';
        $L4 = 'We wish him / her a great future ahead.';
    $images = './images/cer.jpg';
    strtoupper($name);
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
            $this->SetFont('tangerine','',49);
            $this->SetTextColor(186, 31, 39);
            // Move to the right
            $this->Cell(100);
            // Title
            $this->Cell(80,173,$this->name,0,0,'C');
            // Line break
            $this->Ln();
            $this->SetFont('arimo','-Bold',15);
            $this->SetTextColor(0,0,0);
            $this->Cell(280,-140,$this->L1,0,0,'C');
            $this->Cell(-280,-124,$this->L2,0,0,'C');
            $this->Cell(280,-108,$this->L3,0,0,'C');
            $this->Cell(-280,-92,$this->L4,0,0,'C');
            $this->SetFont('arimo','-Bold',13);
            $this->Cell(0,-204,$this->L0,0,0,'C');
            $this->SetFont('Times','',11);
            $this->Cell(-500,14,'Issue Date: 25/03/2021',0,0,'C');

            // Line break
            $this->Ln(20);
        }

        public function setData($input,$L0,$L1,$L2,$L3,$L4,$images){
            $this->name = $input;
            $this->image_var = $images;
            $this->L0 = $L0;
            $this->L1 = $L1;
            $this->L2 = $L2;
            $this->L3 = $L3;
            $this->L4 = $L4;
        }

    }

    // Instanciation of inherited class
    $pdf = new PDF('L','mm','A4');
    $pdf->AddFont('tangerine','','tangerine.php');
    $set = 0;
    $pdf->setData($name,$L0,$L1,$L2,$L3,$L4,$images);
    if($_POST['req']=='Download'){
    $pdf->Output('D', $name.'_'.$post.'_'.$event. '.pdf');
    }
    else{
    $pdf->Output('I', $name.'_'.$post.'_'.$event. '.pdf');   
    }
    if($_POST['admin']!='admin'){
    mysqli_query($conn,$query);
    }
 }


?>
