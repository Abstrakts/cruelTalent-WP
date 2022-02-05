function actorDetails() {
  document.body.style.background = 'none'
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



  navLogo.src = `${window.location.origin}/CruelTalent/wp-content/themes/crueltalent/assets/images/logo-CRUEL-txt.svg`

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

actorDetails()
