import forEach from 'lodash/forEach'


forEach(document.querySelectorAll('.sitemap-list'), ul => {
  forEach(ul.children, li => {
    if (li.children.length > 1) {
      let toggle = document.createElement('span')
      toggle.classList.add('sitemap-list__toggle')
      li.children[0].appendChild(toggle)
      toggle.addEventListener('click', e => {
        e.preventDefault()
        if (li.classList.contains('_opened')) {
          li.classList.remove('_opened')
        } else {
          li.classList.add('_opened')
        }
      })
    }
  })
})
