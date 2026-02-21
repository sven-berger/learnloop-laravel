import "./bootstrap";

import { Application } from "@hotwired/stimulus";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import "@ckeditor/ckeditor5-build-classic/build/translations/de.js";

const application = Application.start();

const controllerModules = import.meta.glob(
  "./controllers/**/*_controller.{js,ts}",
  {
    eager: true,
  },
);

for (const path in controllerModules) {
  const controllerModule = controllerModules[path];
  const controller = controllerModule?.default;
  if (!controller) continue;

  const identifier = path
    .replace("./controllers/", "")
    .replace(/_controller\.(js|ts)$/, "")
    .replace(/\//g, "--")
    .replace(/_/g, "-");

  application.register(identifier, controller);
}

// CKEditor 5 Initialisierung mit Erweiterungen
document.addEventListener("DOMContentLoaded", () => {
  const editors = document.querySelectorAll("[data-editor]");
  editors.forEach((el) => {
    ClassicEditor.create(el, {
      language: {
        ui: "de",
        content: "de",
      },
      toolbar: [
        "heading",
        "|",
        "bold",
        "italic",
        "link",
        "|",
        "bulletedList",
        "numberedList",
        "blockQuote",
        "|",
        "undo",
        "redo",
      ],
    })
      .then((editor) => {
        // Optik an die bestehenden Form-Inputs angleichen (Tailwind Utilities)
        const editorRoot = editor?.ui?.view?.element;
        const toolbarEl = editor?.ui?.view?.toolbar?.element;
        const editableEl = editor?.ui?.view?.editable?.element;

        editorRoot?.classList?.add("w-full");

        toolbarEl?.classList?.add(
          "bg-white",
          "border",
          "border-gray-200",
          "rounded-t-2xl",
        );

        editableEl?.classList?.add(
          "bg-white",
          "w-full",
          "p-4",
          "border",
          "border-gray-200",
          "border-t-0",
          "rounded-b-2xl",
          "outline-none",
        );
      })
      .catch((error) => console.error("CKEditor error:", error));
  });
});
