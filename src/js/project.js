const thumbs = document.getElementById('project-thumbs')
if (thumbs) {
  thumbs.addEventListener('click', e => {
    console.log(e.target)
  })
}
