// side bar toggle 
const hamburger = document.querySelector(".toggle-btn");
const toggler = document.querySelector("#icons");
hamburger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
    toggler.classList.toggle("bx-chevrons-right");
    toggler.classList.toggle("bx-chevrons-left");
});


// bootstrap toast hide
const toastEl = document.querySelector('.toast');
if (toastEl) {
    const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
    toast.show();
}
// let table = new DataTable('#plantTable');
$(document).ready(function () {
  ['#plantTable', '#customerTable', '#inventoryTable', '#outofstock', '#queryTable', '#category'].forEach(function(id) {
    const el = $(id);
    if (el.length && el.get(0).tagName === 'TABLE') {
        el.DataTable({
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
        });
    }
});
    $(document).on("click", ".delete", function () {
        const plantId = $(this).data('id');
        $('#deleteId').val(plantId);
        $("#deleteModel").modal("show");
    });
    $(document).on("click", ".update", function () {
        let plantId = $(this).val();
        $("#updateModel").modal("show");
        $.ajax({
            type: "GET",
            url: '/Edit/' + plantId,
            success: function (response) {
                if (response.status === 200) {
                    console.log(response.plant);
                    $('#product_id').val(response.plant.id);
                    $('#product_name').val(response.plant.Name);
                    $('#scientific_name').val(response.plant.scientificName);
                    $('#category').val(response.plant.Category);
                    $('#plantImagePreview').attr('src', `/storage/${response.plant.image}`);
                    $('#product_price').val(response.plant.price);
                    $('#product_quantity').val(response.plant.quantity);
                    $('#product_description').val(response.plant.Description);
                    $("input[name='Stock'][value='" + response.plant.stock_Information + "']").prop("checked", true);

                }
            }
        });
    });
});

// catgeory
$(document).on("click", ".updateCategory", function () {
    let updateCategory = $(this).val();
    $("#categoryMODEL").modal("show");
    $.ajax({
        type: "GET",
        url: '/edit/category/' + updateCategory,
        success: function (response) {
            $("#category_id").val(response.category.id);
            $('#plant_name').val(response.category.Plant_name);
            $('#scientific_name').val(response.category.Scientific_name);

        }
    });
});
$(document).on("click", ".updateCategory", function () {
    let updateCategory = $(this).data('id');
    $("#categoryMODEL").modal("show");
    $.ajax({
        type: "GET",
        url: '/edit/category/' + updateCategory,
        success: function (response) {
            $("#category_id").val(response.category.id);
            $('#plant_name').val(response.category.Plant_name);
            $('#scientific_name').val(response.category.Scientific_name);

        }
    });
});

$(document).on("click", ".deleteCategory", function () {
    const catgeoryID = $(this).data('id');
    $('#delete_category_id').val(catgeoryID);
    $("#deleteModel").modal("show");
});

// Update user Role
$(document).on("click", ".updateRole", function (E) {
    E.preventDefault();
    const id = $(this).data('id');
    console.log(id);

    $("#updateRole").modal("show");
    $.ajax({
        type: "GET",
        url: '/User/' + id,
        success: function (response) {
            if (response.status === 200) {
                $('#user_id').val(response.user.id);
                $('#name').val(response.user.name);
                $('#role').val(response.user.role);
            }
        }
    });

});

// Delete Projetc
$(document).on("click", ".deleteProject", function () {
    const projectID = $(this).data('id');
    $('#project_id').val(projectID);
    $("#projectDeleteModel").modal("show");
});
// chart js 
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
        labels: productLabels,
        datasets: [{
            label: "Total Sale (PKR)",
            backgroundColor: "#2A4759",
            data: productPrices
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Product-wise Sales Amount'
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});