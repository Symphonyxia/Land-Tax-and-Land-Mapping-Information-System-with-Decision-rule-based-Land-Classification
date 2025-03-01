<?php include('land1.php'); ?>

<script>

  document.addEventListener('DOMContentLoaded', function () {
    var addClassificationBtn = document.getElementById("addClassificationBtn");
    var classificationFormsContainer = document.getElementById("classificationFormsContainer");
    var formCounter = 0; // Counter for generating unique form IDs
    var classificationKinds = {
      agriculture: [
        { value: "irrigated", label: "Rice Irrigated" },
        { value: "nonirrigated", label: "Rice Unirrigated" },
        { value: "upland", label: "Rice Upland" },
        { value: "corn", label: "Corn Land" },
        { value: "coconut", label: "Coconut Land" },
        { value: "cotton", label: "Cotton Land" },
        { value: "tabacco", label: "Tabacco Land" },
        { value: "bamboo", label: "Bamboo Land" },
        { value: "bangus", label: "Fishpond:Bangus" },
        { value: "tilapia", label: "Fishpond:Tilapia" },
        { value: "lapulapu", label: "Fishpond:Lapu-Lapu" },
        { value: "fisheries", label: "In-Land Fisheries:Tilapia" },
        { value: "hito", label: "In-Land Fisheries:Hito" },
        { value: "nipa", label: "Nipa Land" },
        { value: "salt", label: "Salt Bed" },
        { value: "pasture", label: "Pasture" },
        { value: "forest", label: "Forest" },
        { value: "mangroove", label: "Mangroove" },
        { value: "orchard", label: "Orchard" },
        { value: "abaca", label: "Abaca" },
        { value: "cogon", label: "Cogon Land" },
        { value: "sorghum", label: "Sorghum" },
        { value: "ipilipil", label: "Ipil-Ipil Land" },
        { value: "zacate", label: "Zacate" },
        { value: "kangkong", label: "Kangkong" },
        { value: "mango", label: "Mango Land" },
        { value: "pineapple", label: "Pineapple Land" },
        { value: "intensive", label: "Prawn Pond, Intensive" },
        { value: "semiintensive", label: "Prawn Pond, Semi-intensive" },
        { value: "traditional", label: "Prawn Pond, Traditional" },
        { value: "sugar", label: "Sugar Land" },
        { value: "cardava", label: "Banana Land:Cardava/Saba(pp of not more than 625)" },
        { value: "sweet", label: "Banana Land:Sweet Banana(pp of not more than 955)" },
        { value: "bananacommercial", label: "Banana Land:Commercial Plantation" },
        { value: "cassava", label: "Cassava Land & other Root Crops" },
        { value: "coffee", label: "Coffee" },
        { value: "horticulture", label: "Horticulture" },
        { value: "poultry", label: "Poultry Farm Land(Broiler)" },
        { value: "cacao", label: "Cacao Land" },
        { value: "swine", label: "Swine Farm Land" },
        { value: "papayacommercial", label: "Papaya Land:Commercial Plantation (pp of 1,100 hills/ha. or more)" },
        { value: "papayatraditional", label: "Papaya Land:Traditional (pp of 1,099 hills/ha. or more)" },
        { value: "dragon", label: "Dragon Fruit Land" },
        { value: "breeding", label: "Game Fowl Breeding Farm" },
        { value: "citrus", label: "Citrus Land" },
        // Add more kinds for agriculture classification
      ],
      residential: [
        { value: "pototan1", label: "Pototan 1" },
        // Add more kinds for residential classification
      ],
      commercial: [
        { value: "pototan2", label: "Pototan 2" },
        // Add more kinds for commercial classification
      ],
      industrial: [
        { value: "pototan3", label: "Pototan 3" },
        // Add more kinds for industrial classification
      ],
    };

    addClassificationBtn.addEventListener('click', function () {
      formCounter++; // Increment the form counter to generate a unique ID
      var newClassificationForm = createNewClassificationForm(formCounter);
      classificationFormsContainer.appendChild(newClassificationForm);
    });

    // Function to create a new classification form with custom logic
    function createNewClassificationForm(formId) {
      var newClassificationForm = document.createElement("div");
      newClassificationForm.classList.add("form-group");

      // Create Classification select
      var classificationLabel = createLabel("Classification:");
      var classificationSelect = createSelect("classificationSelect_" + formId, "classification", [
        { value: "", label: "-- Select Classification --" },
        { value: "agriculture", label: "Agriculture" },
        { value: "residential", label: "Residential" },
        { value: "commercial", label: "Commercial" },
        { value: "industrial", label: "Industrial" },
      ]);
      classificationSelect.addEventListener('change', function () {
        onClassificationChange(formId);
      });

      // Create Kinds select
      var kindsLabel = createLabel("Kinds:");
      var kindsSelect = createSelect("kindsSelect_" + formId, "kinds", [
        { value: "", label: "-- Select Kinds --" },
      ]);
      kindsSelect.addEventListener('change', function () {
        onKindsChange(formId);
      });

      // Create Subclass select
      var subclassLabel = createLabel("Subclass:");
      var subclassSelect = createSelect("subclassSelect_" + formId, "subclass", [
        { value: "", label: "-- Select Subclass --" },
      ]);
      subclassSelect.addEventListener('change', function () {
        onSubclassChange(formId);
      });

      // Create Area input
      var areaGroup = document.createElement("div");
      areaGroup.classList.add("form-group");

      var areaLabel = createLabel("Area:");
      areaLabel.setAttribute("for", "areaInput_" + formId);

      var areaInputGroup = document.createElement("div");
      areaInputGroup.classList.add("input-group");

      var areaInput = createInput("areaInput_" + formId, "text", "area", function () {
      });

      var areaInputLabel = document.createElement("span");
      areaInputLabel.classList.add("input-group-text");
      areaInputLabel.id = "areaInputLabel_" + formId;

      areaInputGroup.appendChild(areaInput);
      areaInputGroup.appendChild(areaInputLabel);

      areaGroup.appendChild(areaLabel);
      areaGroup.appendChild(areaInputGroup);

      // Append the "Area" input group to the form
      newClassificationForm.appendChild(areaGroup);


      // Create Unit Value input
      var unitValueLabel = createLabel("Unit Value:");
      var unitValueInput = createInput("unitValueInput_" + formId, "text", "unit_val", function () {
        calculateValues(formId);
      });
      unitValueInput.readOnly = true; // Add this line to make it readonly

      var updatedUnitValueInput = createInput("updatedUnitVal_" + formId, "hidden", "updated_unit_val");


      // Create Assessment Level input
      var assessLevelLabel = createLabel("Assessment Level:");
      var assessLevelInput = createInput("LevelInput_" + formId, "text", "assess_level", function () {
        calculateValues(formId);
      });
      assessLevelInput.readOnly = true;

      var updatedAssessLevelInput = createInput("updatedAssessLevel_" + formId, "hidden", "updated_assess_level");


      // Create Assessment Value input and label
      var assessValueLabel = createLabel("Assessment Value:");
      var assessValueInput = createInput("assessValueInput_" + formId, "text", "assess_value");
      assessValueInput.readOnly = true;

      // Create Market Value input and label
      var marketValueLabel = createLabel("Market Value:");
      var marketValueInput = createInput("marketValueInput_" + formId, "text", "market_value");
      marketValueInput.readOnly = true;

      // Create Tax Value input and label
      var taxValueLabel = createLabel("Tax Value:");
      var taxValueInput = createInput("taxValueInput_" + formId, "text", "tax_value");
      taxValueInput.readOnly = true; // Add this line to make it readonly


      // Append elements to the form
      appendElements(newClassificationForm, [
        classificationLabel, classificationSelect, kindsLabel, kindsSelect, subclassLabel, subclassSelect,
        areaLabel, areaInput, areaInputLabel, unitValueLabel, unitValueInput, updatedUnitValueInput,
        assessLevelLabel, assessLevelInput, updatedAssessLevelInput, assessValueLabel, assessValueInput, marketValueLabel,
        marketValueInput, taxValueLabel, taxValueInput
      ]);

      return newClassificationForm;
    }

    // Function to handle changes when Classification is selected
    function onClassificationChange(formId) {
      var classificationSelect = document.getElementById("classificationSelect_" + formId);
      var kindsSelect = document.getElementById("kindsSelect_" + formId);
      var selectedClassification = classificationSelect.value;

      // Handle changes based on the selectedClassification
      var assessLevelInput = document.getElementById("LevelInput_" + formId);
      var areaInputLabel = document.getElementById("areaInputLabel_" + formId);

      // Update assess_level and areaInputLabel based on the selectedClassification
      switch (selectedClassification) {
        case "agriculture":
          assessLevelInput.value = <?php echo isset($_SESSION['agriculture']) ? $_SESSION['agriculture'] : '0.175'; ?>; // Set the default value
          areaInputLabel.textContent = "ha.";
          break;
        case "residential":
          assessLevelInput.value = <?php echo isset($_SESSION['residential']) ? $_SESSION['residential'] : '0.05'; ?>; // Set the default value
          areaInputLabel.textContent = "sqm.";
          break;
        case "commercial":
          assessLevelInput.value = <?php echo isset($_SESSION['commercial']) ? $_SESSION['commercial'] : '0.15'; ?>;// Set the default value
          areaInputLabel.textContent = "sqm.";
          break;
        case "industrial":
          assessLevelInput.value = <?php echo isset($_SESSION['industrial']) ? $_SESSION['industrial'] : '0.2'; ?>; // Set the default value
          areaInputLabel.textContent = "sqm.";
          break;
        default:
          assessLevelInput.value = "";
          areaInputLabel.textContent = "";
          break;
      }

      // Reset Kinds select
      kindsSelect.innerHTML = `<option value="">-- Select Kinds --</option>`;

      if (selectedClassification !== "") {
        // Fetch the kinds array based on the selected classification
        var availableKinds = classificationKinds[selectedClassification];

        // Populate the Kinds select based on the fetched kinds
        availableKinds.forEach(function (kind) {
          var option = document.createElement("option");
          option.value = kind.value;
          option.textContent = kind.label;
          kindsSelect.appendChild(option);
        });
      }

      // Trigger the onKindsChange function when the classification changes
      onKindsChange(formId);
    }

    // Function to handle changes when Kinds is selected
    function onKindsChange(formId) {
      var kindsSelect = document.getElementById("kindsSelect_" + formId);
      var subclassSelect = document.getElementById("subclassSelect_" + formId);
      var unitValueInput = document.getElementById("unitValueInput_" + formId);

      // Reset Unit Value and Subclass select
      unitValueInput.value = "";
      subclassSelect.value = "";
      subclassSelect.disabled = false;

      if (kindsSelect.value !== "") {
        subclassSelect.disabled = false;

        // Customize the following code based on your specific requirements for populating the Subclass select options
        if (kindsSelect.value === "irrigated") {
                    subclassSelect.innerHTML = `
                        <option value="">Select Subclass</option>
                        <option value="irrigated_1">1</option>
                        <option value="irrigated_2">2</option>
                        <option value="irrigated_3">3</option>
                        <option value="irrigated_4">4</option>
                    `;
                } else if (kindsSelect.value === "nonirrigated") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="nonirrigated_1">1</option>
                        <option value="nonirrigated_2">2</option>
                        <option value="nonirrigated_3">3</option>
                        <option value="nonirrigated_4">4</option>
                    `;
                } else if (kindsSelect.value === "upland") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="upland_1">1</option>
                        <option value="upland_2">2</option>
                        <option value="upland_3">3</option>
                        <option value="upland_4">4</option>
                    `;
                } else if (kindsSelect.value === "corn") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="corn_1">1</option>
                        <option value="corn_2">2</option>
                        <option value="corn_3">3</option>
                        <option value="corn_4">4</option>
                            `;
                } else if (kindsSelect.value === "coconut") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="coconut_1">1</option>
                        <option value="coconut_2">2</option>
                        <option value="coconut_3">3</option>
                        <option value="coconut_4">4</option>
                    `;
                } else if (kindsSelect.value === "cotton") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="cotton_1">1</option>
                        <option value="cotton_2">2</option>
                        <option value="cotton_3">3</option>
                        <option value="cotton_4">4</option>
                    `;
                } else if (kindsSelect.value === "tabacco") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="tabacco_1">1</option>
                        <option value="tabacco_2">2</option>
                        <option value="tabacco_3">3</option>
                        <option value="tabacco_4">4</option>
                    `;
					} else if (kindsSelect.value === "bamboo") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="bamboo_1">1</option>
                        <option value="bamboo_2">2</option>
                        <option value="bamboo_3">3</option>
                        <option value="bamboo_4">4</option>
                    `;
					} else if (kindsSelect.value === "bangus") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="bangus_1">1</option>
                        <option value="bangus_2">2</option>
                        <option value="bangus_3">3</option>
                        <option value="bangus_4">4</option>
                    `;
					} else if (kindsSelect.value === "tilapia") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="tilapia_1">1</option>
                        <option value="tilapia_2">2</option>
                        <option value="tilapia_3">3</option>
                        <option value="tilapia_4">4</option>
                    `;
					} else if (kindsSelect.value === "lapulapu") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="lapulapu_1">1</option>
                        <option value="lapulapu_2">2</option>
                        <option value="lapulapu_3">3</option>
                        <option value="lapulapu_4">4</option>
                    `;
					} else if (kindsSelect.value === "fisheries") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="fisheries_1">1</option>
                        <option value="fisheries_2">2</option>
                        <option value="fisheries_3">3</option>
                        <option value="fisheries_4">4</option>
                    `;
					} else if (kindsSelect.value === "hito") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="hito_1">1</option>
                        <option value="hito_2">2</option>
                        <option value="hito_3">3</option>
                        <option value="hito_4">4</option>
                    `;
					} else if (kindsSelect.value === "nipa") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="nipa_1">1</option>
                        <option value="nipa_2">2</option>
                        <option value="nipa_3">3</option>
                        <option value="nipa_4">4</option>
                    `;
					} else if (kindsSelect.value === "salt") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="salt_1">1</option>
                        <option value="salt_2">2</option>
                        <option value="salt_3">3</option>
                        <option value="salt_4">4</option>
                    `;
					} else if (kindsSelect.value === "pasture") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="pasture_1">1</option>
                        <option value="pasture_2">2</option>
                        <option value="pasture_3">3</option>
                        <option value="pasture_4">4</option>
                    `;
					} else if (kindsSelect.value === "forest") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="forest_1">1</option>
                        <option value="forest_2">2</option>
                        <option value="forest_3">3</option>
                        <option value="forest_4">4</option>
                    `;
					} else if (kindsSelect.value === "mangroove") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="mangrove_1">1</option>
                        <option value="mangrove_2">2</option>
                        <option value="mangrove_3">3</option>
                        <option value="mangrove_4">4</option>
                    `;
					} else if (kindsSelect.value === "orchard") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="orchard_1">1</option>
                        <option value="orchard_2">2</option>
                        <option value="orchard_3">3</option>
                        <option value="orchard_4">4</option>
                    `;
					} else if (kindsSelect.value === "abaca") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="abaca_1">1</option>
                        <option value="abaca_2">2</option>
                        <option value="abaca_3">3</option>
                        <option value="abaca_4">4</option>
                    `;
					} else if (kindsSelect.value === "cogon") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="cogon_1">1</option>
                        <option value="cogon_2">2</option>
                        <option value="cogon_3">3</option>
                        <option value="cogon_4">4</option>
                    `;
					} else if (kindsSelect.value === "sorghum") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="sorghum_1">1</option>
                        <option value="sorghum_2">2</option>
                        <option value="sorghum_3">3</option>
                        <option value="sorghum_4">4</option>
                    `;
					} else if (kindsSelect.value === "ipilipil") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="ipilipil_1">1</option>
                        <option value="ipilipil_2">2</option>
                        <option value="ipilipil_3">3</option>
                        <option value="ipilipil_4">4</option>
                    `;
					} else if (kindsSelect.value === "zacate") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="zacate_1">1</option>
                        <option value="zacate_2">2</option>
                        <option value="zacate_3">3</option>
                        <option value="zacate_4">4</option>
                    `;
					} else if (kindsSelect.value === "kangkong") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="kangkong_1">1</option>
                        <option value="kangkong_2">2</option>
                        <option value="kangkong_3">3</option>
                        <option value="kangkong_4">4</option>
                    `;
					} else if (kindsSelect.value === "mango") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="mango_1">1</option>
                        <option value="mango_2">2</option>
                        <option value="mango_3">3</option>
                        <option value="mango_4">4</option>
                    `;
					} else if (kindsSelect.value === "pineapple") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="pineapple_1">1</option>
                        <option value="pineapple_2">2</option>
                        <option value="pineapple_3">3</option>
                        <option value="pineapple_4">4</option>
                    `;
					} else if (kindsSelect.value === "intensive") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="intensive_1">1</option>
                        <option value="intensive_2">2</option>
                        <option value="intensive_3">3</option>
                        <option value="intensive_4">4</option>
                    `;
					} else if (kindsSelect.value === "semiintensive") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="semiintensive_1">1</option>
                        <option value="semiintensive_2">2</option>
                        <option value="semiintensive_3">3</option>
                        <option value="semiintensive_4">4</option>
                    `;
					} else if (kindsSelect.value === "traditional") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="traditional_1">1</option>
                        <option value="traditional_2">2</option>
                        <option value="traditional_3">3</option>
                        <option value="traditional_4">4</option>
                    `;
					} else if (kindsSelect.value === "sugar") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="sugar_1">1</option>
                        <option value="sugar_2">2</option>
                        <option value="sugar_3">3</option>
                        <option value="sugar_4">4</option>
                    `;
					} else if (kindsSelect.value === "cardava") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="cardava_1">1</option>
                        <option value="cardava_2">2</option>
                        <option value="cardava_3">3</option>
                        <option value="cardava_4">4</option>
                    `;
					} else if (kindsSelect.value === "sweet") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="sweet_1">1</option>
                        <option value="sweet_2">2</option>
                        <option value="sweet_3">3</option>
                        <option value="sweet_4">4</option>
                    `;
					} else if (kindsSelect.value === "bananacommercial") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="bananacommercial_1">1</option>
                        <option value="bananacommercial_2">2</option>
                        <option value="bananacommercial_3">3</option>
                        <option value="bananacommercial_4">4</option>
                    `;
					} else if (kindsSelect.value === "cassava") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="cassava_1">1</option>
                        <option value="cassava_2">2</option>
                        <option value="cassava_3">3</option>
                        <option value="cassava_4">4</option>
                    `;
					} else if (kindsSelect.value === "coffee") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="coffee_1">1</option>
                        <option value="coffee_2">2</option>
                        <option value="coffee_3">3</option>
                        <option value="coffee_4">4</option>
                    `;
					} else if (kindsSelect.value === "horticulture") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="horticulture_1">1</option>
                        <option value="horticulture_2">2</option>
                        <option value="horticulture_3">3</option>
                        <option value="horticulture_4">4</option>
                    `;
					} else if (kindsSelect.value === "poultry") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="poultry_1">1</option>
                        <option value="poultry_2">2</option>
                        <option value="poultry_3">3</option>
                        <option value="poultry_4">4</option>
                    `;
					} else if (kindsSelect.value === "cacao") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="cacao_1">1</option>
                        <option value="cacao_2">2</option>
                        <option value="cacao_3">3</option>
                        <option value="cacao_4">4</option>
                    `;
					} else if (kindsSelect.value === "swine") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="swine_1">1</option>
                        <option value="swine_2">2</option>
                        <option value="swine_3">3</option>
                        <option value="swine_4">4</option>
                    `;
					} else if (kindsSelect.value === "papayacommercial") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="papayacommercial_1">1</option>
                        <option value="papayacommercial_2">2</option>
                        <option value="papayacommercial_3">3</option>
                        <option value="papayacommercial_4">4</option>
                    `;
					} else if (kindsSelect.value === "papayatraditional") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="papayatraditional_1">1</option>
                        <option value="papayatraditional_2">2</option>
                        <option value="papayatraditional_3">3</option>
                        <option value="papayatraditional_4">4</option>
                    `;
					} else if (kindsSelect.value === "dragon") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="dragon_1">1</option>
                        <option value="dragon_2">2</option>
                        <option value="dragon_3">3</option>
                        <option value="dragon_4">4</option>
                    `;
					} else if (kindsSelect.value === "breeding") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="breeding_1">1</option>
                        <option value="breeding_2">2</option>
                        <option value="breeding_3">3</option>
                        <option value="breeding_4">4</option>
                    `;
					} else if (kindsSelect.value === "citrus") {
                        subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="citrus_1">1</option>
                        <option value="citrus_2">2</option>
                        <option value="citrus_3">3</option>
                        <option value="citrus_4">4</option>
                    `;
                    }
                }

      if (kindsSelect.value !== "residential") {
        subclassSelect.disabled = false;
        if (kindsSelect.value === "pototan1") {
          subclassSelect.innerHTML = `
              <option value="">Select Subclass</option>
              <option value="R1">R-1</option>
              <option value="R2">R-2</option>
              <option value="R3">R-3</option>
              <option value="R4">R-4</option>
              <option value="R5">R-5</option>
              <option value="R6">R-6</option>
          `;
        }
      }

      if (kindsSelect.value !== "commercial") {
        subclassSelect.disabled = false;
        if (kindsSelect.value === "pototan2") {
          subclassSelect.innerHTML = `
          <option value="">Select Subclass</option>
              <option value="C1">C-1</option>
              <option value="C2">C-2</option>
              <option value="C3">C-3</option>
              <option value="C4">C-4</option>
              <option value="C5">C-5</option>
              <option value="C6">C-6</option>
          
          `;
        }
      }

      if (kindsSelect.value !== "industrial") {
        subclassSelect.disabled = false;
        if (kindsSelect.value === "pototan3") {
          subclassSelect.innerHTML = `
          <option value="">Select Subclass</option>
              <option value="I1">I-1</option>
              <option value="I2">I-2</option>
              <option value="I3">I-3</option>
              <option value="I4">I-4</option>
              <option value="I5">I-5</option>
              <option value="I6">I-6</option>
          
          `;
        }
      }

    }

    function onSubclassChange(formId) {
      var subclassSelect = document.getElementById("subclassSelect_" + formId);
      var unitValueInput = document.getElementById("unitValueInput_" + formId);

      // Set unit value based on selected subclass and classification

      // Customize this section based on your specific logic for setting unit values
      // You can use a switch statement or if-else conditions to set the unit value
      var classificationSelect = document.getElementById("classificationSelect_" + formId);
      var kindsSelect = document.getElementById("kindsSelect_" + formId);

      var subclass = subclassSelect.value;
      var unitVal = "";

      if (subclassSelect.value !== "") {
                if (classificationSelect.value === "agriculture") {
                    // Set unit value based on subclass for "agriculture"
                    switch (kindsSelect.value) {
                        case "irrigated":
                            if (subclassSelect.value === "irrigated_1") {
                                unit_val =<?php echo isset($_SESSION['irrigated_1']) ? $_SESSION['irrigated_1'] : '767100'; ?>;
                            } else if (subclassSelect.value === "irrigated_2") {
                                unit_val = <?php echo isset($_SESSION['irrigated_2']) ? $_SESSION['irrigated_2'] : '715600'; ?>;
                            } else if (subclassSelect.value === "irrigated_3") {
                                unit_val = <?php echo isset($_SESSION['irrigated_3']) ? $_SESSION['irrigated_3'] : '631300'; ?>;
                            } else if (subclassSelect.value === "irrigated_4") {
                                unit_val = <?php echo isset($_SESSION['irrigated_4']) ? $_SESSION['irrigated_4'] : '527700'; ?>;
                            }
                            break;
                        case "nonirrigated":
                            if (subclassSelect.value === "nonirrigated_1") {
                                unit_val = <?php echo isset($_SESSION['nonirrigated_1']) ? $_SESSION['nonirrigated_1'] : '442400'; ?>;
                            } else if (subclassSelect.value === "nonirrigated_2") {
                                unit_val = <?php echo isset($_SESSION['nonirrigated_2']) ? $_SESSION['nonirrigated_2'] : '405500'; ?>;
                            } else if (subclassSelect.value === "nonirrigated_3") {
                                unit_val = <?php echo isset($_SESSION['nonirrigated_3']) ? $_SESSION['nonirrigated_3'] : '339200'; ?>;
                            } else if (subclassSelect.value === "nonirrigated_4") {
                                unit_val = <?php echo isset($_SESSION['nonirrigated_4']) ? $_SESSION['nonirrigated_4'] : "0"; ?>;
                            }
                            break;
                            case "upland":    
                            if (subclassSelect.value === "upland_1") {
                                unit_val = <?php echo isset($_SESSION['upland_1']) ? $_SESSION['upland_1'] : '162600'; ?>; 
                            } else if (subclassSelect.value === "upland_2") {
                                unit_val = <?php echo isset($_SESSION['upland_2']) ? $_SESSION['upland_2'] : '128700'; ?>; 
                            } else if (subclassSelect.value === "upland_3") {
                                unit_val = <?php echo isset($_SESSION['upland_3']) ? $_SESSION['upland_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "upland_4") {
                                unit_val = <?php echo isset($_SESSION['upland_4']) ? $_SESSION['upland_4'] : "0"; ?>; 
                            }
                            break;
                            case "corn":
                            if (subclassSelect.value === "corn_1") {
                                unit_val = <?php echo isset($_SESSION['corn_1']) ? $_SESSION['corn_1'] : '206600'; ?>; 
                            } else if (subclassSelect.value === "corn_2") {
                                unit_val = <?php echo isset($_SESSION['corn_2']) ? $_SESSION['corn_2'] : '184600'; ?>; 
                            } else if (subclassSelect.value === "corn_3") {
                                unit_val = <?php echo isset($_SESSION['corn_3']) ? $_SESSION['corn_3'] : '143300'; ?>; 
                            } else if (subclassSelect.value === "corn_4") {
                                unit_val = <?php echo isset($_SESSION['corn_4']) ? $_SESSION['corn_4'] : "0"; ?>; 
                            }
                            break;
                            case "coconut":
                            if (subclassSelect.value === "coconut_1") {
                                unit_val = <?php echo isset($_SESSION['coconut_1']) ? $_SESSION['coconut_1'] : '217500'; ?>; 
                            } else if (subclassSelect.value === "coconut_2") {
                                unit_val = <?php echo isset($_SESSION['coconut_2']) ? $_SESSION['coconut_2'] : '190300'; ?>; 
                            } else if (subclassSelect.value === "coconut_3") {
                                unit_val = <?php echo isset($_SESSION['coconut_3']) ? $_SESSION['coconut_3'] : '146800'; ?>; 
                            } else if (subclassSelect.value === "coconut_4") {
                                unit_val = <?php echo isset($_SESSION['coconut_4']) ? $_SESSION['coconut_4'] : "0"; ?>; 
                            }
                            break;
                            case "cotton":
                            if (subclassSelect.value === "cotton_1") {
                                unit_val = <?php echo isset($_SESSION['cotton_1']) ? $_SESSION['cotton_1'] : '201800'; ?>;
                            } else if (subclassSelect.value === "cotton_2") {
                                unit_val = <?php echo isset($_SESSION['cotton_2']) ? $_SESSION['cotton_2'] : '181600'; ?>; 
                            } else if (subclassSelect.value === "cotton_3") {
                                unit_val = <?php echo isset($_SESSION['cotton_3']) ? $_SESSION['cotton_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "cotton_4") {
                                unit_val = <?php echo isset($_SESSION['cotton_3']) ? $_SESSION['cotton_3'] : "0"; ?>; 
                            }
                            break;
                            case "tabacco":
                            if (subclassSelect.value === "tabacco_1") {
                                unit_val = <?php echo isset($_SESSION['tabacco_1']) ? $_SESSION['tabacco_1'] : '145800'; ?>; 
                            } else if (subclassSelect.value === "tabacco_2") {
                                unit_val = <?php echo isset($_SESSION['tabacco_2']) ? $_SESSION['tabacco_2'] : '131200'; ?>; 
                            } else if (subclassSelect.value === "tabacco_3") {
                                unit_val = <?php echo isset($_SESSION['tabacco_3']) ? $_SESSION['tabacco_3'] : '102000'; ?>; 
                            } else if (subclassSelect.value === "tabacco_4") {
                                unit_val = <?php echo isset($_SESSION['tabacco_4']) ? $_SESSION['tabacco_4'] : "0"; ?>;
                            }
                            break;
                            case "bamboo":
                            if (subclassSelect.value === "bamboo_1") {
                                unit_val = <?php echo isset($_SESSION['bamboo_1']) ? $_SESSION['bamboo_1'] : '148000'; ?>; 
                            } else if (subclassSelect.value === "bamboo_2") {
                                unit_val = <?php echo isset($_SESSION['bamboo_2']) ? $_SESSION['bamboo_2'] : '133100'; ?>; 
                            } else if (subclassSelect.value === "bamboo_3") {
                                unit_val = <?php echo isset($_SESSION['bamboo_3']) ? $_SESSION['bamboo_3'] : '103500'; ?>; 
                            } else if (subclassSelect.value === "bamboo_4") {
                                unit_val = <?php echo isset($_SESSION['bamboo_4']) ? $_SESSION['bamboo_4'] : '0'; ?>; 
                            }
                            break;
                        case "bangus":
                            if (subclassSelect.value === "bangus_1") {
                                unit_val = <?php echo isset($_SESSION['bangus_1']) ? $_SESSION['bangus_1'] : '649800'; ?>; 
                            } else if (subclassSelect.value === "bangus_2") {
                                unit_val = <?php echo isset($_SESSION['bangus_2']) ? $_SESSION['bangus_2'] : '617100'; ?>; 
                            } else if (subclassSelect.value === "bangus_3") {
                                unit_val = <?php echo isset($_SESSION['bangus_3']) ? $_SESSION['bangus_3'] : '552200'; ?>; 
                            } else if (subclassSelect.value === "bangus_4") {
                                unit_val = <?php echo isset($_SESSION['bangus_4']) ? $_SESSION['bangus_4'] : '487200'; ?>;
                            }
                            break;
                            
                        case "tilapia":
                            if (subclassSelect.value === "tilapia_1") {
                                unit_val = <?php echo isset($_SESSION['tilapia_1']) ? $_SESSION['tilapia_1'] : '513500'; ?>;
                            } else if (subclassSelect.value === "tilapia_2") {
                                unit_val = <?php echo isset($_SESSION['tilapia_2']) ? $_SESSION['tilapia_2'] : '474900'; ?>; 
                            } else if (subclassSelect.value === "tilapia_3") {
                                unit_val = <?php echo isset($_SESSION['tilapia_3']) ? $_SESSION['tilapia_3'] : '397800'; ?>; 
                            } else if (subclassSelect.value === "tilapia_4") {
                                unit_val = <?php echo isset($_SESSION['tilapia_4']) ? $_SESSION['tilapia_4'] : '320800'; ?>; 
                            }
                            break;
                        case "lapulapu":
                            if (subclassSelect.value === "lapulapu_1") {
                                unit_val = <?php echo isset($_SESSION['lapulapu_1']) ? $_SESSION['lapulapu_1'] : '846500'; ?>; 
                            } else if (subclassSelect.value === "lapulapu_2") {
                                unit_val = <?php echo isset($_SESSION['lapulapu_2']) ? $_SESSION['lapulapu_2'] : '782700'; ?>; 
                            } else if (subclassSelect.value === "lapulapu_3") {
                                unit_val = <?php echo isset($_SESSION['lapulapu_3']) ? $_SESSION['lapulapu_3'] : '655700'; ?>; 
                            } else if (subclassSelect.value === "lapulapu_4") {
                                unit_val = <?php echo isset($_SESSION['lapulapu_4']) ? $_SESSION['lapulapu_4'] : '528700'; ?>; 
                            }
                            break;
                            case "fisheries":
                            if (subclassSelect.value === "fisheries_1") {
                                unit_val = <?php echo isset($_SESSION['fisheries_1']) ? $_SESSION['fisheries_1'] : '418800'; ?>;
                            } else if (subclassSelect.value === "fisheries_2") {
                                unit_val = <?php echo isset($_SESSION['fisheries_2']) ? $_SESSION['fisheries_2'] : '387300'; ?>; 
                            } else if (subclassSelect.value === "fisheries_3") {
                                unit_val = <?php echo isset($_SESSION['fisheries_3']) ? $_SESSION['fisheries_3'] : '324500'; ?>; 
                            } else if (subclassSelect.value === "fisheries_4") {
                                unit_val = <?php echo isset($_SESSION['fisheries_4']) ? $_SESSION['fisheries_4'] : '261700'; ?>; 
                            }
                            break;
                        case "hito":
                            if (subclassSelect.value === "hito_1") {
                                unit_val = <?php echo isset($_SESSION['hito_1']) ? $_SESSION['hito_1'] : '555600'; ?>; 
                            } else if (subclassSelect.value === "hito_2") {
                                unit_val = <?php echo isset($_SESSION['hito_2']) ? $_SESSION['hito_2'] : '513800'; ?>; 
                            } else if (subclassSelect.value === "hito_3") {
                                unit_val = <?php echo isset($_SESSION['hito_3']) ? $_SESSION['hito_3'] : '430500'; ?>; 
                            } else if (subclassSelect.value === "hito_4") {
                                unit_val = <?php echo isset($_SESSION['hito_4']) ? $_SESSION['hito_4'] : '347200'; ?>; 
                            }
                            break;
                        case "nipa":
                            if (subclassSelect.value === "nipa_1") {
                                unit_val = <?php echo isset($_SESSION['nipa_1']) ? $_SESSION['nipa_1'] : '177600'; ?>; 
                            } else if (subclassSelect.value === "nipa_2") {
                                unit_val = <?php echo isset($_SESSION['nipa_2']) ? $_SESSION['nipa_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "nipa_3") {
                                unit_val = <?php echo isset($_SESSION['nipa_3']) ? $_SESSION['nipa_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "nipa_4") {
                                unit_val = <?php echo isset($_SESSION['nipa_4']) ? $_SESSION['nipa_4'] : "0"; ?>; 
                            }
                            break;
                        case "salt":
                            if (subclassSelect.value === "salt_1") {
                                unit_val = <?php echo isset($_SESSION['salt_1']) ? $_SESSION['salt_1'] : '510500'; ?>; 
                            } else if (subclassSelect.value === "salt_2") {
                                unit_val = <?php echo isset($_SESSION['salt_2']) ? $_SESSION['salt_2'] : '474600'; ?>; 
                            } else if (subclassSelect.value === "salt_3") {
                                unit_val = <?php echo isset($_SESSION['salt_3']) ? $_SESSION['salt_3'] : '403100"'; ?>; 
                            } else if (subclassSelect.value === "salt_4") {
                                unit_val = <?php echo isset($_SESSION['salt_4']) ? $_SESSION['salt_4'] : "0"; ?>;
                            }
                            break;
                            
                        case "pasture":
                            if (subclassSelect.value === "pasture_1") {
                                unit_val = <?php echo isset($_SESSION['pasture_1']) ? $_SESSION['pasture_1'] : '126000'; ?>; 
                            } else if (subclassSelect.value === "pasture_2") {
                                unit_val = <?php echo isset($_SESSION['pasture_2']) ? $_SESSION['pasture_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "pasture_3") {
                                unit_val = <?php echo isset($_SESSION['pasture_3']) ? $_SESSION['pasture_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "pasture_4") {
                                unit_val = <?php echo isset($_SESSION['pasture_4']) ? $_SESSION['pasture_4'] : "0"; ?>; 
                            }
                            break;
                        case "forest":
                            if (subclassSelect.value === "forest_1") {
                                unit_val = <?php echo isset($_SESSION['forest_1']) ? $_SESSION['forest_1'] : '121300'; ?>; 
                            } else if (subclassSelect.value === "forest_2") {
                                unit_val = <?php echo isset($_SESSION['forest_2']) ? $_SESSION['forest_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "forest_3") {
                                unit_val = <?php echo isset($_SESSION['forest_3']) ? $_SESSION['forest_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "forest_4") {
                                unit_val = <?php echo isset($_SESSION['forest_4']) ? $_SESSION['forest_4'] : "0"; ?>; 
                            }
                            break;
                        case "mangroove":
                            if (subclassSelect.value === "mangrove_1") {
                                unit_val = <?php echo isset($_SESSION['mangrove_1']) ? $_SESSION['mangrove_1'] : '83000'; ?>; 
                            } else if (subclassSelect.value === "mangrove_2") {
                                unit_val = <?php echo isset($_SESSION['mangrove_2']) ? $_SESSION['mangrove_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "mangrove_3") {
                                unit_val = <?php echo isset($_SESSION['mangrove_3']) ? $_SESSION['mangrove_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "mangrove_4") {
                                unit_val = <?php echo isset($_SESSION['mangrove_4']) ? $_SESSION['mangrove_4'] : "0"; ?>; 
                            }
                            break;
                        case "orchard":
                            if (subclassSelect.value === "orchard_1") {
                                unit_val = <?php echo isset($_SESSION['orchard_1']) ? $_SESSION['orchard_1'] : '298400'; ?>; 
                            } else if (subclassSelect.value === "orchard_2") {
                                unit_val = <?php echo isset($_SESSION['orchard_2']) ? $_SESSION['orchard_2'] : '261000'; ?>; 
                            } else if (subclassSelect.value === "orchard_3") {
                                unit_val = <?php echo isset($_SESSION['orchard_3']) ? $_SESSION['orchard_3'] : '184600'; ?>; 
                            } else if (subclassSelect.value === "orchard_4") {
                                unit_val = <?php echo isset($_SESSION['orchard_4']) ? $_SESSION['orchard_4'] : "0"; ?>; 
                            }
                            break;
                            case "abaca":
                            if (subclassSelect.value === "abaca_1") {
                                unit_val = <?php echo isset($_SESSION['abaca_1']) ? $_SESSION['abaca_1'] : '116000'; ?>; 
                            } else if (subclassSelect.value === "abaca_2") {
                                unit_val = <?php echo isset($_SESSION['abaca_2']) ? $_SESSION['abaca_2'] : '715600'; ?>; 
                            } else if (subclassSelect.value === "abaca_3") {
                                unit_val = <?php echo isset($_SESSION['abaca_3']) ? $_SESSION['abaca_3'] : '715600'; ?>; 
                            } else if (subclassSelect.value === "abaca_4") {
                                unit_val = <?php echo isset($_SESSION['abaca_4']) ? $_SESSION['abaca_4'] : '715600'; ?>; 
                            }
                            break;
                        case "cogon":
                            if (subclassSelect.value === "cogon_1") {
                                unit_val = <?php echo isset($_SESSION['cogon_1']) ? $_SESSION['cogon_1'] : '96000'; ?>; 
                            } else if (subclassSelect.value === "cogon_2") {
                                unit_val = <?php echo isset($_SESSION['cogon_2']) ? $_SESSION['cogon_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "cogon_3") {
                                unit_val = <?php echo isset($_SESSION['cogon_3']) ? $_SESSION['cogon_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "cogon_4") {
                                unit_val = <?php echo isset($_SESSION['cogon_4']) ? $_SESSION['cogon_4'] : "0"; ?>; 
                            }
                            break;
                        case "sorghum":
                            if (subclassSelect.value === "sorghum_1") {
                                unit_val = <?php echo isset($_SESSION['sorghum_1']) ? $_SESSION['sorghum_1'] : '159800'; ?>;
                            } else if (subclassSelect.value === "sorghum_2") {
                                unit_val = <?php echo isset($_SESSION['sorghum_2']) ? $_SESSION['sorghum_2'] : '150200'; ?>; 
                            } else if (subclassSelect.value === "sorghum_3") {
                                unit_val = <?php echo isset($_SESSION['sorghum_3']) ? $_SESSION['sorghum_3'] : '130100'; ?>;
                            } else if (subclassSelect.value === "sorghum_4") {
                                unit_val = <?php echo isset($_SESSION['sorghum_4']) ? $_SESSION['sorghum_4'] : "0"; ?>; 
                            }
                            break;
                            case "ipilipil":
                            if (subclassSelect.value === "ipilipil_1") {
                                unit_val = <?php echo isset($_SESSION['ipilipil_1']) ? $_SESSION['ipilipil_1'] : '193000'; ?>; 
                            } else if (subclassSelect.value === "ipilipil_2") {
                                unit_val = <?php echo isset($_SESSION['ipilipil_2']) ? $_SESSION['ipilipil_2'] : '181600'; ?>; 
                            } else if (subclassSelect.value === "ipilipil_3") {
                                unit_val = <?php echo isset($_SESSION['ipilipil_3']) ? $_SESSION['ipilipil_3'] : '715600'; ?>; 
                            } else if (subclassSelect.value === "ipilipil_4") {
                                unit_val = <?php echo isset($_SESSION['ipilipil_4']) ? $_SESSION['ipilipil_4'] : '715600'; ?>; 
                            }
                            break;
                        case "zacate":
                            if (subclassSelect.value === "zacate_1") {
                                unit_val = <?php echo isset($_SESSION['zacate_1']) ? $_SESSION['zacate_1'] : '108000'; ?>; 
                            } else if (subclassSelect.value === "zacate_2") {
                                unit_val = <?php echo isset($_SESSION['zacate_2']) ? $_SESSION['zacate_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "zacate_3") {
                                unit_val = <?php echo isset($_SESSION['zacate_3']) ? $_SESSION['zacate_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "zacate_4") {
                                unit_val = <?php echo isset($_SESSION['zacate_4']) ? $_SESSION['zacate_4'] : "0"; ?>; 
                            }
                            break;
                        case "kangkong":
                           if (subclassSelect.value === "kangkong_1") {
                                unit_val = <?php echo isset($_SESSION['kangkong_1']) ? $_SESSION['kangkong_1'] : '114000'; ?>; 
                            } else if (subclassSelect.value === "kangkong_2") {
                                unit_val = <?php echo isset($_SESSION['kangkong_2']) ? $_SESSION['kangkong_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "kangkong_3") {
                                unit_val = <?php echo isset($_SESSION['kangkong_3']) ? $_SESSION['kangkong_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "kangkong_4") {
                                unit_val = <?php echo isset($_SESSION['kangkong_4']) ? $_SESSION['kangkong_4'] : "0"; ?>; 
                            }
                            break;
                        case "mango":
                            if (subclassSelect.value === "mango_1") {
                                unit_val = <?php echo isset($_SESSION['mango_1']) ? $_SESSION['mango_1'] : '489800'; ?>; 
                            } else if (subclassSelect.value === "mango_2") {
                                unit_val = <?php echo isset($_SESSION['mango_2']) ? $_SESSION['mango_2'] : '440800'; ?>; 
                            } else if (subclassSelect.value === "mango_3") {
                                unit_val = <?php echo isset($_SESSION['mango3']) ? $_SESSION['mango_3'] : '342800'; ?>; 
                            } else if (subclassSelect.value === "mango_4") {
                                unit_val = <?php echo isset($_SESSION['mango_4']) ? $_SESSION['mango_4'] : "0"; ?>; 
                            }
                            break;
                        case "pineapple":
                            if (subclassSelect.value === "pineapple_1") {
                                unit_val = <?php echo isset($_SESSION['pineapple_1']) ? $_SESSION['pineapple_1'] : '244600'; ?>; 
                            } else if (subclassSelect.value === "pineapple_2") {
                                unit_val = <?php echo isset($_SESSION['pineapple_2']) ? $_SESSION['pineapple_2'] : '220100'; ?>; 
                            } else if (subclassSelect.value === "pineapple_3") {
                                unit_val = <?php echo isset($_SESSION['pineapple_3']) ? $_SESSION['pineapple_3'] : '171200'; ?>; 
                            } else if (subclassSelect.value === "pineapple_4") {
                                unit_val = <?php echo isset($_SESSION['pineapple_4']) ? $_SESSION['pineapple_4'] : "0"; ?>; 
                            }
                            break;
                            case "intensive":
                           if (subclassSelect.value === "intensive_1") {
                                unit_val = <?php echo isset($_SESSION['intensive_1']) ? $_SESSION['intensive_1'] : '889200'; ?>; 
                            } else if (subclassSelect.value === "intensive_2") {
                                unit_val = <?php echo isset($_SESSION['intensive_2']) ? $_SESSION['intensive_2'] : '844700'; ?>; 
                            } else if (subclassSelect.value === "intensive_3") {
                                unit_val = <?php echo isset($_SESSION['intensive_3']) ? $_SESSION['intensive_3'] : '755700'; ?>; 
                            } else if (subclassSelect.value === "intensive_4") {
                                unit_val = <?php echo isset($_SESSION['intensive_4']) ? $_SESSION['intensive_4'] : '666800'; ?>; 
                            }
                            break;
                        case "semiintensive":
                            if (subclassSelect.value === "semiintensive_1") {
                                unit_val = <?php echo isset($_SESSION['semiintensive_1']) ? $_SESSION['semiintensive_1'] : '793300'; ?>; 
                            } else if (subclassSelect.value === "semiintensive_2") {
                                unit_val = <?php echo isset($_SESSION['semiintensive_2']) ? $_SESSION['semiintensive_2'] : '753600'; ?>; 
                            } else if (subclassSelect.value === "semiintensive_3") {
                                unit_val = <?php echo isset($_SESSION['semiintensive_3']) ? $_SESSION['semiintensive_3'] : '674200'; ?>; 
                            } else if (subclassSelect.value === "semiintensive_4") {
                                unit_val = <?php echo isset($_SESSION['semiintensive_4']) ? $_SESSION['semiintensive_4'] : '594900'; ?>; 
                            }
                            break;
                        case "traditional":
                           if (subclassSelect.value === "traditional_1") {
                                unit_val = <?php echo isset($_SESSION['traditional_1']) ? $_SESSION['traditional_1'] : '697500'; ?>; 
                            } else if (subclassSelect.value === "traditional_2") {
                                unit_val = <?php echo isset($_SESSION['traditional_2']) ? $_SESSION['traditional_2'] : '662500'; ?>; 
                            } else if (subclassSelect.value === "traditional_3") {
                                unit_val = <?php echo isset($_SESSION['traditional_3']) ? $_SESSION['traditional_3'] : '592800'; ?>; 
                            } else if (subclassSelect.value === "traditional_4") {
                                unit_val = <?php echo isset($_SESSION['traditional_4']) ? $_SESSION['traditional_4'] : '523000'; ?>; 
                            }
                            break;
                        case "sugar":
                           if (subclassSelect.value === "sugar_1") {
                                unit_val = <?php echo isset($_SESSION['sugar_1']) ? $_SESSION['sugar_1'] : '568100'; ?>; 
                            } else if (subclassSelect.value === "sugar_2") {
                                unit_val = <?php echo isset($_SESSION['sugar_2']) ? $_SESSION['sugar_2'] : '529300'; ?>; 
                            } else if (subclassSelect.value === "sugar_3") {
                                unit_val = <?php echo isset($_SESSION['sugar_3']) ? $_SESSION['sugar_3'] : '28100'; ?>; 
                            } else if (subclassSelect.value === "sugar_4") {
                                unit_val = <?php echo isset($_SESSION['sugar_4']) ? $_SESSION['sugar_4'] : "0"; ?>; 
                            }
                            break;
                        case "cardava":
                            if (subclassSelect.value === "cardava_1") {
                                unit_val = <?php echo isset($_SESSION['cardava_1']) ? $_SESSION['cardava_1'] : '238400'; ?>; 
                            } else if (subclassSelect.value === "cardava_2") {
                                unit_val = <?php echo isset($_SESSION['cardava_2']) ? $_SESSION['cardava_2'] : '220500'; ?>; 
                            } else if (subclassSelect.value === "cardava_3") {
                                unit_val = <?php echo isset($_SESSION['cardava_3']) ? $_SESSION['cardava_3'] : '184700'; ?>; 
                            } else if (subclassSelect.value === "cardava_4") {
                                unit_val = <?php echo isset($_SESSION['cardava_4']) ? $_SESSION['cardava_4'] : '149000'; ?>; 
                            }
                            break;
                        case "sweet":
                           if (subclassSelect.value === "sweet_1") {
                                unit_val = <?php echo isset($_SESSION['sweet_1']) ? $_SESSION['sweet_1'] : '284400'; ?>; 
                            } else if (subclassSelect.value === "sweet_2") {
                                unit_val = <?php echo isset($_SESSION['sweet_2']) ? $_SESSION['sweet_2'] : '263000'; ?>; 
                            } else if (subclassSelect.value === "sweet_3") {
                                unit_val = <?php echo isset($_SESSION['sweet_3']) ? $_SESSION['sweet_3'] : '220400'; ?>; 
                            } else if (subclassSelect.value === "sweet_4") {
                                unit_val = <?php echo isset($_SESSION['sweet_4']) ? $_SESSION['sweet_4'] : '177700'; ?>; 
                            }
                            break;
                        case "bananacommercial":
                           if (subclassSelect.value === "bananacommercial_1") {
                                unit_val = <?php echo isset($_SESSION['bananacommercial_1']) ? $_SESSION['bananacommercial_1'] : '662000'; ?>; 
                            } else if (subclassSelect.value === "bananacommercial_2") {
                                unit_val = <?php echo isset($_SESSION['bananacommercial_2']) ? $_SESSION['bananacommercial_2'] : '12300'; ?>; 
                            } else if (subclassSelect.value === "bananacommercial_3") {
                                unit_val = <?php echo isset($_SESSION['bananacommercial_3']) ? $_SESSION['bananacommercial_3'] : '51300'; ?>; 
                            } else if (subclassSelect.value === "bananacommercial_4") {
                                unit_val = <?php echo isset($_SESSION['bananacommercial_4']) ? $_SESSION['bananacommercial_4'] : '413700'; ?>; 
                            }
                            break;
                        case "cassava":
                            if (subclassSelect.value === "cassava_1") {
                                unit_val = <?php echo isset($_SESSION['cassava_1']) ? $_SESSION['cassava_1'] : '170900'; ?>; 
                            } else if (subclassSelect.value === "cassava_2") {
                                unit_val = <?php echo isset($_SESSION['cassava_2']) ? $_SESSION['cassava_2'] : '153800'; ?>; 
                            } else if (subclassSelect.value === "cassava_3") {
                                unit_val = <?php echo isset($_SESSION['cassava_3']) ? $_SESSION['cassava_3'] : '119600'; ?>; 
                            } else if (subclassSelect.value === "cassava_4") {
                                unit_val = <?php echo isset($_SESSION['cassava_4']) ? $_SESSION['cassava_4'] : "0"; ?>; 
                            }
                            break;
                        case "coffee":
                           if (subclassSelect.value === "coffee_1") {
                                unit_val = <?php echo isset($_SESSION['coffee_1']) ? $_SESSION['coffee_1'] : '143500'; ?>; 
                            } else if (subclassSelect.value === "coffee_2") {
                                unit_val = <?php echo isset($_SESSION['coffee_2']) ? $_SESSION['coffee_2'] : '129100'; ?>; 
                            } else if (subclassSelect.value === "coffee_3") {
                                unit_val = <?php echo isset($_SESSION['coffee_3']) ? $_SESSION['coffee_3'] : '100400'; ?>; 
                            } else if (subclassSelect.value === "coffee_4") {
                                unit_val = <?php echo isset($_SESSION['coffee_4']) ? $_SESSION['coffee_4'] : "0"; ?>; 
                            }
                            break;
                        case "horticulture":
                            if (subclassSelect.value === "horticulture_1") {
                                unit_val = <?php echo isset($_SESSION['horticulture_1']) ? $_SESSION['horticulture_1'] : '122300'; ?>; 
                            } else if (subclassSelect.value === "horticulture_2") {
                                unit_val = <?php echo isset($_SESSION['horticulture_2']) ? $_SESSION['horticulture_2'] : "0"; ?>; 
                            } else if (subclassSelect.value === "horticulture_3") {
                                unit_val = <?php echo isset($_SESSION['horticulture_3']) ? $_SESSION['horticulture_3'] : "0"; ?>; 
                            } else if (subclassSelect.value === "horticulture_4") {
                                unit_val = <?php echo isset($_SESSION['horticulture_4']) ? $_SESSION['horticulture_4'] : "0"; ?>; 
                            }
                            break;
                            case "poultry":
                            if (subclassSelect.value === "poultry_1") {
                                unit_val = <?php echo isset($_SESSION['poultry_1']) ? $_SESSION['poultry_1'] : '771800'; ?>; 
                            } else if (subclassSelect.value === "poultry_2") {
                                unit_val = <?php echo isset($_SESSION['poultry_2']) ? $_SESSION['poultry_2'] : '713900'; ?>; 
                            } else if (subclassSelect.value === "poultry_3") {
                                unit_val = <?php echo isset($_SESSION['poultry_3']) ? $_SESSION['poultry_3'] : '598100'; ?>; 
                            } else if (subclassSelect.value === "poultry_4") {
                                unit_val = <?php echo isset($_SESSION['poultry_4']) ? $_SESSION['poultry_4'] : '482400'; ?>; 
                            }
                            break;
                        case "cacao":
                            if (subclassSelect.value === "cacao_1") {
                                unit_val = <?php echo isset($_SESSION['cacao_1']) ? $_SESSION['cacao_1'] : '266000'; ?>; 
                            } else if (subclassSelect.value === "cacao_2") {
                                unit_val = <?php echo isset($_SESSION['cacao_2']) ? $_SESSION['cacao_2'] : '239300'; ?>; 
                            } else if (subclassSelect.value === "cacao_3") {
                                unit_val = <?php echo isset($_SESSION['cacao_3']) ? $_SESSION['cacao_3'] : '186100'; ?>; 
                            } else if (subclassSelect.value === "cacao_4") {
                                unit_val = <?php echo isset($_SESSION['cacao_4']) ? $_SESSION['cacao_4'] : "0"; ?>; 
                            }
                            break;
                        case "swine":
                            if (subclassSelect.value === "swine_1") {
                                unit_val = <?php echo isset($_SESSION['swine_1']) ? $_SESSION['swine_1'] : '797000'; ?>; 
                            } else if (subclassSelect.value === "swine_2") {
                                unit_val = <?php echo isset($_SESSION['swine_2']) ? $_SESSION['swine_2'] : '737000'; ?>; 
                            } else if (subclassSelect.value === "swine_3") {
                                unit_val = <?php echo isset($_SESSION['swine_3']) ? $_SESSION['swine_3'] : '617500'; ?>; 
                            } else if (subclassSelect.value === "swine_4") {
                                unit_val = <?php echo isset($_SESSION['swine_4']) ? $_SESSION['swine_4'] : '497900'; ?>; 
                            }
                            break;
                            case "papayacommercial":
                            if (subclassSelect.value === "papayacommercial_1") {
                                unit_val = <?php echo isset($_SESSION['papayacommercial_1']) ? $_SESSION['papayacommercial_1'] : '577800'; ?>; 
                            } else if (subclassSelect.value === "papayacommercial_2") {
                                unit_val = <?php echo isset($_SESSION['papayacommercial_2']) ? $_SESSION['papayacommercial_2'] : '534500'; ?>; 
                            } else if (subclassSelect.value === "papayacommercial_3") {
                                unit_val = <?php echo isset($_SESSION['papayacommercial_3']) ? $_SESSION['papayacommercial_3'] : '447800'; ?>; 
                            } else if (subclassSelect.value === "papayacommercial_4") {
                                unit_val = <?php echo isset($_SESSION['papayacommercial_4']) ? $_SESSION['papayacommercial_4'] : '361100'; ?>; 
                            }
                            break;
                        case "papayatraditional":
                           if (subclassSelect.value === "papayatraditional_1") {
                                unit_val = <?php echo isset($_SESSION['papayatraditional_1']) ? $_SESSION['papayatraditional_1'] : '324200'; ?>; 
                            } else if (subclassSelect.value === "papayatraditional_2") {
                                unit_val = <?php echo isset($_SESSION['papayatraditional_2']) ? $_SESSION['papayatraditional_2'] : '308000'; ?>; 
                            } else if (subclassSelect.value === "papayatraditional_3") {
                                unit_val = <?php echo isset($_SESSION['papayatraditional_3']) ? $_SESSION['papayatraditional_3'] : '275600'; ?>; 
                            } else if (subclassSelect.value === "papayatraditional_4") {
                                unit_val = <?php echo isset($_SESSION['papayatraditional_4']) ? $_SESSION['papayatraditional_4'] : '43100'; ?>; 
                            }
                            break;
                            case "dragon":
                           if (subclassSelect.value === "dragon_1") {
                                unit_val = <?php echo isset($_SESSION['dragon_1']) ? $_SESSION['dragon_1'] : '662300'; ?>; 
                            } else if (subclassSelect.value === "dragon_2") {
                                unit_val = <?php echo isset($_SESSION['dragon_2']) ? $_SESSION['dragon_2'] : '596000'; ?>; 
                            } else if (subclassSelect.value === "dragon_3") {
                                unit_val = <?php echo isset($_SESSION['dragon_3']) ? $_SESSION['dragon_3'] : '463600'; ?>; 
                            } else if (subclassSelect.value === "dragon_4") {
                                unit_val = <?php echo isset($_SESSION['dragon_4']) ? $_SESSION['dragon_4'] : "0"; ?>; 
                            }
                            break;
                            case "breeding":
                            if (subclassSelect.value === "breeding_1") {
                                unit_val = <?php echo isset($_SESSION['breeding_1']) ? $_SESSION['breeding_1'] : '823200'; ?>; 
                            } else if (subclassSelect.value === "breeding_2") {
                                unit_val = <?php echo isset($_SESSION['breeding_2']) ? $_SESSION['breeding_2'] : '759400'; ?>; 
                            } else if (subclassSelect.value === "breeding_3") {
                                unit_val = <?php echo isset($_SESSION['breeding_3']) ? $_SESSION['breeding_3'] : '635900'; ?>; 
                            } else if (subclassSelect.value === "breeding_4") {
                                unit_val = <?php echo isset($_SESSION['breeding_4']) ? $_SESSION['breeding_4'] : '512400'; ?>; 
                            }
                            break; 
                            case "citrus":
                            if (subclassSelect.value === "citrus_1") {
                                unit_val = <?php echo isset($_SESSION['citrus_1']) ? $_SESSION['citrus_1'] : '365600'; ?>; 
                            } else if (subclassSelect.value === "citrus_2") {
                                unit_val = <?php echo isset($_SESSION['citrus_2']) ? $_SESSION['citrus_2'] : '329000'; ?>; 
                            } else if (subclassSelect.value === "citrus_3") {
                                unit_val = <?php echo isset($_SESSION['citrus_3']) ? $_SESSION['citrus_4'] : '255900'; ?>; 
                            } else if (subclassSelect.value === "citrus_4") {
                                unit_val = <?php echo isset($_SESSION['citrus_4']) ? $_SESSION['citrus_4'] : "0"; ?>; 
                            }
                            break; 
              

                        default:
                            // Set default value if not matched
                            unit_val = "";
                    }
        } else if (classificationSelect.value === "residential") {
          // Set unit value based on subclass for "residential"
          switch (kindsSelect.value) {
            case "pototan1":
              if (subclassSelect.value === "R1") {
                unit_val = <?php echo isset($_SESSION['R1']) ? $_SESSION['R1'] : '4900'; ?>;
              } else if (subclassSelect.value === "R2") {
                unit_val = <?php echo isset($_SESSION['R2']) ? $_SESSION['R2'] : '4300'; ?>;
              } else if (subclassSelect.value === "R3") {
                unit_val = <?php echo isset($_SESSION['R3']) ? $_SESSION['R3'] : '3500'; ?>;
              } else if (subclassSelect.value === "R4") {
                unit_val = <?php echo isset($_SESSION['R4']) ? $_SESSION['R4'] : '3000'; ?>;
              } else if (subclassSelect.value === "R5") {
                unit_val = <?php echo isset($_SESSION['R5']) ? $_SESSION['R5'] : '2200'; ?>;
              } else if (subclassSelect.value === "R6") {
                unit_val = <?php echo isset($_SESSION['R6']) ? $_SESSION['R6'] : '1500'; ?>;
              }
              break;

            default:
              // Set default value if not matched
              unit_val = "";
          }
          // Customize this section similarly to the agriculture case
        } else if (classificationSelect.value === "commercial") {
          // Set unit value based on subclass for "commercial"
          switch (kindsSelect.value) {
            case "pototan2":
              if (subclassSelect.value === "C1") {
                unit_val = <?php echo isset($_SESSION['C1']) ? $_SESSION['C1'] : '6000'; ?>;
              } else if (subclassSelect.value === "C2") {
                unit_val = <?php echo isset($_SESSION['C2']) ? $_SESSION['C2'] : '5300'; ?>;
              } else if (subclassSelect.value === "C3") {
                unit_val = <?php echo isset($_SESSION['C3']) ? $_SESSION['C3'] : '4300'; ?>;
              } else if (subclassSelect.value === "C4") {
                unit_val = <?php echo isset($_SESSION['C4']) ? $_SESSION['C4'] : '3300'; ?>;
              } else if (subclassSelect.value === "C5") {
                unit_val = <?php echo isset($_SESSION['C5']) ? $_SESSION['C5'] : '2500'; ?>;
              } else if (subclassSelect.value === "C6") {
                unit_val = <?php echo isset($_SESSION['C6']) ? $_SESSION['C6'] : '2000'; ?>;
              }
              break;
            default:
              // Set default value if not matched
              unit_val = "";
          }

        } else if (classificationSelect.value === "industrial") {
          // Set unit value based on subclass for "industrial"
          switch (kindsSelect.value) {
            case "pototan3":
              if (subclassSelect.value === "I1") {
                unit_val = <?php echo isset($_SESSION['I1']) ? $_SESSION['I1'] : '4000'; ?>;
              } else if (subclassSelect.value === "I2") {
                unit_val = <?php echo isset($_SESSION['I2']) ? $_SESSION['I2'] : '3500'; ?>;
              } else if (subclassSelect.value === "I3") {
                unit_val = <?php echo isset($_SESSION['I3']) ? $_SESSION['I3'] : '3000'; ?>;
              } else if (subclassSelect.value === "I4") {
                unit_val = <?php echo isset($_SESSION['I4']) ? $_SESSION['I4'] : '2500'; ?>;
              } else if (subclassSelect.value === "I5") {
                unit_val = <?php echo isset($_SESSION['I5']) ? $_SESSION['I5'] : '2000'; ?>;
              } else if (subclassSelect.value === "I6") {
                unit_val = <?php echo isset($_SESSION['I6']) ? $_SESSION['I6'] : '1500'; ?>;
              }
              break;
            default:
              // Set default value if not matched
              unit_val = "";
          }
        }
      }

      // Update the unit value input
      unitValueInput.value = unit_val;
      calculateValues(formId);
    }


    // Function to calculate Assessment Value, Market Value, and Tax Payables
    function calculateValues(formId) {
      var areaInput = document.getElementById("areaInput_" + formId);
      var unitValueInput = document.getElementById("unitValueInput_" + formId);
      var assessLevelInput = document.getElementById("LevelInput_" + formId);
      var marketValueInput = document.getElementById("marketValueInput_" + formId);
      var assessValueInput = document.getElementById("assessValueInput_" + formId);
      var taxValueInput = document.getElementById("taxValueInput_" + formId);

      var area = parseFloat(areaInput.value);
      var unit_val = parseFloat(unitValueInput.value);
      var assess_level = parseFloat(assessLevelInput.value);
      var percentage = 0.02;

      // Check if "Area" has a valid value (not NaN)
      if (!isNaN(area)) {
        var market_val;
        var classificationSelect = document.getElementById("classificationSelect_" + formId);
        if (classificationSelect.value === "agriculture") {
          market_val = (area * unit_val).toFixed(2);
        } else {
          market_val = (area * 100 * unit_val).toFixed(2);
        }
        marketValueInput.value = market_val;

        var assess_val = (market_val * assess_level).toFixed(2);
        assessValueInput.value = assess_val;

        var payables = (assess_val * percentage).toFixed(2);
        taxValueInput.value = payables;
      } else {
        // If "Area" is NaN, clear the other fields
        marketValueInput.value = "";
        assessValueInput.value = "";
        taxValueInput.value = "";
      }
    }






    // Helper functions for creating elements
    function createLabel(text) {
      var label = document.createElement("label");
      label.textContent = text;
      return label;
    }

    function createSelect(id, name, options) {
      var select = document.createElement("select");
      select.id = id;
      select.name = name;
      select.classList.add("form-control");
      options.forEach(function (option) {
        var optionElement = document.createElement("option");
        optionElement.value = option.value;
        optionElement.textContent = option.label;
        select.appendChild(optionElement);
      });
      return select;
    }

    function createInput(id, type, name) {
      var input = document.createElement("input");
      input.type = type;
      input.id = id;
      input.name = name;
      input.classList.add("form-control");
      return input;
    }

    function createSpan(id) {
      var span = document.createElement("span");
      span.id = id;
      return span;
    }

    function appendElements(parent, elements) {
      elements.forEach(function (element) {
        parent.appendChild(element);
      });
    }

    // Your other JavaScript code here
  });

</script>