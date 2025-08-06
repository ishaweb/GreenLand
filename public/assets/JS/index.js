document.addEventListener('DOMContentLoaded', function (e) {
        e.preventDefault();
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
});

 AOS.init({
    duration: 1000, // animation duration in ms
    once: true // only animate once
  });



// FILTer ItemS
const productFilter = document.querySelector(".product");
const productItems = document.querySelectorAll(".product_container article");
const selectItem = document.getElementById("categorySelect");

productFilter.addEventListener("click", (e) => {
    const clicked = e.target.closest(".filter-item");

    if (clicked && clicked.tagName === "P") {
        // Remove 'active' class from all
        const active = productFilter.querySelector(".filter-item.active");
        if (active) active.classList.remove("active");

        clicked.classList.add("active");
        const filterValue = clicked.getAttribute("data-filter");

        filteItem(filterValue);
    }
});
if(selectItem){
    selectItem.addEventListener("change",function(){
        const filterValue = this.value;
        const activeItem = productFilter.querySelector(".filter-select.active");
        if(activeItem){
            activeItem.classList.remove("active");
        }
        filteItem(filterValue);
    })
}
function filteItem(filterValue){
       productItems.forEach((item) => {
            if (
                filterValue === "all" ||
                item.classList.contains(filterValue)
            ) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
}
