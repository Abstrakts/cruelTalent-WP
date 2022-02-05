const navLogo = document.querySelector('.navbarLogo')

const navIcon = document.querySelector('.nav-button')
const navBurger = document.querySelectorAll('#nav-icon3 span')
const navItems = document.querySelectorAll('.nav-desktop li a')

const grid_byTwo = document.querySelector('.byTwo')
const grid_byFour = document.querySelector('.byFour')
const actorThumbnail = document.querySelectorAll('.actorThumbnail')
const box = document.querySelectorAll('.card')

const searchBarButton = document.querySelector('.searchBarButton')
const searchBar = document.querySelector('.searchBar')

const toTopButton = document.querySelector('.toTop')

document.body.style.backgroundImage = 'none'

let menuOpen = false

for (let j = 0; j < navItems.length; j++) {
  navItems[j].style.color = '#161616'
  navBurger[j].style.backgroundColor = '#161616'
}

const swapToTwo = function () {
  for (let i = 0; i < box.length; i++) {
    var parent = box[i].parentElement.classList
    if (parent[1] === 'col-3') {
      actorThumbnail[i].style.maxWidth = '50%'
      actorThumbnail[i].style.maxHeight = '592px'
      parent.remove('col-3')
      parent.add('col-6')
    }
  }
}

const swapToFour = function () {
  for (let i = 0; i < box.length; i++) {
    var parent = box[i].parentElement.classList
    if (parent[1] === 'col-6') {
      actorThumbnail[i].style.maxWidth = '50%'
      actorThumbnail[i].style.maxHeight = '280px'
      parent.remove('col-6')
      parent.add('col-3')
    }
  }
}

const flip = function (elements, changeFunc, vars) {
  elements = gsap.utils.toArray(elements)
  vars = vars || {}
  let tl = gsap.timeline({
      onComplete: vars.onComplete,
      delay: vars.delay || 0,
    }),
    bounds = elements.map((el) => el.getBoundingClientRect()),
    copy = {},
    p
  elements.forEach((el) => {
    el._flip && el._flip.progress(1)
    el._flip = tl
  })

  changeFunc()

  for (p in vars) {
    p !== 'onComplete' && p !== 'delay' && (copy[p] = vars[p])
  }

  copy.x = (i, element) =>
    '+=' + (bounds[i].left - element.getBoundingClientRect().left)
  copy.y = (i, element) =>
    '+=' + (bounds[i].top - element.getBoundingClientRect().top)

  return tl.from(elements, copy)
}

navIcon.style.border = '2px solid #161616'

navLogo.src = `${window.location.origin}/CruelTalent/wp-content/themes/crueltalent/assets/images/logo-CRUEL-txt.svg`

navIcon.addEventListener('click', () => {
  if (menuOpen === false) {
    navIcon.style.border = '2px solid #FFF'
    for (let j = 0; j < navItems.length; j++) {
      navItems[j].style.color = '#FFF'
      navBurger[j].style.backgroundColor = '#FFF'
    }
    menuOpen = true
  } else {
    navIcon.style.border = '2px solid #161616'
    for (let j = 0; j < navItems.length; j++) {
      navItems[j].style.color = '#161616'
      navBurger[j].style.backgroundColor = '#161616'
    }
    menuOpen = false
  }
})

grid_byTwo.addEventListener('click', () => {
  flip([box], swapToTwo)
})

grid_byFour.addEventListener('click', () => {
  flip([box], swapToFour)
})

searchBarButton.addEventListener('mouseover', () => {
  gsap.to('.searchBar', 0.5, {
    opacity: 1,
    width: '30%',
  })
})
searchBar.addEventListener('mouseout', () => {
  gsap.to('.searchBar', 0.5, {
    opacity: 0,
    width: '0%',
  })
})

toTopButton.style.display = 'flex'

toTopButton.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  })
})
