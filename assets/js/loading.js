const exibe_loading = (remover_automatico = null) => {
	/*
		Exibe loading GIF
		@param remover_automatico = Intenger - número em milisegundos para remover o loading.
	*/

	if (!Number.isInteger(remover_automatico) && remover_automatico) {
		throw "argument should be an integer";
		return;
	}

	if( document.getElementById("loading") ){
		return;
	}

	const bg = document.createElement('div');
	bg.id = "loading";
	bg.style.zIndex = "9999";
	bg.style.display = "flex";
	bg.style.alignItems = "center";
	bg.style.justifyContent = "center";
	bg.style.backgroundColor = "rgba(0,0,0,0.5)";
	bg.style.width = "100%";
	bg.style.height = "100%";
	bg.style.position = "absolute";
	bg.style.top = 0;
	bg.style.left = 0;

	const loading_gif = new Image();
	loading_gif.src = base_url + "assets/img/loading.gif";
	loading_gif.onload = () => {
		bg.appendChild(loading_gif);
	}

	document.body.appendChild(bg);


	if (remover_automatico) {
		setTimeout(remove_loading, remover_automatico);
	}

};


const remove_loading = () => {
	/*
		Remove loading GIF
	*/
	const bg = document.getElementById("loading");
	if( bg )
		bg.parentNode.removeChild(bg);
};
