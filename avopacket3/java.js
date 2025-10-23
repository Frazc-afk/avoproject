const menuToggle = document.getElementById("mobile-menu");
  const navLinks = document.getElementById("nav-links");

  menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active"); // ⬅️ toggle animation
    navLinks.classList.toggle("show");     // ⬅️ toggle mobile menu
  });
 const image = document.querySelector('.imaj1');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        image.classList.add('active');
      }
    }); 
  }, { threshold: 0.1 }); // trigger when 50% visible
  observer.observe(image);

   const image2 = document.querySelector('.imaj3');
  const observer2 = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        image2.classList.add('active');
      }
    }); 
  }, { threshold: 0.1 }); // trigger when 50% visible
  observer2.observe(image2);


const sections = document.querySelectorAll('.sec1, .sec2');

if (sections.length > 0) {
  const sectionObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        sectionObserver.unobserve(entry.target); // 👈 Optional: only animate once
      }
    });
  }, {
    threshold: 0.7 // Better for triggering when more of the section is visible
  });

  sections.forEach(section => {
    sectionObserver.observe(section);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const contminSections = document.querySelectorAll('.contmin');

  if (contminSections.length > 0) {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    contminSections.forEach(el => observer.observe(el));
  }
});
