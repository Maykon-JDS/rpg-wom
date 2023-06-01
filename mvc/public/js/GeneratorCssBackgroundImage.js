let main = document.querySelector("main.row-main.lobby") ?? document.querySelector("main.row-main.perfil") ?? ""

function addClass(element) {
    let ramdomNumber = getRandomArbitrary(0, 9)
    let background = "background-" + ramdomNumber

    element.classList.add(background)
}

function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min) + min)
}

if (main != "") {
    addClass(main)
}

