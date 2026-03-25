import axios from 'axios';
window.axios = axios;

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import 'jquery-ui-dist/jquery-ui';
import 'preline';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
