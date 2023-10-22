document.addEventListener('click', function (event) {
  if (!event.target.matches('.seomatic-property-copy-wrapper')) return;
  event.preventDefault();
  const element = event.target;
  navigator.clipboard.writeText(element.getAttribute('title'));
  let count = 0;
  const identifier = setInterval(function() {
    count++;
    element.style.backgroundColor =  element.style.backgroundColor === 'grey' ? 'transparent' : 'grey';
    if (count > 5) {
      clearInterval(identifier);
    }
  }, 100);
}, false);
