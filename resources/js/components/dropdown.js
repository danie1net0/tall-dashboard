const Dropdown = () => ({
  isOpen: false,

  toggle() {
    if (this.isOpen) {
      return this.close()
    }

    this.$refs.button.focus()

    this.isOpen = true
  },

  close(focusAfter) {
    if (!this.isOpen) return

    this.isOpen = false

    focusAfter && focusAfter.focus()
  }
});

export default Dropdown;
