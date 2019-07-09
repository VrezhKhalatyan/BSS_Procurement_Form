//Create Date Editor
var dateEditor = function(cell, onRendered, success, cancel) {
    //cell - the cell component for the editable cell
    //onRendered - function to call when the editor has been rendered
    //success - function to call to pass the successfuly updated value to Tabulator
    //cancel - function to call to abort the edit and return to a normal cell

    //create and style input
    var cellValue = moment(cell.getValue(), "DD/MM/YYYY").format("YYYY-MM-DD"),
        input = document.createElement("input");

    input.setAttribute("type", "date");

    input.style.padding = "4px";
    input.style.width = "100%";
    input.style.boxSizing = "border-box";

    input.value = cellValue;

    onRendered(function() {
        input.focus();
        input.style.height = "100%";
    });

    function onChange() {
        if (input.value != cellValue) {
            success(moment(input.value, "YYYY-MM-DD").format("DD/MM/YYYY"));
        } else {
            cancel();
        }
    }

    //submit new value on blur or change
    input.addEventListener("blur", onChange);

    //submit new value on enter
    input.addEventListener("keydown", function(e) {
        if (e.keyCode == 13) {
            onChange();
        }

        if (e.keyCode == 27) {
            cancel();
        }
    });

    return input;
};


//Build Tabulator
var table = new Tabulator("#example-table", {
    height: "311px",
    columns: [
        { title: "Name", field: "name", width: 150, editor: "input" },
        { title: "Location", field: "location", width: 130, editor: "autocomplete", editorParams: { allowEmpty: true, showListOnEmpty: true, values: true } },
        { title: "Progress", field: "progress", sorter: "number", align: "left", formatter: "progress", width: 140, editor: true },
        { title: "Gender", field: "gender", editor: "select", editorParams: { values: { "male": "Male", "female": "Female", "unknown": "Unknown" } } },
        { title: "Rating", field: "rating", formatter: "star", align: "center", width: 100, editor: true },
        { title: "Date Of Birth", field: "dob", align: "center", sorter: "date", width: 140, editor: dateEditor },
        { title: "Driver", field: "car", align: "center", editor: true, formatter: "tickCross" },
    ],
});