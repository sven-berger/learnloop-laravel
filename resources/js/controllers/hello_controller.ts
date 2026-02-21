import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = [ "name", "output" ]

  declare readonly nameTarget: HTMLInputElement;
  declare readonly outputTarget: HTMLElement;
  
  declare readonly hasNameTarget: boolean;
  declare readonly hasOutputTarget: boolean;

  connect() {
    this.sync();
  }

  sync() {
    if (!this.hasNameTarget || !this.hasOutputTarget) return;

    const name = this.nameTarget.value.trim();
    const shouldShow = name.length > 0;
    this.outputTarget.classList.toggle("hidden", !shouldShow);


    if (!shouldShow) {
      this.outputTarget.textContent = "";
    }
  }

  greet() {
    if (!this.hasNameTarget || !this.hasOutputTarget) return;

    const name = this.nameTarget.value.trim();
    if (!name) {
      this.sync();
      return;
    }

    this.outputTarget.textContent = `Hallo, ${name}, wie geht es dir?`;
    this.outputTarget.classList.add("mt-5", "bg-amber-300", "p-4", "border", "rounded-2xl");
    this.outputTarget.classList.remove("hidden");
  }
}