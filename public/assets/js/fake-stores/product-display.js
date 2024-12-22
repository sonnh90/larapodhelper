document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button.btn-primary.buy-item');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Buy Now button clicked!');
        });
    });
});