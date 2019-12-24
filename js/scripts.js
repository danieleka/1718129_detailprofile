let button = document.querySelector("#submit")
let input = document.querySelector("#search")
let output = document.querySelector("#output")

button.addEventListener('click', (e) => {
  getDataFromItunes()
})

input.addEventListener('keyup', (f) => {
  if (f.keyCode == 13) {
    getDataFromItunes()
  }
})


function getDataFromItunes(){
  let url = 'https://itunes.apple.com/search?term='+input.value
  // let cors = 'https://cors-anywhere.herokuapp.com/'

  fetch(url)
  .then(data=>data.json())
  .then(json=> {
    console.log(json)
    let finalHTML = ''

    json.results.forEach( song => {
      finalHTML +=
      `
      <div class="col s4 m4 l4">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="${song.artworkUrl100}">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">${song.trackCensoredName}<i class="material-icons right">more_vert</i></span>
            <p>${song.artistName}</p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
            <p>Artist : ${song.artistName}</p>
            <p>Track Name : ${song.trackCensoredName}</p>
            <p>Duration : ${song.trackTimeMillis} miliseconds</p>
            <p>Collecions : ${song.collectionName}</p>
            <p>URL : ${song.previewUrl}</p>
          </div>
        </div>
      </div>
      `
    })
    output.innerHTML = finalHTML
  })
  .catch(error => console.log(error))
}
