function openTab(name) {
    var i;
    var x = document.getElementsByClassName("openTab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(name).style.display = "block"; 
}