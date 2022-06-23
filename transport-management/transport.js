function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("content").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("content").style.marginLeft= "0";
}

var dropdown = document.getElementsByClassName("dropdown-btn");

for (let i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
  });
}