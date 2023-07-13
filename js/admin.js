// JavaScript to display the table when the respective button is clicked
document.addEventListener("DOMContentLoaded", function() {
    const bookingsBtn = document.getElementById("bookingsBtn");
    const checkInBtn = document.getElementById("checkInBtn");
    const checkOutBtn = document.getElementById("checkOutBtn");
    const roomCategoriesBtn = document.getElementById("roomCategoriesBtn");
    const roomsBtn = document.getElementById("roomsBtn");

    const bookingsTable = document.getElementById("bookingsTable");
    const checkInTable = document.getElementById("checkInTable");
    const checkOutTable = document.getElementById("checkOutTable");
    const roomCategoriesTable = document.getElementById("roomCategoriesTable");
    const roomsTable = document.getElementById("roomsTable");

    bookingsBtn.addEventListener("click", function() {
       hideAllTables();
       bookingsTable.style.display = "table";
    });

    checkInBtn.addEventListener("click", function() {
       hideAllTables();
       checkInTable.style.display = "table";
    });

    checkOutBtn.addEventListener("click", function() {
       hideAllTables();
       checkOutTable.style.display = "table";
    });

    roomCategoriesBtn.addEventListener("click", function() {
       hideAllTables();
       roomCategoriesTable.style.display = "table";
    });

    roomsBtn.addEventListener("click", function() {
       hideAllTables();
       roomsTable.style.display = "table";
    });

    function hideAllTables() {
       bookingsTable.style.display = "none";
       checkInTable.style.display = "none";
       checkOutTable.style.display = "none";
       roomCategoriesTable.style.display = "none";
       roomsTable.style.display = "none";
    }
 });