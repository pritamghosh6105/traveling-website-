// =========================
// AUTH PAGE
// =========================

const authContainer =
document.querySelector(".auth-container");

const showRegister =
document.getElementById("showRegister");

const showLogin =
document.getElementById("showLogin");

if(showRegister && showLogin && authContainer){

    showRegister.addEventListener("click", () => {

        authContainer.classList.add("active");

        showRegister.style.display = "none";

        showLogin.style.display = "inline-block";

    });

    showLogin.addEventListener("click", () => {

        authContainer.classList.remove("active");

        showLogin.style.display = "none";

        showRegister.style.display = "inline-block";

    });

}

// =========================
// BOOKING MODAL
// =========================

function openBooking(place, price){

    const modal =
    document.getElementById("bookingModal");

    modal.style.display = "flex";

    document.getElementById(
        "selectedDestination"
    ).value = place;

    document.getElementById(
        "selectedPrice"
    ).value = "₹" + price;

}

function closeBooking(){

    document.getElementById(
        "bookingModal"
    ).style.display = "none";

}

// =========================
// CLOSE MODAL
// =========================

window.onclick = function(event){

    const modal =
    document.getElementById("bookingModal");

    if(event.target == modal){

        modal.style.display = "none";

    }

}

// =========================
// PAYMENT
// =========================

function goToPayment(){

    const destination =
    document.getElementById(
        "selectedDestination"
    ).value;

    const price =
    document.getElementById(
        "selectedPrice"
    ).value.replace('₹','');

    const travelers =
    document.getElementById(
        "travelers"
    ).value;

    const journey_date =
    document.getElementById(
        "journey_date"
    ).value;

    const package_type =
    document.getElementById(
        "package"
    ).value;

    if(
        travelers === "" ||
        journey_date === ""
    ){
        alert("Please Fill All Fields");
        return;
    }

    window.location.href =
    "payment.php?destination=" +
    encodeURIComponent(destination)

    + "&price=" +
    encodeURIComponent(price)

    + "&travelers=" +
    encodeURIComponent(travelers)

    + "&journey_date=" +
    encodeURIComponent(journey_date)

    + "&package=" +
    encodeURIComponent(package_type);

}

// =========================
// MOBILE NAVBAR TOGGLE
// =========================
const menuBtn = document.getElementById("menuBtn");
const navLinks = document.getElementById("navLinks");

if (menuBtn && navLinks) {
    menuBtn.addEventListener("click", () => {
        navLinks.classList.toggle("active");
        
        // Toggle icon between bars and close X
        const icon = menuBtn.querySelector("i");
        if (icon) {
            if (navLinks.classList.contains("active")) {
                icon.classList.remove("fa-bars");
                icon.classList.add("fa-xmark");
            } else {
                icon.classList.remove("fa-xmark");
                icon.classList.add("fa-bars");
            }
        }
    });

    // Close menu when a link is clicked
    const links = navLinks.querySelectorAll("a");
    links.forEach(link => {
        link.addEventListener("click", () => {
            navLinks.classList.remove("active");
            const icon = menuBtn.querySelector("i");
            if (icon) {
                icon.classList.remove("fa-xmark");
                icon.classList.add("fa-bars");
            }
        });
    });
}