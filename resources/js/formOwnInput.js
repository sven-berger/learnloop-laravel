const selectMulti = document.getElementById("selectMulti");

if (selectMulti) {
  let ownInput = null;

  selectMulti.addEventListener("change", function () {
    if (this.value === "ownLetter") {
      if (!ownInput) {
        ownInput = document.createElement("input");
        ownInput.type = "number";
        ownInput.name = "selectMulti";
        ownInput.className =
          "p-4 mt-3 w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500";
        ownInput.placeholder = "Eigenen Multi-Faktor eingeben";
        ownInput.required = true;

        // Select deaktivieren (damit nur EIN Wert existiert)
        selectMulti.disabled = true;
        selectMulti.parentElement.appendChild(ownInput);
      }
    } else if (ownInput) {
      ownInput.remove();
      ownInput = null;
      selectMulti.disabled = false;
    }
  });
}
