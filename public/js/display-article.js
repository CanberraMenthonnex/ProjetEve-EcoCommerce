var suppArticle = document.getElementById("suppArticle");
suppArticle.onclick = ()=> suprpArticle(this);

function supprArticle(e){
        var suppression = e.parentNode;
        suppression.style.display = "none";
    }