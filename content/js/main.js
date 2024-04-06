const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

function handleSlider() {
    let slickTrack = $('.slick-track');
    let slickSlider = $$('.slick-slider');
    let slickDots = $$('.slick-dots li');
    let nextBtn = $('.slick-next');
    let prevBtn = $('.slick-prev');

    let currentIndex = 0;
    nextBtn.onclick = function () {
        if (currentIndex === slickSlider.length - 1) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }
        reLoadSlider();
    }
    prevBtn.onclick = function () {
        if (currentIndex === 0) {
            currentIndex = slickSlider.length;
        } else {
            currentIndex--;
        }
        reLoadSlider();
    }

    function reLoadSlider() {
        let checkLeft = slickSlider[currentIndex].offsetLeft;
        slickTrack.style.left = -checkLeft + 'px';

        let activeDot = $('.slick-dots li.active');
        activeDot.classList.remove('active');
        slickDots[currentIndex].classList.add('active');

        clearInterval(setInterVal);
        setInterVal = setInterval(function () {
            nextBtn.click();
        }, 3000)
    }

    let setInterVal = setInterval(function () {
        nextBtn.click();
    }, 3000)
}

handleSlider();


function backToTopBtn() {
    const backToTopBtn = $('.back-to-top');
    document.addEventListener('scroll', function () {
        const scrollTotal = document.documentElement.scrollHeight - document.documentElement.clientHeight;

        if (document.documentElement.scrollTop / scrollTotal >= 0.1) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    backToTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        document.documentElement.scrollTo({
            top: 0,
            timeout: setTimeout(function () { }, 500),
            behavior: 'smooth',
        })
    })
}

backToTopBtn();
