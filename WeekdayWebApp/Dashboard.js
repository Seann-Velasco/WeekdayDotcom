//Works, switches between members and committee table. which is asseccessible only for admin in.
const switch_button = document.getElementById("switch_button");
const members = document.getElementById("Members_Container");
const committee = document.getElementById("Committee_Container");

switch_button.onclick = function() {
    if (Members_Container.style.display !== "none") {
        Members_Container.style.display = "none";
        Committee_Container.style.display = "table";
    } else {
        Members_Container.style.display = "table";
        Committee_Container.style.display = "none";
    }
}

//Couldn't make it work. Wanted to make the cell change color based on their role.
function colorCells() {
    const table = document.querySelector("#deliverables-board");

    const rows = table.querySelectorAll("tbody tr");

    rows.forEach(row => {
        const cells = row.cells;

        for (let i = 1; i < cells.length; i++) {
            const data = cells[i];
            const value = data.textContent.trim();

            if (data === "responsible") {
                cells[i].backgroundcolor("green");
            } else if (data === "accountable") {
                cells[i].backgroundcolor("red");
            } else if (data === "consulted") {
                cells[i].backgroundcolor("yellow");
            } else if (data === "informed") {
                cells[i].backgroundcolor("blue");
            }
        }
    });
}
window.onload = colorCells;
