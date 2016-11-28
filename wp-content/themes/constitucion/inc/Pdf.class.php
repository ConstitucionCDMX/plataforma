<?php $directory = get_template_directory();
include $directory.'/inc/dompdf/dompdf_config.inc.php';

class Pdf {

	public function __construct()
	{

	}

	public static function generateCertificate( $nombre = '', $apellidos = '', $referencia = '' )
	{
		$directory = get_template_directory();
		ob_start();
	  	include $directory.'/templates/htmlPdfCertificate.php';
	  	$html = ob_get_clean();
		$mipdf = new DOMPDF();
		 
		$mipdf->set_paper("A4", "landscape");
		$mipdf->load_html( utf8_decode( utf8_encode($html) ) );
		$mipdf->render();
		$mipdf->stream('Certificado-Constitucion-CDMX.pdf', array("Attachment"=>0));
	}


	public static function generateGuia()
	{
		$guia = get_page_by_path('guia-para-compartir-el-texto');
	  	$html = utf8_decode($guia->post_content);
		$mipdf = new DOMPDF();
		 
		$mipdf->set_paper("A4", "portrait");
		$mipdf->load_html( $html );
		$mipdf->render();
		$mipdf->stream('guia-para-compartir-el-texto.pdf', array("Attachment"=>0));
	}

}
