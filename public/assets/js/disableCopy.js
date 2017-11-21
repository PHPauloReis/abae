function disableCopy(){
 	var s, r;
 	var copyright = 'O material jornalístico produzido pela Agroin Comunicação é protegido por lei. Para compartilhar este conteúdo, utilize o link: <a href="'+window.location.href+'">'+window.location.href+'</a>';
	var status = buscaCookie();

	if(!status){
	 	$('.noticia_interna').bind('copy', function () {
	 		//cria um span temporario se não existir
	 		if(!$("#tempbox").length)
	 			$('<span>').attr('id','tempbox').appendTo('body').css('font-size','0');

	 		var tempbox = document.getElementById ("tempbox");
	 		$('#tempbox').html(copyright);
	   		 if (typeof window.getSelection !== 'undefined') {
	 			s  = window.getSelection();
	 			s.removeAllRanges();
	 			s.selectAllChildren(tempbox);
	      		r  = s.getRangeAt(0);

	 		}else{	
	      		s = document.selection.createRange();
	 			document.selection.empty();
	     		s.moveToElementText( tempbox) ;
	 			r = s.pasteHTML(copyright);
	 			s.select();
	 		} 		
	    });
 	}
 }