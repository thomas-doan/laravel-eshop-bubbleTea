require("./bootstrap");

document.addEventListener("DOMContentLoaded", (event) => {
    let hamburger = document.querySelector(".hamburger");
    let navigation = document.querySelector(".Navigation");

    // appel le menu
    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navigation.classList.toggle("active");
    });

    //lors du click, le menu revient état initial
    navigation.addEventListener("click", () => {
        navigation.classList.toggle("active");
    });
});
