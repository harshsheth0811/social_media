var settingsmenu = document.querySelector(".settings-menu");
var darkBtn = document.querySelector("#dark-btn");

function settingsMenuToggle() {
    settingsmenu.classList.toggle("settings-menu-height");
}

function toggleNotificationMenu() {
    const notificationMenu = document.querySelector('.notification-menu');
    notificationMenu.classList.toggle('notification-menu-height');
}

document.addEventListener('click', function(event) {
    const notificationMenu = document.querySelector('.notification-menu');
    const notificationIcon = document.querySelector('.notification-icon');
    if (!notificationMenu.contains(event.target) && !notificationIcon.contains(event.target)) {
        notificationMenu.classList.remove('notification-menu-height');
    }
});


darkBtn.onclick = function () {
    darkBtn.classList.toggle("dark-btn-on");
    document.body.classList.toggle("dark-theme");

    if (localStorage.getItem("theme") == "light") {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}


if (localStorage.getItem("theme") == "light") {
    darkBtn.classList.remove("dark-btn-on");
    document.body.classList.remove("dark-theme");
} else if (localStorage.getItem("theme") == "dark") {
    darkBtn.classList.add("dark-btn-on");
    document.body.classList.add("dark-theme");
} else {
    localStorage.setItem("theme", "light");
}