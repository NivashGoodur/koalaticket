let logo = document.getElementById("configLogo");
logo.addEventListener("click", openChange);

function openChange() {
    document.getElementById("config_logo").classList.toggle('hidden');
    document.getElementById("configLogo").classList.toggle('hidden');
}