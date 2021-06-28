let btn1= document.getElementById('btn1'),
btn2= document.getElementById('btn2'),
btn3= document.getElementById('btn3'),
container1 = document.getElementById('container1'),
container2 = document.getElementById('container2'),
container3 = document.getElementById('container3');


btn1.addEventListener("click", () => {
    container2.style.display = "none";
    container3.style.display = "none";
    container1.style.display = "block";
}); 

btn2.addEventListener("click", () => {
    container1.style.display = "none";
    container3.style.display = "none";
    container2.style.display = "block";
}); 

btn3.addEventListener("click", () => {
    container1.style.display = "none";
    container2.style.display = "none";
    container3.style.display = "block";
}); 
