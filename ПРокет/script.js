let bg = document.querySelector('.mouse-parallax-bg');
window.addEventListener('mousemove', function(e) {
    let x = e.clientX / window.innerWidth;
    let y = e.clientY / window.innerHeight;  
    bg.style.transform = 'translate(-' + x * 50 + 'px, -' + y * 50 + 'px)';
});
 
menu.onclick = function myFunction () {
    var t =document.getElementById('MyTopnav');
    if(t.className === "topnav") {
        t.className += " responsiv";
    }
    else {
        t.className = "topnav";
    }
};