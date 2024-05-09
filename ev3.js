document.addEventListener("DOMContentLoaded", main);
function main() {
    changeColor();
    tamañoDiv();
}
function changeColor() {
    document.getElementById('content').addEventListener("click", function () {
        $abstract = document.getElementById('content');
        if (abstract.style.backgroundColor === "black") {
            abstract.style.backgroundColor = "";
        } else {
            abstract.style.backgroundColor = "black";
        }
    });


}
function tamañoDiv() {
    let fontSize = 16;
    let contador = Math.pow(fontSize, 2);
    let content = document.getElementById('content');

    content.addEventListener("click", function () {
        if (content.style.fontSize === "2em") {
            while (fontSize < contador) {
                fontSize += 1;
                content.style.fontSize = fontSize + "px";
            }

        } else {
            content.style.fontSize = "2em";
        }
    });
}