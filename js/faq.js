document.addEventListener('DOMContentLoaded', function () {
    const faqList = document.getElementById('faq-list');

    // Dummy FAQ data
    const faqData = [
        { question: 'What payment methods are accepted?', answer: 'We accept credit cards and PayPal.' },
        { question: 'How can I track my order?', answer: 'You can track your order in the "Order History" section.' },
        // Add more FAQ items as needed
    ];

    // Populate FAQ list
    faqData.forEach((faq, index) => {
        const faqItem = document.createElement('div');
        faqItem.classList.add('faq-item');
        faqItem.innerHTML = `<strong>${index + 1}. ${faq.question}</strong>`;
        
        const faqAnswer = document.createElement('div');
        faqAnswer.classList.add('faq-answer');
        faqAnswer.innerText = faq.answer;

        faqItem.addEventListener('click', function () {
            faqAnswer.style.display = faqAnswer.style.display === 'block' ? 'none' : 'block';
        });

        faqList.appendChild(faqItem);
        faqList.appendChild(faqAnswer);
    });
});
