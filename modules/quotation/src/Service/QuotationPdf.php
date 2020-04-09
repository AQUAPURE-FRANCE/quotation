<?php

namespace Quotation\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class QuotationPdf
{
    public function createPDF($html, array $data, $template = null, $fileName = null)
    {
        // Mise en place d'options pour dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($pdfOptions);

        // Récupère le HTML généré dans le fichier twig
        if ($template !== null) {
            $html = $this->renderView($template, $data);
        }

//        $html = $this->renderView('@Modules/quotation/templates/admin/pdf/pdf_quotation.html.twig', $data);

        // Chargement de la page HTML
        $dompdf->loadHtml($html);

        // Format du document PDF
        $dompdf->setPaper('A4', 'landscape');

        // Rendu du HTML en format PDF
        $dompdf->render();

        // Génère le PDF dans le navigateur (ne pas forcer le téléchargement)
        $dompdf->stream($fileName . '.pdf', [
            "Attachment" => false
        ]);
    }


}
