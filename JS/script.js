document.addEventListener('mousemove', function(e) {
  const link = document.getElementById('floating-link');
  const mouseX = e.clientX;
  const mouseY = e.clientY;

  link.style.left = mouseX + 20 + 'px';  
  link.style.top = mouseY + 'px';  
});


