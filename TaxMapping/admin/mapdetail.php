<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');
?>

<div id="container2">


    <h4 class="heading">Land Information</h4>
    <script>
        function onClassificationChange() {
            var classificationSelect = document.getElementById("classificationSelect");
            var kindsSelect = document.getElementById("kindsSelect");
            var subclassSelect = document.getElementById("subclassSelect");
            var unitValueInput = document.getElementById("unitValueInput");
            var LevelInput = document.getElementById("LevelInput");

            var selectedClassification = classificationSelect.value;
            var selectedKinds = kindsSelect.value;

            // Reset all fields
            unitValueInput.value = "";
            LevelInput.value = "";
            subclassSelect.value = "";
            subclassSelect.disabled = true;

            if (selectedClassification === "agriculture") {
                // Enable and populate Kinds select for agriculture
                kindsSelect.disabled = false;
                kindsSelect.innerHTML = '<option value="">Select Kinds</option>' +
                    '<option value="irrigated">Rice Irrigated</option>' +
                    '<option value="non-irrigated">Rice Unirrigated</option>' +
                    '<option value="upland">Rice Upland</option>' +
                    '<option value="corn">Corn Land</option>' +
                    '<option value="coconut">Coconut Land</option>' +
                    '<option value="cotton">Cotton Land</option>' +
                    '<option value="tabacco">Tabacco Land</option>' +
                    '<option value="bamboo">Bamboo Land</option>' +
                    '<option value="bangus">Fishpond:Bangus</option>' +
                    '<option value="tilapia">Fishpond:Tilapia</option>' +
                    '<option value="lapu-lapu">Fishpond:Lapu-Lapu</option>' +
                    '<option value="fisheries">In-Land Fisheries:Tilapia</option>' +
                    '<option value="hito">In-Land Fisheries:Hito </option>' +
                    '<option value="nipa">Nipa Land</option>' +
                    '<option value="salt">Salt Bed</option>' +
                    '<option value="pasture">Pasture</option>' +
                    '<option value="forest">Forest</option>' +
                    '<option value="mangroove">Mangroove</option>' +
                    '<option value="orchard">Orchard</option>' +
                    '<option value="abaca">Abaca</option>' +
                    '<option value="cogon">Cogon Land</option>' +
                    '<option value="sorghum">Sorghum</option>' +
                    '<option value="ipil-ipil">Ipil-Ipil Land</option>' +
                    '<option value="zacate">Zacate</option>' +
                    '<option value="kangkong">Kangkong</option>' +
                    '<option value="mango">Mango Land</option>' +
                    '<option value="pineapple">Pineapple Land</option>' +
                    '<option value="intensive">Prawn Pond, Intensive</option>' +
                    '<option value="semi-intensive">Prawn Pond, Semi-intensive</option>' +
                    '<option value="traditional">Prawn Pond, Traditional</option>' +
                    '<option value="sugar">Sugar Land</option>' +
                    '<option value="cardava">Banana Land:Cardava/Saba(pp of not more than 625)</option>' +
                    '<option value="sweet">Banana Land:Sweet Banana(pp of not more than 955)</option>' +
                    '<option value="banana commercial">Banana Land:Commercial Plantation(pp of not more than 956 for Sweet & more than 625 for Cardava/Saba)</option>' +
                    '<option value="cassava">Cassava Land & other Root Crops</option>' +
                    '<option value="coffee">Coffee</option>' +
                    '<option value="horticulture">Horticulture</option>' +
                    '<option value="poultry">Poultry Farm Land(Broiler)</option>' +
                    '<option value="cacao">Cacao Land</option>' +
                    '<option value="swine">Swine Farm Land</option>' +
                    '<option value="papaya commercial">Papaya Land:Commercial Plantation (pp of 1,100 hills/ha. or more)</option>' +
                    '<option value="papaya traditional">Papaya Land:Traditional (pp of 1,099 hills/ha. or more)</option>' +
                    '<option value="dragon">Dragon Fruit Land</option>' +
                    '<option value="breeding">Game Fowl Breeding Farm</option>' +
                    '<option value="citrus">Citrus Land</option>';
                // Set Assessment Level for agriculture
                LevelInput.value = "0.175";

            } else if (selectedClassification === "residential") {
                // Enable and populate Kinds select for agriculture
                kindsSelect.disabled = false;
                kindsSelect.innerHTML = '<option value="">Select Kinds</option>' +
                    '<option value="pototan1">Pototan</option>';
                // Set Assessment Level for industrial
                LevelInput.value = "0.05";

            } else if (selectedClassification === "commercial") {
                // Enable and populate Kinds select for agriculture
                kindsSelect.disabled = false;
                kindsSelect.innerHTML = '<option value="">Select Kinds</option>' +
                    '<option value="pototan2">Pototan</option>';
                // Set Assessment Level for residential
                LevelInput.value = "0.15";

            } else if (selectedClassification === "industrial") {
                // Enable and populate Kinds select for agriculture
                kindsSelect.disabled = false;
                kindsSelect.innerHTML = '<option value="">Select Kinds</option>' +
                    '<option value="pototan3">Pototan</option>';
                // Set Assessment Level for residential
                LevelInput.value = "0.2";
            }

        }
        



        function onKindsChange() {
            var kindsSelect = document.getElementById("kindsSelect");
            var subclassSelect = document.getElementById("subclassSelect");
            var unitValueInput = document.getElementById("unitValueInput");

            var selectedKinds = "agriculture";

            // Reset Unit Value and Subclass select
            unitValueInput.value = "";
            subclassSelect.value = "";
            subclassSelect.disabled = false;

            if (kindsSelect.value !== "") {
                subclassSelect.disabled = false;
                if (kindsSelect.value === "irrigated") {
                    subclassSelect.innerHTML = `
                        <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "non-irrigated") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "upland") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "corn") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                            `;
                } else if (kindsSelect.value === "coconut") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "cotton") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "tabacco") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "bamboo") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "bangus") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "tilapia") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "lapu-lapu") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "fisheries") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "hito") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "nipa") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "salt") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "pasture") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "forest") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "mangrove") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "orchard") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "abaca") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "cogon") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "sorghum") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "ipil-ipil") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "zacate") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "kangkong") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "mango") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "pineapple") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "intensive") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "semi-intensive") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "traditional") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "sugar") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "cardava") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "sweet") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "banana commercial") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "cassava") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "coffee") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "horticulture") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "poultry") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "cacao") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "swine") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "papaya commercial") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "papaya traditional") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "dragon") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "breeding") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    `;
                } else if (kindsSelect.value === "citrus") {
                    subclassSelect.innerHTML = `
                    <option value="">Select Subclass</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
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

        function onSubclassChange() {
            var subclassSelect = document.getElementById("subclassSelect");
            var unitValueInput = document.getElementById("unitValueInput");

            // Set unit value based on selected subclass and classification
            var classificationSelect = document.getElementById("classificationSelect");
            var kindsSelect = document.getElementById("kindsSelect");

            var subclass = "";
            var unit_val = "";

            if (subclassSelect.value !== "") {
                if (classificationSelect.value === "agriculture") {
                    // Set unit value based on subclass for "agriculture"
                    switch (kindsSelect.value) {
                        case "irrigated":
                            if (subclassSelect.value === "1") {
                                unit_val = "767100";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "715600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "631300";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "527700";
                            }
                            break;
                        case "non-irrigated":
                            if (subclassSelect.value === "1") {
                                unit_val = "442400";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "405500";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "339200";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "upland":
                            if (subclassSelect.value === "1") {
                                unit_val = "162600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "128700";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "corn":
                            if (subclassSelect.value === "1") {
                                unit_val = "206600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "184600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "143300";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "coconut":
                            if (subclassSelect.value === "1") {
                                unit_val = "217500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "190300";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "146800";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "cotton":
                            if (subclassSelect.value === "1") {
                                unit_val = "201800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "181600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "none";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "tabacco":
                            if (subclassSelect.value === "1") {
                                unit_val = "145800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "131200";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "102000";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "bamboo":
                            if (subclassSelect.value === "1") {
                                unit_val = "148000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "133100";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "103500";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "bangus":
                            if (subclassSelect.value === "1") {
                                unit_val = "649800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "617100";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "552200";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "487200";
                            }
                            break;
                        case "tilapia":
                            if (subclassSelect.value === "1") {
                                unit_val = "513500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "474900";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "397800";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "320800";
                            }
                            break;
                        case "lapu-lapu":
                            if (subclassSelect.value === "1") {
                                unit_val = "846500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "782700";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "655700";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "528700";
                            }
                            break;
                        case "fisheries":
                            if (subclassSelect.value === "1") {
                                unit_val = "418800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "387300";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "324500";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "261700";
                            }
                            break;
                        case "hito":
                            if (subclassSelect.value === "1") {
                                unit_val = "555600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "513800";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "430500";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "347200";
                            }
                            break;
                        case "nipa":
                            if (subclassSelect.value === "1") {
                                unit_val = "177600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "salt":
                            if (subclassSelect.value === "1") {
                                unit_val = "510500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "474600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "403100";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "pasture":
                            if (subclassSelect.value === "1") {
                                unit_val = "126000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "forest":
                            if (subclassSelect.value === "1") {
                                unit_val = "121300";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "mangrove":
                            if (subclassSelect.value === "1") {
                                unit_val = "83000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "orchard":
                            if (subclassSelect.value === "1") {
                                unit_val = "298400";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "261000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "184600";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "abaca":
                            if (subclassSelect.value === "1") {
                                unit_val = "116000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "cogon":
                            if (subclassSelect.value === "1") {
                                unit_val = "96000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "sorghum":
                            if (subclassSelect.value === "1") {
                                unit_val = "159800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "150200";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "130100";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "ipil-ipil":
                            if (subclassSelect.value === "1") {
                                unit_val = "193000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "181600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "zacate":
                            if (subclassSelect.value === "1") {
                                unit_val = "108000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "kangkong":
                            if (subclassSelect.value === "1") {
                                unit_val = "114000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "mango":
                            if (subclassSelect.value === "1") {
                                unit_val = "489800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "440800";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "342800";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "pineapple":
                            if (subclassSelect.value === "1") {
                                unit_val = "244600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "220100";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "171200";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "intensive":
                            if (subclassSelect.value === "1") {
                                unit_val = "889200";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "844700";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "755700";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "666800";
                            }
                            break;
                        case "semi-intensive":
                            if (subclassSelect.value === "1") {
                                unit_val = "793300";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "753600";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "674200";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "594900";
                            }
                            break;
                        case "traditional":
                            if (subclassSelect.value === "1") {
                                unit_val = "697500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "662500";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "592800";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "523000";
                            }
                            break;
                        case "sugar":
                            if (subclassSelect.value === "1") {
                                unit_val = "568100";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "529300";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "428100";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "cardava":
                            if (subclassSelect.value === "1") {
                                unit_val = "238400";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "220500";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "184700";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "149000";
                            }
                            break;
                        case "sweet":
                            if (subclassSelect.value === "1") {
                                unit_val = "284400";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "263000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "220400";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "177700";
                            }
                            break;
                        case "banana commercial":
                            if (subclassSelect.value === "1") {
                                unit_val = "662000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "612300";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "51300";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "413700";
                            }
                            break;
                        case "casava":
                            if (subclassSelect.value === "1") {
                                unit_val = "170900";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "153800";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "119600";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "coffee":
                            if (subclassSelect.value === "1") {
                                unit_val = "143500";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "129100";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "100400";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "horticulture":
                            if (subclassSelect.value === "1") {
                                unit_val = "122300";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "poultry":
                            if (subclassSelect.value === "1") {
                                unit_val = "771800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "713900";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "598100";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "482400";
                            }
                            break;
                        case "cacao":
                            if (subclassSelect.value === "1") {
                                unit_val = "266000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "239300";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "186100";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break;
                        case "swine":
                            if (subclassSelect.value === "1") {
                                unit_val = "797000";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "737000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "617500";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "497900";
                            }
                            break;
                        case "papaya commercial":
                            if (subclassSelect.value === "1") {
                                unit_val = "577800";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "534500";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "447800";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "361100";
                            }
                            break;
                        case "papaya traditional":
                            if (subclassSelect.value === "1") {
                                unit_val = "324200";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "308000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "275600";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "243100";
                            }
                            break;
                        case "dragon":
                            if (subclassSelect.value === "1") {
                                unit_val = "662300";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "596000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "463600";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
                            }
                            break; case "breeding":
                            if (subclassSelect.value === "1") {
                                unit_val = "823200";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "759400";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "635900";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "512400";
                            }
                            break; case "citrus":
                            if (subclassSelect.value === "1") {
                                unit_val = "365600";
                            } else if (subclassSelect.value === "2") {
                                unit_val = "329000";
                            } else if (subclassSelect.value === "3") {
                                unit_val = "255900";
                            } else if (subclassSelect.value === "4") {
                                unit_val = "";
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
                                unit_val = "4900";
                            } else if (subclassSelect.value === "R2") {
                                unit_val = "4300";
                            } else if (subclassSelect.value === "R3") {
                                unit_val = "3500";
                            } else if (subclassSelect.value === "R4") {
                                unit_val = "3000";
                            } else if (subclassSelect.value === "R5") {
                                unit_val = "2200";
                            } else if (subclassSelect.value === "R6") {
                                unit_val = "1500";
                            }
                            break;

                        default:
                            // Set default value if not matched
                            unit_val = "";
                    }
                } else if (classificationSelect.value === "commercial") {
                    // Set unit value based on subclass for "residential"
                    switch (kindsSelect.value) {
                        case "pototan2":
                            if (subclassSelect.value === "C1") {
                                unit_val = "6000";
                            } else if (subclassSelect.value === "C2") {
                                unit_val = "5300";
                            } else if (subclassSelect.value === "C3") {
                                unit_val = "4300";
                            } else if (subclassSelect.value === "C4") {
                                unit_val = "3300";
                            } else if (subclassSelect.value === "C5") {
                                unit_val = "2500";
                            } else if (subclassSelect.value === "C6") {
                                unit_val = "2000";
                            }
                            break;
                        default:
                            // Set default value if not matched
                            unit_val = "";
                    }
                } else if (classificationSelect.value === "industrial") {
                    // Set unit value based on subclass for "residential"
                    switch (kindsSelect.value) {
                        case "pototan3":
                            if (subclassSelect.value === "I1") {
                                unit_val = "4000";
                            } else if (subclassSelect.value === "I2") {
                                unit_val = "3500";
                            } else if (subclassSelect.value === "I3") {
                                unit_val = "3000";
                            } else if (subclassSelect.value === "I4") {
                                unit_val = "2500";
                            } else if (subclassSelect.value === "I5") {
                                unit_val = "2000";
                            } else if (subclassSelect.value === "I6") {
                                unit_val = "1500";
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
        }

        function calculateMarketValue() {
            var area = parseFloat(document.getElementById("areaInput").value);
            var unit_val = parseFloat(document.getElementById("unitValueInput").value);
            var assess_level = parseFloat(document.getElementById("LevelInput").value);
            

            var percentage = 0.02;

            // Calculate Market Value
            var market_val = area * unit_val;
            document.getElementById("marketValueInput").value = market_val.toFixed(2);

            // Calculate Assessment Value
            var assess_val = area * unit_val * assess_level;
            document.getElementById("assessValueInput").value = assess_val.toFixed(2);

            // Calculate Tax Payables
            var payables = area * unit_val * assess_level * percentage;
            document.getElementById("taxValueInput").value = payables.toFixed(2);
        }

        window.addEventListener('DOMContentLoaded', function () {
            // Add event listeners to input fields to trigger calculation on input change
            document.getElementById("unitValueInput").addEventListener('input', calculateMarketValue);
            document.getElementById("areaInput").addEventListener('input', calculateMarketValue);
            document.getElementById("LevelInput").addEventListener('input', calculateMarketValue);
        });



    </script>

    <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label>Lot No.</label>
                <input type="text" name="lot_no" class="form-control" placeholder="Enter Lot No.">
            </div>
            <div class="form-group">
                <label>Title No.</label>
                <input type="text" name="title_no" class="form-control" placeholder="Enter Ttle No.">
            </div>
            <div class="form-group">
                <label for="classificationSelect">Classification:</label>
                <select id="classificationSelect" name="classification" class="form-control"
                    onchange="onClassificationChange()">
                    <option value="">-- Select Classification --</option>
                    <option value="agriculture">Agriculture</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="industrial">Industrial</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kindsSelect">Kinds</label>
                <select id="kindsSelect" name="kinds" class="form-control" onchange="onKindsChange()">
                    <option value="">-- Select Kinds --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="subclassSelect">Subclass</label>
                <select id="subclassSelect" name="subclass" class="form-control" onchange="onSubclassChange()">
                    <option value="">-- Select Subclass --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="areaInput">Area</label>
                <input type="text" id="areaInput" name="area" class="form-control" oninput="setUnitValue()">
            </div>
            <div class="form-group">
                <label>Building / Structures</label>
                <input type="text" name="structures" class="form-control" placeholder="Enter Structures">
            </div>
            <div class="form-group">
                <label>Machinery</label>
                <input type="text" name="machinery" class="form-control" placeholder="Enter Machinery">
            </div>
            <div class="form-group">
                <label for="unitValueInput">Unit Value</label>
                <input type="text" name="unit_val" class="form-control" id="unitValueInput">
            </div>
            <div class="form-group">
                <label for="LevelInput">Assessment Level:</label>
                <input  type="text" name="assess_level" class="form-control" id="LevelInput">
            </div>
            <div class="form-group">
                <label for="assessValueInput">Assessment Value:</label>
                <input type="text" name="assess_val" class="form-control" id="assessValueInput">
            </div>
            <div class="form-group">
                <label for="marketValueInput">Market Value:</label>
                <input type="text" name="market_val" class="form-control" id="marketValueInput">
            </div>
            <div class="form-group">
                <label for="taxValueInput">Tax Payables:</label>
                <input type="text" name="payables" class="form-control" id="taxValueInput">
            </div>
            <div class="form-group">
                <label>Regression</label>
                <input type="text" name="regression" class="form-control" placeholder="Enter  Land Analysis">
            </div>
            <div class="form-group">
                <label>Remarks</label>
                <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks">
            </div>




        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
            <button type="submit" name="mapbtn" class="btn btn-primary">Save</button>
        </div>

    </form>



</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>