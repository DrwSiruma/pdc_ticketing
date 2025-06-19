<?php
ini_set('memory_limit', '512M');
require_once('../assets/vendor/tcpdf/tcpdf.php');
include('../includes/connection.php');

$ticket_num = $_GET['id'];
$query = mysqli_query($conn, "SELECT r.*, t.designation FROM `tbl_ticketreport` r LEFT JOIN `tbl_tickets` t ON r.ticket_num = t.ticket_num WHERE r.ticket_num = '$ticket_num'");
$ticket = mysqli_fetch_array($query);

// Format Time In and Time Out to 12-hour format with AM/PM
$time_in = !empty($ticket['time_in']) ? date("h:i A", strtotime($ticket['time_in'])) : '';
$time_out = !empty($ticket['time_out']) ? date("h:i A", strtotime($ticket['time_out'])) : '';

$impactPath = '../assets/fonts/impact.ttf';
$impact = TCPDF_FONTS::addTTFfont($impactPath, 'TrueTypeUnicode', '', 96);

// Extend TCPDF to Add Borders
class CustomPDF extends TCPDF {
    public function Header() {
        // Outer Border (closer to the page edges)
        // $this->SetLineStyle(array('width' => 0, 'color' => array(0, 0, 0)));
        $this->SetLineStyle(array('width' => 0, 'color' => array(255, 255, 255)));
        $this->Rect(7, 7, $this->getPageWidth() - 14, $this->getPageHeight() - 14);
    }
}

// Create TCPDF Object
$pdf = new CustomPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('PDC System');
$pdf->SetTitle('Service Report');
$pdf->SetMargins(7, 7);
$pdf->AddPage();

// --- PDC HEADER ---
$pdf->Image('../img/logo_blck2.jpg', 7, 7, 39, 0, '', '', '', false, 300, '', false, false, 0, false, false, false);

// Main header (left-aligned)
$pdf->SetXY(49, 6);
$pdf->SetFont($impact, 'B', 29);
$pdf->Cell(0, 6, 'PANDA DEVELOPMENT CORPORATION', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(49, 18);
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(0, 5, 'BUILDING 2-A PHILCREST I COMPOUND KM 23 WEST SERVICE ROAD', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(49, 23);
$pdf->Cell(0, 5, 'BO. CUPANG, MUNTINLUPA CITY • TEL NOS: 846-1806 / 846-2961 / 846-0204', 0, 1, 'L', 0, '', 0);

// Ticket number (top-right, fixed position, does not affect layout)
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetTextColor(255, 0, 0); // Set font color to red
$pdf->SetXY(154, 29);
$pdf->Cell(50, 8, $ticket['ticket_num'], 0, 0, 'R', 0, '', 0);
$pdf->SetTextColor(0, 0, 0); // Reset font color to black (optional)

// Continue with the rest of the header
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetXY(7, 30);
$pdf->Cell(0, 6, 'Technical Service Personnel', 0, 1, 'C', 0, '', 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Cell(0, 6, 'SERVICE REPORT', 0, 1, 'C', 0, '', 0);
$pdf->Ln(2);

// --- OUTLET/CONCERN DATE/CONCERN ---
$pdf->SetXY(6, 44);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(20, 7, 'OUTLET:', 0, 0, 'L');
$pdf->Cell(80, 7, isset($ticket['outlet_name']) ? $ticket['outlet_name'] : '', 'B', 0, 'L');
$pdf->Cell(34, 7, 'CONCERN DATE:', 0, 0, 'L');
$pdf->Cell(63, 7, '', 'B', 1, 'L');
$pdf->SetXY(6, 52);
$pdf->Cell(20, 7, 'CONCERN:', 0, 0, 'L');
$pdf->Cell(177, 7, '', 'B', 1, 'L');
$pdf->Cell(196, 7, '', 'B', 1, 'L');
// $pdf->Line(12, $pdf->GetY(), 198, $pdf->GetY());
$pdf->Ln(6);

// --- DIAGNOSIS & ROOT CAUSE ---
$yStart = $pdf->GetY();
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(7, $yStart);
$pdf->SetFillColor(220,220,220);

// Define cell widths and spacing
$cellWidth = 95; // width for each cell
$cellSpacing = 6; // space between cells

// Diagnosis header (left)
$pdf->Cell($cellWidth, 5, 'DIAGNOSIS', 1, 0, 'C', true);
// Space between cells
$pdf->Cell($cellSpacing, 7, '', 0, 0);
// Root Cause header (right)
$pdf->Cell($cellWidth, 5, 'ROOT CAUSE', 1, 1, 'C', true);

$pdf->SetFont('helvetica', '', 10);
for ($i = 0; $i < 7; $i++) {
    $pdf->SetX(7);
    // Diagnosis cell (left)
    $pdf->Cell($cellWidth, 7, '', 1, 0, 'L', false);
    // Space between cells
    $pdf->Cell($cellSpacing, 7, '', 0, 0);
    // Root Cause cell (right)
    $pdf->Cell($cellWidth, 7, '', 1, 1, 'L', false);
}
$pdf->Ln(6);

// --- ACTION TAKEN ---
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(196, 5, 'ACTION TAKEN:', 1, 1, 'L', true);
$pdf->SetFont('helvetica', '', 10);
for ($i = 0; $i < 5; $i++) {
    $pdf->Cell(196, 7, '', 1, 1, 'L', false);
}
$pdf->Ln(6);

// --- RECOMMENDATION ---
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(196, 5, 'RECOMMENDATION:', 1, 1, 'L', true);
$pdf->SetFont('helvetica', '', 10);
for ($i = 0; $i < 6; $i++) {
    $pdf->Cell(196, 7, '', 1, 1, 'L', false);
}
$pdf->Ln(6);

// --- SIGNATURES & FOOTER ---
$pdf->SetFont('helvetica', 'B', 9);
$pdf->SetFillColor(255,255,255);

// Row 1
$pdf->SetX(7);
$pdf->MultiCell(60, 12, "CREW SIGNATURE OVER\nPRINTED NAME:", 1, 'L', false, 0);
$pdf->Cell(60, 12, '', 1, 0, 'C', false);
$pdf->Cell(76, 12, 'DATE:', 1, 1, 'L', false);
// Row 2
$pdf->SetX(7);
$pdf->Cell(60, 12, "ACKNOWLEDGED BY:", 1, 'L', false);
$pdf->Cell(60, 12, '', 1, 0, 'C', false);
$pdf->Cell(76, 12, 'TIME IN:', 1, 1, 'L', false);
// Row 3
$pdf->SetX(7);
$pdf->MultiCell(60, 12, "TSS SIGNATURE OVER\nPRINTED NAME:", 1, 'L', false, 0);
$pdf->Cell(60, 12, '', 1, 0, 'C', false);
$pdf->Cell(76, 12, 'TIME OUT:', 1, 1, 'L', false);

// Save the PDF
$export_folder = __DIR__ . '/../exports/';
if (!file_exists($export_folder)) {
    mkdir($export_folder, 0777, true);
}
$file_path = $export_folder . "Service_Report_$ticket_num.pdf";
$pdf->Output($file_path, 'F');

header("Location: view-report?id={$ticket_num}");
exit();
// Force download the PDF file
// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="Service_Report_' . $ticket_num . '.pdf"');
// readfile($file_path);
exit();
?>