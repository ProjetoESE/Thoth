class Extraction_Answer {
	constructor(id, description, type, options) {

		this.id = id;
		this.description = description;
		this.type = type;
		this.options = options;
		this.answer = null;
	}

	show() {
		let parent = document.getElementById('extraction_questions');

		let id = document.createElement('strong');
		id.innerText = this.id;

		let label = document.createElement('span');

		label.appendChild(id);
		parent.appendChild(label);

		let description = document.createElement('label');
		description.innerText = this.description;
		parent.appendChild(description);

		switch (this.type) {
			case "Text":
				this.answer = document.createElement('textarea');
				this.answer.classList.add("form-control");
				this.answer.classList.add("col-md-12");
				parent.appendChild(this.answer);
				break;
			case "Multiple Choice List":
				this.answer = document.createElement('div');
				this.answer.classList.add("form-check");
				this.answer.classList.add("form-check-inline");
				this.answer.classList.add("col-md-12");

				for (let op of this.options) {

					let input = document.createElement('input');
					input.classList.add("form-check-input");
					input.type = "checkbox";
					input.value = op;
					input.id = op;

					let label = document.createElement('label');
					label.for = input.id;
					label.classList.add("form-check-label");
					label.innerText = op;

					this.answer.appendChild(input);
					this.answer.appendChild(label);
				}

				parent.appendChild(this.answer);
				break;
			case "Pick One List":
				this.answer = document.createElement('select');
				this.answer.classList.add("form-control");
				this.answer.classList.add("col-md-12");

				let option = document.createElement('option');
				option.value = "";
				this.answer.appendChild(option);

				for (let op of this.options) {

					option = document.createElement('option');
					option.value = op;
					option.id = op;
					option.innerText = op;

					this.answer.appendChild(option);
				}
				parent.appendChild(this.answer);
				break;
		}
	}

}
