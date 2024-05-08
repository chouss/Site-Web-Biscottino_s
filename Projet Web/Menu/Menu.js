document.addEventListener('DOMContentLoaded', (event) => {
    var images = ['../assets/Cake.jpg', '../assets/cake2.jpg', '../assets/gift.jpg']; 
    var currentIndex = 0;

    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length; 
        document.querySelector('.bottom').style.backgroundImage = 'url(' + images[currentIndex] + ')';
    }, 5000); 
});