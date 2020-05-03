function mouseParallaxHandler(e) {
    const {clientX, clientY} = e;

    if (!clientX || !clientY)
        return;

    const items = document.querySelectorAll('.mouse-parallax');

    for (item of items) {
        const
            {top, left, width, height} = item.getBoundingClientRect(),
            cx = left + width / 2,
            cy = top + height / 2,
            k = item.getAttribute('data-mouse-parallax-power') || 1,
            x = (clientX - cx) / 100 * k,
            y = (clientY - cy) / 100 * k;

        item.style.transform = `translate(${x}px, ${y}px)`;
    }
}

document.addEventListener('mousemove', mouseParallaxHandler);
