// jsテスト
// $(function() {
//     alert('test');
// });


// imgスライダー
$(function () {
    $('.slideshow img:nth-child(n+2)').hide();
    setInterval(function() {
        $(".slideshow img:first-child").fadeOut(2000);
        $(".slideshow img:nth-child(2)").fadeIn(2000);
        $(".slideshow img:first-child").appendTo('.slideshow');
    }, 4000);
});


// scroll-fadeIn
$(function () {
    $(window).scroll(function() {
        $('.fade-in').each(function(){
            const elemPos = $(this).offset().top;
            // 位置を取得
            const scroll = $(window).scrollTop();
            // スクロールの位置を取得
            const windowHeight = $(window).height();
            // 画面の高さを取得
            if(scroll > elemPos - windowHeight){
                $(this).addClass('.scroll-in');
            }
        });
    });
    jQuery(window).scroll();
});


// page-top
$(function() {
    var pagetop = $('#page-top');   
    pagetop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {  //300pxスクロールしたら表示
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500); //0.5秒かけてトップへ移動
        return false;
    });
});


// ハンバーガーメニュー
const burger = document.querySelector(".burger"); // burgerを取得
const nav = document.querySelector(".nav-links"); // nav-linksを取得
const navLinks = document.querySelectorAll(".nav-links li"); // nav-links liを全て取得

burger.addEventListener("click", () => {
    // console.log("click");
    //console.log(navLinks.classList);
    nav.classList.toggle("nav-active");

    navLinks.forEach((link, index) => {
        if(link.style.animation) {
            link.style.animation = "";
        } else { 
            link.style.animation = `navLinksFade 0.5s ease forwards ${
                index / 7 + 0.4
            }s`;
        }
    });
    // toggleのアニメーション
    burger.classList.toggle("toggle");
});