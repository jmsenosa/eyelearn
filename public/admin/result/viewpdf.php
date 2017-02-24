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
$pdf->AddPage("L");
// $pdf->Image('../../images/participant.jpg', 0, 0, 220);

$pdf->SetFont('Arial','',10);

$pdf->SetXY(10,40);
$pdf->Cell(00,00,'Quiz Result');
$pdf->SetXY(10,45); 

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10,50);
$pdf->Cell(00,00,'Period');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(35,50);
$pdf->Cell(00,00,'LRN');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(66,50);
$pdf->Cell(00,00,'Student Name');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(95,50);
$pdf->Cell(00,00,'Lesson Title');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(137,50);
$pdf->Cell(00,00,'Quiz #');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(154,50);
$pdf->Cell(00,00,'Quiz Description');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(209,50);
$pdf->Cell(00,00,'Score');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(225,50);
$pdf->Cell(00,00,'item #');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(240,50);
$pdf->Cell(00,00,'Percentage');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(260,50);
$pdf->Cell(00,00,'Remarks');
// $pdf->SetFont('Arial','B',8);
// $pdf->SetXY(130,75);
// $pdf->Cell(00,00,'OUT');


$pdf->SetFont('Arial','',10);
$i=60; 



$query = '
    SELECT 
        quiz_take.id as id,
        student.id as student_id,
        student.lrn as lrn,
        concat(student.first_name," ",student.last_name) as student_name,
        lesson.grading_quarter_id as grading_period,
        lesson.id as lesson_id,
        lesson.name as lesson_title,
        quiz_master.id as quiz_no,
        quiz.description as quiz_description,
        quiz_take.score as qt_score,
        quiz_take.total_questions as qt_number_question,
        quiz_take.last_update as date_created,
        round(( quiz_take.score / quiz_take.total_questions ),2) as percentage,
        CASE WHEN round(( quiz_take.score / quiz_take.total_questions ),2) <= 0.2 THEN "Needs Improvement"
             WHEN round(( quiz_take.score / quiz_take.total_questions ),2) BETWEEN 0.21 AND 0.4 THEN "Good"         
             WHEN round(( quiz_take.score / quiz_take.total_questions ),2) BETWEEN 0.41 AND 0.6 THEN "Very Good"    
             WHEN round(( quiz_take.score / quiz_take.total_questions ),2) BETWEEN 0.61 AND 0.8 THEN "Fantastic"    
             WHEN round(( quiz_take.score / quiz_take.total_questions ),2) > 0.8 THEN "Excellent"
        END AS remark
    FROM 
        quiz_take
    JOIN
        quiz_master
        ON
            quiz_master.id = quiz_take.quiz_master_id
    LEFT JOIN
        quiz
        ON
            quiz.quiz_master_id = quiz_master.id
    LEFT JOIN
        lesson
            ON
                lesson.id = quiz_take.lesson_id
    LEFT JOIN
        student
            ON 
                student.id = quiz_take.student_id
    LEFT JOIN
        section
            ON 
                section.id = student.section_id
    ';


if (isset($_GET['id'])) {
    if ($_GET['id'] != "" || $_GET['id'] != "undefined") {
        $query = $query. " WHERE section.created_by = ".$_GET["id"]." "; 
    }
}

$query = $query = $query. ' GROUP BY 
        quiz_take.id
    ORDER BY 
        quiz_no ASC,
        id ASC ';
 
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    die();
} 

function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

if ($result = $mysqli->query($query)) {
    while ($obj = $result->fetch_object()):
        
        $pdf->SetXY(10,$i);
        $pdf->Cell(00,00, $obj->grading_period.ordinal_suffix($obj->grading_period)." Quarter");

        $pdf->SetXY(35,$i);
        $pdf->Cell(00,00, $obj->lrn);

        $pdf->SetXY(66,$i);
        $pdf->Cell(00,00, $obj->student_name);

        $pdf->SetXY(95,$i);
        $pdf->Cell(00,00, $obj->lesson_title);

        $pdf->SetXY(140,$i);
        $pdf->Cell(00,00, $obj->quiz_no);

        $pdf->SetXY(154,$i);
        $pdf->Cell(00,00, $obj->quiz_description);

        $pdf->SetXY(212,$i);
        $pdf->Cell(00,00, $obj->qt_score);

        $pdf->SetXY(228,$i);
        $pdf->Cell(00,00, $obj->qt_number_question);

        $pdf->SetXY(240,$i);
        $pdf->Cell(00,00, round($obj->percentage * 100)."%");

        $pdf->SetXY(260,$i);
        $pdf->Cell(00,00, $obj->remark);

        $i+=5;
    endwhile;
} 
// for($i=1;$i<=40;$i++)
    // $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
