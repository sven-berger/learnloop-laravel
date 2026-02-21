import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = ["output"];

  count = 0;

  connect() {
    this.updateDisplay();
  }

  updateDisplay() {
    this.outputTarget.textContent = this.count;
  }

  // Function to increase the counter
  increaseCount() {
    this.count++;
    this.updateDisplay();
  }

  // Function to decrease the counter
  decreaseCount() {
    this.count--;
    this.updateDisplay();
  }

  // Function to reset the counter
  resetCount() {
    this.count = 0;
    this.updateDisplay();
  }
}
