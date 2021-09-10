<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibreOfficeController extends Controller
{
    public function index() {
        return view('libreoffice');
    }

    public function convert(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:docx'
        ]);

        $path = Storage::putFile('docs', $request->file('file'));
        $storagePath = storage_path('app/public/');

        $fileName = basename($path, ".docx");
        shell_exec("cd $storagePath && libreoffice --convert-to pdf $path --outdir $storagePath/pdf");

        $pdfPath = $storagePath.'pdf/'.$fileName.".pdf";
        $pdf = new \Spatie\PdfToImage\Pdf($pdfPath);
        $numOfPage = $pdf->getNumberOfPages();

        $images = [];
        for ($i=1; $i <= $numOfPage; $i++) {
            $pathImage = "images/" . $fileName . "-page" . $i . ".png";
            $pdf->setPage($i)
                ->saveImage($storagePath . $pathImage);

            $images[] = Storage::url($pathImage);
        }

        return view('libreoffice', compact('images'));
    }
}
