
const cria_pdf_view = (endereco, toolbar = 1, navpanes = 0, scrollbar = 1)=> {
	/*
		Cria um objeto do tipo pdf viewer
		@param endereco = String - Endereço terminado em .pdf do arquivo
		@param toolbar = 1 | 0 - 1 para aparecer toolbar no visualizador
		@param navpanes = 1 | 0 - 1 para aparecer navpanes no visualizador
		@param scrollbar = 1 | 0 - 1 para aparecer scrollbar no visualizador
	*/
	
	if( !endereco.match(/.+\.pdf$/) ){
		console.log( "O endereço deveria apontar para um arquivo .pdf");
	}
	
	const obj = document.createElement('object');
	obj.data = endereco+"#toolbar="+toolbar+"&navpanes="+navpanes+"&scrollbar="+scrollbar;
	obj.type = "application/pdf";
	obj.width = "100%";
	
	const emb = document.createElement('embed');
	emb.src = endereco+"#toolbar="+toolbar+"&navpanes="+navpanes+"&scrollbar="+scrollbar;
	emb.type = "application/pdf";
	
	obj.appendChild( emb );
	
	return obj;
};
