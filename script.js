document.addEventListener("DOMContentLoaded", () => {

    const authmodal = document.getElementById("authModal");
    const closeBtn = document.querySelector(".close-btn");
    const authTitle = document.getElementById("modal-title");
    const authSubmit = document.getElementById("authSubmit");
    const switchLink = document.getElementById("switchLink");
    const authForm = document.getElementById("authForm");
    const authMessage = document.getElementById("authMessage");
    let isLogin = true;

    authmodal.style.visibility = "hidden";
    authmodal.style.opacity = "0";

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("error")) {
        isLogin = true;
        updateModal();
        authmodal.style.visibility = "visible";
        authmodal.style.opacity = 1;
    }

    document.querySelectorAll(".login").forEach(btn => {
        btn.addEventListener("click", () => {
            isLogin = btn.id === "loginBtn";
            updateModal();
            authmodal.style.visibility = "visible";
            authmodal.style.opacity = 1;
        });
    });

    closeBtn.onclick = () => {
        authmodal.style.visibility = "hidden";
        authmodal.style.opacity = 0;
    };

    window.onclick = (e) => {
        if (e.target === authmodal) {
            authmodal.style.visibility = "hidden";
            authmodal.style.opacity = 0;
        }
    };

    switchLink.onclick = (e) => {
        e.preventDefault();
        isLogin = !isLogin;
        updateModal();
    };

    function updateModal() {
        authTitle.textContent = isLogin ? "Login" : "Sign Up";
        authSubmit.textContent = isLogin ? "Login" : "Sign Up";
        switchLink.textContent = isLogin ? "Sign Up!" : "Login";
        switchLink.parentElement.childNodes[0].textContent = isLogin ? "New to Bridgify? " : "Already have an account? ";

        const existingUsername = authForm.querySelector('input[name="username"]');
        if (!isLogin && !existingUsername) {
            const usernameInput = document.createElement("input");
            usernameInput.type = "text";
            usernameInput.name = "username";
            usernameInput.placeholder = "Username";
            authForm.insertBefore(usernameInput, authForm.children[1]);
        } else if (isLogin && existingUsername) {
            existingUsername.remove();
        }
        authMessage.textContent = "";
    }

    authForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(authForm);
        const url = isLogin ? "login.php" : "signup.php";

        fetch(url, {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(res => res.text())
        .then(response => {
            if (response.trim() === "success") {
                window.location.href = "index.php";
            } else {
                authMessage.textContent = response;
            }
        });
    });

    document.querySelectorAll(".follow-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            const subjectId = this.dataset.subjectId;
            const action = this.classList.contains("unfollow") ? "unfollow" : "follow";
    
            fetch("follow_subject.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `subject_id=${subjectId}&action=${action}`
            })
            .then(res => res.text())
            .then(msg => {
                if (action === "follow") {
                    this.classList.add("unfollow");
                    this.textContent = "Unfollow";
                } else {
                    this.classList.remove("unfollow");
                    this.textContent = "Follow";
                }
            });
        });
    });

    const postModal = document.getElementById("postModal");
    const createPostBtn = document.getElementById("createPostBtn");
    const postCloseBtn = postModal.querySelector(".close-btn");

    postModal.style.visibility = "hidden";
    postModal.style.opacity = "0";

    createPostBtn.addEventListener("click", () => {
        postModal.style.visibility = "visible";
        postModal.style.opacity = 1;
    });

    postCloseBtn.onclick = () => {
        postModal.style.visibility = "hidden";
        postModal.style.opacity = 0;
    };
    
    window.addEventListener("click", (e) => {
        if (e.target === postModal) {
            postModal.style.visibility = "hidden";
            postModal.style.opacity = 0;
        }
    });

    function sortPosts(sortType) {
        console.log("Sorting by:", sortType);
    }
});
