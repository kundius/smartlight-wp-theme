import forEach from 'lodash/forEach'

const thumbs = document.getElementById('project-thumbs')
const gallery = document.getElementById('project-gallery')

if (thumbs && gallery) {
  let items = thumbs.querySelectorAll('[data-slider-item]')
  forEach(items, item => {
    item.addEventListener('click', () => {
      gallery.slider.show(Array.prototype.slice.call(item.parentNode.children).indexOf(item))
    })
  })

  gallery.addEventListener('slide.start', e => {
    thumbs.slider.show(e.detail.active)
  })

  thumbs.addEventListener('slide.start', e => {
    forEach(items, v => v.classList.remove('_active'))
    items[e.detail.active].classList.add('_active')
  })
}
