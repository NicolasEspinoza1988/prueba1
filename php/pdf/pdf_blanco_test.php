<?php
    session_start();
    $_SESSION['curso_select'] = $_POST['curso_select'];
    $_SESSION['semestre_select'] = $_POST['semestre_select'];
	//ob_start guardará en un búfer lo que esté
	//en la ruta del include.
	ob_start();
   // include(dirname(__FILE__).'/vistas/pdf_blanco.php');
   $ruta=($_SESSION['semestre_select'] === 'S1' ? '/vistas/informe_pdf_test.php' : '/vistas/informe_s2_pdf_curso.php');
   include(dirname(__FILE__).$ruta);
    //En una variable llamada $content se obtiene lo que tenga la ruta especificada
    //NOTA: Se usa ob_get_clean porque trae SOLO el contenido
    //Evitará este error tan común en FPDF:
    //FPDF error: Some data has already been output, can't send PDF
    $content = ob_get_clean();

    //Se obtiene la librería
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    /* Las lineas siguientes siempre serán las mismas
     * A mi parecer no hay mucho que explicar. Se explican
     * por sí solas :D
     * */
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); //Configura la hoja
        $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
        $html2pdf->writeHTML($content); //Se escribe el contenido 
        $html2pdf->Output('mipdf.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
