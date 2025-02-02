<?php
require_once('../assets/vendor/tcpdf/tcpdf.php');
include('../includes/connection.php');

$ticket_num = $_GET['id'];
$query = mysqli_query($conn, "SELECT r.*, t.designation FROM `tbl_ticketreport` r LEFT JOIN `tbl_tickets` t ON r.ticket_num = t.ticket_num WHERE r.ticket_num = '$ticket_num'");
$ticket = mysqli_fetch_array($query);

// Format Time In and Time Out to 12-hour format with AM/PM
$time_in = !empty($ticket['time_in']) ? date("h:i A", strtotime($ticket['time_in'])) : '';
$time_out = !empty($ticket['time_out']) ? date("h:i A", strtotime($ticket['time_out'])) : '';

// Extend TCPDF to Add Borders
class CustomPDF extends TCPDF {
    public function Header() {
        // Outer Border (closer to the page edges)
        $this->SetLineStyle(array('width' => 1.2, 'color' => array(0, 0, 0)));
        $this->Rect(5, 5, $this->getPageWidth() - 10, $this->getPageHeight() - 10);

        // Inner Border (aligned with the main content)
        $this->SetLineStyle(array('width' => 0.6, 'color' => array(0, 0, 0)));
        $this->Rect(10, 10, $this->getPageWidth() - 20, $this->getPageHeight() - 20);
    }
}

// Create TCPDF Object
$pdf = new CustomPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('PDC System');
$pdf->SetTitle('Service Report');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// PDC Logo Placeholder (Update with actual logo path)
$pdf->Image('../img/logo_blck.jpg', 10, 10, 35, 20);
$pdf->SetY(15);
$pdf->SetFont('helvetica', 'B', 14);
// $pdf->Cell(190, 10, 'IT TECHNICAL REPORT', 0, 1, 'C');
$title = ($ticket['designation'] == 1) ? 'IT TECHNICAL REPORT' : 'SERVICE REPORT';
$pdf->Cell(190, 10, $title, 0, 1, 'C');
$pdf->Ln(5);

