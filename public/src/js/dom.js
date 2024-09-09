const menu = document.querySelector('#menu');
const sidebar = document.querySelector('.sidebar');
const clsbtn = document.querySelector('.clsbtn');

menu.addEventListener('click',  () => {
    sidebar.classList.toggle('active');
});

document.addEventListener('click', function (e) {
    if(!menu.contains(e.target) && !sidebar.contains(e.target)) {
        sidebar.classList.remove('active');
    }
});

clsbtn.addEventListener('click', () => {
    sidebar.classList.remove('active');
})

const url = 'https://jualhebel.shop/api/map'
async function map() {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        const data = await response.json();
        document.getElementById('map').innerHTML = data[0].map
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
}

map();

