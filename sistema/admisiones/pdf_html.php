<?php
//function hex2dec
//returns an associative array (keys: R,G,B) from
//a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['V']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
class PDF_HTML extends FPDI {
	//variables of html parser
	var $B;
	var $I;
	var $U;
	var $HREF;
	var $fontList;
	var $issetfont;
	var $issetcolor;

	function PDF_HTML( $orientation = 'P', $unit = 'mm', $format = 'A4' ) {
		//Call parent constructor
		$this->FPDF( $orientation, $unit, $format );
		//Initialization
		$this->B = 0;
		$this->I = 0;
		$this->U = 0;
		$this->HREF = '';
		$this->fontlist = array( 'arial', 'times', 'courier', 'helvetica', 'symbol' );
		$this->issetfont = false;
		$this->issetcolor = false;
	}

	function WriteHTML( $html, & $parsed ) {
		//HTML parser
		//$html = strip_tags( $html, "<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>" ); //supprime tous les tags sauf ceux reconnus
		//$html = str_replace( "\n", ' ', $html ); //remplace retour à la ligne par un espace
		$a = preg_split( '/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE ); //rompe la cadena con las etiquetas
		foreach ( $a as $i => $e ) {
			if ( $i % 2 == 0 ) {
				//Text
				if ( $this->HREF )
					$this->PutLink( $this->HREF, $e );
				else
					$parsed .= stripslashes( txtentities( $e ) );
			} else {
				//Tag
				if ( $e[ 0 ] == '/' )
					$this->CloseTag( strtoupper( substr( $e, 1 ) ) );
				else {
					//Extract attributes
					$a2 = explode( ' ', $e );
					$tag = strtoupper( array_shift( $a2 ) );
					$attr = array();
					foreach ( $a2 as $v ) {
						if ( preg_match( '/([^=]*)=["\']?([^"\']*)/', $v, $a3 ) )
							$attr[ strtoupper( $a3[ 1 ] ) ] = $a3[ 2 ];
					}
					$this->OpenTag( $tag, $attr );
				}
			}
		}
	}

	function OpenTag( $tag, $attr ) {
		//Opening tag
		switch ( $tag ) {
			case 'strong':
				$this->SetStyle( 'B', true );
				break;
			case 'em':
				$this->SetStyle( 'I', true );
				break;
			case 'b':
			case 'i':
			case 'u':
				$this->SetStyle( $tag, true );
				break;
			case 'a':
				$this->HREF = $attr[ 'HREF' ];
				break;
			case 'img':
				if ( isset( $attr[ 'src' ] ) && ( isset( $attr[ 'width' ] ) || isset( $attr[ 'height' ] ) ) ) {
					if ( !isset( $attr[ 'width' ] ) )
						$attr[ 'width' ] = 0;
					if ( !isset( $attr[ 'height' ] ) )
						$attr[ 'height' ] = 0;
					$this->Image( $attr[ 'src' ], $this->GetX(), $this->GetY(), px2mm( $attr[ 'width' ] ), px2mm( $attr[ 'height' ] ) );
				}
				break;
			case 'tr':
			case 'blockquote':
			case 'br':
				$this->Ln( 5 );
				break;
			case 'p':
				$this->Ln( 10 );
				break;
			case 'font':
				if ( isset( $attr[ 'color' ] ) && $attr[ 'color' ] != '' ) {
					$coul = hex2dec( $attr[ 'color' ] );
					$this->SetTextColor( $coul[ 'R' ], $coul[ 'V' ], $coul[ 'B' ] );
					$this->issetcolor = true;
				}
				if ( isset( $attr[ 'face' ] ) && in_array( strtolower( $attr[ 'face' ] ), $this->fontlist ) ) {
					$this->SetFont( strtolower( $attr[ 'face' ] ) );
					$this->issetfont = true;
				}
				break;
		}
	}

	function CloseTag( $tag ) {
		//Closing tag
		if ( $tag == 'strong' )
			$tag = 'b';
		if ( $tag == 'em' )
			$tag = 'i';
		if ( $tag == 'b' || $tag == 'i' || $tag == 'u' )
			$this->SetStyle( $tag, false );
		if ( $tag == 'a' )
			$this->HREF = '';
		if ( $tag == 'font' ) {
			if ( $this->issetcolor == true ) {
				$this->SetTextColor( 0 );
			}
			if ( $this->issetfont ) {
				$this->SetFont( 'arial' );
				$this->issetfont = false;
			}
		}
	}

	function SetStyle( $tag, $enable ) {
		//Modify style and select corresponding font
		$this->$tag += ( $enable ? 1 : -1 );
		$style = '';
		foreach ( array( 'b', 'i', 'u' ) as $s ) {
			if ( $this->$s > 0 )
				$style .= $s;
		}
		$this->SetFont( '', $style );
	}

	function PutLink( $URL, $txt ) {
		//Put a hyperlink
		$this->SetTextColor( 0, 0, 255 );
		$this->SetStyle( 'U', true );
		$this->Write( 5, $txt, $URL );
		$this->SetStyle( 'U', false );
		$this->SetTextColor( 0 );
	}

} //end of class
?>