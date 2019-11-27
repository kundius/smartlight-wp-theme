import forEach from 'lodash/forEach'


forEach(document.querySelectorAll('.js-quiz'), wrapper => {
  let elDiscount = wrapper.querySelector('.js-quiz-discount')
  let elDescriptionBase = wrapper.querySelector('.js-quiz-description-base')
  let elDescriptionSuccess = wrapper.querySelector('.js-quiz-description-success')
  let elReport = wrapper.querySelector('.js-quiz-report')
  let elResult = wrapper.querySelector('.js-quiz-result')
  let elNext = wrapper.querySelector('.js-quiz-next')
  let elsStep = wrapper.querySelectorAll('.js-quiz-step')
  let elsGroup = wrapper.querySelectorAll('.js-quiz-group')
  let active = 0

  const show = index => {
    active = index
    elDiscount.innerHTML = 2 * index
    elDescriptionBase.style.display = index < elsStep.length ? 'block' : 'none'
    elDescriptionSuccess.style.display = index < elsStep.length ? 'none' : 'block'
    elReport.style.display = index < elsStep.length ? 'block' : 'none'
    elResult.style.display = index < elsStep.length ? 'none' : 'block'

    if (index < elsStep.length) {
      forEach(elsStep, (el, i) => {
        if (i === index) {
          el.classList.add('_active')
        } else {
          el.classList.remove('_active')
        }
        if (i < index) {
          el.classList.add('_past')
        } else {
          el.classList.remove('_past')
        }
      })
      forEach(elsGroup, (el, i) => {
        if (i === index) {
          el.classList.add('_active')
        } else {
          el.classList.remove('_active')
        }
      })
    }
  }

  show(active)

  elNext.addEventListener('click', e => {
    e.preventDefault()
    show(active + 1)
  })
})