// Section Header Function (Black Background, White Text)
function sectionHeader($pdf, $title) {
    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(190, 7, " $title", 1, 1, 'C', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln(0);
}

// Store & Personnel Details
sectionHeader($pdf, 'STORE DETAILS AND SUPPORT PERSONNEL DETAILS');

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(26.75, 7, "Establishment:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(68.25, 7, "{$ticket['outlet_name']}", 0, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(10.75, 7, "Date:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(84.25, 7, "{$ticket['ticket_date']}", 0, 1);

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(22.5, 7, "Serviced By:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(72.5, 7, $ticket['emp_name'], 0, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(19.5, 7, "Ticket No.:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(75.5, 7, $ticket['ticket_num'], 0, 1);

$pdf->SetTextColor(0, 0, 0);

// **CORRECTED ROW: Two blank columns, then "Time In + Data" and "Time Out + Data"**
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(95, 7, "", 0, 0); // Blank column
$pdf->Cell(14.75, 7, "Time In:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(32.75, 7, $time_in, 0, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(17.75, 7, "Time Out:", 0, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(29.75, 7, $time_out, 0, 1);
$pdf->Ln(3);

// Diagnostics & Recommendation
sectionHeader($pdf, 'DIAGNOSTICS AND RECOMMENDATION');
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(16, 7, "Subject:", 'TBL', 0, 'L');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(174, 7, "{$ticket['subj']}", 'TRB', 1, 'L');

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(95, 7, "Findings:", 1, 0);
$pdf->Cell(95, 7, "Action Taken:", 1, 1);

$pdf->SetFont('helvetica', '', 10);
$y = $pdf->GetY();
$pdf->MultiCell(95, 7, $ticket['findings'], 1, 'L', 0, 0);
$pdf->SetXY(105, $y);
$pdf->MultiCell(95, 7, $ticket['action'], 1, 'L', 0, 1);
$pdf->Ln(0);

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(95, 7, "Diagnosis:", 1, 0);
$pdf->Cell(95, 7, "Recommendation(s):", 1, 1);

$pdf->SetFont('helvetica', '', 10);
$y = $pdf->GetY();
$pdf->MultiCell(95, 7, $ticket['diagnosis'], 1, 'L', 0, 0);
$pdf->SetXY(105, $y);
$pdf->MultiCell(95, 7, $ticket['recom'], 1, 'L', 0, 1);
$pdf->Ln(0);

// Client Acknowledgment
sectionHeader($pdf, 'CLIENT ACKNOWLEDGEMENT');
$pdf->ln(2);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(190, 7, 'The Authorized Signature below indicates that the service requested (technical support, service, or replacement of parts) indicated above was completed and in good working condition.', 0, 'C');
$pdf->Ln(8);

// Client Signature
if (!empty($ticket['signature_client'])) {
    $signature_data = explode(',', $ticket['signature_client']);
    if (count($signature_data) == 2 && strpos($signature_data[0], 'base64') !== false) {
        $signature = base64_decode($signature_data[1]);
        $file_path = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($file_path, $signature);
        $x = ($pdf->GetPageWidth() - 60) / 2; // Center the signature
        $pdf->Image($file_path, $x, $pdf->GetY() - 7, 60); // Adjusted Y position to move the signature up
        unlink($file_path);
        $pdf->Ln(2);
    }
}
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(63.33333333333333, 7, '', 0, 0);
$pdf->Cell(63.33333333333333, 7, strtoupper($ticket['fn_client']), 'B', 0, 'C');
$pdf->Cell(63.33333333333333, 7, '', 0, 1);
$pdf->Cell(190, 7, "REPRESENTATIVE", 0, 1, 'C');
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(190, 7, "(Printed Name and Signature)", 0, 1, 'C', 0, '', 0, false, 'T');
$pdf->Ln(3);

// Personnel Acknowledgment
// sectionHeader($pdf, 'IT TECHNICIAN ACKNOWLEDGEMENT');
$acknowledgment_title = ($ticket['designation'] == 1) ? 'IT TECHNICIAN ACKNOWLEDGEMENT' : 'PERSONNEL ACKNOWLEDGEMENT';
sectionHeader($pdf, $acknowledgment_title);
$pdf->ln(2);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(190, 7, 'I confirm that all reported issues were addressed, and the system is in working condition as of service completion. Recommendations are noted above.', 0, 'C');
$pdf->Ln(8);

// Personnel Signature
if (!empty($ticket['signature_personnel'])) {
    $signature_data = explode(',', $ticket['signature_personnel']);
    if (count($signature_data) == 2 && strpos($signature_data[0], 'base64') !== false) {
        $signature = base64_decode($signature_data[1]);
        $file_path = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($file_path, $signature);
        $x = ($pdf->GetPageWidth() - 47) / 2; // Center the signature
        $pdf->Image($file_path, $x, $pdf->GetY() - 11, 47); // Adjusted Y position to move the signature up
        unlink($file_path);
        $pdf->Ln(2);
    }
}
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(63.33333333333333, 7, '', 0, 0);
$pdf->Cell(63.33333333333333, 7, strtoupper($ticket['emp_name']), 'B', 0, 'C');
$pdf->Cell(63.33333333333333, 7, '', 0, 1);
if ($ticket['designation'] == 1) {
    $pdf->Cell(190, 7, "SYSTEM ENGINEER", 0, 1, 'C');
} else {
    $pdf->Cell(190, 7, "SUPPORT PERSONNEL", 0, 1, 'C');
}
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(190, 7, "(Printed Name and Signature)", 0, 1, 'C', 0, '', 0, false, 'T');
$pdf->Ln(3);

// Save the PDF
$export_folder = __DIR__ . '/../exports/';
if (!file_exists($export_folder)) {
    mkdir($export_folder, 0777, true);
}
$file_path = $export_folder . "Service_Report_$ticket_num.pdf";
$pdf->Output($file_path, 'F');

// header("Location: view-report?id={$ticket_num}");
// exit();
// Force download the PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Service_Report_' . $ticket_num . '.pdf"');
readfile($file_path);
exit();
?>