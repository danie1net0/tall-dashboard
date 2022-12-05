import Alpine from 'alpinejs';

import Dropdown from './dropdown';
import Notification from './notification';

window.Dropdown = Dropdown;
window.Notification = Notification;

Alpine.data('dropdown', Dropdown);
Alpine.data('notifications', Notification);
