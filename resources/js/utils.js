export function setAvatar() {
    const formData = new FormData();
    const imageFile = document.querySelector('#avatar_form input[type="file"]')
        .files[0];
    formData.append("avatar", imageFile);

    axios
        .post("http://localhost:8080/api/user/avatar/change", formData, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                "Content-Type": "multipart/form-data",
            },
        })
        .then(function (response) {
            window.spinner.addClass("hidden");
            $("body").append(`
            <div id="avatar_set_alert" class="absolute top-10 left-1/2 transform -translate-x-1/2">
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>${response.data.message}</p>
                </div>
            </div>
            `);

            setTimeout(function () {
                $("#avatar_set_alert").remove();
            }, 3000);
            document.querySelector("#dashboard_avatar").src =
                response.data.avatar_url;
            document.querySelector("#avatar_text").innerHTML = "Поменять фото";
        })
        .catch(function (error) {
            window.spinner.addClass("hidden");
            $("body").append(`
            <div id="error_alert" role="alert" class="absolute top-10 left-1/2 transform -translate-x-1/2">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Ошибка!
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>${error.response.data.message}</p>
                </div>
            </div>
            `);
            setTimeout(function () {
                $("#error_alert").remove();
            }, 3000);
        });
}

export function deleteAvatar() {
    axios
        .get("http://localhost:8080/api/user/avatar/delete", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        })
        .then(function (response) {
            window.spinner.addClass("hidden");
            $("body").append(`
            <div id="avatar_set_alert" class="absolute top-10 left-1/2 transform -translate-x-1/2">
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>${response.data.message}</p>
                </div>
            </div>
            `);
            setTimeout(function () {
                $("#avatar_set_alert").remove();
            }, 3000);
            document.querySelector("#dashboard_avatar").src =
                response.data.avatar_url;
            document.querySelector("#avatar_text").innerHTML =
                "Установить фото";
        })
        .catch(function (error) {
            window.spinner.addClass("hidden");
            $("body").append(`
            <div id="error_alert" role="alert" class="absolute top-10 left-1/2 transform -translate-x-1/2">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Ошибка!
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>${error.response.data.message}</p>
                </div>
            </div>
            `);
            setTimeout(function () {
                $("#error_alert").remove();
            }, 3000);
        });
}

export function burgerMenu() {
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }
    // close
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }
    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }
}

export function previewFile(input, imgField) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imgField.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}
