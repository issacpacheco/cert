'use strict';

$( function () {

	// ------------------------------------------------------- //
	//   Make a sticky navbar on scrolling
	// ------------------------------------------------------ //
	$( window ).scroll( function () {

		var body = $( 'body' ),
			stickyNavbar = $( 'nav.navbar-sticky' ),
			header = $( '.header' ),
			topbar = $( '.top-bar' );

		function makeItFixed( x ) {
			if ( $( window ).scrollTop() > x ) {
				//console.log('cambiar imagen blanca');
				$( '#logo' ).attr( 'src', 'images/logo_bco.png' );
				stickyNavbar.addClass( 'fixed-top' );
				if ( !header.hasClass( 'header-absolute' ) ) {
					body.css( 'padding-top', stickyNavbar.outerHeight() );
					body.data( 'smooth-scroll-offset', stickyNavbar.outerHeight() );

				}
			} else {
				stickyNavbar.removeClass( 'fixed-top' );
				body.css( 'padding-top', '0' );
				//console.log('cambiar imagen normal');
				$( '#logo' ).attr( 'src', 'images/logo.png' );
			}
		}

		// if .top-bar exists, affix the navbar when we scroll past .top-bar
		// else affix it immediately
		if ( stickyNavbar.length > 0 && topbar.length > 0 ) {
			makeItFixed( topbar.outerHeight() );
		} else if ( stickyNavbar.length > 0 ) {
			makeItFixed( 0 );
		}
	} );


	// ------------------------------------------------------- //
	//   Scroll to top button
	// ------------------------------------------------------ //

	$( window ).on( 'scroll', function () {
		if ( $( window ).scrollTop() >= 1500 ) {
			$( '#scrollTop' ).fadeIn();
		} else {
			$( '#scrollTop' ).fadeOut();
		}
	} );


	$( '#scrollTop' ).on( 'click', function () {
		$( 'html, body' ).animate( {
			scrollTop: 0
		}, 1000 );
	} );


	// ------------------------------------------------------- //
	//   Bootstrap tooltips
	// ------------------------------------------------------- //

	$( '[data-toggle="tooltip"]' ).tooltip();

	// ------------------------------------------------------- //
	//   Smooth Scroll
	// ------------------------------------------------------- //

	var smoothScroll = new SmoothScroll( 'a[data-smooth-scroll]', {
		offset: 80
	} );

} );


$( ".bg-hover-white" ).hover(
	function () {
		$( '#logo' ).attr( 'src', 'images/logo_bco.png' );
	},
	function () {
		if ( $( 'nav' ).hasClass( 'fixed-top' ) ) {
			$( '#logo' ).attr( 'src', 'images/logo_bco.png' );
		} else {
			$( '#logo' ).attr( 'src', 'images/logo.png' );
		}
	}
);

var counter = 4;
var c = 1;
var texto = [ 'SEGURIDAD INDUSTRIAL', 'PROTECCIÓN CIVIL', 'MEDIO AMBIENTE', 'CAPACITACIÓN' ];
var interval = setInterval( function () {
	//console.log(counter);
	counter--;
	if ( c == 4 ) {
		c = 0;
	}
	if ( counter == 0 ) {
		counter = 3;
		//console.log(texto[c]);
		//console.log(c);
		$( "#texto" ).animate( {
			opacity: 0
		}, 550, function () {
			$( "#texto" ).text( texto[ c ] ).animate( {
				opacity: 1
			}, 550 );
			c++;
		} );

	}
}, 1000 );

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

		// Code for the Validator
$( '#FormContacto' ).validate( {
	errorElement: 'span', //default input error message container
	errorClass: 'text-danger', // default input error message class
	focusInvalid: true, // do not focus the last invalid input
	onfocusout: function ( element ) {
		this.element( element );
	}, //Validate on blur
	onkeyup: function ( element ) {
		this.element( element );
	}, //Validate on keyup
	focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
	ignore: "",
	rules: {
		nombre: {
			required: true,
			minlength: 3
		},
		telefono: {
			required: true,
		},
		correo: {
			required: true,
			minlength: 3,
			email: true
		},
	},

	messages: { // custom messages for radio buttons and checkboxes

	},

	invalidHandler: function ( event, validator ) { //display error alert on form submit   

	},

	highlight: function ( element ) { // hightlight error inputs
		$( element ).closest( '.form-group' ).addClass( 'has-error has-feedback' ); // set error class to the control group
	},

	unhighlight: function ( element ) { // hightlight error inputs
		$( element ).closest( '.form-group' ).removeClass( 'has-error has-feedback' ); // set error class to the control group
	},

	success: function ( label ) {
		label.closest( '.form-group' ).removeClass( 'has-error has-feedback' );
		label.remove();
	},

	errorPlacement: function ( error, element ) {
		$( element ).parent( 'div' ).addClass( 'has-error' );
	},

	submitHandler: function ( form ) {
		$( '#boton_enviar' ).prop( 'disabled', true );
		Enviar();
	}

} );

function Enviar()
{
	// Enviamos el formulario usando AJAX
	$.ajax({
		type: 'POST',
		url: "ajax/contacto",
		data: $('#FormContacto').serialize(),
		// Mostramos un mensaje con la respuesta de PHP
		success: function(data) 
		{
			console.log('data:'+data);
			$('#mensaje_contacto').empty();
			switch (data)
			{
				case "1":
				{
					$('#mensaje_contacto').append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>Gracias por tu mensaje, pronto nos comunicaremos contigo.</div>');
					$('#FormContacto').closest('form').find("input[type=text], input[type=email], input[type=tel], textarea").val("");
					break;	
				}
				case "2":
				{
					$('#mensaje_contacto').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>Ocurrió un error en el sitema, por favor intentelo de nuevo.</div>');
					break;	
				}
				case "3":
				{
					$('#mensaje_contacto').append('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>Por favor, escribe una dirección de correo válida.</div>');
					break;	
				}
				case "4":
				{
					$('#mensaje_contacto').append('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>Si eres humano, por favor intenta de nuevo.</div>');
					break;	
				}

			}
			$( '#boton_enviar' ).prop( 'disabled', false );
			$("#mensaje_contacto").slideDown(300).delay(10000).slideUp(300);
		}
	})        
	return false;
}

$( document ).ready(function() {
	console.log( "ready!" );
});

$( window ).on( "load", function() {
	console.log( "window loaded" );
});
