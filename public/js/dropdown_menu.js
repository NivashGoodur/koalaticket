let menu = document.getElementById("user");
menu.addEventListener("click", openMenu);

function openMenu() {
    document.getElementById("dropmenu").classList.toggle('hidden');
    console.log('Clic okay');
}