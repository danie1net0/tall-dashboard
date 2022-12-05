import Alpine from 'alpinejs';

import Notification from './notification';

window.Notification = Notification;

Alpine.data('notifications', Notification);
