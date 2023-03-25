var images = ["greenwich-park.png", 
"kew_gardens.png",
"QMUL.png",
"tate_britain.png"]

var gallery = document.getElementById("gallery");
var prevButton = document.getElementById("prev");
var nextButton = document.getElementById("next");

var currentPage = -1; 

prevButton.addEventListener('click', prevFx);
nextButton.addEventListener('click', nextFx);

function prevFx() { 
    if (currentPage>-1) {
        if (currentPage==0) {
            gallery.src = "./images/donut1.png"
        }
        else {
            gallery.src = "./images/"+images[currentPage-1];
        }
    }
}
function nextFx() { 
    if (currentPage<images.length-1) {
        if (currentPage==images.length-1) {
            gallery.src = "./images/" + images[images.length-1];
        }
        else {
            gallery.src = "./images/" + images[currentPage+1];
        }
        
    }
}




