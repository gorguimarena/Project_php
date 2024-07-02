document.addEventListener("DOMContentLoaded", function() {
    var images = [
        'public/images/video.webm',
        'public/images/image2.jpeg',
        'public/images/image3.jpeg'
    ];

    var indicators = document.querySelector('.carousel-indicators');
    var inner = document.querySelector('.carousel-inner');

    images.forEach((image, index) => {
        var indicator = document.createElement('button');
        indicator.type = "button";
        indicator.dataset.bsTarget = "#carouselExampleIndicators";
        indicator.dataset.bsSlideTo = index;
        indicator.setAttribute('aria-label', 'Slide ' + (index + 1));
        if (index === 0) {
            indicator.classList.add('active');
            indicator.setAttribute('aria-current', 'true');
        }
        indicators.appendChild(indicator);

        var item = document.createElement('div');
        item.classList.add('carousel-item');
        if (index === 0) {
            item.classList.add('active');
        }
        var img = document.createElement('img');
        img.src = image;
        img.classList.add('d-block', 'w-100');
        img.alt = 'Image ' + (index + 1);
        item.appendChild(img);
        inner.appendChild(item);
    });
});