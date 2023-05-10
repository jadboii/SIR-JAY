document.addEventListener('DOMContentLoaded', function() {
    var table = document.querySelector('.table-bordered');
    var header = table.querySelector('thead');
    var lastNameHeader = header.querySelector('.tbl-colHeader:nth-child(2)');
    var firstNameHeader = header.querySelector('.tbl-colHeader:nth-child(3)');
    var middleNameHeader = header.querySelector('.tbl-colHeader:nth-child(4)');



    var rows = Array.from(table.querySelectorAll('tbody tr'));
    var defaultOrder = Array.from(rows); // Store the default order of rows

    var clickCount = 0;

    lastNameHeader.addEventListener('click', function() {
        clickCount++;

        if (clickCount === 1) {
            sortRows('ascending');
        } else if (clickCount === 2) {
            sortRows('descending');
        } else {
            clickCount = 0;
            restoreDefaultOrder();
        }
    });

    firstNameHeader.addEventListener('click', function() {
        clickCount++;

        if (clickCount === 1) {
            sortRows('ascending');
        } else if (clickCount === 2) {
            sortRows('descending');
        } else {
            clickCount = 0;
            restoreDefaultOrder();
        }
    });

    middleNameHeader.addEventListener('click', function() {
        clickCount++;

        if (clickCount === 1) {
            sortRows('ascending');
        } else if (clickCount === 2) {
            sortRows('descending');
        } else {
            clickCount = 0;
            restoreDefaultOrder();
        }
    });

    function sortRows(order) {
        rows.sort(function(row1, row2) {
            var name1 = row1.querySelector('td:nth-child(3)').textContent.trim();
            var name2 = row2.querySelector('td:nth-child(3)').textContent.trim();

            return name1.localeCompare(name2, undefined, { sensitivity: 'base' });
        });

        if (order === 'descending') {
            rows.reverse();
        }

        updateTableBody();
    }

    function restoreDefaultOrder() {
        rows = Array.from(defaultOrder);
        updateTableBody();
    }

    function updateTableBody() {
        var tbody = table.querySelector('tbody');
        tbody.innerHTML = '';

        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    }
});

