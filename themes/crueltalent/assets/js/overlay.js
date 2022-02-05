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
          opacity: 1
        })

        homeOverlay.style.pointerEvents = 'none'

        gsap.to(homePanel, 1, {
          opacity: 1
        })

        gsap.to('.homeOverlay img', 1.5, {
          scale: 0.7,
          y: 100,
          ease: Back.easeOut
        })

        gsap.from(footer, 1, {
          y: 200,
          onStart: () => {
            gsap.to(footer, 1, {
              opacity: 1
            })
          }
        })
      },
      onComplete: () => {
        body.style.overflow = ''
      }
    })

  } else {
    gsap.from(navbar, 1, {
      y: -200,
      onStart: () => {
        gsap.to(navbar, 1, {
          opacity: 1
        })
      }
    })

    gsap.from(homePanel, 1.5, {
      x: '100%',
      ease: Back.easeOut,
      onStart: () => {
        homeOverlay.style.pointerEvents = 'none'
        gsap.to(homePanel, 1, {
          opacity: 1
        })
        gsap.to('.homeOverlay img', 1.5, {
          scale: 0.7,
          y: 100,
          ease: Back.easeOut
        })
      },
      onComplete: () => {
        body.style.overflow = ''
      }
    })

    gsap.from(footer, 1, {
      y: 200,
      onStart: () => {
        gsap.to(footer, 1, {
          opacity: 1
        })
      }
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
}, 5000)
