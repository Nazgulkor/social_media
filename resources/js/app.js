import { burgerMenu, setAvatar, deleteAvatar } from "./utils";
import "./bootstrap";
import jQuery from "jquery";
window.$ = jQuery;
window.spinner = $("#spinner");
const defaultAvatarUrl = import.meta.glob(
    "./resources/images/default_avatar.jpg"
)["./resources/images/default_avatar.jpg"];
import.meta.glob(["../images/**"]);

document.addEventListener("DOMContentLoaded", burgerMenu);

//setting avatar
$("#avatar_input").on("change", function () {
    $("#avatar_form").submit();
});
$("#avatar_form").on("submit", function (event) {
    event.preventDefault();
    window.spinner.removeClass("hidden");
    setAvatar();
});

$("#delete_avatar").on("click", function (event) {
    event.preventDefault();
    window.spinner.removeClass("hidden");
    deleteAvatar();
});
