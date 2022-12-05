const Notification = () => ({
  notifications: [],
  visible: [],

  add(notification) {
    notification = {
      id: notification.timeStamp,
      type: notification.detail.type,
      content: notification.detail.content,
    }

    this.notifications.push(notification)

    this.fire(notification.id)
  },

  fire(notificationId) {
    this.visible.push(this.notifications.find(notification => notification.id === notificationId))

    setTimeout(() => {
      this.removeTimer(notificationId)
    }, 3000)
  },

  remove(notificationId) {
    const notification = this.visible.find(notification => notification.id === notificationId)
    const index = this.visible.indexOf(notification)

    this.visible.splice(index, 1)
  },

  removeTimer(notificationId) {
    const notification = this.visible.find(notice => notice.id === notificationId)
    const index = this.visible.indexOf(notification)

    if (notification.hovered) {
      return;
    }

    this.visible.splice(index, 1)
  },
});

export default Notification;
