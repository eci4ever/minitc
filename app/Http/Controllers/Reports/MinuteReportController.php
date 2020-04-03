<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Minute;
use Carbon\Carbon;
use PDF;

class MinuteReportController extends Controller
{
    public function index(Minute $minute)
    {
        $minute->load('verify');
        // Custom Header
        PDF::setHeaderCallback(function($pdf) {

            $pdf->SetY(10);
            // Set font
            $pdf->SetFont('helvetica', 'B', 12);
            // Title
            $pdf->Cell(0, 15, 'JPN Melaka / MC', 0, false, 'R', 0, '', 0, false, 'M', 'M');

        });

        PDF::SetAuthor('JPN');
        PDF::SetTitle('Report No' . $minute->id);
        PDF::SetSubject('Report of System');
        PDF::SetMargins(15, 20, 20);
        PDF::SetFontSubsetting(false);
        PDF::SetFontSize('12px');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        PDF::AddPage('P', 'A4');
        //Tajuk Minit
        PDF::SetFont('Times','B',14);
        PDF::Cell(0, 0, 'MINIT CURAI', 0, 1, 'C', 0, '', 1);
        PDF::SetFont('Times','B',14);
        PDF::Cell(0, 0, 'MESYUARAT LUAR / BENGKEL / KURSUS / PROGRAM', 0, 1, 'C', 0, '', 1);
        PDF::SetFont('Times','B',14);
        PDF::Cell(0, 0, 'JABATAN PENDIDIKAN NEGERI MELAKA', 0, 1, 'C', 0, '', 1);

        //Item
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::Cell(0, 0, '1.    Mesyuarat Luar / Bengkel / Kursus / Program:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        PDF::Cell(0, 0, $minute->name , 0, 1, 'L', 0, '', 1);

        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '2.     Anjuran:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        PDF::Cell(0, 0, $minute->anjuran , 0, 1, 'L', 0, '', 1);

        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '3.     Tarikh / Masa / Tempat:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        $mytime = Carbon::parse($minute->tarikh);
        $location = $mytime->format('j F Y') . ' / ' . $mytime->format('h:i A') . ' / ' . $minute->tempat;
        PDF::Cell(0, 0, $location , 0, 1, 'L', 0, '', 1);

        //Pegawai Terlibat
        $myarray = explode("\n", $minute->pegawai);
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '4.     Pegawai Yang Terlibat:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        for($i=0;$i<count($myarray);$i++) {
        PDF::writeHTMLCell(0, 0, '', '', $myarray[$i], 0, 1, 0, true, '', true);
        }

        //Isi / Isu
        $myisu = explode("\n", $minute->isu);
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '5.     Isi / Isu Penting Mesyuarat Luar / Bengkel / Kursus / Program:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        for($i=0;$i<count($myisu);$i++) {
        PDF::writeHTMLCell(0, 0, '', '', $myisu[$i], 0, 1, 0, true, '', true);
        }

        //Tindakan
        $mytindakan = explode("\n", $minute->tindakan);
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '6.     Nyatakan Tindakan Yang Mesti / Perlu Diambil:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        for($i=0;$i<count($mytindakan);$i++) {
        PDF::writeHTMLCell(0, 0, '', '', $mytindakan[$i], 0, 1, 0, true, '', true);
        }

        //Tandatangan Penulis Minit
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPaddings(5,10,0,0);
        PDF::Cell(0, 0, 'Tanda Tangan Pegawai:                                                            Tarikh:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        PDF::Cell(0, 0, '...................................                                                            ..................' , 0, 1, 'L', 0, '', 1);

        //Arahan
        $myarahan = explode("\n", $minute->verify->arahan);
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPadding(0);
        PDF::Cell(0, 0, '7.     Arahan / Cadangan bagi Tindakan / Keputusan oleh Pengarah / Timbalan', 0, 1, 'L', 0, '', 1);
        PDF::Cell(0, 0, '        Pengarah (Sekira arahan / cadangan tindakan):', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        for($i=0;$i<count($myarahan);$i++) {
        PDF::writeHTMLCell(0, 0, '', '', $myarahan[$i], 0, 1, 0, true, '', true);
        }

        //Tandatangan Penulis Minit
        PDF::Ln(6);
        PDF::SetFont('Times','B',14);
        PDF::setCellPaddings(5,10,0,0);
        PDF::Cell(0, 0, 'Tanda Tangan Pengarah / Timbalan Pengarah:                     Tarikh:', 0, 1, 'L', 0, '', 1);
        PDF::SetFont('Times','',14);
        PDF::setCellPaddings(10,0,0,0);
        PDF::Cell(0, 0, '...................................                                                             ..................' , 0, 1, 'L', 0, '', 1);


        PDF::lastPage();
        PDF::Output('No'.$minute->id.'Report.pdf');
    }
}
