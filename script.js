document.getElementById('askForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const successMsg = document.getElementById('formSuccess');
    successMsg.classList.remove('hidden');
    this.reset();
    setTimeout(() => {
        successMsg.classList.add('hidden');
    }, 5000);
});

const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');

mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

const mobileLinks = mobileMenu.querySelectorAll('a');
mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
});

const cards = document.querySelectorAll('.ProfilTim');

cards.forEach(card => {
    card.addEventListener('click', () => {
        cards.forEach(otherCard => {
            if (otherCard !== card) {
                otherCard.querySelector('.detailTim').classList.add('hidden');
            }
        });
        
        const detail = card.querySelector('.detailTim');
        detail.classList.toggle('hidden');
    });
});