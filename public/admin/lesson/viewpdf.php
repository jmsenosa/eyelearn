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
	$results = Lesson::find_all();
	
	
	if(!$results) {
		$session->message("The Event could not be located.");
		redirect_to('index.php');
	}	
		
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
$pdf->Cell(00,00,'Lessons');
$pdf->SetXY(10,45);

// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(00,00,$event->name);

// $pdf->SetFont('Arial','I',10);
// $pdf->SetXY(10,48);
// $pdf->MultiCell(70,4,$event->remarks);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(10,50);
$pdf->Cell(00,00,'Name');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(50,50);
$pdf->Cell(00,00,'Created_by');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(90,50);
$pdf->Cell(00,00,'Date');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(140,50);
$pdf->Cell(00,00,'Status');


// $pdf->SetFont('Arial','B',10);
// $pdf->SetXY(130,75);
// $pdf->Cell(00,00,'OUT');


$pdf->SetFont('Arial','',10);
$i=60; 
foreach($results as $result){
    // echo $result->name;
    // id, quiz_id, user_id, score, total_number, last_update
	$student = User::find_by_id($result->user_id);  
	@$full = ucwords($student->first_name).' '. ucwords($student->last_name);
    // echo $full; die();
	$pdf->SetXY(10,$i);
	$pdf->Cell(00,00,ucwords($result->name));
	$pdf->SetXY(50,$i);
	$pdf->Cell(00,00,$full);
	$pdf->SetXY(90,$i);
	$pdf->Cell(00,00,strtoupper($result->description));
	$pdf->SetXY(140,$i);
	$pdf->Cell(00,00,strtoupper($result->active));
	$pdf->SetXY(160,$i);
	$pdf->Cell(00,00,$result->last_update);
	$i+=5;
    
}



// for($i=1;$i<=40;$i++)
    // $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
