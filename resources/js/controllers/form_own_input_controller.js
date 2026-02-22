import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = ["select", "slot"];

  connect() {
    this.ownInput = null;
    this.originalName = null;

    if (!this.hasSelectTarget) return;

    this.originalName = this.selectTarget.getAttribute("name");
    this.sync();
  }

  disconnect() {
    this.removeOwnInput();
    this.restoreSelectName();
  }

  sync() {
    if (!this.hasSelectTarget) return;

    if (this.selectTarget.value === "ownLetter") {
      this.ensureOwnInput();
      this.swapSelectName();
      return;
    }

    this.removeOwnInput();
    this.restoreSelectName();
  }

  ensureOwnInput() {
    if (this.ownInput) return;

    this.ownInput = document.createElement("input");
    this.ownInput.type = "number";
    this.ownInput.name = this.originalName ?? "selectMulti";
    this.ownInput.className =
      "mt-3 bg-white w-full min-w-0 p-4 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400";
    this.ownInput.placeholder = "Eigenen Multi-Faktor eingeben";
    this.ownInput.required = true;

    if (this.hasSlotTarget) {
      this.slotTarget.appendChild(this.ownInput);
      return;
    }

    this.element.appendChild(this.ownInput);
  }

  removeOwnInput() {
    if (!this.ownInput) return;
    this.ownInput.remove();
    this.ownInput = null;
  }

  swapSelectName() {
    if (!this.originalName) return;
    if (this.selectTarget.getAttribute("name") !== this.originalName) return;
    this.selectTarget.setAttribute("name", `${this.originalName}__choice`);
  }

  restoreSelectName() {
    if (!this.originalName) return;
    if (!this.hasSelectTarget) return;
    this.selectTarget.setAttribute("name", this.originalName);
  }
}
