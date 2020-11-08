function getObj(objID)
{
    if (document.getElementById) {return document.getElementById(objID);}
    else if (document.all) {return document.all[objID];}
    else if (document.layers) {return document.layers[objID];}
}

var ie4=document.all
var ns6=document.getElementById&&!document.all
cobj=getObj("button1");

var i = false;
function moveIt(){
    if(i == true) { i = false;}
    else { i = true; }
    y=Math.floor(Math.random()*301);
    x=Math.floor(Math.random()*401);
    if (ie4){
        cobj.style.top  = y;
        cobj.style.left = x;
    }
    else if (ns6){
        cobj.style.top  = y+"px";
        cobj.style.left = x+"px";
    }
    if(i == true){document.getElementById("button").style.backgroundColor = "red";}
    else{document.getElementById("button").style.backgroundColor = "blue";}
}