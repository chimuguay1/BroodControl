const navToggle = document.querySelector(".navbar-toggler");
const navMenu = document.querySelector(".collapse");
let bandera = false;

navToggle.addEventListener("click",  ()=>{
    if (bandera === false){
        navMenu.setAttribute( "class", "collapse navbar-collapse show")
        bandera = true;
    }else{
        navMenu.setAttribute( "class", "collapse navbar-collapse")
        bandera = false;
    }
    

})
