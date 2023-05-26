
const tagColors = {
    'Nature': 'green',
    'Divertissement': 'red',
    'Cinéma': 'rgb(79, 79, 234)',
    'Blagues': 'yellow',
    'Politique': 'brown',
    'Technologie': 'orange',
    'Culture': 'white',
    'Gaming': 'purple',
    'Conseil': 'grey',
    'Autre': 'black'
  };

const urlParams = new URLSearchParams(window.location.search);
const tag = urlParams.get('tag');

// Mettez en surbrillance le bouton correspondant
const button = document.querySelector(`.tag-button[data-tag="${tag}"]`);
if (button) {
  button.style.backgroundColor = tagColors[tag];
  button.style.borderColor = tagColors[tag];
  document.querySelector('.fixed.user').classList.remove('animation_gauche');
  document.querySelector('.unused-class').classList.remove('transition');
  document.querySelector('.unused-class2').classList.remove('transition');
  document.querySelector('.unused-class3').classList.remove('transition_inverse');
}

if (tag) {
  
    // Ajoutez les autres classes pour les autres types d'animation
}

