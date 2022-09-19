let userSection  = document.querySelector(".user-section")
let isShow= true;
function showHidden(){
    if(isShow){
        userSection.style.display ="none";
        isShow = false;
    }
    else{
        userSection.style.display ="block";
        isShow = true;
    }
}


let showtable  = document.querySelector(".table")
let ishide= false;
function showHidden(){
    if(isShow){
        showtable.style.display ="block";
        ishide = true;
    }
    else{
        showtable.style.display ="none";
        ishide = false;
    }
}