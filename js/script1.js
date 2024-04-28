container = document.getElementById("container")

let count = 0;
let k = 0
let arr = [".logo", ".about_me", ".text1", ".face"]
document.getElementById("button").onclick = function() {
    count++
    if (count % 2 == 0){
        document.getElementById("container").classList.remove("filt")
        document.querySelector(arr[k]).innerHTML = ""
        k++
    }
    else{
        document.getElementById("container").classList.add("filt")
        var img = document.createElement("img")
        img.src = "images/warning.jpg"
        img.style.position = "absolute"
        img.style.top = "300px"
        img.style.left = "780px"
        document.body.appendChild(img)
    }

}