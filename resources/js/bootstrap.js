import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo hiển thị API biểu cảm để đăng ký kênh và nghe
 * cho các sự kiện được Laravel phát sóng. Phát sóng tiếng vang và sự kiện
 * cho phép nhóm của bạn nhanh chóng xây dựng các ứng dụng web thời gian thực mạnh mẽ.
 */

import './echo';
