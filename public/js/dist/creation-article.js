class FileReaderInput extends HTMLElement {
    constructor() {
        super()
    }

    connectedCallback() {
        this.name = this.getAttribute("name")
        this.classNames = this.getAttribute("class")
        this.baseClassName = this.getAttribute('baseclass')
        this.labelContent = this.innerHTML
        this._generateElement()
        this.input.addEventListener("change", this._onChange.bind(this))
    }

    _generateElement() {
        this.innerHTML = ""
        this.htmlFor = this.name
        this.classList.add("file-reader-input")

        this.span = document.createElement("span")
        this.span.innerHTML = this.labelContent

        this.label = document.createElement("label")
        this.label.htmlFor = this.name
        this.label.appendChild(this.span)
        this.label.classList.add(this.baseClassName + '--label')

        this.input = document.createElement("input")
        this.input.name = this.name
        this.input.id = this.name
        this.input.type = 'file'
        this.input.classList.add(this.baseClassName  + '--input')

        this.preview = document.createElement('img')
        this.preview.classList.add(this.baseClassName + '--preview')

        this.label.appendChild(this.preview)
        this.appendChild(this.label)
        this.appendChild(this.input)
    }

    _onChange(e) {
        const input = e.target
        if (!input.files || !input.files[0]) return
        const reader = new FileReader()
        console.log(this.preview)
        reader.onload = (e) => {
            console.log(this)
            this.preview.src = e.target.result
            this.span.innerHTML = ""
        }

        reader.readAsDataURL(input.files[0])
    }
}

customElements.define("file-reader", FileReaderInput)


/************************</WYSIWYG>***************************/

var gras = document.getElementById("gStyle");
gras.onclick = ()=> commande('bold');
var italique = document.getElementById("iStyle");
italique.onclick = ()=> commande('italic');
var souligner = document.getElementById("sStyle");
souligner.onclick = ()=> commande('underline');
var lien = document.getElementById("linkStyle");
lien.onclick = ()=> commande('createLink');
var createProduct = document.getElementById("create_product");
createProduct.onclick = ()=> resultat();


function commande(nom, argument) {
	if (typeof argument === 'undefined') {
		argument = '';
	}switch (nom) {
	case "createLink":
		argument = prompt("Quelle est l'adresse du lien ?");
	break;
	}

	document.execCommand(nom, false, argument);

	
}
// How to get the WYSIWYG html

function resultat() {
	document.getElementById("depot").value = document.getElementById("editor").innerHTML;
}


/**************************</WYSIWYG>******************************/


/*
********************<IMAGE PREVIEW>**********************

const imgFile = document.getElementById("imgFile");
const prevuConteneur = document.getElementById("imgPreview");
const prevuImage = prevuConteneur.querySelector(".imagePrevuImage");
const ImagePrevuDefault = prevuConteneur.querySelector(".ImagePrevuDefault");

imgFile.addEventListener("change", function(){
	const file = this.files[0];

	if (file) {
		const read = new FileReader();

		ImagePrevuDefault.style.display = "none";
		prevuImage.style.display = "block";
		read.addEventListener("load", function(){
			prevuImage.setAttribute("src", this.result);
		});
		
		read.readAsDataURL(file);

	}else{
		ImagePrevuDefault.style.display = null;
		prevuImage.style.display = null;
		prevuImage.setAttribute("src", "");
	}
});

*/

/*********************</IMAGE PREVIEW>***********************/