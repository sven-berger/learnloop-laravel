import "./bootstrap";

import Alpine from "alpinejs";
import { Application } from "@hotwired/stimulus";

window.Alpine = Alpine;
Alpine.start();

const application = Application.start();

const controllerModules = import.meta.glob("./controllers/**/*_controller.js", {
  eager: true,
});

for (const path in controllerModules) {
  const controllerModule = controllerModules[path];
  const controller = controllerModule?.default;
  if (!controller) continue;

  const identifier = path
    .replace("./controllers/", "")
    .replace(/_controller\.js$/, "")
    .replace(/\//g, "--")
    .replace(/_/g, "-");

  application.register(identifier, controller);
}

// CKEditor 5 Initialisierung
document.addEventListener("DOMContentLoaded", () => {
  const editors = document.querySelectorAll("[data-editor]");

  if (!editors.length) return;

  (async () => {
    try {
      const [{ default: ClassicEditor }] = await Promise.all([
        import("@ckeditor/ckeditor5-build-classic"),
        import("@ckeditor/ckeditor5-build-classic/build/translations/de.js"),
      ]);

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
            const editorRoot = editor?.ui?.view?.element;
            const toolbarEl = editor?.ui?.view?.toolbar?.element;
            const editableEl = editor?.ui?.view?.editable?.element;
            const fieldWrapper = el?.closest?.(".editor-field");

            fieldWrapper?.classList?.add(
              "w-full",
              "max-w-full",
              "min-w-0",
              "overflow-x-hidden",
            );

            editorRoot?.classList?.add("w-full", "max-w-full", "min-w-0");

            toolbarEl?.classList?.add(
              "w-full",
              "max-w-full",
              "min-w-0",
              "overflow-hidden",
              "bg-white",
              "border",
              "border-gray-200",
              "rounded-t-2xl",
            );

            editableEl?.classList?.add(
              "bg-white",
              "w-full",
              "max-w-full",
              "min-w-0",
              "p-4",
              "border",
              "border-gray-200",
              "border-t-0",
              "rounded-b-2xl",
              "outline-none",
              "wrap-anywhere",
            );
          })
          .catch((error) => console.error("CKEditor error:", error));
      });
    } catch (error) {
      console.error("CKEditor lazy-load error:", error);
    }
  })();
});
