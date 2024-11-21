export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // Not send displayed form, send Contact Form 7
    document.getElementById('contactFormNotToSend').addEventListener('submit', (e) => {
      e.preventDefault();

      const contactForm7 = document.querySelector('.wpcf7-form');
      contactForm7.querySelector('input[name="contact-name"]').value = document.getElementById('contactFormNotToSendName').value;
      contactForm7.querySelector('input[name="contact-company"]').value = document.getElementById('contactFormNotToSendCompany').value;
      contactForm7.querySelector('input[name="contact-email"]').value = document.getElementById('contactFormNotToSendEmail').value;
      contactForm7.querySelector('textarea[name="contact-message"]').value = document.getElementById('contactFormNotToSendMessage').value;
      contactForm7.submit();
    })
  },
};
