window.onload = function(){
var lesLiens = document.getElementsByClassName('bi')
console.log("dehors")

/* on parcourt les éléments que l'on vient de récupérer et pour chacun d'entre
eux on écoute l'événement click et on appelle la fonction majLike lorsque
l'événement se produit */

for (var i = 0; i < lesLiens.length; i++) {
  
    lesLiens[i].addEventListener("click", function updateBtn(event) {
        console.log(event.target.className)
        console.log("dedans")
        if (event.target.className =="bi bi-star"){
            console.log("if")
            event.target.className = "bi bi-star-fill"; 
        }
        else if (event.target.className =="bi bi-star-fill"){
            console.log("else")
            event.target.className = "bi bi-star"; 
        }

        event.preventDefault()

        let baliseA = event.target.parentNode
        console.log(event.target.childNode)
        let url = baliseA.getAttribute('href')
        fetch(url).then(function (response) {
            if (response.ok)
                return response.json();
            else console.error("retour du serveur", response.status)
    })
    })
}
}



// function startclick(elm,val,mode){

//     console.log(elm)
//     // Create an XMLHttpRequest object
//     const xhttp = new XMLHttpRequest();

//     // Define a callback function
//     xhttp.onload = function() {
//         // Here you can use the Data
//         if(mode==0){
//             elm.classList.remove("bi-star");
//             elm.classList.add("bi-star-fill");
//         }
//         else if (mode==1){
//             elm.classList.remove("bi-star-fill");
//             elm.classList.add("bi-star");
            
//         }
//     }

// // Send a request
// xhttp.open("GET", val);
// xhttp.send();
//     //xhr 
//     //->ok
//       //add class
// }