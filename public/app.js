document.addEventListener('DOMContentLoaded', function () {
    const popup = document.querySelector('.popup');

    setTimeout(() => {
        popup.style.height = '0';
        popup.style.top = '-300px';
    }, 1000);

    const angka1 = document.querySelector('.angka1');
    const angka2 = document.querySelector('.angka2');
    const angka3 = document.querySelector('.angka3');
    let index = 0
    let index2 = 0
    let index3 = 0
    function incrementAngka() {
        if (index <= 13) {
            angka1.innerHTML = index
            index ++
            setTimeout(incrementAngka, 50)
        }
    }
    incrementAngka()

    setInterval(() => {

        incrementAngka()
        index = 0
    }, 1500);

    function incrementAngka2() {
        if (index2 <= 2) {
            angka2.innerHTML = index2
            index2++
            setTimeout(incrementAngka2, 100)
        }
    }
    incrementAngka2()

    setInterval(() => {

        incrementAngka2()
        index2 = 0
    }, 1500);
    function incrementAngka3() {
        if (index3 <= 839) {
            angka3.innerHTML = index3
            index3 += 100
            setTimeout(incrementAngka3, 100)
        }
    }
    incrementAngka3()

    setInterval(() => {

        incrementAngka3()
        index3 = 0
    }, 1500);

    
});
let iconMenu = document.querySelector('.icon-menu');
let linkNav = document.querySelector('.link-nav-hp');
let isClik = false;
iconMenu.addEventListener('click', function () {
    if (isClik) {
        linkNav.style.left = '-120%'
        isClik = false
    } else {
        linkNav.style.left = '0%'
        isClik = true
    }
})