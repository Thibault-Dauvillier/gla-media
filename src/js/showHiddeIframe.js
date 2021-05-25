
function chgAddrP(){

    if(document.getElementById("chgAddrP").hidden){
        document.getElementById("chgAddrP").hidden=false;
    }
    else if(!document.getElementById("chgAddrP").hidden){
        document.getElementById("chgAddrP").hidden=true;
    }
}


function chgTel(){

    if(document.getElementById("chgTel").hidden){
        document.getElementById("chgTel").hidden=false;
    }
    else if(!document.getElementById("chgTel").hidden){
        document.getElementById("chgTel").hidden=true;
    }
}

function reAbo(){
    if(document.getElementById("reAbo").hidden){
        document.getElementById("reAbo").hidden=false;
    }
    else if(!document.getElementById("reAbo").hidden){
        document.getElementById("reAbo").hidden=true;
    }
}

function chMdp(){
    if(document.getElementById("chgMdp").hidden){
        document.getElementById("chgMdp").hidden=false;
    }
    else if(!document.getElementById("chgMdp").hidden){
        document.getElementById("chgMdp").hidden=true;
    }
}

function re(){
    location.reload()
}

window.onmessage = function(event){
    if (event.data == 'chgAddrP') {
        location.reload();
        alert("Votre Addresse a bien ete changé")
    }
    else if(event.data == 'chgNumTel'){
        location.reload();
        alert("Votre numero de telephone a bien ete changé")
    }
    else if(event.data == 'reAbo'){
        location.reload();
        alert("Votre abonnement a bien ete prolongé")
    }
};
