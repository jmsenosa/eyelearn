<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');

	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	// Check if there is event_hdr_id
	// if(empty($_GET['id'])) {
	  // $session->message("No Event ID was provided.");
	  // redirect_to('index.php');
	
	// }
	
	// Check if there is event_hdr_id available in the database


	

	
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../images/eyelearnlogo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',12);
    // Move to the right
	// $this->SetXY(20,15);
	// $this->Cell(00,00,'Eye Learing',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->Image('../../images/participant.jpg', 0, 0, 220);

$pdf->SetFont('Arial','',10);

$pdf->SetXY(10,40);
$pdf->Cell(00,00,'Student Attendance');
$pdf->SetXY(10,45);

// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(00,00,$event->name);

// $pdf->SetFont('Arial','I',10);
// $pdf->SetXY(10,48);
// $pdf->MultiCell(70,4,$event->remarks);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(10,50);
$pdf->Cell(00,00,'LRN');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(50,50);
$pdf->Cell(00,00,'Full Name');



$pdf->SetFont('Arial','B',10);
$pdf->SetXY(100,50);
$pdf->Cell(00,00,'Section');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(160,50);
$pdf->Cell(00,00,'Attendance');

// $pdf->SetFont('Arial','B',10);
// $pdf->SetXY(130,75);
// $pdf->Cell(00,00,'OUT');


$pdf->SetFont('Arial','',10);
$i=60; 
	 $students = Student::find_by_year($_GET['year']);
foreach($students as $student): 
    if($student->teacher == $_GET['id']):
        $attendance	= Attendance::find_by_today($student->id,$_GET['date']);
        if(!empty($attendance)){
            foreach($attendance as $attend):                 
                                   
                        
	
                            $pdf->SetXY(10,$i);
                            $pdf->Cell(00,00,ucwords($student->lrn));
                            $pdf->SetXY(50,$i);
                            $pdf->Cell(00,00,ucwords($student->first_name).' '.ucwords($student->last_name));
                            $pdf->SetXY(100,$i);
                            $pdf->Cell(00,00,strtoupper( $student->section));
                            $pdf->SetXY(160,$i);
                            $pdf->Cell(00,00, $attend->attendance == "present" ? "Present" : "Absent");
                            $i+=5;
                        
endforeach;
        }
else{
                  
                                   
                        
	
                            $pdf->SetXY(10,$i);
                            $pdf->Cell(00,00,ucwords($student->lrn));
                            $pdf->SetXY(50,$i);
                            $pdf->Cell(00,00,ucwords($student->first_name).' '.ucwords($student->last_name));
                            $pdf->SetXY(100,$i);
                            $pdf->Cell(00,00,strtoupper( $student->section));
                            $pdf->SetXY(160,$i);
                            $pdf->Cell(00,00, "N/A");
                            $i+=5;
}
                            endif;
endforeach;
// for($i=1;$i<=40;$i++)
    // $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
