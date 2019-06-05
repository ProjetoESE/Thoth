async function getRelatedTerms(term){
	/* key_words - async function - consulta a wikipedia por termos similares ao pesquisado
	
	TODO: salvar no banco os resultados para evitar novas consultas e agilizar a busca
	
	args - string term - termo a ser pesquisado
	
	return - string array - termos relacionados a pesquisa
	*/
	
	if( !term ) return null;
		
	const conf = {method: "GET"};
	let request, data;
	
	request = await fetch("https://en.wikipedia.org/w/api.php?origin=*&action=query&list=search&srsearch="+term+"&srlimit=1&format=json", conf);
	
	data = await request.json();
	
	const pageid = data.query.search[0].pageid;
	
	request = await fetch("https://en.wikipedia.org/w/api.php?origin=*&action=parse&prop=sections&format=json&pageid="+pageid, conf);
	
	data = await request.json();
	
	sections = data.parse.sections;

	let index = -1;
	
	for(let i = 0; i < sections.length; i++){
		if( sections[i].anchor.match(/See\_also/) ){
			index = sections[i].index;
			break;
		}
	}

	if( index < 0 ) return null;
	
	request = await fetch("https://en.wikipedia.org/w/api.php?origin=*&action=parse&prop=links&format=json&pageid="+pageid+"&section="+index, conf);
	
	data = await request.json();
	
	terms = data.parse.links.map( i => i["*"].replace(/.*\:/, "") );

	return terms;
}

/*
exemplo de uso
terms = await getRelatedTerms("systematic review");
*/

