export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    /** <input> filtering **/
    const searchInput = document.getElementById('searchInput');
    const achievementsContainerChild = document.getElementById('achievementsContainer').querySelector('.row');
    const achievementsItems = document.querySelectorAll('.our-achievements-container-item');
    const filteringButtons = document.querySelectorAll('.filtering-button');
    let activeFilters = [];

    function filterAchievements() {
      const searchText = searchInput.value.toLowerCase();
      achievementsContainerChild.innerHTML = '';

      achievementsItems.forEach(function (item) {
        const achievement = item.querySelector('#achievement-achievement').textContent.toLowerCase();
        const place = item.querySelector('#achievement-place').textContent.toLowerCase();
        const date = item.querySelector('#achievement-date').textContent.toLowerCase();
        const hasActiveFilter = activeFilters.length === 0 || activeFilters.some(filter => item.classList.contains(filter));

        if ((achievement.includes(searchText) || place.includes(searchText) || date.includes(searchText)) && hasActiveFilter) {
          const clonedParent = item.parentElement.cloneNode(true);
          achievementsContainerChild.appendChild(clonedParent);
          clonedParent.classList.remove('aos-animate');
          void clonedParent.offsetWidth;
          clonedParent.classList.add('aos-animate');
          clonedParent.setAttribute('data-aos-duration', 450);
        }
      });
    }

    searchInput.addEventListener('input', filterAchievements);

    filteringButtons.forEach(button => {
      button.addEventListener('click', function () {
        const filterValue = button.value;

        if (activeFilters.includes(filterValue)) {
          activeFilters = activeFilters.filter(f => f !== filterValue);
          button.classList.remove('active');
        } else {
          activeFilters.push(filterValue);
          button.classList.add('active');
        }

        filterAchievements();
      });
    });

    /** Add transition to input after timeout **/
    setTimeout(() => {
      document.getElementById('searchInput').style.transition = 'transform 0.2s ease !important';
    }, 500)
  },
};
