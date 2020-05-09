<?php

namespace App\Http\Controllers;

use App\Trabajador;
use Illuminate\Http\Request;
use Karriere\PdfMerge\PdfMerge;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadors = Trabajador::get();
        return view('trabajadors.index', compact('trabajadors'));
    }

    public function show(Trabajador $trabajador)
    {
        return view('trabajadors.show', compact('trabajador'));
    }

    public function update(Request $request, Trabajador $trabajador)
    {
        $files = $request->file_pdf;
        $trabajador->url_documento = $this->unirPdf($files, $trabajador);
        $trabajador->save();

        return redirect()->route('trabajadors.show', $trabajador->id);
    }

    private function unirPdf($files, Trabajador $trabajador)
    {
        $pdf = new PdfMerge();

        foreach ($files as $key => $file){
            $pdf->add($file->getPathName());
        }

        //verificamos si en el registro ya existe un documento
        if(!is_null($trabajador->url_documento))
        {
            $pdf->add(public_path() . '/documentos/'. $trabajador->url_documento);
        }

        $nombre_pdf = $trabajador->id . '.pdf';
        $pdf->merge(public_path() . '/documentos/' . $nombre_pdf);

        return $nombre_pdf;
    }
}
