import AOS from 'aos';

export default {
  init() {
    /** AOS init (animated elements) **/
    AOS.init({
      duration: 600,
      easing: 'ease-out-quart',
      once: true,
    });
  },
  finalize() {
    /** Navigation dropdown elements **/
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach((navItem) => {
      const dropdownId = navItem.id.split('navItem')[1]
      const dropdown = document.getElementById(`headerDropdown${dropdownId}`);

      if (dropdown) {
        const icon = navItem.querySelector('.dropdown-icon');

        navItem.addEventListener('mouseenter', function (e) {
          e.preventDefault();

          navItem.querySelector('.nav-link').classList.add('nav-link-active');

          const leftPosition = navItem.getBoundingClientRect().left + 'px';
          const topPositionOpen = document.querySelector('header').getBoundingClientRect().bottom + 'px';
          const topPositionClosed = -dropdown.offsetHeight + 'px';

          dropdown.style.top = 0;
          dropdown.style.left = leftPosition;

          icon.classList.add('dropdown-icon-open');
          dropdown.style.transform = `translateY(${topPositionOpen})`;

          function hideDropdownMenu(e) {
            const area = {
              top: navItem.getBoundingClientRect().top,
              bottom: dropdown.getBoundingClientRect().bottom,
              left: dropdown.getBoundingClientRect().left,
              right: dropdown.getBoundingClientRect().right,
            }

            if (e.clientX < area.left || e.clientX > area.right || e.clientY < area.top || e.clientY > area.bottom) {
              icon.classList.remove('dropdown-icon-open');
              dropdown.style.transform = `translateY(${topPositionClosed})`;
              navItem.querySelector('.nav-link').classList.remove('nav-link-active');
              document.removeEventListener('mousemove', hideDropdownMenu);
            }
          }

          setTimeout(() => document.addEventListener('mousemove', hideDropdownMenu), 400)
        });
      }
    });

    /** Hamburger icon animation **/
    const navbarToggler = document.querySelector('.navbar-toggler');
    navbarToggler.addEventListener('click', function () {
      navbarToggler.classList.toggle('navbar-toggler-collapsed');
    });

    /** Scroll to up icon handle and styles **/
    const scrollToUpBtn = document.getElementById('scrollToUp');
    const footer = document.querySelector('footer');

    function adjustButtonPosition() {
      const footerRect = footer.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      if (footerRect.top < windowHeight) {
        scrollToUpBtn.style.bottom = `${windowHeight - footerRect.top + 25}px`;
      } else {
        scrollToUpBtn.style.bottom = '25px';
      }
    }

    function handleScroll() {
      if (window.scrollY > 100) {
        scrollToUpBtn.classList.add('show');
      } else {
        scrollToUpBtn.classList.remove('show');
      }
    }

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    }

    window.addEventListener('scroll', adjustButtonPosition);
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', adjustButtonPosition);
    scrollToUpBtn.addEventListener('click', scrollToTop);

    adjustButtonPosition();
    handleScroll();

    /** Single Event expand handle */
    const singleEvents = document.querySelectorAll('.single-event');
    singleEvents.forEach((event) => {
      // Add EventListener
      event.querySelector('.single-event-left').addEventListener('click', () => {
        setTimeout(() => {
          event.classList.toggle('expand');
        });
      });

      // On click on random place in site, hide event
      document.querySelectorAll('*').forEach((element) => {
        element.addEventListener('click', () => {
          if (event.classList.contains('expand')) {
            event.classList.remove('expand');
          }
        });
      });

      // Show as default, hide then and block clicking not expanded on modal
      event.classList.add('expand');
      setTimeout(() => {
        event.classList.remove('expand');
      }, 1200);
    });
  },
};
