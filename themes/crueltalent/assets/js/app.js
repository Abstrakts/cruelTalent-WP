let home = document.querySelector('.homeContainer')
let about = document.querySelector('.aboutus')
let cDirectory = document.querySelector('.directoryPage')
let contact = document.querySelector('.contactus')
let singlePost = document.querySelector('.actorDetails')

function bgWhite() {
  setTimeout(() => {
    document.body.style.backgroundImage = 'none'
    document.body.style.backgroundColor = 'white'
  }, 1000)
}

function bgImage() {
  setTimeout(() => {
    document.body.style.backgroundImage = `url("${window.location.origin}/CruelTalent/wp-content/themes/crueltalent/assets/images/bg-cruel.jpg")`
  }, 1000)
}

function homeFunc() {
  const actors = document.querySelectorAll('.actor')
  const actorOverlay = document.querySelectorAll('.actor .overlay')
  const actorLink = document.querySelectorAll('.actor .overlay a')
  const actorName = document.querySelectorAll('.actor .overlay h3')
  const actorThumbnail = document.querySelectorAll('.actorThumbnail')

  for (let i = 0; i < actors.length; i++) {
    actors[i].addEventListener('mouseover', () => {
      gsap.to(actorOverlay[i], 0.5, {
        backgroundColor: 'rgba(0, 0, 0, 0)',
        paddingBottom: '60px',
        onStart: () => {
          gsap.to(actorLink[i], 0.5, {
            opacity: 1,
          })
          gsap.to(actorName[i], 0.5, {
            y: -20,
          })
          gsap.to(actorThumbnail[i], 0.5, {
            filter: 'grayscale(0)',
            scale: 1.02,
          })
        },
      })
    })

    actors[i].addEventListener('mouseleave', () => {
      gsap.to(actorOverlay[i], 0.5, {
        backgroundColor: 'rgba(0, 0, 0, 0.8)',
        paddingBottom: '0',
        onStart: () => {
          gsap.to(actorLink[i], 0.5, {
            opacity: 0,
          })

          gsap.to(actorName[i], 0.5, {
            y: 0,
          })

          gsap.to(actorThumbnail[i], 0.5, {
            filter: 'grayscale(1)',
            scale: 1,
          })
        },
      })
    })
  }
}
function overlayFunc() {
  const homePanel = document.querySelector('.homePanel')
  const homeOverlay = document.querySelector('.homeOverlay')
  const footer = document.querySelector('.footer')
  const navbar = document.querySelector('.navbar')
  const body = document.body

  const startHome = function () {
    if (body.offsetWidth < 577) {
      gsap.to(homeOverlay, 0.5, {
        opacity: 0,
        onStart: () => {
          gsap.to(navbar, 1, {
            opacity: 1,
          })

          homeOverlay.style.pointerEvents = 'none'

          gsap.to(homePanel, 1, {
            opacity: 1,
          })

          gsap.to('.homeOverlay img', 1.5, {
            scale: 0.7,
            y: 100,
            ease: Back.easeOut,
          })

          gsap.from(footer, 1, {
            y: 200,
            onStart: () => {
              gsap.to(footer, 1, {
                opacity: 1,
              })
            },
          })
        },
        onComplete: () => {
          body.style.overflow = ''
        },
      })
    } else {
      gsap.from(navbar, 1, {
        y: -200,
        onStart: () => {
          gsap.to(navbar, 1, {
            opacity: 1,
          })
        },
      })

      gsap.from(homePanel, 1.5, {
        x: '100%',
        ease: Back.easeOut,
        onStart: () => {
          homeOverlay.style.pointerEvents = 'none'
          gsap.to(homePanel, 1, {
            opacity: 1,
          })
          gsap.to('.homeOverlay img', 1.5, {
            scale: 0.7,
            y: 100,
            ease: Back.easeOut,
          })
        },
        onComplete: () => {
          body.style.overflow = ''
        },
      })

      gsap.from(footer, 1, {
        y: 200,
        onStart: () => {
          gsap.to(footer, 1, {
            opacity: 1,
          })
        },
      })
    }
  }

  navbar.style.opacity = '0'
  footer.style.opacity = '0'

  body.style.overflow = 'hidden'

  let started = false

  homeOverlay.addEventListener('click', () => {
    if (started === false) {
      startHome()
      started = true
    }
  })

  setTimeout(() => {
    if (started === false) {
      startHome()
      started = true
    }
  }, 2000)
}
function aboutFunc() {}
function castingDirectoryFunc() {
  document.body.style.backgroundImage = 'none'
  document.body.style.backgroundColor = 'white'
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

  //document.body.style.backgroundImage = 'none'

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
}
function contactFunc() {
  const navItems = document.querySelectorAll('.nav-desktop li a')
  const navBurger = document.querySelectorAll('#nav-icon3 span')

  for (let j = 0; j < navItems.length; j++) {
    navItems[j].style.color = '#161616'
    navBurger[j].style.backgroundColor = '#161616'
  }
}
function actorDetailsFunc() {
  document.body.style.backgroundImage = 'none'
  document.body.style.backgroundColor = 'white'
  const navIcon = document.querySelector('.nav-button')
  const navBurger = document.querySelectorAll('#nav-icon3 span')
  const navItems = document.querySelectorAll('.nav-desktop li a')
  const navLogo = document.querySelector('.navbarLogo')

  const actorDetailsPage = document.querySelector('.actorDetails')
  const footer = document.querySelector('.footer')
  const details = document.querySelector('.block')

  const height = actorDetailsPage.offsetHeight
  const actorImg = document.querySelector('.actorImage')

  let menuOpen = false
  let clipPlayed = false

  actorImg.style.height = `${height}px`
  details.style.height = `${height}px`

  //navLogo.src = `${window.location.origin}/CruelTalent/wp-content/themes/crueltalent/assets/images/logo-CRUEL-txt.svg`

  for (let j = 0; j < navItems.length; j++) {
    navItems[j].style.color = '#161616'
    navBurger[j].style.backgroundColor = '#161616'
  }

  navIcon.addEventListener('click', () => {
    if (menuOpen === false) {
      navIcon.style.border = '2px solid #fff'
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

  $('.modal-video').on('hidden.bs.modal', function (e) {
    $('.modal-video iframe').attr('src', $('.modal-video iframe').attr('src'))
  })

  // FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
  const autoPlayYouTubeModal = function () {
    let trigger = $('body').find('[data-the-video]')

    trigger.click(function () {
      let theModal = $(this).data('target'),
        videoSRC = $(this).attr('data-the-video'),
        videoSRCauto = videoSRC + '&autoplay=1'

      $(theModal + ' iframe').attr('src', videoSRCauto)

      $(theModal + ' button.close').click(function () {
        $(theModal + ' iframe').attr('src', videoSRC)
      })

      $('.modal-video').click(function () {
        $(theModal + ' iframe').attr('src', videoSRC)
      })
    })
  }

  autoPlayYouTubeModal()

  $(window).on('load resize', function () {
    let $window = $(window)
    $('.modal-fill-vert .modal-body > *').height(function () {
      return $window.height() - 60
    })
  })

  let clip = document.querySelector('.clip')

  clip.addEventListener('click', () => {
    let audio = document.getElementById('myAudio')

    if (clipPlayed === false) {
      audio.play()
      clipPlayed = true
    } else {
      audio.pause()
      audio.currentTime = 0
      clipPlayed = false
    }
  })
}

if (about) {
  aboutFunc()
}

if (cDirectory) {
  castingDirectoryFunc()
}

if (contact) {
  contactFunc()
}

if (singlePost) {
  actorDetailsFunc()
}

barba.init({
  transitions: [
    {
      to: {
        namespace: 'home',
      },
      leave(data) {
        return gsap.to(data.current.container, {
          y: '100%',
        })
      },
      enter(data) {
        gsap.from(data.next.container, {
          y: '-100%',
        })
      },
    },
    {
      to: {
        namespace: ['about-us', 'casting-directory', 'single-talents'],
      },
      leave(data) {
        return gsap.to(data.current.container, {
          y: '-100%',
        })
      },
      enter(data) {
        gsap.from(data.next.container, {
          y: '100%',
        })
      },
    },
    {
      to: {
        namespace: 'contact-us',
      },
      leave(data) {
        return gsap.to(data.current.container, {
          x: '-100%',
        })
      },
      enter(data) {
        gsap.from(data.next.container, {
          x: '100%',
        })
      },
    },
    {
      from: {
        namespace: 'single-talents',
      },
      to: {
        namespace: 'single-talents',
      },
      leave(data) {
        return gsap.to(data.current.container, {
          x: '-100%',
        })
      },
      enter(data) {
        gsap.from(data.next.container, {
          x: '100%',
        })
      },
    },
  ],
  views: [
    {
      namespace: 'home',
      beforeEnter(data) {
        overlayFunc()
        homeFunc()
      },
      afterEnter() {
        bgImage()
      },
    },
    {
      namespace: 'about-us',
      beforeEnter(data) {
        aboutFunc()
      },
      afterEnter() {
        bgImage()
      },
    },
    {
      namespace: 'casting-directory',
      beforeEnter(data) {
        castingDirectoryFunc()
      },
      afterEnter() {
        bgWhite()
      },
    },
    {
      namespace: 'contact-us',
      beforeEnter(data) {
        contactFunc()
      },
    },
    {
      namespace: 'single-talents',
      beforeEnter(data) {
        actorDetailsFunc()
      },
      afterEnter() {
        bgWhite()
      },
    },
    {
      namespace: 'single-talents-next',
      beforeEnter(data) {
        actorDetailsFunc()
      },
    },
  ],
})

$(document).ready(function () {
  $('.nav-button').click(() => {
    $('body').toggleClass('nav-open')
  })
})
