import { Controller } from "@hotwired/stimulus";

export default class FormOwnInputController extends Controller<HTMLElement> {
    static targets = ["select", "slot"];

    declare readonly selectTarget: HTMLSelectElement;
    declare readonly slotTarget: HTMLElement;
    declare readonly hasSelectTarget: boolean;
    declare readonly hasSlotTarget: boolean;

    private ownInput: HTMLInputElement | null = null;
    private originalName: string | null = null;

    connect() {
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

    private ensureOwnInput() {
        if (this.ownInput) return;

        this.ownInput = document.createElement("input");
        this.ownInput.type = "number";
        this.ownInput.name = this.originalName ?? "selectMulti";
        this.ownInput.className =
            "p-4 mt-3 w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500";
        this.ownInput.placeholder = "Eigenen Multi-Faktor eingeben";
        this.ownInput.required = true;

        if (this.hasSlotTarget) {
            this.slotTarget.appendChild(this.ownInput);
            return;
        }

        this.element.appendChild(this.ownInput);
    }

    private removeOwnInput() {
        if (!this.ownInput) return;
        this.ownInput.remove();
        this.ownInput = null;
    }

    private swapSelectName() {
        if (!this.originalName) return;
        if (this.selectTarget.getAttribute("name") !== this.originalName) return;
        this.selectTarget.setAttribute("name", `${this.originalName}__choice`);
    }

    private restoreSelectName() {
        if (!this.originalName) return;
        if (!this.hasSelectTarget) return;
        this.selectTarget.setAttribute("name", this.originalName);
    }
}
