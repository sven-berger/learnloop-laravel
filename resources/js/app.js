import "./bootstrap";

import { Application } from "@hotwired/stimulus";

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
