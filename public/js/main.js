$(document).ready(function () {
    // modal settings create op
    $("#btn-add").click(() => {
        $("#btn-save").val("Add");
        $("#modalFormData").trigger("reset");
        $("#productEditorModal").modal("show");
    });

    //modal settings update op
    $("body").on("click", ".open-modal", function () {
        const product_id = $(this).val();
        // console.log({product_id});
        
        $.get(`products/${product_id}`, function (data) {
            console.log({data,product_id});
            
            $("#product_id").val(data.id);
            $("#producttitle").val(data.title);
            $("#category").val(data.category);
            $("#price").val(data.price);
            // $("#productimage").val(data.image);
            $("#btn-save").val("Update");
            $("#productEditorModal").modal("show");
        });
    });

    //// Clicking the save button on the open modal for both CREATE and UPDATE

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        e.preventDefault();
        let formData = {
            title: $("#producttitle").val(),
            category: $("#category").val(),
            price: $("#price").val(),
            // image: $("#image").val(),
        };
        let state = $("#btn-save").val();
        let type = "POST";
        const product_id = $("#product_id").val();
        let ajaxUrl = "/products";

        if (state === "Update") {
            type = "PUT";
            ajaxUrl = `products/${product_id}`;
        }
        console.log({formData,state,ajaxUrl,product_id});
        
        $.ajax({
            type:type,
            url: ajaxUrl,
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log({data,product_id});
                
                let source =
                    " " +
                    data.id +
                    " " +
                    data.title +
                    " " +
                    data.category +
                    " ";
                source += `<button class='btn btn-info open-modal' value=${product_id}>Edit</button>`;
                source += "<button class='btn btn-danger'>Delete</button>";

                if (state === "Add") {
                    $("#products-list").append(source);
                    // console.log("add");
                    // console.log({source, id:`#product${product_id}`});
                } 
                else {
                    // $(`#product${product_id}`).replaceWith(source);
                    // console.log("update");
                    // console.log({source, id:`#product${product_id}`});
                    
                }
                $("#modalFormData").trigger("reset");
                $("#productEditorModal").modal("hide");
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});
