// dark mode 
const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
});


// pop up form upload berkas
function openFormA1() {
    document.getElementById("myFormA1").style.display = "block";
}

function openFormA2() {
    document.getElementById("myFormA2").style.display = "block";
}

function openFormA3() {
    document.getElementById("myFormA3").style.display = "block";
}

function closeFormA1() {
    document.getElementById("myFormA1").style.display = "none";
}

function closeFormA2() {
    document.getElementById("myFormA2").style.display = "none";
}

function closeFormA3() {
    document.getElementById("myFormA3").style.display = "none";
}