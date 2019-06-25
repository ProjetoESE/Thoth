const tokenizer = function(text){

	const dic = {}
	
	text = text.toLowerCase()
	.replace(/\d/g, '')
	.replace(/\b[a-z]{1,2}\b/g, '')
	.replace(/[\W_]+/g, ' ')
	.replace(/\s+/gm, ' ')
	.trim()
	.split(' ');


	for(let i = 0; i < text.length; i++){
		if( text[i] in dic )
			dic[text[i]] += 1;
		else
			dic[text[i]] = 1;
	}
	
	return dic;

}
