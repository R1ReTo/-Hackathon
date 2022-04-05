var lesLiens = document.getElementsByTagName("i") 


/* on parcourt les éléments que l'on vient de récupérer et pour chacun d'entre
eux on écoute l'événement click et on appelle la fonction majLike lorsque
l'événement se produit */
console.log(lesLiens)

for (var i = 0; i < lesLiens.length; i++) {
  
    lesLiens[i].addEventListener("click", updateBtn)
  
    function updateBtn(event) {
    
        event.preventDefault()
        if (this.className ="bi bi-star"){
            this.className += "bi bi-star-fill"; 
        }
        else {
            this.className += "bi bi-star"; 
        }
        
        
    
    
    }
}                   



