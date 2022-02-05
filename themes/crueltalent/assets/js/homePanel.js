function home() {
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

home()
