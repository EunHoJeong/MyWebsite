function main_slide_func(){
    
    let slide_show = document.querySelector(".slide_show");
    let slides = document.querySelectorAll(".slide_show a");
    let prev = document.querySelector(".prev");
    let next = document.querySelector(".next");
    let slideCount = slides.length;
    let currentIndex = 0;
    let timer = 0;
    prev.classList.add('disabled')
    for(let i = 0; i < slides.length; i++){
        slides[i].style.left = (i*100 + '%');
    }

    
    // 슬라이드를 이동시켜보자 0,1,2,3, 슬라이드에서 1번진행해보자
    function gotoSlide(index){
        currentIndex = index;
        let newLeft = -(currentIndex * 100) + '%';
        slide_show.style.left = newLeft;

        currentIndex == 0 ? prev.classList.add('disabled') : (prev.classList.remove('disabled'));
        currentIndex == 3 ? next.classList.add('disabled') : (next.classList.remove('disabled'));
        
        
    }
    
    

    prev.addEventListener('click', function(e){
        e.preventDefault();
        let index = currentIndex;
        index = (index == 0) ? slideCount-1 : index-1;
        gotoSlide(index);
    });

    next.addEventListener('click', function(e){
        e.preventDefault();
        let index = currentIndex;
        index = (index === slideCount-1) ? 0 : index+1;
        gotoSlide(index);
    });


}