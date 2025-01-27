
    const stars = document.querySelectorAll('.rating input[type="radio"]');
    const ratingValue = document.querySelector('.rating');

    stars.forEach((star) => {
        star.addEventListener('click', function () {
            ratingValue.setAttribute('data-rating', this.value);
        });
    });

document.addEventListener("change",function(){
    
})