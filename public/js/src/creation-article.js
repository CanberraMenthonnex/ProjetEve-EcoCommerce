

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