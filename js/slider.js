//começo do script 
    var noticias = new Array(Array(),Array());
    var path = "img/img", ext = ".jpg"; //localização parcial da imagem |img/img.jpg|
    var body = document.body;
    var div = document.getElementById("slider");
       
        for (let index = 0; index <6; index++) {

            var imgsrc = path + (index+1) + ext; //concateno pra virar o local da imagem src="img/img1.jpg"
            
            var imgTitle = "titulo da imagem "+(index+1);
            var imgDesc = "descrição imagem "+(index+1);
                noticias[0][0] = imgTitle;
                noticias[0][1] = imgDesc;
                noticias[0][2] = imgsrc;

           // alert(noticias);

            var dive = document.createElement('div');
                dive.classList = "mySlides fade";
                dive.align = "center";
                    
            var img = document.createElement('img');
                img.src = noticias[0][2];
                img.style = "heigth:30%";
                img.style = "width:75%";
        
            var divi = document.createElement('div');
                divi.classList = "text";
                divi.innerText = noticias[0][1];
            
            var title = document.createElement('div');
                title.classList = "titulo";
                title.innerText =  noticias[0][0];   

            var span = document.createElement('span');
                span.classList = "dot";
                span.align = "center"
                span.style = "display:none";
            
            body.appendChild(div);
            div.appendChild(dive);
            dive.appendChild(img);
            dive.appendChild(divi);
            dive.appendChild(title);
            dive.appendChild(span);
        }
//fim do script 
//Começo script slider
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000);
}
//Fim script slider