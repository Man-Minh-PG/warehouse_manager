/* Proces add value temmp table when use ajax*/
$("#add_value").click(function(){ 
    let button = '<div class="btn-group" role="group" aria-label="Basic example">'+
    '<button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-pencil-alt"></i></button>' +
    '<button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-trash" onclick ="delete_row_in_table($(this))"></i></button>' +
    '<button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-eye"></i></button>' +
    '</div>';

    let table = $("#table");
    let row   = $("<tr></tr>");
    let cell1 = $("<td></td>").text($("#productType").val());
    let cell2 = $("<td></td>").text($("#productName").val());
    let cell3 = $("<td></td>").text($("#price").val());
    let cell4 = $("<td></td>").text($("#amount").val());
    let cell5 = $("<td>"+button+"</td>")

    row.append(cell1, cell2, cell3, cell4, cell5);
    table.append(row);

    //Type JS
    // let tabel  = document.getElementById("table");
    // let row    = tabel.insertRow(1);

    // let cell1  = row.insertCell(0);
    // cell1.innerHTML = "NEW CELL1";
});

/* Proces delete value temmp table when use ajax*/
function delete_row_in_table(row) {
    if(confirm("Xác nhận xóa!")) {
        row.closest('tr').remove();
    }
    else{
        return false;
    }
}