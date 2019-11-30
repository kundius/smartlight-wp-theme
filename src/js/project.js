import forEach from 'lodash/forEach'

const thumbsV = document.getElementById('project-thumbs-vertical')
const thumbsH = document.getElementById('project-thumbs-horizontal')
const gallery = document.getElementById('project-gallery')

if (thumbsV && thumbsH && gallery) {
  let itemsV = thumbsV.querySelectorAll('[data-slider-item]')
  forEach(itemsV, item => {
    item.addEventListener('click', () => {
      gallery.slider.show(Array.prototype.slice.call(item.parentNode.children).indexOf(item))
    })
  })

  let itemsH = thumbsH.querySelectorAll('[data-slider-item]')
  forEach(itemsH, item => {
    item.addEventListener('click', () => {
      gallery.slider.show(Array.prototype.slice.call(item.parentNode.children).indexOf(item))
    })
  })

  gallery.addEventListener('slide.start', e => {
    thumbsV.slider.show(e.detail.active)
    thumbsH.slider.show(e.detail.active)
  })

  thumbsV.addEventListener('slide.start', e => {
    forEach(items, v => v.classList.remove('_active'))
    items[e.detail.active].classList.add('_active')
  })

  thumbsH.addEventListener('slide.start', e => {
    forEach(items, v => v.classList.remove('_active'))
    items[e.detail.active].classList.add('_active')
  })
}
