<?php
ini_set('memory_limit', '512M');
require_once('../assets/vendor/tcpdf/tcpdf.php');
include('../includes/connection.php');

$ticket_num = $_GET['id'];
$query = mysqli_query($conn, "SELECT r.*, t.designation FROM `tbl_ticketreport` r LEFT JOIN `tbl_tickets` t ON r.ticket_num = t.ticket_num WHERE r.ticket_num = '$ticket_num'");
$ticket = mysqli_fetch_array($query);

$datePosted = new DateTime($ticket['date_posted']);
$formattedDatePosted = $datePosted->format('m/d/Y h:i A');

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
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(20, 7, 'OUTLET:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(80, 7, isset($ticket['outlet_name']) ? $ticket['outlet_name'] : '', 'B', 0, 'L', false);

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(34, 7, 'CONCERN DATE:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(63, 7, isset($ticket['ticket_date']) ? $ticket['ticket_date'] : '', 'B', 1, 'L', false);

$pdf->SetXY(6, 52);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(20, 7, 'CONCERN:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(177, 7, isset($ticket['subj']) ? $ticket['subj'] : '', 'B', 1, 'L', false);

$pdf->Cell(196, 7, '', 'B', 1, 'L');
// $pdf->Line(12, $pdf->GetY(), 198, $pdf->GetY());
$pdf->Ln(6);

// --- DIAGNOSIS & ROOT CAUSE ---
$yStart = $pdf->GetY();
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(7, $yStart);
$pdf->SetFillColor(220,220,220);

$cellWidth = 95;
$cellSpacing = 6;
$defaultRows = 7;
$rowHeight = 7;
$defaultHeight = $defaultRows * $rowHeight;

// Diagnosis header (left)
$pdf->Cell($cellWidth, 5, 'DIAGNOSIS', 1, 0, 'C', true);
$pdf->Cell($cellSpacing, 7, '', 0, 0);
$pdf->Cell($cellWidth, 5, 'ROOT CAUSE', 1, 1, 'C', true);

$pdf->SetFont('helvetica', '', 10);
$diagnosis = isset($ticket['diagnosis']) ? $ticket['diagnosis'] : '';
$root_cause = isset($ticket['findings']) ? $ticket['findings'] : '';
$diagHeight = $pdf->GetStringHeight($cellWidth - 2, $diagnosis);
$rootHeight = $pdf->GetStringHeight($cellWidth - 2, $root_cause);
$maxTextHeight = max($diagHeight, $rootHeight);
$finalHeight = max($defaultHeight, $maxTextHeight + 4);
$overflow = ($diagHeight > $defaultHeight - 2) || ($rootHeight > $defaultHeight - 2);

if (!$overflow) {
    // Draw only outer borders, no inside lines
    $pdf->SetX(7);
    $pdf->Cell($cellWidth, $defaultHeight, '', 1, 0, 'L', false);
    $pdf->Cell($cellSpacing, $defaultHeight, '', 0, 0);
    $pdf->Cell($cellWidth, $defaultHeight, '', 1, 1, 'L', false);
    // Write the text, wrapped, inside the cells
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetXY(7 + 1, $yStart + 5 + 1);
    $pdf->MultiCell($cellWidth - 2, 0, $diagnosis, 0, 'L', false, 0, '', '', true, 0, false, true, $defaultHeight - 2);
    $pdf->SetXY(7 + $cellWidth + $cellSpacing + 1, $yStart + 5 + 1);
    $pdf->MultiCell($cellWidth - 2, 0, $root_cause, 0, 'L', false, 0, '', '', true, 0, false, true, $defaultHeight - 2);
    $pdf->SetY($yStart + 5 + $defaultHeight + 1);
} else {
    // Draw only outer borders, no inside lines
    $pdf->SetX(7);
    $pdf->Cell($cellWidth, $finalHeight, '', 1, 0, 'L', false);
    $pdf->Cell($cellSpacing, $finalHeight, '', 0, 0);
    $pdf->Cell($cellWidth, $finalHeight, '', 1, 1, 'L', false);
    // Write the text, wrapped, underlined, inside the cells
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetXY(7 + 1, $yStart + 5 + 1);
    $pdf->MultiCell($cellWidth - 2, 0, $diagnosis, 0, 'L', false, 0, '', '', true, 0, false, true, $finalHeight - 2);
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetXY(7 + $cellWidth + $cellSpacing + 1, $yStart + 5 + 1);
    $pdf->MultiCell($cellWidth - 2, 0, $root_cause, 0, 'L', false, 0, '', '', true, 0, false, true, $finalHeight - 2);
    $pdf->SetY($yStart + 5 + $finalHeight + 1);
}
$pdf->Ln(6);

// --- ACTION TAKEN ---
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(196, 5, 'ACTION TAKEN:', 1, 1, 'L', true);
$pdf->SetFont('helvetica', '', 10);
$action = isset($ticket['action']) ? $ticket['action'] : '';
$defaultRows = 6;
$rowHeight = 7;
$defaultHeight = $defaultRows * $rowHeight;
$actionHeight = $pdf->GetStringHeight(196 - 2, $action);
$finalHeight = max($defaultHeight, $actionHeight + 4);
$overflow = ($actionHeight > $defaultHeight - 2);
$actionCellY = $pdf->GetY();
if (!$overflow) {
    // Draw only outer border, no inside lines
    $pdf->Cell(196, $defaultHeight, '', 1, 1, 'L', false);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetXY(8, $actionCellY + 1);
    $pdf->MultiCell(196 - 2, 0, $action, 0, 'L', false, 1, '', '', true, 0, false, true, $defaultHeight - 2);
    $pdf->SetY($actionCellY + $defaultHeight);
} else {
    $pdf->Cell(196, $finalHeight, '', 1, 1, 'L', false);
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetXY(8, $actionCellY + 1);
    $pdf->MultiCell(196 - 2, 0, $action, 0, 'L', false, 1, '', '', true, 0, false, true, $finalHeight - 2);
    $pdf->SetY($actionCellY + $finalHeight);
}
$pdf->Ln(6);

// --- RECOMMENDATION ---
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(196, 5, 'RECOMMENDATION:', 1, 1, 'L', true);
$pdf->SetFont('helvetica', '', 10);
$recommendations = isset($ticket['recom']) ? $ticket['recom'] : '';
$defaultRows = 6;
$rowHeight = 7;
$defaultHeight = $defaultRows * $rowHeight;
$recomHeight = $pdf->GetStringHeight(196 - 2, $recommendations);
$finalHeight = max($defaultHeight, $recomHeight + 4);
$overflow = ($recomHeight > $defaultHeight - 2);
$recomCellY = $pdf->GetY();
if (!$overflow) {
    $pdf->Cell(196, $defaultHeight, '', 1, 1, 'L', false);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetXY(8, $recomCellY + 1);
    $pdf->MultiCell(196 - 2, 0, $recommendations, 0, 'L', false, 1, '', '', true, 0, false, true, $defaultHeight - 2);
    $pdf->SetY($recomCellY + $defaultHeight);
} else {
    $pdf->Cell(196, $finalHeight, '', 1, 1, 'L', false);
    $pdf->SetFont('helvetica', 'U', 10);
    $pdf->SetXY(8, $recomCellY + 1);
    $pdf->MultiCell(196 - 2, 0, $recommendations, 0, 'L', false, 1, '', '', true, 0, false, true, $finalHeight - 2);
    $pdf->SetY($recomCellY + $finalHeight);
}
$pdf->Ln(6);

// --- SIGNATURES & FOOTER ---
$pdf->SetFont('helvetica', 'B', 9);
$pdf->SetFillColor(255,255,255);

// Row 1
$pdf->SetX(7);
$pdf->MultiCell(60, 12, "CREW SIGNATURE OVER\nPRINTED NAME:", 1, 'L', false, 0);

// Signature cell (single 12mm cell)
$clientName = !empty($ticket['fn_client']) ? strtoupper($ticket['fn_client']) : '';
$clientCellX = $pdf->GetX();
$clientCellY = $pdf->GetY();
$pdf->Cell(60, 12, '', 1, 0, 'C', false);

// Draw the signature image in the upper part of the cell (reduced width)
if (!empty($ticket['signature_client'])) {
    $signature_data = explode(',', $ticket['signature_client']);
    if (count($signature_data) == 2 && strpos($signature_data[0], 'base64') !== false) {
        $signature = base64_decode($signature_data[1]);
        $file_path = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($file_path, $signature);
        $sigW = 30;
        $sigH = 5.5;
        $sigX = $clientCellX + (60 - $sigW) / 2;
        $sigY = $clientCellY + 1.2;
        $pdf->Image($file_path, $sigX, $sigY, $sigW, $sigH);
        unlink($file_path);
    }
}
// Draw the client name at the bottom of the cell
$pdf->SetFont('helvetica', '', 9);
$pdf->SetXY($clientCellX, $clientCellY + 12 - 4.2);
$pdf->Cell(60, 4, $clientName, 0, 0, 'C', false);

// Date cell
$pdf->SetXY($clientCellX + 60, $clientCellY);
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(
    76,
    12,
    'DATE: ' . (
        (!empty($ticket['posted_date']) && $ticket['posted_date'] !== '0000-00-00 00:00:00.000000')
            ? $formattedDatePosted
            : ''
    ),
    1,
    1,
    'L',
    false
);
// Row 2
$pdf->SetX(7);
$pdf->Cell(60, 12, "ACKNOWLEDGED BY:", 1, 0, 'L', false);

// ACKNOWLEDGED BY signature cell (single 12mm cell)
$ackName = !empty($ticket['fn_signiture2']) ? strtoupper($ticket['fn_signiture2']) : '';
$ackCellX = $pdf->GetX();
$ackCellY = $pdf->GetY();
$pdf->Cell(60, 12, '', 1, 0, 'C', false);

// Draw the ACK signature image in the upper part of the cell (reduced width)
if (!empty($ticket['signiture_2'])) {
    $signature_data = explode(',', $ticket['signiture_2']);
    if (count($signature_data) == 2 && strpos($signature_data[0], 'base64') !== false) {
        $signature = base64_decode($signature_data[1]);
        $file_path = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($file_path, $signature);
        $sigW = 30;
        $sigH = 5.5;
        $sigX = $ackCellX + (60 - $sigW) / 2;
        $sigY = $ackCellY + 1.2;
        $pdf->Image($file_path, $sigX, $sigY, $sigW, $sigH);
        unlink($file_path);
    }
}
// Draw the ACK name at the bottom of the cell
$pdf->SetFont('helvetica', '', 9);
$pdf->SetXY($ackCellX, $ackCellY + 12 - 4.2);
$pdf->Cell(60, 4, $ackName, 0, 0, 'C', false);

// Time in cell
$pdf->SetXY($ackCellX + 60, $ackCellY);
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(76, 12, 'TIME IN: ' . $time_in, 1, 1, 'L', false);
// Row 3
$pdf->SetX(7);
$pdf->MultiCell(60, 12, "TSS SIGNATURE OVER\nPRINTED NAME:", 1, 'L', false, 0);

// TSS Signature cell (single 12mm cell)
$tssName = !empty($ticket['emp_name']) ? strtoupper($ticket['emp_name']) : '';
$tssCellX = $pdf->GetX();
$tssCellY = $pdf->GetY();
$pdf->Cell(60, 12, '', 1, 0, 'C', false);

// Draw the TSS signature image in the upper part of the cell (reduced width)
if (!empty($ticket['signature_personnel'])) {
    $signature_data = explode(',', $ticket['signature_personnel']);
    if (count($signature_data) == 2 && strpos($signature_data[0], 'base64') !== false) {
        $signature = base64_decode($signature_data[1]);
        $file_path = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($file_path, $signature);
        $sigW = 30;
        $sigH = 5.5;
        $sigX = $tssCellX + (60 - $sigW) / 2;
        $sigY = $tssCellY + 1.2;
        $pdf->Image($file_path, $sigX, $sigY, $sigW, $sigH);
        unlink($file_path);
    }
}
// Draw the TSS name at the bottom of the cell
$pdf->SetFont('helvetica', '', 9);
$pdf->SetXY($tssCellX, $tssCellY + 12 - 4.2);
$pdf->Cell(60, 4, $tssName, 0, 0, 'C', false);

// Time out cell
$pdf->SetXY($tssCellX + 60, $tssCellY);
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(76, 12, 'TIME OUT: ' . $time_out, 1, 1, 'L', false);

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