import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
  static targets = ["name", "output", "outputWrapper"]

  update() {
    const value = this.nameTarget.value.trim()

    if (value.length > 0) {
      this.outputWrapperTarget.classList.remove("hidden")
      this.outputTarget.textContent = `Hallo ${value}!`
    } else {
      this.outputWrapperTarget.classList.add("hidden")
      this.outputTarget.textContent = ""
    }
  }
}