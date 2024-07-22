function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function updateOnlineCount() {
    const newCount = getRandomInt(27, 29);
    localStorage.setItem('onlineCount', newCount);
    displayOnlineCount();
}

function displayOnlineCount() {
    const onlineCountElement = document.getElementById('online-count');
    const storedCount = localStorage.getItem('onlineCount');
    if (storedCount !== null) {
        onlineCountElement.textContent = storedCount;
    }
}

// Инициализация: отображение сохраненного значения при загрузке страницы
displayOnlineCount();

// Обновление онлайн-количества каждые 10 секунд
setInterval(updateOnlineCount, 10000);

// Обновление отображаемого значения при изменении localStorage в другой вкладке
window.addEventListener('storage', function(event) {
    if (event.key === 'onlineCount') {
        displayOnlineCount();
    }
});
function openModal() {
    document.getElementById('ticketModal').style.display = 'flex';
}

window.onclick = function(event) {
    if (event.target === document.getElementById('ticketModal')) {
        document.getElementById('ticketModal').style.display = 'none';
    }
}
// script.js
document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('login-btn');
    const userInfo = document.getElementById('user-info');
    const userAvatar = document.getElementById('user-avatar');
    const userNickname = document.getElementById('user-nickname');
    const logoutBtn = document.getElementById('logout-btn');

    // Проверка аутентификации пользователя при загрузке страницы
    checkAuthentication();

    loginBtn.addEventListener('click', function() {
        window.location.href = '/auth/steam'; // Путь на сервере для аутентификации через Steam
    });

    logoutBtn.addEventListener('click', function() {
        fetch('/auth/logout')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    userInfo.style.display = 'none';
                    loginBtn.style.display = 'block';
                }
            });
    });

    function checkAuthentication() {
        fetch('/auth/check')
            .then(response => response.json())
            .then(data => {
                if (data.authenticated) {
                    userAvatar.src = data.avatar;
                    userNickname.textContent = data.nickname;
                    userInfo.style.display = 'flex';
                    loginBtn.style.display = 'none';
                }
            });
    }
});
