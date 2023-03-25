var images = ["greenwich_park.png", 
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
            currentPage--;
            gallery.src = "./images/" + images[currentPage];
    }
    if (currentPage==-1) {
        gallery.src="./images/donut1.png"
    }
}
function nextFx() { 
        if (currentPage!=images.length-1) {
            currentPage++;
            gallery.src = "./images/" + images[currentPage];
        }
}




